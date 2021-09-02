<?php

namespace App\Http\Controllers;

use App\Models\services;
use App\Models\divisions;
use App\Models\personnels;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Div;
use App\Http\Requests\DivisionsRequest;
use Illuminate\Support\Facades\Redirect;

class DivisionsController extends Controller
{

    public function index(){
        $services = services::all();
        $nombre_totals = divisions::all()->count();
        $divisions = divisions::Paginate(10);
        $nombre = $divisions->count();
        $division = new divisions;
        return view('divisions.index',compact('divisions','services','division','nombre','nombre_totals'));
    }

    public function create(){
        return view('divisions.create',compact('services'));
    }

    public function traitement(DivisionsRequest $request){

        if($request->servicesID == null){
            flash('L\'ajout n\'a pas été efféctuée, sélectionner son service.','warning');
            return back();
        }

        divisions::create([
            'nom_divisions' => $request->nom,
            'services_id' => $request->servicesID
        ]);

        flash('L\'ajout a été bien efféctuée !');
        return Redirect::route('divisions.index');
    }

    public function affiches_personnes($id){
        $personnels = personnels::where('divisions_id','=',$id)->simplePaginate(10);
        $nombre = $personnels->count();
        return view('personnels.index',compact('personnels','nombre'));
    }

    public function recherche(Request $request){

        if($request->recherche == null){
            return redirect(route('divisions.index'));
        }

        $services = services::all();
        $nombre_totals = divisions::all()->count();
        $divisions = divisions::where('nom_divisions','like',"%{$request->recherche}%")
                    ->Paginate(10);

        $nombre = $divisions->count();
        return view('divisions.index',compact('divisions','services','nombre','nombre_totals'));
    }

    public function affichage($id){
        $divisions = divisions::find($id);
        return view('divisions.view',compact('divisions'));
    }

    public function modification(divisions $division){
        $services = services::all();
        return view('divisions.edit',compact('division','services'));
    }

    public function changement(DivisionsRequest $request, divisions $division){

        if($request->servicesID == null){
            flash('L\'ajout n\'a pas été efféctuée, sélectionner son service.','warning');
            return back();
        }

        $division->update([
            'nom_divisions' => $request->nom,
            'services_id' => $request->servicesID
        ]);

        flash('La modififcation a été bien efféctuée !','info');
        return Redirect::route('divisions.index');
    }

    public function suppression(divisions $division){
        $division->delete();
        flash('La suppression a été bien efféctuée !');
        return Redirect::route('divisions.index');
    }
}
