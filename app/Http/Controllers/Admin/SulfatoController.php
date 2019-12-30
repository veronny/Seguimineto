<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Sulfato;
use App\Charts\ProvinciaChart;
use DataTables;

class SulfatoController extends Controller
{
    Public function index(Request $request)
    {
        //REQUEST
        $anno = $request->get('anno');
        $mes = $request->get('mes');

        //Grafico de Region
        $regionnum = DB::table('indicador_sulfato')
                    ->select([
                            DB::raw('COUNT(DNI_CUMPLE_HIS) AS NUM_R'),
                            ])
                    ->where('ANNO','=',$anno)
                    ->where('MES','=', $mes)
                    ->groupBy('PERIODO')
                    ->groupBy('ANNO')
                    ->groupBy('MES')
                    ->get()->toArray();
        $regionnum = array_column($regionnum,'NUM_R');

        $regionden = DB::table('indicador_sulfato')
                    ->select([
                            DB::raw('SUM(DNI_CUMPLE_HIS) AS DEN_R'),
                            ])
                    ->where('ANNO','=',$anno)
                    ->where('MES','=', $mes)
                    ->groupBy('PERIODO')
                    ->groupBy('ANNO')
                    ->groupBy('MES')
                    ->get()->toArray();
        $regionden = array_column($regionden,'DEN_R');
        
        // Grafico de provincia
        $prov = DB::table('indicador_sulfato')
                  ->select([
                          DB::raw('PROVINCIA'),
                          ])
                  ->where('ANNO','=',$anno)
                  ->where('MES','=', $mes)
                  ->groupBy('PROVINCIA')
                  ->groupBy('ANNO')
                  ->groupBy('MES')
                  ->get()->toArray();
        $prov = array_column($prov,'PROVINCIA');
                
        $prov_num = DB::table('indicador_sulfato')
                        ->select([
                                DB::raw('COUNT(DNI_CUMPLE_HIS) AS NUM_PROV'),
                                ])
                        ->where('ANNO','=',$anno)
                        ->where('MES','=', $mes)
                        ->groupBy('PROVINCIA')
                        ->groupBy('ANNO')
                        ->groupBy('MES')
                        ->get()->toArray();
        $prov_num = array_column($prov_num,'NUM_PROV');

        $prov_den = DB::table('indicador_sulfato')
                        ->select([
                                DB::raw('SUM(DNI_CUMPLE_HIS) AS DEN_PROV'),
                                ])
                        ->where('ANNO','=',$anno)
                        ->where('MES','=', $mes)
                        ->groupBy('PROVINCIA')
                        ->groupBy('ANNO')
                        ->groupBy('MES')
                        ->get()->toArray();
        $prov_den = array_column($prov_den,'DEN_PROV');
        
        // Grafico de Red
        $red = DB::table('indicador_sulfato')
                  ->select([
                          DB::raw('NOMBRE_RED'),
                          ])
                  ->where('ANNO','=',$anno)
                  ->where('MES','=', $mes)
                  ->groupBy('NOMBRE_RED')
                  ->groupBy('ANNO')
                  ->groupBy('MES')
                  ->get()->toArray();
        $red = array_column($red,'NOMBRE_RED');
        
        $red_num = DB::table('indicador_sulfato')
                        ->select([
                                DB::raw('COUNT(DNI_CUMPLE_HIS) AS NUM_RED'),
                                ])
                        ->where('ANNO','=',$anno)
                        ->where('MES','=', $mes)
                        ->groupBy('NOMBRE_RED')
                        ->groupBy('ANNO')
                        ->groupBy('MES')
                        ->get()->toArray();
        $red_num = array_column($red_num,'NUM_RED');
        
        $red_den = DB::table('indicador_sulfato')
                        ->select([
                                DB::raw('SUM(DNI_CUMPLE_HIS) AS DEN_RED'),
                                ])
                        ->where('ANNO','=',$anno)
                        ->where('MES','=', $mes)
                        ->groupBy('NOMBRE_RED')
                        ->groupBy('ANNO')
                        ->groupBy('MES')
                        ->get()->toArray();
        $red_den = array_column($red_den,'DEN_RED');

        // Tabla de Distrito
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
                ->get();
                    
        return view('admin.sulfato.index')
                ->with('regionnum',json_encode($regionnum,JSON_NUMERIC_CHECK))
                ->with('regionden',json_encode($regionden,JSON_NUMERIC_CHECK))
                ->with('prov',json_encode($prov,JSON_NUMERIC_CHECK))
                ->with('prov_num',json_encode($prov_num,JSON_NUMERIC_CHECK)) 
                ->with('prov_den',json_encode($prov_den,JSON_NUMERIC_CHECK))
                ->with('red',json_encode($red,JSON_NUMERIC_CHECK))
                ->with('red_num',json_encode($red_num,JSON_NUMERIC_CHECK)) 
                ->with('red_den',json_encode($red_den,JSON_NUMERIC_CHECK))
                ->with(['distrito' => $distrito]);
                
    }

}
