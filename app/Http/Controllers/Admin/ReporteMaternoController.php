<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ReporteMaternoController extends Controller
{
    public function reporte(Request $request)
    {
        $anno = $request->get('e_anno');
        $mes = $request->get('e_mes');
        $provincia = $request->get('e_provincia');
        $distrito = $request->get('e_distrito');
        $red = $request->get('e_red');
        $microred = $request->get('e_microred');
        $establecimiento = $request->get('e_establecimiento');

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
                                    'DNI_cumple_suplemento',
                                    'cantidad_suplemento',
                                    'cantidad_suplemento_compuesto',
                                    'cantidad_anemia_materno',
                                    'DNI_cumple_gestante',
                                ])
                        ->where('ANNO','=', $anno)
                        ->where('MES','=', $mes)
                        ->where('PROVINCIA','=', $provincia)
                        ->where('DNI_cumple_gestante','=', 0)
                        ->orderBy('Fecha_parto')
                        ->get();
        
        if ($distrito != "")
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
                                'DNI_cumple_suplemento',
                                'cantidad_suplemento',
                                'cantidad_suplemento_compuesto',
                                'cantidad_anemia_materno',
                                'DNI_cumple_gestante',
                                ])
                        ->where('ANNO','=', $anno)
                        ->where('MES','=', $mes)
                        ->where('DISTRITO','=', $distrito)
                        ->where('DNI_cumple_gestante','=', 0)
                        ->get();
        } 
        if ($red != "")
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
                                'DNI_cumple_suplemento',
                                'cantidad_suplemento',
                                'cantidad_suplemento_compuesto',
                                'cantidad_anemia_materno',
                                'DNI_cumple_gestante',
                                ])
                        ->where('ANNO','=', $anno)
                        ->where('MES','=', $mes)
                        ->where('NOMBRE_RED','=', $red)
                        ->where('DNI_cumple_gestante','=', 0)
                        ->get();
        } 
        if ($microred != "")
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
                                'DNI_cumple_suplemento',
                                'cantidad_suplemento',
                                'cantidad_suplemento_compuesto',
                                'cantidad_anemia_materno',
                                'DNI_cumple_gestante',
                                ])
                        ->where('ANNO','=', $anno)
                        ->where('MES','=', $mes)
                        ->where('NOMBRE_MICRORED','=', $microred)
                        ->where('DNI_cumple_gestante','=', 0)
                        ->get();
        } 
        if ($establecimiento != "")
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
                                'DNI_cumple_suplemento',
                                'cantidad_suplemento',
                                'cantidad_suplemento_compuesto',
                                'cantidad_anemia_materno',
                                'DNI_cumple_gestante',
                                ])
                        ->where('ANNO','=', $anno)
                        ->where('MES','=', $mes)
                        ->where('NOM_EESS','=',$establecimiento)
                        ->where('DNI_cumple_gestante','=', 0)
                        ->get();
        }
        $date = date("d-m-Y");
        $pdf = PDF::loadView('admin.materno.reporte', compact('t_materno','date'))->setPaper('a4','landscape')->save('myfile.pdf');
        return $pdf->download('reportematerno.pdf');
    }
}
