<?php

namespace App\Http\Controllers;

use App\Models\postes;
use Illuminate\Http\Request;
use App\Http\Requests\PostesRequest;
use Illuminate\Support\Facades\Redirect;

class PostesController extends Controller
{
    public function index(){
        $nombre_totals = postes::all()->count();
        $postes = postes::Paginate(10);
        $nombre = $postes->count();
        $poste = new postes;
        return view('postes.index',compact('postes','poste','nombre','nombre_totals'));
    }

    public function create(){
        return view('postes.create');
    }

    public function traitement(PostesRequest $request){

        postes::create([
            'nom_postes' => $request->nom,
            'description' => $request->description
        ]);

        flash('notification.message','L\'ajout a été bien efféctuée !');
        return Redirect::route('postes.index');
    }

    public function modification(postes $poste){
        return view('postes.edit',compact('poste'));
    }

    public function changement(PostesRequest $request,postes $poste){

        $poste->update([
            'nom_postes' => $request->nom,
            'description' => $request->description
        ]);

        flash('La modification a été bien efféctuée !','info');
        return Redirect::route('postes.index');
    }

    public function suppression(postes $poste){
        $poste->delete();
        flash('La suppression a été bien efféctuée !');
        return back();
    }

    public function recherche(Request $request){

        if($request->recherche == null){
            return redirect(route('postes.index'));
        }

        $nombre_totals = postes::all()->count();

        $postes = postes::where('nom_postes','like',"%{$request->recherche}%")
                    ->orWhere('description','like',"%{$request->recherche}%")
                    ->Paginate(10);
        $nombre = $postes->count();

        return view('postes.index',compact('postes','nombre','nombre_totals'));
    }
}
