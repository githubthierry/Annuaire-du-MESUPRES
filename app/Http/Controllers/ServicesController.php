<?php

namespace App\Http\Controllers;

use App\Models\services;
use App\Models\directions;
use App\Models\personnels;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Exports\ServicesExport;
use App\Http\Requests\ServicesRequest;
use Illuminate\Support\Facades\Redirect;

class ServicesController extends Controller
{
    private $excel;

    public function __construct(Excel $excel){
        $this->excel = $excel;
    }

    // Exeporter tous les listes du servcie en Excel
    public function exportexcel(){
        return $this->excel->download(new ServicesExport,'services.xlsx');
    }

     // Exeporter tous les listes du servcie en PDF
    public function exportpdf()
    {
        return $this->excel->download(new ServicesExport,'services.pdf',Excel::DOMPDF);
    }

    public function index(){
        $directions = directions::all();
        $nombre_totals = services::all()->count();
        $services = services::Paginate(10);
        $nombre = $services->count();
        $service = new services;
        return view('services.index',compact('directions','services','service','nombre','nombre_totals'));
    }

    public function create(){
        return view('services.create');
    }

    public function traitement(ServicesRequest $request){

        if($request->directionsID == null){
            flash('L\'ajout n\'a pas été effectuée, sélectionner la direction.','warning');
            return back();
        }

        services::create([
            'nom_services' => $request->nom,
            'sigle_services' => $request->sigle,
            'directions_id' => $request->directionsID
        ]);

        flash('L\'ajout a été bien efféctuée !');
        return redirect(route('services.index'));
    }

    public function recherche(Request $request){

        if($request->recherche == null){
            return redirect(route('services.index'));
        }
        $directions = directions::all();
        $nombre_totals = services::all()->count();
        $services = services::where('nom_services','like',"%{$request->recherche}%")
                    ->orWhere('sigle_services','like',"%{$request->recherche}%")
                    ->Paginate(10);
        $nombre = $services->count();
        return view('services.index',compact('directions','services','nombre','nombre_totals'));
    }

    public function affiches_personnes($id){
        $nombre_totals = personnels::all()->count();
        $personnels = personnels::where('services_id','=',$id)->simplePaginate(10);
        $nombre = $personnels->count();
        return view('personnels.index',compact('personnels','nombre','nombre_totals'));
    }

    public function modification(services $service){
        $directions = directions::all();
        return view('services.edit',compact('directions','service'));
    }

    public function chargement(ServicesRequest $request, services $service){

        if( $request->directionsID == null ){
            flash('La modification n\'a pas été effectuée, sélectionner la direction.','warning');
            return back();
        }

        $service->update([
            'nom_services' => $request->nom,
            'sigle_services' => $request->sigle,
            'directions_id' => $request->directionsID
        ]);

        flash('notification.message','La modification a été bien efféctuée !','info');
        return redirect(route('services.index'));
    }

    public function suppression(services $service){
        $service->delete();
        flash('La suppresion a été bien efféctuée !');
        return Redirect::route('services.index');
    }
}
