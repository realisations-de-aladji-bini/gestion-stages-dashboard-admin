     
@extends('layouts.master')

@section('title')
    <title>Stagiaire | date</title>
    
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
            <li class="active">Stagiaire</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-success text-center">Modifier la date du début de stage</h1>
        </div>
    </div><!--/.row-->
    
        <div class="panel panel-container">
            <div class="container-fluid">
                    <div class="col-md-12">
                        <fieldset class="col-md-12">
                                <form  method="POST" action="{{ route('date.modifier') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-11 ">
                                            <div class="well-block">
                                                <div class="row">
                                                    <input name="id" value="{{$id}}" type="text" hidden/>
                                                    <div class="col-md-4">
                                                        <div class="form-group required">
                                                            <label class="control-label" for="registerPaysresidence">Nom & Prenom </label>
                                                            <input name="nom" value="{{'N° '.$id.' : '.$nom }}" readonly  type="text" required class="form-control" id="registerPaysresidence" placeholder="Nom et prénoms de la mère" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group required">
                                                            <label class="control-label" for="registerPaysresidence">Ancienne date </label>
                                                            <input name="date_ancien" value="{{ $date }}" readonly  type="text" required class="form-control" id="registerPaysresidence" placeholder="Nom et prénoms de la mère" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group required">
                                                            <label class="control-label" for="registerPrenom">nouvelle date debut</label >
                                                            <input name="date_nouvelle"  type="date"  required type="text" class="form-control text-center" id="registerPrenom" placeholder="Entrer les prénoms" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 "> 
                                                        <input class="btn btn-primary form-control" type="submit" name="" id="" value="MODIFIER"> 
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                    <div class="from-group col-md-4">
                                                        <a class="btn btn-danger form-control" href="{{ route('stagiaire.index') }}">ANNULER</a>
                                                    </div>
                                                </div>  
                                            </div> 
                                        </div> 
                                    </div> 
                                </div> 
                            </div> 
                        </fieldset>
                    </div> 
                </div> 
            </div> 
        </div>  
</div>
@endsection