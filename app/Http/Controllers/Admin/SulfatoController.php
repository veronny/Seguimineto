<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Sulfato;

class SulfatoController extends Controller
{
    Public function index(Request $request)
    {
        $anno = $request->get('anno');
        $mes = $request->get('mes');
        $periodo = $anno.$mes;
       
        // $provincia = 
        $provincia = array('CHANCHAMAYO', 'CHUPACA', 'CONCEPCION', 'HUANCAYO', 'JAUJA','JUNIN','SATIPO','TARMA','YAULI');
        $redes = array('','CHANCHAMAYO', 'JAUJA', 'JUNIN', 'NO PERTENECE', 'PICHANAKI','CHUPACA','SM PANGOA','SATIPO','TARMA','V MANTARO');
        $data_p  = array(195, 69, 54, 594, 72, 30, 303, 93,22);
        $data_red = array(9.14,60,80,84,18,69,97,81,77,96,51);
        
        $distrito = DB::select('SELECT 
                                PERIODO,
                                ANNO,
                                MES,
                                DISTRITO,
                                COUNT(DNI_CUMPLE_HIS) AS NUM,
                                SUM(DNI_CUMPLE_HIS) AS DEN,
                                ROUND((SUM(DNI_CUMPLE_HIS)*100/COUNT(DNI_CUMPLE_HIS)),2) AS PORCENTAJE
                                FROM indicador_sulfato
                                WHERE MES = ?
                                GROUP BY 
                                PERIODO,
                                ANNO,
                                MES,
                                DISTRITO
                                ORDER BY PERIODO, PORCENTAJE',[$mes]);
               
        return view('admin.sulfato.index',['Provincia' => $provincia, 'Data_p' => $data_p,'Redes' => $redes,'Data_red' => $data_red])->with(compact('distrito'));
                
    }

}
