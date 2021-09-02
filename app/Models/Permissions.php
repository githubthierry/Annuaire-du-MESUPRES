<?php

namespace App\Models;

use App\Models\Roles;
use App\Models\Permissions_Roles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_permissions'
    ];

    public $timestamps = false;

    public function Roles(){
        return $this->belongsToMany(Roles::class,'Permissions_Roles','roles_id','permissions_id');
    }

    public function Permissions_Roles(){
        return $this->hasMany(Permissions_Roles::class);
    }

}
