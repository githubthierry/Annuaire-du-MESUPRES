<?php

use Illuminate\Support\Facades\Route;


if(!function_exists('flash')){
    function flash($message, $type = 'success'){
        session()->flash('notification.message', $message);
        session()->flash('notification.type',$type);
    }
}

if(! function_exists('set_active_menu')){
    function set_active_menu($route){
        return Route::is($route) ? 'active':'';
    }
}
