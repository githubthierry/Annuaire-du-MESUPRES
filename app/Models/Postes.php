<?php

namespace App\Models;

use App\Models\Personnels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postes extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'nom_postes',
        'description'
    ];

    public $timestamps = false;

    public function personnels(){
        return $this->hasMany(Personnels::class);
    }
}
