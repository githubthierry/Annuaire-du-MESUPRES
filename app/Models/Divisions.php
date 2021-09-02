<?php

namespace App\Models;

use App\Models\Services;
use App\Models\Personnels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisions extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'nom_divisions',
        'services_id'
    ];

    public $timestamps = false;

    public function services(){
        return $this->belongsTo(Services::class);
    }

    public function personnels(){
        return $this->hasMany(Personnels::class);
    }
}

