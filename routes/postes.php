<?php

use App\Http\Controllers\PostesController;
use Illuminate\Support\Facades\Route;

/*************************************  Postes ************************************/

Route::get('/postes',[PostesController::class,'index'])->name('postes.index');
Route::get('/postes/create',[PostesController::class,'create'])->name('postes.create');
Route::post('/postes',[PostesController::class,'traitement'])->name('postes.traitement');
Route::get('/postes/{poste}/modification',[PostesController::class,'modification'])->name('postes.modifier')->whereNumber('poste');
Route::patch('/postes/{poste}',[PostesController::class,'changement'])->name('postes.changement')->whereNumber('poste');
Route::get('/postes/recherche',[PostesController::class,'recherche'])->name('postes.recherche');
Route::delete('/postes/{poste}',[PostesController::class,'suppression'])->name('postes.supprimer')->whereNumber('poste');
Route::get('/postes/export-en-excel', [PostesController::class,'exportexcel'])->name('postes.exportexcel');
Route::get('/postes/expor-en-tpdf', [PostesController::class,'exportpdf'])->name('postes.exportpdf');
Route::get('/postes/import', [PostesController::class,'import'])->name('postes.import');
