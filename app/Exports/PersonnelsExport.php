<?php

namespace App\Exports;

use App\Models\personnels;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class PersonnelsExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return personnels::all();
    }

    public function map($personnels): array
    {
        return [
            $personnels->id,
            $personnels->nom_personnels,
            $personnels->prenom_personnels,
            $personnels->email_personnels
        ];
    }

    public function headings(): array
    {
        return [
            'Identifiant(s)',
            'Nom(s)',
            'Prénom(s)',
            'Email'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event){
                $event->sheet->getStyle('A1:D1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }
}
