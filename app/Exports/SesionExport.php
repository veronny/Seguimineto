<?php

namespace App\Exports;

use App\Sesion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SesionExport implements FromCollection, WithHeadings
{
    public function __construct($r_anno,$r_mes) {
        
        $this->anno = $r_anno;
        $this->mes = $r_mes;  
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('indicador_sesion')
            ->select([
                'PERIODO',
                'ANNO',
                'MES',
                'DISTRITO',
                DB::raw('COUNT(DNI_cumple_HIS) AS NUM'),
                DB::raw('SUM(DNI_cumple_HIS) AS DEN'),
                DB::raw('ROUND((SUM(DNI_cumple_HIS)*100/COUNT(DNI_cumple_HIS)),2) AS PORCENTAJE'),
                ])
            ->where('ANNO','=', $this->anno)
            ->where('MES','=', $this->mes)
            ->groupBy('PERIODO')
            ->groupBy('ANNO')
            ->groupBy('MES')
            ->groupBy('DISTRITO')
            ->orderBy('PORCENTAJE', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Periodo',
            'Año',
            'Mes',
            'Distrito',
            'Cantidad   Niños',
            'Niños Cumple',
            '% Avance',
        ];
    }
}