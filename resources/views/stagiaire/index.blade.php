     
@extends('layouts.master')

@section('title')
    <title>Liste des stagiaires</title>
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
                <h1 class="page-header text-success text-center">Liste des stagiaires </h1>
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
                                <th scope="col">Site/Départ</th>
                                <th scope="col">Début</th>
                                <th scope="col">Fin </th>
                                <th scope="col">Nombre de jours restant </th>
                                <th scope="col">Modifier date début </th>
                                <th scope="col">Dossier</th>
                                @php
                                    $dateFin = date('d/m/Y');
                                @endphp
                                @foreach ($stages as $stage )
                                   
                                    @if ($dateFin == $stage->date_debut_stage )
                                        <th scope="col">Archives</th>
                                    @else
                                        
                                    @endif
                                @endforeach
                    
                                <th scope="col">Traiter</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $dateFin = date('d/m/Y');
                                @endphp
                                
                                @foreach ($stages as $stage )
                                    <tr>
                                        <td>{{ $stage->id }}</td>
                                        <td>{{ $stage->nom }}</td>
                                        <td>{{ $stage->prenoms }}</td>
                                        <td>{{ $stage->site }}</td>
                                        <td>{{ \Carbon\Carbon::parse($stage->date_debut_stage)->format('d/m/Y')}}</td>
                                       
                                        @if ($dateFin == $stage->date_debut_stage )
                                            <td  class="p-3 mb-2 bg-danger text-white">{{ \Carbon\Carbon::parse($stage->date_fin_stage )->format('d/m/Y')}}</td>                                    
                                        @else
                                            <td  class="p-3 mb-2 bg-success text-white">{{ \Carbon\Carbon::parse($stage->date_fin_stage )->format('d/m/Y')}}</td>                                
                                        @endif
                                        <td> <div class="wrap-countdown mercado-countdown" data-expire="{{ Carbon\Carbon::parse($stage->date_fin_stage)->format('Y/m/d h:m:s') }}"></div></td>

                                        <td class="text-center"><a href="{{ route('date_debut.nouvelle',$stage->id) }}" class="btn btn-primary" ></a></td>
                                        <td class="text-center"><a href="{{ route('stagiaire.dossier',$stage->id) }}" class="btn bg-warning" ></a></td>
                                        
                                       
                                        <td>{{ $stage->traite }}</td>
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