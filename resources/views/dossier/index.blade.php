     
@extends('layouts.master')

@section('title')
    <title>Dossier | Stagiaire</title>
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
                <h1 class="page-header text-success text-center">Informations relatives au demandeur</h1>
            </div>
        </div><!--/.row-->
        
        <div class="panel panel-container">
            <div class="container">
               
                <div class="col-md-11">
                    <fieldset class="col-md-12">
                            <form class="form-elements" data-request="onSubmit"  data-request-files data-request-flash  accept-charset="UTF8" enctype="multipart/form-data">
                                <input type="hidden" name="_handler" value="onSave">      
                                <input name="_token" type="hidden" value="d0ypK11g3XXJZPfld7Tpp5smVI9n4Oyxemsds7kW">
                                <input name="_session_key" type="hidden" value="KgVytGbcAXet2tuwyNznYkzi1t0YIr21dLwtxcch">
                                <div class="row">
                                    <div class="col-md-11 ">
                                        <div class="well-block">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group required" data-request-files data-request-flash>
                                                         <div id="imageResult">
                                                             <img src="https://agenceemploijeunes.ci/site/themes/themeforest/assets/images/avatar.jpg" />
                                                          </div>
                                                                <label class="control-label" for="registerPhoto">Photo </label>
                                                                 <input type="file" name="photo" 
                                                             id="registerPhoto"
                                                            accept=".jpg, .jpeg, .png" data-request="onImageUpload" 
                                                            required
                                                            data-request-files data-request-flash />
            
                                                       </div>
                                                </div>
                                                
                                               <div class="col-md-4">
                                                    <div class="form-group required">
                                                        <label class="control-label" for="registerName">Nom</label >
                                                        <input name="nom" type="text" class="form-control" id="name" required placeholder="Entrer le nom">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group required">
                                                        <label class="control-label" for="registerPrenom">Prénom</label >
                                                        <input name="prenom" required type="text" class="form-control" id="registerPrenom" placeholder="Entrer les prénoms" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group required">
                                                        <label class="control-label" for="registerPrenom1">Tel</label >
                                                        <input  name="tel" type="text" required class="form-control" id="registerPrenom1" placeholder="Nom et prénoms du père" />
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group required">
                                                        <label class="control-label" for="registerPrenom2">Adresse</label >
                                                        <input name="adresse" type="text" required class="form-control" id="registerPrenom2" placeholder="Nom et prénoms de la mère" />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group required">
                                                        <label class="control-label" for="registerPaysresidence">Specialité</label>
                                                        <input name="specialite" type="text" required class="form-control" id="registerPaysresidence" placeholder="Nom et prénoms de la mère" />
                                                    </div>
                                                </div>
                                                
                                            </div> 
                                    
                                            <div class="row">						 
                                                <div class="col-md-4">
                                                    <div class="form-group required" >
                                                        <label class="control-label" for="registerPaysresidence">Curriculum (CV)</label>
                                                        <input name="curriculum" type="file"  class="form-control" id="registerCurriculum"  />      
                                                    </div>            
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group required" >
                                                        <label class="control-label" for="registerPaysresidence">Lettre de motivation</label>
                                                        <input name="curriculum" type="file"  class="form-control" id="registerCurriculum"  />      
                                                    </div>            
                                                </div>    
                                            </div>
                                        </div>      
                                    </div>                                                
                                </div>
                
                            </form>

                            <div class="row mt-4">
                                <div class="col-md-11 mt-4">
                                    <form>
                                        <div class="form-group">
                                          <label for="exampleFormControlInput1">Email</label>
                                          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleFormControlTextarea1">Envoyez un message au stagiaire</label>
                                          <textarea name="message"  class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <div class="form-group"> 
                                            <input class="btn btn-primary form-control" type="submit" name="" id="" value="Accepter">
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </fieldset>
                          
                </div>   
            </div>      
        </div>
    </div>	<!--/.main-->
@endsection