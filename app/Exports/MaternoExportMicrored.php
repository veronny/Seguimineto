<?php

namespace App\Exports;

use App\Materno;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MaternoExportMicrored implements FromCollection, WithHeadings
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
        return DB::table('indicador_gestante')
                    ->select([
                            'PERIODO',
                            'ANNO',
                            'MES',
                            'NOMBRE_MICRORED',
                            DB::raw('COUNT(DNI_cumple_gestante) AS NUM'),
                            DB::raw('SUM(DNI_cumple_gestante) AS DEN'),
                            DB::raw('ROUND((SUM(DNI_cumple_gestante)*100/COUNT(DNI_cumple_gestante)),2) AS PORCENTAJE'),
                            ])
                    ->where('ANNO','=', $this->anno)
                    ->where('MES','=', $this->mes)
                    ->groupBy('PERIODO')
                    ->groupBy('ANNO')
                    ->groupBy('MES')
                    ->groupBy('NOMBRE_MICRORED')
                    ->orderBy('PORCENTAJE', 'desc')
                    ->get();
    }
    public function headings(): array
    {
        return [
            'Periodo',
            'Año',
            'Mes',
            'Micro Red',
            'Cantidad Gestantes',
            'Gestantes Cumple',
            '% Avance'
        ];
    }
}
