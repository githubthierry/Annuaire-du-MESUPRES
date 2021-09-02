<?php

namespace App\Http\Controllers;

use App\Models\directions;
use App\Models\personnels;
use App\Models\User;
use App\Http\Requests\DirectionsRequest;
use Illuminate\Http\Request;
use App\Exports\DirectionsExport;
use Illuminate\Support\Facades\Redirect;
// use App\Imports\DirectionsImport as ImportsDirectionsImport;
use Maatwebsite\Excel\Excel;

class DirectionsController extends Controller
{
    private $excel;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    public function index(){
        $users = User::find(3);
        $nombre_totals = directions::all()->count();
        $directions = directions::Paginate(10);
        $nombre = $directions->count();
        $direction = new directions;
        return view('directions.index',compact('direction','directions','nombre','nombre_totals','users'));
    }

    public function create(){
        return view('directions.create',compact('directions','direction'));
    }

    public function traitement(DirectionsRequest $request){

        Directions::create([
            'nom_directions' => $request->nom,
            'sigle_directions' => $request->sigle,
            'directions_id' => $request->directionsID
        ]);

        flash('L\'ajout a été bien efféctuée !');
        return Redirect::route('directions.index');
    }

    public function affiches_personnes($id){
        $nombre_totals = personnels::all()->count();
        $personnels = personnels::where('directions_id','=',$id)->simplePaginate(10);
        $nombre = $personnels->count();
        return view('personnels.index',compact('personnels','nombre','nombre_totals'));
    }

    public function exportexcel()
    {
        return $this->excel->download(new DirectionsExport,'directions.xlsx');
    }

    public function exportpdf()
    {
        return $this->excel->download(new DirectionsExport,'directions.pdf',Excel::DOMPDF);
    }

    public function recherche(Request $request){

        if($request->recherche == null){
            return redirect(route('directions.index'));
        }
        $nombre_totals = directions::all()->count();
        $directions = directions::where('nom_directions','like',"%{$request->recherche}%")
                    ->orWhere('sigle_directions','like',"%{$request->recherche}%")
                    ->Paginate(10);
        $nombre = $directions->count();
        return view('directions.index',compact('directions','nombre','nombre_totals'));
    }

    public function modification(directions $direction){
        $directions = directions::all();
        return view('directions.edit',compact('directions','direction'));
    }

    public function chargement(DirectionsRequest $request,directions $direction){


        $direction->update([
            'nom_directions' => $request->nom,
            'sigle_directions' => $request->sigle,
            'directions_id' => $request->directionsID
        ]);

        flash('La modification a été bien efféctuée !','info');
        return Redirect::route('directions.index');
    }

    public function suppression(Directions $direction){
        $direction->delete();
        flash('La suppression a été bien efféctuée !','danger');
        return Redirect::route('directions.index');
    }
}
