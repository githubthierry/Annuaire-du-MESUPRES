<?php

use App\Http\Controllers\DirectionsController;
use Illuminate\Support\Facades\Route;

/*************************************  Directions ************************************/
Route::get('/directions',[DirectionsController::class,'index'])->name('directions.index');
Route::get('/directions/create',[DirectionsController::class,'create'])->name('directions.create');
Route::post('/directions',[DirectionsController::class,'traitement'])->name('directions.traitement');
Route::get('/directions/{direction}/Afficher-Tous-Les-Personnes-Dans-Directions',[DirectionsController::class,'affiches_personnes'])->name('directions.AfficherTousLesPersonnesDansDirections')->whereNumber('direction');
Route::get('/directions/{direction}/modification',[DirectionsController::class,'modification'])->name('directions.modifier')->whereNumber('direction');
Route::get('/directions/recherche',[DirectionsController::class,'recherche'])->name('directions.recherche');
Route::delete('/directions-delete/{direction}',[DirectionsController::class,'delete'])->name('directions.delete')->whereNumber('direction');
Route::delete('/directions/{direction}',[DirectionsController::class,'suppression'])->name('directions.supprimer')->whereNumber('direction');
Route::patch('/directions/{direction}',[DirectionsController::class,'chargement'])->name('directions.chargement')->whereNumber('direction');
Route::get('/directions/export-en-excel', [DirectionsController::class,'exportexcel'])->name('directions.exportexcel');
Route::get('/directions/export-en-pdf', [DirectionsController::class,'exportpdf'])->name('directions.exportpdf');
Route::get('/directions/import', [DirectionsController::class,'import'])->name('directions.import');
