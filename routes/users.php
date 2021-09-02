<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*************************************  Utilisateurs ************************************/

Route::get('/utilisateurs',[UsersController::class,'index'])->name('utilisateurs.index');
Route::get('/utilisateurs/{user}/modification',[UsersController::class,'modification'])->name('utilisateurs.modifier')->whereNumber('user');
Route::get('/utilisateurs/recherche',[UsersController::class,'recherche'])->name('utilisateurs.recherche');
Route::get('/utilisateurs/affichage/{user}',[UsersController::class,'affichage'])->name('utilisateurs.afficher');
Route::get('/mon-profile/{user}',[UsersController::class,'affichage'])->name('profiles');
Route::delete('/utilisateurs/{user}',[UsersController::class,'suppression'])->name('utilisateurs.supprimer')->whereNumber('user');
Route::patch('/utilisateurs/{user}',[UsersController::class,'chargement'])->name('utilisateurs.chargement')->whereNumber('user');
Route::get('/utilisateurs/export-en-excel', [UsersController::class,'exportexcel'])->name('utilisateurs.exportexcel');
Route::get('/utilisateurs/export-en-pdf', [UsersController::class,'exportpdf'])->name('utilisateurs.exportpdf');
Route::get('/utilisaturs/import', [UsersController::class,'import'])->name('utilisateurs.import');
