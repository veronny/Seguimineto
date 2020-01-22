<?php

namespace App\Exports;

use App\Materno;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MaternoExport implements FromCollection, WithHeadings
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
        return  DB::table('indicador_gestante')
                ->select([
                        'PERIODO',
                        'ANNO',
                        'MES',
                        'DISTRITO',
                        DB::raw('COUNT(DNI_cumple_gestante) AS NUM'),
                        DB::raw('SUM(DNI_cumple_gestante) AS DEN'),
                        DB::raw('ROUND((SUM(DNI_cumple_gestante)*100/COUNT(DNI_cumple_gestante)),2) AS PORCENTAJE'),
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
            'Cantidad Gestantes',
            'Gestantes Cumple',
            '% Avance'
        ];
    }
}
