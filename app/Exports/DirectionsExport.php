<?php

namespace App\Exports;

use App\Models\directions;
// use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class DirectionsExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function view(): view
    // {
    //     return view('exports.directions',[
    //         'directions' => directions::all()
    //     ]);
    // }

    public function collection()
    {
        return directions::all();
    }

    public function map($directions): array
    {
        return [
            $directions->id,
            $directions->nom_directions,
            $directions->sigle_directions
        ];
    }

    public function headings(): array
    {
        return [
            'Identifiant(s)',
            'Nom(s)',
            'Sigle(s)'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event){
                $event->sheet->getStyle('A1:C1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }
}
