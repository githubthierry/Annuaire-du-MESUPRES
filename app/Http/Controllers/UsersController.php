<?php

namespace App\Http\Controllers;


use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        return User::all();
    }

    public function login(){
        return view('authentifications.login');
    }

    public function inscription(){
        $roles = Roles::all();
        return view('authentifications.inscription',compact('roles'));
    }

     public function index(){
        $nombre_totals = User::all()->count();
        $users = User::Paginate(10);
        $nombre = $users->count();
        return view('utilisateurs.index', compact('users','nombre','nombre_totals'));
    }

    public function affichage($id){
        $users = User::find($id);
        return view('utilisateurs.view',compact('users'));
    }

    public function modification($id){
        $roles = Roles::all();
        $users = User::find($id);
        return view('utilisateurs.edit',compact('users','roles'));
    }

    public function changement(Request $request){
    }

    public function supression(){
    }

    public function recherche(Request $request){

        if($request->recherche == null){
            return redirect(route('utilisateurs.index'));
        }
        $nombre_totals = User::all()->count();
        $users = User::where('name','like',"%{$request->recherche}%")
                    ->orWhere('email','like',"%{$request->recherche}%")
                    ->Paginate(10);
        $nombre = $users->count();
        return view('utilisateurs.index',compact('users','nombre','nombre_totals'));
    }
}
