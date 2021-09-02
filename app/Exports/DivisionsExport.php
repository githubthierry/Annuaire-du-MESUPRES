<?php

namespace App\Exports;

use App\Models\divisions;
use Maatwebsite\Excel\Concerns\FromCollection;

class DivisionsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return divisions::all();
    }
}
