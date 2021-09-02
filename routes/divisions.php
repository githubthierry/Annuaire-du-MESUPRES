<?php

use App\Http\Controllers\DivisionsController;
use Illuminate\Support\Facades\Route;

/*************************************  divisions ************************************/

Route::get('/divisions',[DivisionsController::class,'index'])->name('divisions.index');
Route::get('/divisions/create',[DivisionsController::class,'create'])->name('divisions.create');
Route::post('/divisions',[DivisionsController::class,'traitement'])->name('divisions.traitement');
Route::get('/divisions/{division}/Afficher-Tous-Les-Personnes-Dans-Directions',[DivisionsController::class,'affiches_personnes'])->name('divisions.AfficherTousLesPersonnesDansDirections')->whereNumber('division');
Route::get('/divisions/{division}/modification',[DivisionsController::class,'modification'])->name('divisions.modifier')->whereNumber('division');
Route::patch('/divisions/{division}',[DivisionsController::class,'changement'])->name('divisions.changement')->whereNumber('division');
Route::get('/divisions/recherche',[DivisionsController::class,'recherche'])->name('divisions.recherche');
Route::delete('/divisions/{division}',[DivisionsController::class,'suppression'])->name('divisions.supprimer')->whereNumber('division');
Route::get('/divisions/export-en-excel', [DivisionsController::class,'exportexcel'])->name('divisions.exportexcel');
Route::get('/divisions/expor-en-tpdf', [DivisionsController::class,'exportpdf'])->name('divisions.exportpdf');
Route::get('/divisions/import', [DivisionsController::class,'import'])->name('divisions.import');
