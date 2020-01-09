<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ReporteSulfatoController extends Controller
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

        $t_sulfato  = DB::table('indicador_sulfato')
                        ->select([
                                'DNI_NINIO',
                                'NOMBRE_NINIO',
                                'FECHA_NAC',
                                'FECHA_INICIO',
                                'Fecha_HIS',
                                'edad_dias_HIS',
                                'DNI_cumple_HIS',
                                'FECHA_FIN',
                                'DISTRITO',
                                'Nombre_EESS_atencion',
                                'TIPO_SEGURO',
                                'DIRECCION',
                                'DNI_MADRE',
                                'NOMBRE_MADRE',
                                ])
                        ->where('ANNO','=', $anno)
                        ->where('MES','=', $mes)
                        ->where('PROVINCIA','=', $provincia)
                        ->where('DNI_cumple_HIS','=', 0)
                        ->orderBy('FECHA_FIN')
                        ->get();
        
        if ($distrito != "")
        {
        // Query Tabla Distrito       
        $t_sulfato  = DB::table('indicador_sulfato')
                        ->select([
                                'DNI_NINIO',
                                'NOMBRE_NINIO',
                                'FECHA_NAC',
                                'FECHA_INICIO',
                                'Fecha_HIS',
                                'edad_dias_HIS',
                                'DNI_cumple_HIS',
                                'FECHA_FIN',
                                'DISTRITO',
                                'Nombre_EESS_atencion',
                                'TIPO_SEGURO',
                                'DIRECCION',
                                'DNI_MADRE',
                                'NOMBRE_MADRE',
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
        $t_sulfato = DB::table('indicador_sulfato')
                        ->select([
                                'DNI_NINIO',
                                'NOMBRE_NINIO',
                                'FECHA_NAC',
                                'FECHA_INICIO',
                                'Fecha_HIS',
                                'edad_dias_HIS',
                                'DNI_cumple_HIS',
                                'FECHA_FIN',
                                'DISTRITO',
                                'Nombre_EESS_atencion',
                                'TIPO_SEGURO',
                                'DIRECCION',
                                'DNI_MADRE',
                                'NOMBRE_MADRE',
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
        $t_sulfato  = DB::table('indicador_sulfato')
                        ->select([
                                'DNI_NINIO',
                                'NOMBRE_NINIO',
                                'FECHA_NAC',
                                'FECHA_INICIO',
                                'Fecha_HIS',
                                'edad_dias_HIS',
                                'DNI_cumple_HIS',
                                'FECHA_FIN',
                                'DISTRITO',
                                'Nombre_EESS_atencion',
                                'TIPO_SEGURO',
                                'DIRECCION',
                                'DNI_MADRE',
                                'NOMBRE_MADRE',
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
        $t_sulfato  = DB::table('indicador_sulfato')
                        ->select([
                                'DNI_NINIO',
                                'NOMBRE_NINIO',
                                'FECHA_NAC',
                                'FECHA_INICIO',
                                'Fecha_HIS',
                                'edad_dias_HIS',
                                'DNI_cumple_HIS',
                                'FECHA_FIN',
                                'DISTRITO',
                                'Nombre_EESS_atencion',
                                'TIPO_SEGURO',
                                'DIRECCION',
                                'DNI_MADRE',
                                'NOMBRE_MADRE',
                                ])
                        ->where('ANNO','=', $anno)
                        ->where('MES','=', $mes)
                        ->where('Nombre_EESS_atencion','=',$establecimiento)
                        ->where('DNI_cumple_HIS','=', 0)
                        ->get();
        }
        $date = date("d-m-Y");
        $pdf = PDF::loadView('admin.sulfato.reporte', compact('t_sulfato','date'))->setPaper('a4','landscape');
        return $pdf->stream('reporte.pdf');
    }
}
