<?php

namespace App\Exports;

use App\Sulfato;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SulfatoExportEstablecimiento implements FromCollection, WithHeadings
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
        return DB::table('indicador_sulfato')
                    ->select([
                            'PERIODO',
                            'ANNO',
                            'MES',
                            'Nombre_EESS_atencion',
                            DB::raw('COUNT(DNI_CUMPLE_HIS) AS NUM'),
                            DB::raw('SUM(DNI_CUMPLE_HIS) AS DEN'),
                            DB::raw('ROUND((SUM(DNI_CUMPLE_HIS)*100/COUNT(DNI_CUMPLE_HIS)),2) AS PORCENTAJE'),
                            ])
                    ->where('ANNO','=',$this->anno)
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
