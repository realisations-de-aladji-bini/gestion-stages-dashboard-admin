     
@extends('layouts.master')

@section('title')
    <title>Liste de stagiaires réfuses</title>
@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Archives</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-success text-center">Liste de stagiaires réfuses</h1>
            </div>
        </div><!--/.row-->
        
        <div class="panel panel-container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ">
                        <table class="table" style="display:inline-block">
                                                    
                            @if(session('success'))
                                <div class="alert alert-danger text-center">
                                    <a href="#" class="close" data-dismiss="alert">×</a>
                                    <strong><span class="glyphicon glyphicon-ok">
                                            </span> 
                                            {{session('success')}}
                                </strong>
                                </div>
                            @endif
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Tel</th>
                                <th scope="col">Site/Départ</th>
                                <th scope="col">Specailité</th>
                                <th scope="col">Début</th>
                                <th scope="col">Nombre de mois</th>
                                <th scope="col">Accepter</th>
                                <th scope="col">Dossier</th>
                                <th scope="col">Traiter</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                                @foreach ($stages as $stage )
                                    <tr>
                                        <td>{{ $stage->id }}</td>
                                        <td>{{ $stage->nom }}</td>
                                        <td>{{ $stage->prenoms }}</td>
                                        <td>{{ $stage->telephone }}</td>
                                        <td>{{ $stage->site }}</td>
                                        <td>{{ $stage->specialite }}</td>
                                        <td>{{ $stage->date_debut_stage }}</td>
                                        <td class="text-center">{{ $stage->duree }}</td>
                                       
                                        <td class="text-center">
                                            <a href="{{ route('stagiaire.stagiaireRefuserAccepter',$stage->id) }}" class="btn btn-success">
                                                
                                            </a>
                                        </td>
                                        <td class="text-center"><a href="{{ route('stagiaire.dossierArchives',$stage->id) }}" class="btn bg-warning" ></a></td>
                                        
                                        
                                        <td class="text-center">{{ $stage->traite }}</td>
                                    </tr> 
                                @endforeach
                            
                            </tbody>
                        </table>
                    
                        
                    </div> 
                </div>
                      
            </div>      
        </div>
    </div>	<!--/.main-->
@endsection