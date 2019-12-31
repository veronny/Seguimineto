<?php

namespace App\Exports;

use App\Sulfato;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class SulfatoExport implements FromCollection
{  
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
                            'DISTRITO',
                            DB::raw('COUNT(DNI_CUMPLE_HIS) AS NUM'),
                            DB::raw('SUM(DNI_CUMPLE_HIS) AS DEN'),
                            DB::raw('ROUND((SUM(DNI_CUMPLE_HIS)*100/COUNT(DNI_CUMPLE_HIS)),2) AS PORCENTAJE'),
                            ])
                    ->where('ANNO','=', 2019)
                    ->where('MES','=', 11)
                    ->groupBy('PERIODO')
                    ->groupBy('ANNO')
                    ->groupBy('MES')
                    ->groupBy('DISTRITO')
                    ->orderBy('PORCENTAJE', 'desc')
                    ->get();
    }
}
