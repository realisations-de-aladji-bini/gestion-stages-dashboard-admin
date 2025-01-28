<?php

namespace App\Http\Controllers;


use App\Models\Demandeur;
use App\Models\Drh;
use Illuminate\Http\Request;
use App\Mail\EnvoieMail;
use App\Models\StagiaireRefus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DrhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages = Drh::all();
        

        return view('stagiaire.index',compact('stages'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $refuser =   $request->refuser;


        if(isset($refuser)){

            $stagiaire_refuse = new StagiaireRefus ; // table de refus
            
            // Service d'envois de mail
            $details=[

                'tilte'=> 'Direction des Ressouces Humaines (INP-HB)',
                'body' =>  $request->message,

            ];
            
            Mail::to( $request->email)->send(new EnvoieMail($details));

            $id = intval($request->id);
            
            $stagiaire = Demandeur::find($id);
            
            $stagiaire_refuse->nom     = $stagiaire->nom;
            $stagiaire_refuse->prenoms = $stagiaire->prenoms;
            $stagiaire_refuse->matricule = $stagiaire->matricule;
            $stagiaire_refuse->email = $stagiaire->email;
            $stagiaire_refuse->telephone = $stagiaire->telephone;
            $stagiaire_refuse->photo = $stagiaire->photo;
            $stagiaire_refuse->specialite = $stagiaire->specialite;
            $stagiaire_refuse->cv = $stagiaire->cv;
            $stagiaire_refuse->lettre_motiv = $stagiaire->lettre_motiv;
            $stagiaire_refuse->duree =  $stagiaire->duree;
            $stagiaire_refuse->date_debut_stage = $request->date_debut_stage;
            $stagiaire_refuse->site = $request->libelle_serv;
            $stagiaire_refuse->message =  $request->message;
            $stagiaire_refuse->traite =  Auth::user()->name;
            
            $stagiaire_refuse->save();

            $stagiaire->delete();
        

            return redirect()->route('archive.stagiaire-refuser')->with('success', 'Un stagiaire a été réfusé');
            

        }else{

            $nombre_mois = intval($request->nombre_mois) ; // intval convertir en int

            // formater la date de fin en fonction du mois
            $date_de_debut = $request->date_debut_stage;
            $date_de_debut = date_parse($date_de_debut);// format de la date
            $jour_debut  = intval($date_de_debut['day']);
            $mois_debut  = intval($date_de_debut['month']) ;
            $annee_debut = intval($date_de_debut['year']) ;

            $mois31Jour = array(1,3,5,7,8,10,12);
            $mois30Jour = [9,11,4,6];
            $fervier    = 2;
            
            $nombre_mois_stage = $nombre_mois + $mois_debut ;
        
            // ¨Par defaut
            $jour_fin  = $jour_debut;
            $mois_fin  = $nombre_mois_stage;
            $annee_fin = $annee_debut;

            if ($nombre_mois_stage < 13) {
            
                if (in_array($mois_debut, $mois30Jour,true)) {
                    
                    if ($jour_debut > 30) {
                    
                        $jour_fin  = $jour_debut - 30;
                        $mois_fin  = $nombre_mois_stage + 1;
                    
                    }
                }else{
                    
                    if ($jour_debut > 28 && $mois_fin == 2) {
                        $jour_fin  = $jour_debut - 28;
                        $mois_fin  = $nombre_mois_stage + 1;
                    } 
                }
                

            } else {
                
                $mois_fin  = $nombre_mois_stage - 12;
                $annee_fin = $annee_debut + 1;
                if (in_array($mois_fin, $mois30Jour,true)) {
                    
                    if ($jour_debut > 30) {
                    
                        $jour_fin  = $jour_debut - 30;
                        $mois_fin  = $mois_fin + 1;
                    
                    }
                }else{
                    if ($jour_debut > 28 && $mois_fin == 2) {
                        $jour_fin  = $jour_debut - 28;
                        $mois_fin  = $mois_fin + 1;
                    
                    } 
                }

            }
            
            
            $date = date_create($annee_fin.'-'.$mois_fin.'-'.$jour_fin);
            $date_de_fin_stage =  date_format($date, 'Y-m-d');

            $Drh = new Drh; // La table de validation

            $id = intval($request->id);
            $stagiaire = Demandeur::find($id);
        
            $Drh->nom     = $stagiaire->nom;
            $Drh->prenoms = $stagiaire->prenoms;
            $Drh->matricule = $stagiaire->matricule;
            $Drh->email = $stagiaire->email;
            $Drh->telephone = $stagiaire->telephone;
            $Drh->photo = $stagiaire->photo;
            $Drh->specialite = $stagiaire->specialite;
            $Drh->cv = $stagiaire->cv;
            $Drh->lettre_motiv = $stagiaire->lettre_motiv;
            $Drh->duree =  $stagiaire->duree;
            $Drh->date_debut_stage = $request->date_debut_stage;
            $Drh->date_fin_stage = $date_de_fin_stage;
            $Drh->site = $request->libelle_serv;
            $Drh->message =  $request->message;
            $Drh->traite =  Auth::user()->name;
            
            $Drh->save();


            // Service d'envois de mail
            $details=[

                'tilte'=> 'Direction des Ressouces Humaines (INP-HB)',
                'body' =>  $request->message,

            ];
            
            Mail::to( $stagiaire->email)->send(new EnvoieMail($details));

            // Supprimer sur la table demande
            $stagiaire = Demandeur::find($id);
            $stagiaire->delete();
        

            return redirect()->route('stagiaire.index')->with('success', 'Un stagiaire a été accepté');
            

        }

        

    }



    public function refuserAccepter(Request $request){


            $nombre_mois = intval($request->nombre_mois) ; // intval convertir en int

            // formater la date de fin en fonction du mois
            $date_de_debut = $request->date_debut_stage;
            $date_de_debut = date_parse($date_de_debut);// format de la date
            $jour_debut  = intval($date_de_debut['day']);
            $mois_debut  = intval($date_de_debut['month']) ;
            $annee_debut = intval($date_de_debut['year']) ;

            $mois31Jour = array(1,3,5,7,8,10,12);
            $mois30Jour = [9,11,4,6];
            $fervier    = 2;
            
            $nombre_mois_stage = $nombre_mois + $mois_debut ;
        
            // ¨Par defaut
            $jour_fin  = $jour_debut;
            $mois_fin  = $nombre_mois_stage;
            $annee_fin = $annee_debut;

            if ($nombre_mois_stage < 13) {
            
                if (in_array($mois_debut, $mois30Jour,true)) {
                    
                    if ($jour_debut > 30) {
                    
                        $jour_fin  = $jour_debut - 30;
                        $mois_fin  = $nombre_mois_stage + 1;
                    
                    }
                }else{
                    
                    if ($jour_debut > 28 && $mois_fin == 2) {
                        $jour_fin  = $jour_debut - 28;
                        $mois_fin  = $nombre_mois_stage + 1;
                    } 
                }
                

            } else {
                
                $mois_fin  = $nombre_mois_stage - 12;
                $annee_fin = $annee_debut + 1;
                if (in_array($mois_fin, $mois30Jour,true)) {
                    
                    if ($jour_debut > 30) {
                    
                        $jour_fin  = $jour_debut - 30;
                        $mois_fin  = $mois_fin + 1;
                    
                    }
                }else{
                    if ($jour_debut > 28 && $mois_fin == 2) {
                        $jour_fin  = $jour_debut - 28;
                        $mois_fin  = $mois_fin + 1;
                    
                    } 
                }

            }
            
            
            $date = date_create($annee_fin.'-'.$mois_fin.'-'.$jour_fin);
            $date_de_fin_stage =  date_format($date, 'Y-m-d');

            $Drh = new Drh; // La table de validation

            $id = intval($request->id);
            $stagiaire = StagiaireRefus::find($id);

            $Drh->nom     = $stagiaire->nom;
            $Drh->prenoms = $stagiaire->prenoms;
            $Drh->matricule = $stagiaire->matricule;
            $Drh->email = $stagiaire->email;
            $Drh->telephone = $stagiaire->telephone;
            $Drh->photo = $stagiaire->photo;
            $Drh->specialite = $stagiaire->specialite;
            $Drh->cv = $stagiaire->cv;
            $Drh->lettre_motiv = $stagiaire->lettre_motiv;
            $Drh->duree =  $stagiaire->duree;
            $Drh->date_debut_stage = $request->date_debut_stage;
            $Drh->date_fin_stage = $date_de_fin_stage;
            $Drh->site = $request->libelle_serv;
            $Drh->message =  $request->message;
            $Drh->traite =  Auth::user()->name;
            
            $Drh->save();


            // // Service d'envois de mail
            $details=[

                'tilte'=> 'Direction des Ressouces Humaines (INP-HB)',
                'body' =>  $request->message,

            ];
            
            Mail::to( $stagiaire->email)->send(new EnvoieMail($details));

            // Supprimer sur la table demande
            $stagiaire = StagiaireRefus::find($id);
            $stagiaire->delete();
        

            return redirect()->route('stagiaire.index')->with('success', 'Un stagiaire réfusé a été accepté');
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
        Fonction selectionner une nouvelle date
    */
    public function dateNouvelle(Request $request, $id){
        
        $Drh = Drh::find($id);
        
        $date = $Drh->date_debut_stage;
        $id   = $Drh->id;
        $nom  = $Drh->nom;
        $prenom  = $Drh->prenoms;

        $nom = $nom.' '.$prenom;
       
        return view('stagiaire.nouvelle-date',compact('date','id','nom'));
        
    }
    public function update(Request $request)
    {   
        $id = $request->id;
        $stagiaire = Drh::find($id); 
        $stagiaire->date_debut_stage = $request->date_nouvelle;

        $stagiaire->save();// Modifier la date du debut

        $stagiaire = Drh::find($id); 
        
        $nombre_mois = intval($stagiaire->duree) ; // intval convertir en int

        // formater la date de fin en fonction du mois
        $date_de_debut = $stagiaire->date_debut_stage;
        $date_de_debut = date_parse($date_de_debut);// format de la date
        $jour_debut  = intval($date_de_debut['day']);
        $mois_debut  = intval($date_de_debut['month']) ;
        $annee_debut = intval($date_de_debut['year']) ;

        $mois31Jour = array(1,3,5,7,8,10,12);
        $mois30Jour = [9,11,4,6];
        $fervier    = 2;
        
        $nombre_mois_stage = $nombre_mois + $mois_debut ;
       
        $jour_fin  = $jour_debut;
        $mois_fin  = $nombre_mois_stage;
        $annee_fin = $annee_debut;

        if ($nombre_mois_stage < 13) {
           
            if (in_array($mois_debut, $mois30Jour,true)) {
                
                if ($jour_debut > 30) {
                   
                    $jour_fin  = $jour_debut - 30;
                    $mois_fin  = $nombre_mois_stage + 1;
                   
                }
            }else{
                
                if ($jour_debut > 28 && $mois_fin == 2) {
                    $jour_fin  = $jour_debut - 28;
                    $mois_fin  = $nombre_mois_stage + 1;
                } 
            }
            

        } else {
            
            $mois_fin  = $nombre_mois_stage - 12;
            $annee_fin = $annee_debut + 1;
            if (in_array($mois_fin, $mois30Jour,true)) {
                
                if ($jour_debut > 30) {
                   
                    $jour_fin  = $jour_debut - 30;
                    $mois_fin  = $mois_fin + 1;
                   
                }
            }else{
                if ($jour_debut > 28 && $mois_fin == 2) {
                    $jour_fin  = $jour_debut - 28;
                    $mois_fin  = $mois_fin + 1;
                   
                } 
            }

        }
        
        
        $date = date_create($annee_fin.'-'.$mois_fin.'-'.$jour_fin);
        $date_de_fin_stage =  date_format($date, 'Y-m-d');


       
        $stagiaire->date_fin_stage  = $date_de_fin_stage;

        $stagiaire->save();

        return redirect()->route('stagiaire.index')->with('success', 'La date de début de stage modifier');
    }


    //Consulter le dossier du stage
    public function dossierStagiaire($id){

        $id = Drh::find($id);



        return view('stagiaire.dossier', compact('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
