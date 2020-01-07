<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Exports\SulfatoExport;
use App\Exports\SulfatoExportEstablecimiento;
use App\Exports\SulfatoExportMicrored;
use Maatwebsite\Excel\Facades\Excel;


class SulfatoController extends Controller
{
    Public function index(Request $request)
    {
        // Matrices para select
        $m_anno = [ 
                    2019 => "2019",
                    2020 => "2020",
                ];
        
        $m_mes = [      
                   1 => "Enero",
                   2 => "Febrero",
                   3 => "Marzo",
                   4 => "Abril",
                   5 => "Mayo",
                   6 => "Junio",
                   7 => "Julio",
                   8 => "Agosto",
                   9 => "Setiembre",
                  10 => "Octubre",
                  11 =>"Noviembre",
                  12 =>"Diciembre",
                ];
                
        // Request
        $anno = $request->get('anno');
        $mes = $request->get('mes');
        
        // Request para Graficos
        $r_anno =  DB::table('indicador_sulfato')
                        ->select('ANNO')
                        ->where('ANNO','=',$anno)
                        ->groupBy('ANNO')
                        ->get();
        
        $r_mes =  DB::table('indicador_sulfato')
                        ->select('MES')
                        ->where('MES','=',$mes)
                        ->groupBy('MES')
                        ->get();

        // Grafico de Region
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

        // Tabla de Provincia
        $provincia = DB::table('indicador_sulfato')
                ->select([
                        'PERIODO',
                        'ANNO',
                        'MES',
                        'PROVINCIA',
                        DB::raw('COUNT(DNI_CUMPLE_HIS) AS NUM'),
                        DB::raw('SUM(DNI_CUMPLE_HIS) AS DEN'),
                        DB::raw('ROUND((SUM(DNI_CUMPLE_HIS)*100/COUNT(DNI_CUMPLE_HIS)),2) AS PORCENTAJE'),
                        ])
                ->where('ANNO','=', $anno)
                ->where('MES','=', $mes)
                ->groupBy('PERIODO')
                ->groupBy('ANNO')
                ->groupBy('MES')
                ->groupBy('PROVINCIA')
                ->orderBy('PORCENTAJE', 'desc')
                ->get();
        
        
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

        // Tabla de Red
        $redes = DB::table('indicador_sulfato')
                ->select([
                        'PERIODO',
                        'ANNO',
                        'MES',
                        'NOMBRE_RED',
                        DB::raw('COUNT(DNI_CUMPLE_HIS) AS NUM'),
                        DB::raw('SUM(DNI_CUMPLE_HIS) AS DEN'),
                        DB::raw('ROUND((SUM(DNI_CUMPLE_HIS)*100/COUNT(DNI_CUMPLE_HIS)),2) AS PORCENTAJE'),
                        ])
                ->where('ANNO','=', $anno)
                ->where('MES','=', $mes)
                ->groupBy('PERIODO')
                ->groupBy('ANNO')
                ->groupBy('MES')
                ->groupBy('NOMBRE_RED')
                ->orderBy('PORCENTAJE', 'desc')
                ->get();
        
        // Tabla de MicroRed
        $microred = DB::table('indicador_sulfato')
                ->select([
                        'PERIODO',
                        'ANNO',
                        'MES',
                        'NOMBRE_MICRORED',
                        DB::raw('COUNT(DNI_CUMPLE_HIS) AS NUM'),
                        DB::raw('SUM(DNI_CUMPLE_HIS) AS DEN'),
                        DB::raw('ROUND((SUM(DNI_CUMPLE_HIS)*100/COUNT(DNI_CUMPLE_HIS)),2) AS PORCENTAJE'),
                        ])
                ->where('ANNO','=', $anno)
                ->where('MES','=', $mes)
                ->groupBy('PERIODO')
                ->groupBy('ANNO')
                ->groupBy('MES')
                ->groupBy('NOMBRE_MICRORED')
                ->orderBy('PORCENTAJE', 'desc')
                ->get();
        
        // Tabla de Establecimiento
        $establecimiento = DB::table('indicador_sulfato')
                ->select([
                        'PERIODO',
                        'ANNO',
                        'MES',
                        'Nombre_EESS_atencion',
                        DB::raw('COUNT(DNI_CUMPLE_HIS) AS NUM'),
                        DB::raw('SUM(DNI_CUMPLE_HIS) AS DEN'),
                        DB::raw('ROUND((SUM(DNI_CUMPLE_HIS)*100/COUNT(DNI_CUMPLE_HIS)),2) AS PORCENTAJE'),
                        ])
                ->where('ANNO','=', $anno)
                ->where('MES','=', $mes)
                ->groupBy('PERIODO')
                ->groupBy('ANNO')
                ->groupBy('MES')
                ->groupBy('Nombre_EESS_atencion')
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
                ->with(['provincia' => $provincia])
                ->with(['distrito' => $distrito])
                ->with(['redes' => $redes])
                ->with(['microred' => $microred])
                ->with(['establecimiento' => $establecimiento])
                ->with(['m_anno' => $m_anno])
                ->with(['m_mes' => $m_mes])
                ->with(['r_anno' => $r_anno])
                ->with(['r_mes' => $r_mes]);                                
    }

    public function exportExcel(Request $request)
    {
        // REQUEST
        $anno = $request->get('r_anno');
        $mes = $request->get('r_mes');
        
        return Excel::download(new SulfatoExport($anno,$mes),'Sulfato-list.xlsx');
    }

    public function exportExcelMicrored(Request $request)
    {
        // REQUEST
        $anno = $request->get('r_anno');
        $mes = $request->get('r_mes');
        
        return Excel::download(new SulfatoExportMicrored($anno,$mes),'Sulfato-microred.xlsx');
    }

    public function exportExcelEstablecimiento(Request $request)
    {
        // REQUEST
        $anno = $request->get('r_anno');
        $mes = $request->get('r_mes');
        
        return Excel::download(new SulfatoExportEstablecimiento($anno,$mes),'Sulfato-establecimiento.xlsx');
    }

    public function show()
    {     
        // Matrices para select
        $m_anno = [ 
                2019 => "2019",
                2020 => "2020",
            ];
    
        $m_mes = [      
               1 => "Enero",
               2 => "Febrero",
               3 => "Marzo",
               4 => "Abril",
               5 => "Mayo",
               6 => "Junio",
               7 => "Julio",
               8 => "Agosto",
               9 => "Setiembre",
              10 => "Octubre",
              11 =>"Noviembre",
              12 =>"Diciembre",
            ];
        
        // Provincia
        $provincia = DB::table('indicador_sulfato')
                ->select([DB::raw('PROVINCIA')])
                ->groupBy('PROVINCIA')
                ->get()->toArray();
        $provincia = array_column($provincia,'PROVINCIA');

        // Distrito
        $distrito = DB::table('indicador_sulfato')
                ->select([DB::raw('DISTRITO')])
                ->groupBy('DISTRITO')
                ->get()->toArray();
        $distrito = array_column($distrito,'DISTRITO');
        
        // Red
        $red = DB::table('indicador_sulfato')
                ->select([DB::raw('NOMBRE_RED')])
                ->groupBy('NOMBRE_RED')
                ->get()->toArray();
        $red = array_column($red,'NOMBRE_RED');

        // Microred
        $microred = DB::table('indicador_sulfato')
                ->select([DB::raw('NOMBRE_MICRORED')])
                ->groupBy('NOMBRE_MICRORED')
                ->get()->toArray();
        $microred = array_column($microred,'NOMBRE_MICRORED');
        
        // Establecimiento
        $establecimiento = DB::table('indicador_sulfato')
                ->select([DB::raw('Nombre_EESS_atencion')])
                ->groupBy('Nombre_EESS_atencion')
                ->get()->toArray();
        $establecimiento = array_column($establecimiento,'Nombre_EESS_atencion');

        return view('admin.sulfato.show')
                ->with(['m_anno' => $m_anno])
                ->with(['m_mes' => $m_mes])
                ->with(['provincia' => $provincia])
                ->with(['distrito' => $distrito])
                ->with(['red' => $red])
                ->with(['microred' => $microred])
                ->with(['establecimiento' => $establecimiento]);
    }

}
