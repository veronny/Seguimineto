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
       
        // $provincia = 
        $provincia = array('CHANCHAMAYO', 'CHUPACA', 'CONCEPCION', 'HUANCAYO', 'JAUJA','JUNIN','SATIPO','TARMA','YAULI');
        $redes = array('','CHANCHAMAYO', 'JAUJA', 'JUNIN', 'NO PERTENECE', 'PICHANAKI','CHUPACA','SM PANGOA','SATIPO','TARMA','V MANTARO');
        $data_p  = array(195, 69, 54, 594, 72, 30, 303, 93,22);
        $data_red = array(9.14,60,80,84,18,69,97,81,77,96,51);
        
         
        $regionden = Sulfato::where('ANNO','=',$anno)->where('MES','=', $mes)->count();
        
        $region = DB::table('indicador_sulfato')
                    ->select([
                            DB::raw('COUNT(DNI_CUMPLE_HIS) AS NUM'),
                            DB::raw('SUM(DNI_CUMPLE_HIS) AS DEN'),
                          //  DB::raw('ROUND((SUM(DNI_CUMPLE_HIS)*100/COUNT(DNI_CUMPLE_HIS)),2) AS PORCENTAJE'),
                            ])
                    ->where('ANNO','=',$anno)
                    ->where('MES','=', $mes)
                    ->groupBy('PERIODO')
                    ->groupBy('ANNO')
                    ->groupBy('MES')
                  //  ->orderBy('PORCENTAJE', 'desc')
                    ->get();
        
        $regionnum = DB::table('indicador_sulfato')
                    ->select([
                            DB::raw('COUNT(DNI_CUMPLE_HIS) AS NUM'),
                            ])
                    ->where('ANNO','=',$anno)
                    ->where('MES','=', $mes)
                    ->groupBy('PERIODO')
                    ->groupBy('ANNO')
                    ->groupBy('MES')
                  //  ->orderBy('PORCENTAJE', 'desc')
                    ->get();
        
        $regionden = DB::table('indicador_sulfato')
                    ->select([
                            DB::raw('SUM(DNI_CUMPLE_HIS) AS DEN'),
                          //  DB::raw('ROUND((SUM(DNI_CUMPLE_HIS)*100/COUNT(DNI_CUMPLE_HIS)),2) AS PORCENTAJE'),
                            ])
                    ->where('ANNO','=',$anno)
                    ->where('MES','=', $mes)
                    ->groupBy('PERIODO')
                    ->groupBy('ANNO')
                    ->groupBy('MES')
                  //  ->orderBy('PORCENTAJE', 'desc')
                    ->get();

        $distrito = DB::table('indicador_sulfato')
                    ->select([
                            'PERIODO',
                            'ANNO',
                            'MES',
                            'DISTRITO',
                            DB::raw('COUNT(DNI_CUMPLE_HIS) AS NUM'),
                            DB::raw('SUM(DNI_CUMPLE_HIS) AS DEN'),
                            DB::raw('ROUND((SUM(DNI_CUMPLE_HIS)*100/COUNT(DNI_CUMPLE_HIS)),2) AS PORCENTAJE'),
                            ])
                    ->where('ANNO','=', $anno)
                    ->where('MES','=', $mes)
                    ->groupBy('PERIODO')
                    ->groupBy('ANNO')
                    ->groupBy('MES')
                    ->groupBy('DISTRITO')
                    ->orderBy('PORCENTAJE', 'desc')
                    ->paginate(5);

        return view('admin.sulfato.index',['Regionnum'=> $regionnum,'Regionden'=> $regionden, 'Provincia' => $provincia, 'Data_p' => $data_p,'Redes' => $redes,'Data_red' => $data_red])->with(compact('distrito','region'));
                
    }

}
