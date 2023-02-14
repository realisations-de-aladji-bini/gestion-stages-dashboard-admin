     
@extends('layouts.master')

@section('title')
    <title>Ajouter | Service</title>
@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Service</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-success text-center">Enregistrement d'un service</h1>
            </div>
        </div><!--/.row-->
        
        <div class="panel panel-container">
            <div class="container">
                
                <div class="col-md-11">
                    @if(session('success'))
                        <div class="alert alert-danger text-center">
                            <a href="#" class="close" data-dismiss="alert">×</a>
                            <strong><span class="glyphicon glyphicon-ok">
                                    </span> 
                                    {{session('success')}}
                        </strong>
                        </div>
                    @endif
                    <div class="row">
                        
                        <form method="POST" action="{{ route('service.store') }}">
                            @csrf
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Service</label>
                                <input type="text" placeholder="Site/Departement" value="" name="libelle_serv" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez le nom">
                            
                            </div>
                            <div class="from-group col-md-4">
                                <input class="btn btn-success form-control" type="submit" name="" id="" value="Enregistrer">
                            </div>
                            <div class="from-group col-md-4">
                            </div>
                            <div class="from-group col-md-4">
                                <a href="{{ route('demande.index') }}"  class="btn btn-danger form-control" >Annuler</a>
                            </div>
                          
                        </form>
                    </div>

                    <table class="table">
                        
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Modifier</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($services as $service )
                                <tr>
                                    <th scope="row">{{ $service->id }}</th>
                                    <td>{{ $service->libelle_serv }}</td>
                                    <td><a href="{{route('service.nouveau',$service->id) }}" class="btn btn-primary">Modifier</a></td>
                                </tr>
                            @endforeach 
                          
                        </tbody>
                    </table> 
                </div> 
            </div>      
        </div>
    </div>	<!--/.main-->
@endsection