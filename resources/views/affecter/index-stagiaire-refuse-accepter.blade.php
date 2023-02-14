@extends('layouts.master')

@section('title')
    <title>Stagiaire | Affectation </title>
@endsection


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Affectation</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-success text-center">Stagiaire en attente d'affections</h1>
            </div>
        </div><!--/.row-->
        
        <div class="panel panel-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-11">

                        <form method="POST" action="{{ route('stagiaire.refuseAccepter') }}">
                            @csrf
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlSelect1">Selectionner le Service</label>
                            
                                <select name="libelle_serv" class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($services as $service ) 
                                        <option >{{ $service->libelle_serv }}</option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="form-group col-md-4"></div>
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlSelect1">Selectionner la date du début de stage</label>
                                <input type="date" name="date_debut_stage" id="" class="form-control">
                            </div>
                            
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Téléphone</th>
                                    <th scope="col">Specialité</th>
                                    <th scope="col">CV</th>
                                    <th scope="col">Date du demande</th>
                                    <th scope="col">Dossier</th>
                                
                                </tr>
                                </thead>
                                <tbody>
                                    
                                
                                        <tr>
                                            <th scope="row">{{ $stage->id }}</th>
                                            <td>{{ $stage->nom }}</td>
                                            <td>{{ $stage->prenoms }}</td>
                                            <td>{{ $stage->telephone }}</td>
                                            <td class="p-3 mb-2 bg-danger text-white">{{ $stage->specialite }}</td>
                                            <td ><a href="{{ asset('cv') }}/{{ $stage->cv }}" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
                                            <td>{{ $stage->created_at }}</td>
                                            <td> 
                                                
                                                <a class="btn btn-primary" href="{{ route('dossier.edit',$stage->id ) }}">Consultation</a> 
                                            
                                            </td>
                                        </tr>
                                    
                                
                                </tbody>
                            </table>
                            <input  name="id" value="{{ $stage->id }}" hidden>
                            <input  name="nombre_mois" value="{{ $stage->duree }}" hidden>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Envoyez un message au stagiaire</label>
                                <textarea name="message" required class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4 "> 
                                    <input class="btn btn-primary form-control" type="submit" name="" id="" value="ACCEPTER"> 
                                </div>
                                <div class="col-md-4"></div>
                                
                            </div>
                        </form>
                    </div>
                </div>   
            </div>      
        </div>
    </div>	<!--/.main-->

    
@endsection


@section('extraJs')
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
@endsection
