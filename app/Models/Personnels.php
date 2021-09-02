<?php

namespace App\Models;

use App\Models\Directions;
use App\Models\Services;
use App\Models\Divisions;
use App\Models\Postes;
use App\Models\Activites;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnels extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'nom_personnels',
        'prenom_personnels',
        'sexe_personnels',
        'ddn_personnels',
        'adresse_personnels',
        'contact_personnels',
        'email_personnels',
        'im_personnels',
        'specialite_personnels',
        'diplome_personnels',
        'grade_personnels',
        'date_entre_admin_personnels',
        'photo_personnels',
        'profile_poste_personnels',
        'postes_id',
        'users_id',
        'directions_id',
        'services_id',
        'divisions_id',
    ];

    public $timestamps = false;

    public function directions(){
        return $this->belongsTo(Directions::class);
    }

    public function services(){
        return $this->belongsTo(Services::class);
    }

    public function divisions(){
        return $this->belongsTo(Divisions::class);
    }

    public function postes(){
        return $this->belongsTo(Postes::class);
    }

    public function activites(){
        return $this->hasMany(Activites::class);
    }

}
