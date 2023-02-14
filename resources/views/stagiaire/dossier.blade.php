     
@extends('layouts.master')

@section('title')
    <title>Dossier | Stagiaire</title>
    
@endsection

@section('css')
    <link href="/css-propre/styles.css" rel="stylesheet">
@endsection
 
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Etude du dossier</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-success text-center">Dossier du stagiaire</h1>
            </div>
        </div><!--/.row-->
        
        <div class="panel panel-container">
            <div class="container-fluid">
               
                    <div class="col-md-12">
                        <fieldset class="col-md-12">
                                <form  method="POST" action="{{ route('stagiaire.accepter') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-11 ">
                                            <div class="well-block">
                                                <div class="row">
                                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group required" data-request-files data-request-flash>
                                                            <div id="imageResult">
                                                                <img  src="{{ asset('img') }}/{{$id->photo }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                              
                                                    <div class="col-md-4 ">
                                                        <div class="form-group required">
                                                            <label class="control-label" for="registerName">Nom</label >
                                                            <input name="nom" value="{{ $id->nom }}" readonly  type="text" class="form-control " id="name" required placeholder="Entrer le nom">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group required">
                                                            <label class="control-label" for="registerPrenom">Prénom</label >
                                                            <input name="prenoms" value="{{ $id->prenoms }}" readonly  required type="text" class="form-control" id="registerPrenom" placeholder="Entrer les prénoms" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group required">
                                                            <label class="control-label" for="registerPrenom1">Téléphone</label >
                                                            <input  name="tel" value="{{ $id->telephone }}" readonly  type="text" required class="form-control" id="registerPrenom1" placeholder="Nom et prénoms du père" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group required">
                                                            <label class="control-label" for="registerPrenom1">Matricule</label >
                                                            <input  name="tel" value="{{ $id->matricule }}" readonly  type="text" required class="form-control" id="registerPrenom1" placeholder="Nom et prénoms du père" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group required">
                                                            <label class="control-label" for="registerPaysresidence">Specialité</label>
                                                            <input name="specialite" value="{{ $id->specialite }}" readonly  type="text" required class="form-control" id="registerPaysresidence" placeholder="Nom et prénoms de la mère" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group required">
                                                            <label class="control-label" for="registerPaysresidence">Site/Départ</label>
                                                            <input name="specialite" value="{{ $id->site }}" readonly  type="text" required class="form-control" id="registerPaysresidence" placeholder="Nom et prénoms de la mère" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group required">
                                                            <label class="control-label" for="registerPrenom">Nombre de mois</label >
                                                            <input name="nombre_mois" value="{{ $id->duree }}" readonly  required type="text" class="form-control text-center" id="registerPrenom" placeholder="Entrer les prénoms" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group required">
                                                            <label class="control-label" for="registerPrenom">Date debut stage</label >
                                                            <input name="date_demande" value="{{ $id->date_debut_stage }}" readonly  required type="text" class="form-control text-center" id="registerPrenom" placeholder="Entrer les prénoms" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group required">
                                                            <label class="control-label" for="registerPrenom">Date fin stage</label >
                                                            <input name="date_demande" value="{{ $id->date_fin_stage }}" readonly  required type="text" class="form-control text-center" id="registerPrenom" placeholder="Entrer les prénoms" />
                                                        </div>
                                                    </div>
                                                   
                                                </div>   
                                                <div class="row">
                                                   

                                                    <div class="col-md-4">
                                                        <div class="form-group required  text-center" >
                                                            <label class="control-label" for="registerPaysresidence">Lettre de motivation</label>   
                                                            <p class="text-center">
                                                                <a  name="" href="{{ asset('cv') }}/{{$id->lettre_motiv }}" download="{{$id->lettre_mitiv }} "><i class="fa fa-download" aria-hidden="true"></i></a>
                                                            </p>
                                                        </div>            
                                                    </div>    
                                                    
                                                </div> 
                                        
                                                <div class="row">						 
                                                    <div class="col-md-4 espace-cv">
                                                        <div class="form-group required" >
                                                            <iframe name="cv" src="{{ asset('cv') }}/{{ $id->cv }} " height="900" width="1000" ></iframe>
                                                            <iframe name="cv" src="{{ asset('cv') }}/{{ $id->lettre_motiv }}" height="900" width="1000" ></iframe>          
                                                        </div>            
                                                    </div>
                                                </div> 
                                            </div>     
                                        </div>                  
                                                                        
                                    </div>
                                    <input  name="id" value="{{ $id->id }}" hidden>
                                    <div class="row ">
                                        <div class="col-md-11 espace-dossier">
                                               
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Email</label>
                                                    <input type="email" required name="email" value="{{ $id->email }}" readonly  class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Envoyez un message au stagiaire</label>
                                                    <textarea name="message" required class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-4 "> 
                                                        <input class="btn btn-primary form-control" type="submit" name="" id="" value="ACCEPTER"> 
                                                        
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                    <div class="from-group col-md-4">
                                                        <a class="btn btn-danger form-control" href="{{ route('stagiaire.index') }}">ANNULER</a>
                                                    </div>
                                                
                                                </div>
                                        </div>
                                    </div>
                                </form>
                        </fieldset>
                            
                    </div>   
               
            </div>      
        </div>
    </div>	<!--/.main-->
@endsection