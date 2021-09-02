<?php

use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/activites',function(){
    return view('main');
});

require __DIR__.'/auth.php';
require __DIR__.'/directions.php';
require __DIR__.'/services.php';
require __DIR__.'/divisions.php';
require __DIR__.'/postes.php';
require __DIR__.'/personnels.php';
require __DIR__.'/users.php';
