<?php

use App\Http\Controllers\PersonnelsController;
use Illuminate\Support\Facades\Route;

/*************************************  Services ************************************/

Route::get('/personnels',[PersonnelsController::class,'index'])->name('personnels.index');
Route::get('/personnels/create',[PersonnelsController::class,'create'])->name('personnels.create');
Route::post('/personnels',[PersonnelsController::class,'traitement'])->name('personnels.traitement');
Route::get('/personnels/{personnel}/Afficher-Tous-Les-Personnes-Dans-Directions',[PersonnelsController::class,'affiches_personnes'])->name('personnels.AfficherTousLesPersonnesDansDirections')->whereNumber('personnel');
Route::get('/personnels/{personnel}/modification',[PersonnelsController::class,'modification'])->name('personnels.modifier')->whereNumber('personnel');
Route::get('/personnels/{personnel}/affiche_personnels',[PersonnelsController::class,'affichage'])->name('personnels.afficher')->whereNumber('personnel');
Route::patch('/personnels/{personnel}',[PersonnelsController::class,'chargement'])->name('personnels.chargement')->whereNumber('personnel');
Route::delete('/personnels/{personnel}',[PersonnelsController::class,'suppression'])->name('personnels.supprimer')->whereNumber('personnel');
Route::get('/TrouvezNomServices',[PersonnelsController::class,'TrouvezNomServices']);
Route::get('/personnels/recherche',[PersonnelsController::class,'recherche'])->name('personnels.recherche');
Route::get('/TrouvezNomDivisions',[PersonnelsController::class,'TrouvezNomDivisions']);
Route::get('/personnels/export-en-excel', [PersonnelsController::class,'exportexcel'])->name('personnels.exportexcel');
Route::get('/personnels/expor-en-tpdf', [PersonnelsController::class,'exportpdf'])->name('personnels.exportpdf');
Route::get('/personnels/import', [PersonnelsController::class,'import'])->name('personnels.import');
