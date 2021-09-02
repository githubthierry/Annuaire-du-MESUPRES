<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activites extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'objet',
        'date_debut',
        'date_fin'
    ];

    public $timestamps = false;

    public function services(){
        return $this->hasMany(Services::class);
    }

    public function personnels(){
        return $this->hasMany(Personnels::class);
    }
}
