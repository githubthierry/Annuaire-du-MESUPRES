<?php

namespace App\Exports;

use App\Models\services;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class ServicesExport implements FromCollection, ShouldAutoSize, WithEvents, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return services::all();
    }

    public function map($services): array
    {
        return [
            $services->id,
            $services->nom_services,
            $services->sigle_services
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
