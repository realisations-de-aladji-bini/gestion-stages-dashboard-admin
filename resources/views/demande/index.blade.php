     
@extends('layouts.master')

@section('title')
    <title>Demande | Stagiaire</title>
@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Nouveau Stagiaire en attente</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-success text-center">Liste des nouveaux postulants</h1>
            </div>
        </div><!--/.row-->
        
        <div class="panel panel-container">
            <div class="container-fluid">
                <div class=row >
                    <div class="col-md-12">
                        <div class="col-md-4 text-center">
                            Consulter le dossier
                            <div class="p-3 mb-2 bg-success text-white">Dossier</div>
                        </div>
                        <section class="col-md-4 text-center"></section>
                        <div class="col-md-4 text-center">
                            Affecter dans un service
                            <div class="p-3 mb-2 bg-warning text-dark">Service</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-11">
                    <table class="table " style="display:inline-block">
                        
                        <thead class="thead-dark" >
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Specialité</th>
                            <th scope="col" class="text-center">Date de demande</th>
                            <th scope="col" class="text-center">Nombre de mois </th>
                            <th scope="col">Dossier</th>
                            <th scope="col">Service</th>
                            <th scope="col" class="text-center">Curriculum vitae</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($stages as $stage )
                                <tr>
                                    <th scope="row">{{ $stage->id }}</th>
                                    <td>{{ $stage->nom }}</td>
                                    <td>{{ $stage->prenoms }}</td>
                                    <td>{{ $stage->telephone }}</td>
                                    <td class="p-3 mb-2 bg-danger text-white text-center">{{ $stage->specialite }}</td>
                                    <td class="text-center">
                                        {{ $stage->created_at }}
                                    </td>
                                    
                                    <td class="text-center">
                                        {{ $stage->duree }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('dossier.edit',$stage->id) }}" class="btn btn-success text-center">
                                        
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('affecter_service.index',$stage->id) }}" class="btn btn-warning">
                                            
                                        </a>
                                    </td>
                                    
                                    <td class="text-center" > 
                                        <a href="{{ asset('cv') }}/{{ $stage->cv }}" download><i class="fa fa-download" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                         
                        </tbody>
                    </table>
                      
                </div>    
            </div>      
        </div>
    </div>	<!--/.main-->
@endsection
