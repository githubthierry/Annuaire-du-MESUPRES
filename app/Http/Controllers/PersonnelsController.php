<?php

namespace App\Http\Controllers;

use App\Models\postes;
use App\Models\services;
use App\Models\divisions;
use App\Models\directions;
use App\Models\personnels;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Exports\PersonnelsExport;
use App\Http\Requests\PersonnelsRequest;
use Illuminate\Support\Facades\Redirect;

class PersonnelsController extends Controller
{
    private $excel;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    public function export()
    {
        return $this->excel->download(new PersonnelsExport,'personnels.xlsx');
    }

    public function index(){
        $nombre_totals = personnels::all()->count();
        $personnels = personnels::Paginate(10);
        $nombre = $personnels->count();
        return view('personnels.index', compact('personnels','nombre','nombre_totals'));
    }

    public function create(){
        $postes = postes::all();
        $directions = directions::all();
        $service = null;
        $services = services::all();
        $divisions = divisions::all();
        $division = null;
        $direction = null;
        $personnel = new personnels;
        return view('personnels.create',compact('personnel','postes','directions','direction','services','divisions','service','division'));
    }

    public function traitement(PersonnelsRequest $request){

        if($request->photo == null){
            flash('notification.message','La photo doit-être remplier !','warning');
            return back();
        }

        if($request->directions == null){
            flash('Séléctionner son direction !','warning');
            return back();
        }

        if($request->divisions == null){
            if($request->services != null){
                $request->directions = null;
            }
        }else{
            $request->directions = $request->services = null;
        }

        personnels::create([
            'photo_personnels' => $request->file('photo')->store('public'),
            'nom_personnels' => $request->nom,
            'prenom_personnels' => $request->prenom,
            'ddn_personnels' => $request->ne,
            'sexe_personnels' => $request->sexe,
            'email_personnels' => $request->email,
            'adresse_personnels' => $request->adresse,
            'contact_personnels' => $request->contact,
            'im_personnels' => $request->im,
            'diplome_personnels' => $request->diplome,
            'postes_id' => $request->postesID,
            'specialite_personnels' => $request->specialite,
            'grade_personnels' => $request->grade,
            'profile_poste_personnels' => $request->profiles_postes,
            'date_entre_admin_personnels' => $request->date_debut_admin,
            'directions_id' => $request->directions,
            'services_id' => $request->services,
            'divisions_id' => $request->divisions
        ]);

        flash('L\'ajout a été bien efféctuée !');
        return Redirect::route('personnels.index');
    }

    public function TrouvezNomServices(Request $request){
        $data = services::select('nom_services','id')->where('directions_id',$request->id)->take(100)->get();
        return response()->json($data);
    }

    public function TrouvezNomDivisions(Request $request){
        $data = divisions::select('nom_divisions','id')->where('services_id',$request->id)->take(100)->get();
        return response()->json($data);
    }

    public function affichage(personnels $personnel){
        if($personnel->divisions_id != null){
            $divisions = divisions::find($personnel->divisions_id);
            $services = services::find($divisions->services_id);
            $directions = directions::find($services->directions_id);
        }elseif($personnel->services_id != null){
            $divisions = $personnel->divisions_id;
            $services = services::find($personnel->services_id);
            $directions = directions::find($services->directions_id);
        }else{
            $divisions = $personnel->divisions_id;
            $services = $personnel->services_id;
            $directions = directions::find($personnel->directions_id);
        }
        return view('personnels.view',compact('personnel','directions','services','divisions'));
    }

    public function modification(personnels $personnel){

        if($personnel->divisions_id != null){
            $division = divisions::find($personnel->divisions_id);
            $service= services::find($division->services_id);
            $direction = directions::find($service->directions_id);

            /****************************************************/

            $directions = directions::all();
            $services = services::all()->where('directions_id',$direction->id);
            $divisions = divisions::all()->where('services_id',$service->id);
        }elseif($personnel->services_id != null){
            $division = $personnel->divisions_id;
            $service = services::find($personnel->services_id);
            $direction = directions::find($service->directions_id);

            /****************************************************/

            $directions = directions::all();
            $services = services::all()->where('directions_id',$direction->id);
            $divisions = [];
        }else{
            $division = $personnel->divisions_id;
            $service = $personnel->services_id;
            $direction = directions::find($personnel->directions_id);

            /****************************************************/

            $directions = directions::all();
            $services = services::all()->where('directions_id',$personnel->directions_id);
            $divisions = [];
        }

        $postes = postes::all();

        return view('personnels.edit', compact('personnel','postes','divisions','directions','services','division','service','direction'));
    }

    public function chargement(Request $request, personnels $personnel){

        if($request->photo == null){
            flash('La photo doit-être remplier !','warning');
            return back();
        }

        if($request->directions == null){
            flash('sélectionner la direction !','warning');
            return back();
        }

        if($request->divisions == null){
            if($request->services != null){
                $request->directions = null;
            }
        }else{
            $request->directions = $request->services = null;
        }

        $personnel->update([
            'photo_personnels' => $request->file('photo')->store('public'),
            'nom_personnels' => $request->nom,
            'prenom_personnels' => $request->prenom,
            'ddn_personnels' => $request->ne,
            'sexe_personnels' => $request->sexe,
            'email_personnels' => $request->email,
            'contact_personnels' => $request->contact,
            'adresse_personnels' => $request->adresse,
            'im_personnels' => $request->im,
            'postes_id' => $request->postesID,
            'diplome_personnels' => $request->diplome,
            'specialite_personnels' => $request->specialite,
            'grade_personnels' => $request->grade,
            'directions_id' => $request->directions,
            'servcies_id' => $request->services,
            'divisions_id' => $request->divisions,
            'date_entre_admin_personnels' => $request->date_debut_admin,
            'profile_poste_personnels' => $request->profile_postes,
        ]);

        flash('La modification a été bien efféctuée !','info');
        return Redirect::route('personnels.index');
    }

    public function recherche(Request $request){

        if($request->recherche == null){
            return redirect(route('personnels.index'));
        }
        $nombre_totals = personnels::all()->count();
        $personnels = personnels::where('nom_personnels','like',"%{$request->recherche}%")
                    ->orWhere('prenom_personnels','like',"%{$request->recherche}%")
                    ->orWhere('email_personnels','like',"%{$request->recherche}%")
                    ->Paginate(10);
        $nombre = $personnels->count();
        return view('personnels.index',compact('personnels','nombre','nombre_totals'));
    }

    public function supression(personnels $personnel){
        $personnel->delete();
        flash('La suppression a été bien efféctuée !');
        return Redirect::route('personnels.index');
    }
}

