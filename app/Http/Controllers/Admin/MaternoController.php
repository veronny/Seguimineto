<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Exports\SulfatoExport;
use App\Exports\SulfatoExportEstablecimiento;
use App\Exports\SulfatoExportMicrored;
use App\Exports\SulfatoDetalleExport;
use Maatwebsite\Excel\Facades\Excel;

class MaternoController extends Controller
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
        $r_anno =  DB::table('indicador_gestante')
                        ->select('ANNO')
                        ->where('ANNO','=',$anno)
                        ->groupBy('ANNO')
                        ->get();
        
        $r_mes =  DB::table('indicador_gestante')
                        ->select('MES')
                        ->where('MES','=',$mes)
                        ->groupBy('MES')
                        ->get();

        // Grafico de Region
        $regionnum = DB::table('indicador_gestante')
                    ->select([
                            DB::raw('COUNT(DNI_cumple_gestante) AS NUM_R'),
                            ])
                    ->where('ANNO','=',$anno)
                    ->where('MES','=', $mes)
                    ->groupBy('PERIODO')
                    ->groupBy('ANNO')
                    ->groupBy('MES')
                    ->get()->toArray();

        $regionnum = array_column($regionnum,'NUM_R');

        $regionden = DB::table('indicador_gestante')
                    ->select([
                            DB::raw('SUM(DNI_cumple_gestante) AS DEN_R'),
                            ])
                    ->where('ANNO','=',$anno)
                    ->where('MES','=', $mes)
                    ->groupBy('PERIODO')
                    ->groupBy('ANNO')
                    ->groupBy('MES')
                    ->get()->toArray();
        $regionden = array_column($regionden,'DEN_R');
        
        // Grafico de provincia
        $prov = DB::table('indicador_gestante')
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
                
        $prov_num = DB::table('indicador_gestante')
                        ->select([
                                DB::raw('COUNT(DNI_cumple_gestante) AS NUM_PROV'),
                                ])
                        ->where('ANNO','=',$anno)
                        ->where('MES','=', $mes)
                        ->groupBy('PROVINCIA')
                        ->groupBy('ANNO')
                        ->groupBy('MES')
                        ->get()->toArray();
        $prov_num = array_column($prov_num,'NUM_PROV');

        $prov_den = DB::table('indicador_gestante')
                        ->select([
                                DB::raw('SUM(DNI_cumple_gestante) AS DEN_PROV'),
                                ])
                        ->where('ANNO','=',$anno)
                        ->where('MES','=', $mes)
                        ->groupBy('PROVINCIA')
                        ->groupBy('ANNO')
                        ->groupBy('MES')
                        ->get()->toArray();
        $prov_den = array_column($prov_den,'DEN_PROV');
        
        // Grafico de Red
        $red = DB::table('indicador_gestante')
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
        
        $red_num = DB::table('indicador_gestante')
                        ->select([
                                DB::raw('COUNT(DNI_cumple_gestante) AS NUM_RED'),
                                ])
                        ->where('ANNO','=',$anno)
                        ->where('MES','=', $mes)
                        ->groupBy('NOMBRE_RED')
                        ->groupBy('ANNO')
                        ->groupBy('MES')
                        ->get()->toArray();
        $red_num = array_column($red_num,'NUM_RED');
        
        $red_den = DB::table('indicador_gestante')
                        ->select([
                                DB::raw('SUM(DNI_cumple_gestante) AS DEN_RED'),
                                ])
                        ->where('ANNO','=',$anno)
                        ->where('MES','=', $mes)
                        ->groupBy('NOMBRE_RED')
                        ->groupBy('ANNO')
                        ->groupBy('MES')
                        ->get()->toArray();
        $red_den = array_column($red_den,'DEN_RED');

        // Tabla de Provincia
        $provincia = DB::table('indicador_gestante')
                ->select([
                        'PERIODO',
                        'ANNO',
                        'MES',
                        'PROVINCIA',
                        DB::raw('COUNT(DNI_cumple_gestante) AS NUM'),
                        DB::raw('SUM(DNI_cumple_gestante) AS DEN'),
                        DB::raw('ROUND((SUM(DNI_cumple_gestante)*100/COUNT(DNI_cumple_gestante)),2) AS PORCENTAJE'),
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
        $distrito = DB::table('indicador_gestante')
                ->select([
                        'PERIODO',
                        'ANNO',
                        'MES',
                        'DISTRITO',
                        DB::raw('COUNT(DNI_cumple_gestante) AS NUM'),
                        DB::raw('SUM(DNI_cumple_gestante) AS DEN'),
                        DB::raw('ROUND((SUM(DNI_cumple_gestante)*100/COUNT(DNI_cumple_gestante)),2) AS PORCENTAJE'),
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
        $redes = DB::table('indicador_gestante')
                ->select([
                        'PERIODO',
                        'ANNO',
                        'MES',
                        'NOMBRE_RED',
                        DB::raw('COUNT(DNI_cumple_gestante) AS NUM'),
                        DB::raw('SUM(DNI_cumple_gestante) AS DEN'),
                        DB::raw('ROUND((SUM(DNI_cumple_gestante)*100/COUNT(DNI_cumple_gestante)),2) AS PORCENTAJE'),
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
        $microred = DB::table('indicador_gestante')
                ->select([
                        'PERIODO',
                        'ANNO',
                        'MES',
                        'NOMBRE_MICRORED',
                        DB::raw('COUNT(DNI_cumple_gestante) AS NUM'),
                        DB::raw('SUM(DNI_cumple_gestante) AS DEN'),
                        DB::raw('ROUND((SUM(DNI_cumple_gestante)*100/COUNT(DNI_cumple_gestante)),2) AS PORCENTAJE'),
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
        $establecimiento = DB::table('indicador_gestante')
                ->select([
                        'PERIODO',
                        'ANNO',
                        'MES',
                        'NOM_EESS',
                        DB::raw('COUNT(DNI_cumple_gestante) AS NUM'),
                        DB::raw('SUM(DNI_cumple_gestante) AS DEN'),
                        DB::raw('ROUND((SUM(DNI_cumple_gestante)*100/COUNT(DNI_cumple_gestante)),2) AS PORCENTAJE'),
                        ])
                ->where('ANNO','=', $anno)
                ->where('MES','=', $mes)
                ->groupBy('PERIODO')
                ->groupBy('ANNO')
                ->groupBy('MES')
                ->groupBy('NOM_EESS')
                ->orderBy('PORCENTAJE', 'desc')
                ->get();

        return view('admin.materno.index')
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

    public function show(Request $request)
    {                  
        
        // Request
        $r_anno = $request->get('anno');
        $r_mes = $request->get('mes');
        $r_provincia = $request->get('provincia');
        $r_distrito = $request->get('distrito');
        $r_red = $request->get('red');
        $r_microred = $request->get('microred');
        $r_establec = $request->get('establecimiento');
        $r_dni = $request->get('dni');
        $r_nombre = $request->get('nombre');
                
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

        // Request Excel
        $e_anno =  DB::table('indicador_gestante')
                ->select('ANNO')
                ->where('ANNO','=',$r_anno)
                ->groupBy('ANNO')
                ->get();

        $e_mes =  DB::table('indicador_gestante')
                ->select('MES')
                ->where('MES','=',$r_mes)
                ->groupBy('MES')
                ->get();
        
        $e_provincia = DB::table('indicador_gestante')
                ->select([DB::raw('PROVINCIA')])
                ->where('PROVINCIA','=',$r_provincia)
                ->groupBy('PROVINCIA')
                ->get();
        
        $e_distrito = DB::table('indicador_gestante')
                ->select([DB::raw('DISTRITO')])
                ->where('DISTRITO','=',$r_distrito)
                ->groupBy('DISTRITO')
                ->get();

        $e_red = DB::table('indicador_gestante')
                ->select([DB::raw('NOMBRE_RED')])
                ->where('NOMBRE_RED','=',$r_red)
                ->groupBy('NOMBRE_RED')
                ->get();
        
        $e_microred = DB::table('indicador_gestante')
                ->select([DB::raw('NOMBRE_MICRORED')])
                ->where('NOMBRE_MICRORED','=',$r_microred)
                ->groupBy('NOMBRE_MICRORED')
                ->get();
        
        $e_establecimiento = DB::table('indicador_gestante')
                ->select([DB::raw('NOM_EESS')])
                ->where('NOM_EESS','=',$r_establec)
                ->groupBy('NOM_EESS')
                ->get();
        
        // Provincia
        $provincia = DB::table('indicador_gestante')
                ->select([DB::raw('PROVINCIA')])
                ->groupBy('PROVINCIA')
                ->get()->toArray();
        $provincia = array_column($provincia,'PROVINCIA');

        // Distrito
        $distrito = DB::table('indicador_gestante')
                ->select([DB::raw('DISTRITO')])
                ->groupBy('DISTRITO')
                ->get()->toArray();
        $distrito = array_column($distrito,'DISTRITO');

        // Red
        $red = DB::table('indicador_gestante')
                ->select([DB::raw('NOMBRE_RED')])
                ->groupBy('NOMBRE_RED')
                ->get()->toArray();
        $red = array_column($red,'NOMBRE_RED');

        // Microred
        $microred = DB::table('indicador_gestante')
                ->select([DB::raw('NOMBRE_MICRORED')])
                ->groupBy('NOMBRE_MICRORED')
                ->get()->toArray();
        $microred = array_column($microred,'NOMBRE_MICRORED');

        // Establecimiento
        $establecimiento = DB::table('indicador_gestante')
                ->select([DB::raw('NOM_EESS')])
                ->groupBy('NOM_EESS')
                ->get()->toArray();
        $establecimiento = array_column($establecimiento,'NOM_EESS');
        // Query Tabla Provincia       
        $t_materno  = DB::table('indicador_gestante')
                        ->select([
                                'Documento',
                                'NOMBRE_COMPLETO',
                                'Gestacion',
                                'NOM_EESS',
                                'Nom_EESS_Prenatal',
                                'Fecha_parto',
                                'Fecha_Inico',
                                'Fecha_Primer_Trimestre',
                                'Fecha_Segundo_Trimestre',
                                'cumple_acido_folico',
                                'cumple_hemoglobina',
                                'cumple_exam_orina',
                                'cumple_prueba_sifilis',
                                'cumple_pueba_VIH',
                                'cumple_perfil_obstetrico',
                                'cumple_atenciones',
                                'cantidad_atenciones',
                                'cantidad_atenciones',
                                'DNI_cumple_suplemento',
                                'cantidad_suplemento',
                                'cantidad_suplemento_compuesto',
                                'cantidad_anemia_materno',
                                'DNI_cumple_gestante',
                                ])
                        ->where('ANNO','=', $r_anno)
                        ->where('MES','=', $r_mes)
                        ->where('PROVINCIA','=', $r_provincia)
                        ->orderBy('Fecha_parto')
                        ->get();
        if ($r_distrito != "")
        {
        // Query Tabla Distrito       
        $t_materno  = DB::table('indicador_gestante')
                        ->select([
                                'Documento',
                                'NOMBRE_COMPLETO',
                                'Gestacion',
                                'NOM_EESS',
                                'Nom_EESS_Prenatal',
                                'Fecha_parto',
                                'Fecha_Inico',
                                'Fecha_Primer_Trimestre',
                                'Fecha_Segundo_Trimestre',
                                'cumple_acido_folico',
                                'cumple_hemoglobina',
                                'cumple_exam_orina',
                                'cumple_prueba_sifilis',
                                'cumple_pueba_VIH',
                                'cumple_perfil_obstetrico',
                                'cumple_atenciones',
                                'cantidad_atenciones',
                                'cantidad_atenciones',
                                'DNI_cumple_suplemento',
                                'cantidad_suplemento',
                                'cantidad_suplemento_compuesto',
                                'cantidad_anemia_materno',
                                'DNI_cumple_gestante',
                                ])
                        ->where('ANNO','=', $r_anno)
                        ->where('MES','=', $r_mes)
                        ->where('DISTRITO','=', $r_distrito)
                        ->get();
        } 
        if ($r_red != "")
        {
        // Query Tabla Red    
        $t_materno = DB::table('indicador_gestante')
                        ->select([
                                'Documento',
                                'NOMBRE_COMPLETO',
                                'Gestacion',
                                'NOM_EESS',
                                'Nom_EESS_Prenatal',
                                'Fecha_parto',
                                'Fecha_Inico',
                                'Fecha_Primer_Trimestre',
                                'Fecha_Segundo_Trimestre',
                                'cumple_acido_folico',
                                'cumple_hemoglobina',
                                'cumple_exam_orina',
                                'cumple_prueba_sifilis',
                                'cumple_pueba_VIH',
                                'cumple_perfil_obstetrico',
                                'cumple_atenciones',
                                'cantidad_atenciones',
                                'cantidad_atenciones',
                                'DNI_cumple_suplemento',
                                'cantidad_suplemento',
                                'cantidad_suplemento_compuesto',
                                'cantidad_anemia_materno',
                                'DNI_cumple_gestante',
                                ])
                        ->where('ANNO','=', $r_anno)
                        ->where('MES','=', $r_mes)
                        ->where('NOMBRE_RED','=', $r_red)
                        ->get();
        } 
        if ($r_microred != "")
        {                        
        // Query Tabla microred    
        $t_materno  = DB::table('indicador_gestante')
                        ->select([
                                'Documento',
                                'NOMBRE_COMPLETO',
                                'Gestacion',
                                'NOM_EESS',
                                'Nom_EESS_Prenatal',
                                'Fecha_parto',
                                'Fecha_Inico',
                                'Fecha_Primer_Trimestre',
                                'Fecha_Segundo_Trimestre',
                                'cumple_acido_folico',
                                'cumple_hemoglobina',
                                'cumple_exam_orina',
                                'cumple_prueba_sifilis',
                                'cumple_pueba_VIH',
                                'cumple_perfil_obstetrico',
                                'cumple_atenciones',
                                'cantidad_atenciones',
                                'cantidad_atenciones',
                                'DNI_cumple_suplemento',
                                'cantidad_suplemento',
                                'cantidad_suplemento_compuesto',
                                'cantidad_anemia_materno',
                                'DNI_cumple_gestante',
                                ])
                        ->where('ANNO','=', $r_anno)
                        ->where('MES','=', $r_mes)
                        ->where('NOMBRE_MICRORED','=', $r_microred)
                        ->get();
        } 
        if ($r_establec != "")
        { 
        // Query Tabla establecimiento    
        $t_materno  = DB::table('indicador_gestante')
                        ->select([
                                'Documento',
                                'NOMBRE_COMPLETO',
                                'Gestacion',
                                'NOM_EESS',
                                'Nom_EESS_Prenatal',
                                'Fecha_parto',
                                'Fecha_Inico',
                                'Fecha_Primer_Trimestre',
                                'Fecha_Segundo_Trimestre',
                                'cumple_acido_folico',
                                'cumple_hemoglobina',
                                'cumple_exam_orina',
                                'cumple_prueba_sifilis',
                                'cumple_pueba_VIH',
                                'cumple_perfil_obstetrico',
                                'cumple_atenciones',
                                'cantidad_atenciones',
                                'cantidad_atenciones',
                                'DNI_cumple_suplemento',
                                'cantidad_suplemento',
                                'cantidad_suplemento_compuesto',
                                'cantidad_anemia_materno',
                                'DNI_cumple_gestante',
                                ])
                        ->where('ANNO','=', $r_anno)
                        ->where('MES','=', $r_mes)
                        ->where('NOM_EESS','=',$r_establec)
                        ->get();
        }
        if ($r_dni != "")
        { 
        // Query Tabla establecimiento    
        $t_materno  = DB::table('indicador_gestante')
                        ->select([
                                'Documento',
                                'NOMBRE_COMPLETO',
                                'Gestacion',
                                'NOM_EESS',
                                'Nom_EESS_Prenatal',
                                'Fecha_parto',
                                'Fecha_Inico',
                                'Fecha_Primer_Trimestre',
                                'Fecha_Segundo_Trimestre',
                                'cumple_acido_folico',
                                'cumple_hemoglobina',
                                'cumple_exam_orina',
                                'cumple_prueba_sifilis',
                                'cumple_pueba_VIH',
                                'cumple_perfil_obstetrico',
                                'cumple_atenciones',
                                'cantidad_atenciones',
                                'cantidad_atenciones',
                                'DNI_cumple_suplemento',
                                'cantidad_suplemento',
                                'cantidad_suplemento_compuesto',
                                'cantidad_anemia_materno',
                                'DNI_cumple_gestante',
                                ])
                        ->where('Documento','=',$r_dni)
                        ->get();
        }
        if ($r_nombre != "")
        { 
        // Query Tabla establecimiento    
        $t_materno  = DB::table('indicador_gestante')
                        ->select([
                                'Documento',
                                'NOMBRE_COMPLETO',
                                'Gestacion',
                                'NOM_EESS',
                                'Nom_EESS_Prenatal',
                                'Fecha_parto',
                                'Fecha_Inico',
                                'Fecha_Primer_Trimestre',
                                'Fecha_Segundo_Trimestre',
                                'cumple_acido_folico',
                                'cumple_hemoglobina',
                                'cumple_exam_orina',
                                'cumple_prueba_sifilis',
                                'cumple_pueba_VIH',
                                'cumple_perfil_obstetrico',
                                'cumple_atenciones',
                                'cantidad_atenciones',
                                'cantidad_atenciones',
                                'DNI_cumple_suplemento',
                                'cantidad_suplemento',
                                'cantidad_suplemento_compuesto',
                                'cantidad_anemia_materno',
                                'DNI_cumple_gestante',
                                ])
                        ->where('NOMBRE_COMPLETO','like','%'.$r_nombre.'%')
                        ->get();
        }
                        //dd($t_establec);
        return view('admin.materno.show',compact('m_anno','m_mes','provincia','distrito','red','microred','establecimiento','t_materno'))
                        ->with(['e_anno' => $e_anno])
                        ->with(['e_mes' => $e_mes])
                        ->with(['e_provincia' => $e_provincia])
                        ->with(['e_distrito' => $e_distrito])
                        ->with(['e_red' => $e_red])
                        ->with(['e_microred' => $e_microred])
                        ->with(['e_establecimiento' => $e_establecimiento]);
                         
    }

    public function exportExcelDetalle(Request $request)
    {
        // REQUEST
        $anno = $request->get('e_anno');
        $mes = $request->get('e_mes');
        $provincia = $request->get('e_provincia');
        $distrito = $request->get('e_distrito');
        $red = $request->get('e_red');
        $microred = $request->get('e_microred');
        $establecimiento = $request->get('e_establecimiento');
        
        return Excel::download(new SulfatoDetalleExport($anno,$mes,$provincia,$distrito,$red,$microred,$establecimiento),'Detalle-Sulfato.xlsx');
    }


}
