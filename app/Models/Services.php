<?php

namespace App\Models;

use App\Models\Directions;
use App\Models\Divisions;
use App\Models\Personnels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'nom_services',
        'sigle_services',
        'directions_id'
    ];

    public $timestamps = false;

    public function directions(){
        return $this->belongsTo(Directions::class);
    }

    public function divisions(){
        return $this->hasMany(Divisions::class);
    }

    public function personnels(){
        return $this->hasMany(Personnels::class);
    }
}
