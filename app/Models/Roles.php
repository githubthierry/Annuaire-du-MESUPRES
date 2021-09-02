<?php

namespace App\Models;

use App\Models\Permissions;
use App\Models\Permissions_Roles;
use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $fillable = [
        'adminRoles'
    ];

    public $timestamps = false;

    public function Permissions(){
        return $this->belongsToMany(Permissions::class,'Permissions_Roles','roles_id','permissions_id');
    }

    public function Permissions_Roles(){
        return $this->hasMany(Permissions_Roles::class);
    }

    public function users(){
        return $this->hasMany(Users::class);
    }
}
