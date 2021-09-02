<?php

namespace App\Models;

use App\Models\Services;
use App\Models\personnels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directions extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'nom_directions',
        'sigle_directions',
        'directions_id'
    ];

    public $timestamps = false;

    public function services(){
        return $this->hasMany(Services::class);
    }

    public function personnels(){
        return $this->hasMany(Personnels::class);
    }
}

