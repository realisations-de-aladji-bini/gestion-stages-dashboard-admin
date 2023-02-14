<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AffecterServiceController;
use App\Http\Controllers\DrhController; 
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/


    Route::get('/',[DemandeController::class,'index'])->name('demande.index');
        
    Route::get('/dossier/demandeur',[DossierController::class,'index'])->name('dossier.index');
    
    Route::get('/dossier/demandeur/{id}',[DossierController::class,'edit'])->name('dossier.edit');
    
    Route::get('/stagiaire/dossier/{id}', [DrhController::class,'dossierStagiaire'] )->name('stagiaire.dossier'); 
    
    Route::get('/liste/stagiaire-accepter', [DrhController::class,'index'] )->name('stagiaire.index');
   
    Route::get('/stagiaire/dossier/{id}', [DrhController::class,'dossierStagiaire'] )->name('stagiaire.dossier'); 

    //Archives
    Route::get('/archive-liste',[ArchiveController::class,'liste'])->name('archive.liste');

    
    Route::get('/stagiaire-refuser-accepter/{id}',[AffecterServiceController::class,'indexStagiaireRefuserAccpter'])->name('stagiaire.stagiaireRefuserAccepter');

    Route::get('/service',[ServiceController::class,'index'])->name('service.index');
   
    
    Route::get('/archive-liste-refuser',[ArchiveController::class,'listeStagiaireRefuser'])->name('archive.liste-refuser');

    
    Route::get('/archive/{id}',[ArchiveController::class,'index'])->name('archive.index'); 
    Route::get('/archive/dossier/{id}', [ArchiveController::class,'dossierStagiaire'] )->name('stagiaire.dossierArchives'); 

    Route::get('/affecter/{id}',[AffecterServiceController::class,'index'])->name('affecter_service.index');
   
    Route::get('/stagiaire/date/{id}', [DrhController::class,'dateNouvelle'] )->name('date_debut.nouvelle'); 
    
    Route::get('/service/nouveau/{id}',[ServiceController::class,'serviceNouveau'])->name('service.nouveau');
    
    
// Route::middleware(['auth:sanctum', 'verified'])->group(function (){

    
    
//     //Route::get('/message', [MailController::class,'envoieMail']);
   
   
// });


Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function () {


    //Acceper | Refuser un(e) Demandeur 
    Route::post('/stagiaire/accepter',[DrhController::class,'store'])->name('stagiaire.accepter');
    
   
    // Ajouter | Service 
    Route::post('/service/ajoute',[ServiceController::class,'store'])->name('service.store');

    Route::post('/stagiaire/refuser-accepter',[DrhController::class,'refuserAccepter'])->name('stagiaire.refuseAccepter');
    
    Route::post('/modifier-date', [DrhController::class,'update'] )->name('date.modifier');

    Route::post('/message', [DrhController::class,'envoieMail'])->name('envoieMail');

    
    // Affecter service et archive 
    
    Route::post('/service/modifier-nouveau',[ServiceController::class,'update'])->name('service.update');


    Route::get('/destroy/{id}',[DrhController::class,'destroy'])->name('demande.destroy');
});