<?php

namespace App\Models;

use App\Models\Roles;
use App\Models\Permissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions_Roles extends Model
{
    use HasFactory;

    public function Roles(){
        return $this->hasMany(Roles::class);
    }

    public function Permissions(){
        return $this->belongsTo(Permissions::class);
    }
}
