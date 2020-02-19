<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ReporteSesionController extends Controller
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
    
        $t_sesion  = DB::table('indicador_sesion')
                        ->select([
                            'DNI_MENOR',
                                'NOMBRE_COMPLETO',
                                'Fecha_Nacimiento',
                                'Fecha_inicio',
                                'Fecha_HIS',
                                'edad_dias_HIS',
                                'DNI_cumple_HIS',
                                'Fecha_fin',
                                'DISTRITO',
                                'Nombre_EESS_atencion',
                                'TIPO_SEGURO',
                                'DIRECCION',
                                'DNI_Madre',
                                'AP_Madre',
                                'AM_Madre',
                                'Nombre_Madre',   
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
        $t_sesion  = DB::table('indicador_sesion')
                        ->select([
                            'DNI_MENOR',
                                'NOMBRE_COMPLETO',
                                'Fecha_Nacimiento',
                                'Fecha_inicio',
                                'Fecha_HIS',
                                'edad_dias_HIS',
                                'DNI_cumple_HIS',
                                'Fecha_fin',
                                'DISTRITO',
                                'Nombre_EESS_atencion',
                                'TIPO_SEGURO',
                                'DIRECCION',
                                'DNI_Madre',
                                'AP_Madre',
                                'AM_Madre',
                                'Nombre_Madre',   
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
        $t_sesion = DB::table('indicador_sesion')
                        ->select([
                            'DNI_MENOR',
                                'NOMBRE_COMPLETO',
                                'Fecha_Nacimiento',
                                'Fecha_inicio',
                                'Fecha_HIS',
                                'edad_dias_HIS',
                                'DNI_cumple_HIS',
                                'Fecha_fin',
                                'DISTRITO',
                                'Nombre_EESS_atencion',
                                'TIPO_SEGURO',
                                'DIRECCION',
                                'DNI_Madre',
                                'AP_Madre',
                                'AM_Madre',
                                'Nombre_Madre',   
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
        $t_sesion  = DB::table('indicador_sesion')
                        ->select([
                            'DNI_MENOR',
                                'NOMBRE_COMPLETO',
                                'Fecha_Nacimiento',
                                'Fecha_inicio',
                                'Fecha_HIS',
                                'edad_dias_HIS',
                                'DNI_cumple_HIS',
                                'Fecha_fin',
                                'DISTRITO',
                                'Nombre_EESS_atencion',
                                'TIPO_SEGURO',
                                'DIRECCION',
                                'DNI_Madre',
                                'AP_Madre',
                                'AM_Madre',
                                'Nombre_Madre',   
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
        $t_sesion = DB::table('indicador_sesion')
                        ->select([
                            'DNI_MENOR',
                                'NOMBRE_COMPLETO',
                                'Fecha_Nacimiento',
                                'Fecha_inicio',
                                'Fecha_HIS',
                                'edad_dias_HIS',
                                'DNI_cumple_HIS',
                                'Fecha_fin',
                                'DISTRITO',
                                'Nombre_EESS_atencion',
                                'TIPO_SEGURO',
                                'DIRECCION',
                                'DNI_Madre',
                                'AP_Madre',
                                'AM_Madre',
                                'Nombre_Madre',   
                                ])
                        ->where('ANNO','=', $anno)
                        ->where('MES','=', $mes)
                        ->where('Nombre_EESS_atencion','=',$establecimiento)
                        ->where('DNI_cumple_HIS','=', 0)
                        ->get();
        }
        $date = date("d-m-Y");
        $pdf = PDF::loadView('admin.sesion.reporte', compact('t_sesion','date'))->setPaper('a4','landscape')->save('myfile.pdf');
        return $pdf->download('reportesesion.pdf');
    }
}
