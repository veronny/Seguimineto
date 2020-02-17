<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ReporteVisitaController extends Controller
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
    
        $t_visita  = DB::table('indicador_visita')
                        ->select([
                            'DNI_MENOR',
                            'NOMBRE_COMPLETO',
                            'Fecha_Nacimiento',
                            'Fecha_inicio',
                            'Fecha_fin',
                            'DISTRITO',
                            'Nombre_EESS_atencion',
                            'DNI_Madre',
                            'AP_Madre',
                            'AM_Madre',
                            'Nombre_Madre',
                            'DNI_cumple_1v',
                            'Fecha_1v',
                            'edad_dias_1v',
                            'DNI_cumple_2v',
                            'Fecha_2v',
                            'edad_dias_2v',
                            'DNI_cumple_HIS',
                                ])
                        ->where('ANNO','=', $anno)
                        ->where('MES','=', $mes)
                        ->where('PROVINCIA','=', $provincia)
                        ->where('DNI_cumple_HIS','=', 0)
                        ->orderBy('Fecha_fin')
                        ->get();
        if ($distrito != "")
        {
        // Query Tabla Distrito       
        $t_visita  = DB::table('indicador_visita')
                        ->select([
                            'DNI_MENOR',
                            'NOMBRE_COMPLETO',
                            'Fecha_Nacimiento',
                            'Fecha_inicio',
                            'Fecha_fin',
                            'DISTRITO',
                            'Nombre_EESS_atencion',
                            'DNI_Madre',
                            'AP_Madre',
                            'AM_Madre',
                            'Nombre_Madre',
                            'DNI_cumple_1v',
                            'Fecha_1v',
                            'edad_dias_1v',
                            'DNI_cumple_2v',
                            'Fecha_2v',
                            'edad_dias_2v',
                            'DNI_cumple_HIS',
                                ])
                        ->where('ANNO','=', $anno)
                        ->where('MES','=', $mes)
                        ->where('DISTRITO','=', $distrito)
                        ->where('DNI_cumple_HIS','=', 0)
                        ->get();
        } 
        if ($red != "")
        {
        // Query Tabla Red    
        $t_visita = DB::table('indicador_visita')
                        ->select([
                            'DNI_MENOR',
                            'NOMBRE_COMPLETO',
                            'Fecha_Nacimiento',
                            'Fecha_inicio',
                            'Fecha_fin',
                            'DISTRITO',
                            'Nombre_EESS_atencion',
                            'DNI_Madre',
                            'AP_Madre',
                            'AM_Madre',
                            'Nombre_Madre',
                            'DNI_cumple_1v',
                            'Fecha_1v',
                            'edad_dias_1v',
                            'DNI_cumple_2v',
                            'Fecha_2v',
                            'edad_dias_2v',
                            'DNI_cumple_HIS',
                                ])
                        ->where('ANNO','=', $anno)
                        ->where('MES','=', $mes)
                        ->where('NOMBRE_RED','=', $red)
                        ->where('DNI_cumple_HIS','=', 0)
                        ->get();
        } 
        if ($microred != "")
        {                        
        // Query Tabla microred    
        $t_visita  = DB::table('indicador_visita')
                        ->select([
                            'DNI_MENOR',
                            'NOMBRE_COMPLETO',
                            'Fecha_Nacimiento',
                            'Fecha_inicio',
                            'Fecha_fin',
                            'DISTRITO',
                            'Nombre_EESS_atencion',
                            'DNI_Madre',
                            'AP_Madre',
                            'AM_Madre',
                            'Nombre_Madre',
                            'DNI_cumple_1v',
                            'Fecha_1v',
                            'edad_dias_1v',
                            'DNI_cumple_2v',
                            'Fecha_2v',
                            'edad_dias_2v',
                            'DNI_cumple_HIS',
                                ])
                        ->where('ANNO','=', $anno)
                        ->where('MES','=', $mes)
                        ->where('NOMBRE_MICRORED','=', $microred)
                        ->where('DNI_cumple_HIS','=', 0)
                        ->get();
        } 
        if ($establecimiento != "")
        { 
        // Query Tabla establecimiento    
        $t_visita = DB::table('indicador_visita')
                        ->select([
                            'DNI_MENOR',
                            'NOMBRE_COMPLETO',
                            'Fecha_Nacimiento',
                            'Fecha_inicio',
                            'Fecha_fin',
                            'DISTRITO',
                            'Nombre_EESS_atencion',
                            'DNI_Madre',
                            'AP_Madre',
                            'AM_Madre',
                            'Nombre_Madre',
                            'DNI_cumple_1v',
                            'Fecha_1v',
                            'edad_dias_1v',
                            'DNI_cumple_2v',
                            'Fecha_2v',
                            'edad_dias_2v',
                            'DNI_cumple_HIS',
                                ])
                        ->where('ANNO','=', $anno)
                        ->where('MES','=', $mes)
                        ->where('Nombre_EESS_atencion','=',$establecimiento)
                        ->where('DNI_cumple_HIS','=', 0)
                        ->get();
        }
        $date = date("d-m-Y");
        $pdf = PDF::loadView('admin.visita.reporte', compact('t_visita','date'))->setPaper('a4','landscape')->save('myfile.pdf');
        return $pdf->download('reportevisita.pdf');
    }
}
