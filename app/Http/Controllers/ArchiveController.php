<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Drh;
use App\Models\StagiaireRefus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       
        $stagiaire = Drh::find($id);
        

        $archives = new Archive();
      		
        $archives->nom     = $stagiaire->nom;
        $archives->prenoms = $stagiaire->prenoms;
        $archives->matricule = $stagiaire->matricule;
        $archives->email = $stagiaire->email;
        $archives->telephone = $stagiaire->telephone;
        $archives->photo = $stagiaire->photo;
        $archives->specialite = $stagiaire->specialite;
        $archives->cv = $stagiaire->cv;
        $archives->lettre_motiv = $stagiaire->lettre_motiv;
        $archives->duree =  $stagiaire->duree;
        $archives->date_debut_stage =$stagiaire->date_debut_stage;
        $archives->date_fin_stage = $stagiaire->date_fin_stage;
        $archives->site = $stagiaire->site;
        $archives->message =  $stagiaire->message;
        $archives->traite =  Auth::user()->name;
            
        $archives->save();

        $stagiaire = Drh::find($id);

       $stagiaire->delete();
       

        return redirect()->route('archive.liste')->with('success', 'Un stagiaire vient de vinir son stage');
       
    }

    
    //Consulter le dossier du stage
    public function dossierStagiaire($id){

        $id = Archive::find($id);

        return view('stagiaire.dossier', compact('id'));
    }

    public function liste(){

        $stages = Archive::all();

        return view('archive.liste',compact('stages'));
    }

    public function listeStagiaireRefuser(){

        $stages = StagiaireRefus::all();

        return view('archive.stagiaire-refuser',compact('stages'));
    }
}