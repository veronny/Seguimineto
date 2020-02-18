<?php

namespace App\Exports;

use App\VisitaTratamiento;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VisitaTratamientoExportEstablecimiento implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('indicador_visita_tratamiento')
                    ->select([
                            'PERIODO',
                            'ANNO',
                            'MES',
                            'Nombre_EESS_atencion',
                            DB::raw('COUNT(DNI_cumple_HIS) AS NUM'),
                            DB::raw('SUM(DNI_cumple_HIS) AS DEN'),
                            DB::raw('ROUND((SUM(DNI_cumple_HIS)*100/COUNT(DNI_cumple_HIS)),2) AS PORCENTAJE'),
                            ])
                    ->where('ANNO','=', $this->anno)
                    ->where('MES','=', $this->mes)
                    ->groupBy('PERIODO')
                    ->groupBy('ANNO')
                    ->groupBy('MES')
                    ->groupBy('Nombre_EESS_atencion')
                    ->orderBy('PORCENTAJE', 'desc')
                    ->get();
    }

    public function headings(): array
    {
        return [
            'Periodo',
            'Año',
            'Mes',
            'Establecimiento',
            'Cantidad Niños',
            'Niños Cumple',
            '% Avance'
        ];
    }
}
