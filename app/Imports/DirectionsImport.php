<?php

namespace App\Imports;

use App\Models\Directions;
// use Illuminate\Support\Facades\Hash; Quand on veut hash le mot de passe
use Maatwebsite\Excel\Concerns\ToModel;

class DirectionsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Directions([
            'id' => $row[0],
            'nom_directions' => $row[1],
            'sigle_directions' => $row[2],
            'directions_id' => $row[3]
        ]);
    }
}
