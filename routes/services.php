<?php

use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

/*************************************  Services ************************************/

Route::get('/services',[ServicesController::class,'index'])->name('services.index');
Route::get('/services/create',[ServicesController::class,'create'])->name('services.create');
Route::post('/services',[ServicesController::class,'traitement'])->name('services.traitement');
Route::get('/services/{service}/Afficher-Tous-Les-Personnes-Dans-Services',[ServicesController::class,'affiches_personnes'])->name('services.AfficherTousLesPersonnesDansServices')->whereNumber('service');
Route::get('/services/{service}/modification',[ServicesController::class,'modification'])->name('services.modifier')->whereNumber('service');
Route::get('/services/recherche',[ServicesController::class,'recherche'])->name('services.recherche');
Route::patch('/services/{service}',[ServicesController::class,'chargement'])->name('services.chargement')->whereNumber('service');
Route::delete('/services/{service}',[ServicesController::class,'suppression'])->name('services.supprimer')->whereNumber('service');
Route::get('/services/export-en-excel', [ServicesController::class,'exportexcel'])->name('services.exportexcel');
Route::get('/services/expor-en-tpdf', [ServicesController::class,'exportpdf'])->name('services.exportpdf');
Route::get('/services/import', [ServicesController::class,'import'])->name('services.import');
