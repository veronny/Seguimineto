<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ReporteEntregaController extends Controller
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

        $t_entrega  = DB::table('indicador_12meses')
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
                                'DNI_cumple_tamizaje',
                                'Fecha_tamizaje',
                                'edad_dias_tamizaje',
                                'DNI_cumple_anemia',
                                'Fecha_anemia',
                                'edad_dias_anemia',
                                'DNI_cumple_tx',
                                'Fecha_tx',
                                'edad_dias_tx',
                                'DNI_cumple_su',
                                'Fecha_su',
                                'edad_dias_su',
                                'DNI_cumple_su_seg',
                                'Fecha_su_seg',
                                'edad_dias_su_seg',
                                'DNI_cumple_su_ter',
                                'Fecha_su_ter',
                                'edad_dias_su_ter',
                                'DNI_cumple_tx_seg',
                                'Fecha_tx_seg',
                                'edad_dias_tx_seg',
                                'DNI_cumple_tx_ter',
                                'Fecha_tx_ter',
                                'edad_dias_tx_ter',
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
        $t_entrega  = DB::table('indicador_12meses')
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
                                'DNI_cumple_tamizaje',
                                'Fecha_tamizaje',
                                'edad_dias_tamizaje',
                                'DNI_cumple_anemia',
                                'Fecha_anemia',
                                'edad_dias_anemia',
                                'DNI_cumple_tx',
                                'Fecha_tx',
                                'edad_dias_tx',
                                'DNI_cumple_su',
                                'Fecha_su',
                                'edad_dias_su',
                                'DNI_cumple_su_seg',
                                'Fecha_su_seg',
                                'edad_dias_su_seg',
                                'DNI_cumple_su_ter',
                                'Fecha_su_ter',
                                'edad_dias_su_ter',
                                'DNI_cumple_tx_seg',
                                'Fecha_tx_seg',
                                'edad_dias_tx_seg',
                                'DNI_cumple_tx_ter',
                                'Fecha_tx_ter',
                                'edad_dias_tx_ter',
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
        $t_entrega = DB::table('indicador_12meses')
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
                                'DNI_cumple_tamizaje',
                                'Fecha_tamizaje',
                                'edad_dias_tamizaje',
                                'DNI_cumple_anemia',
                                'Fecha_anemia',
                                'edad_dias_anemia',
                                'DNI_cumple_tx',
                                'Fecha_tx',
                                'edad_dias_tx',
                                'DNI_cumple_su',
                                'Fecha_su',
                                'edad_dias_su',
                                'DNI_cumple_su_seg',
                                'Fecha_su_seg',
                                'edad_dias_su_seg',
                                'DNI_cumple_su_ter',
                                'Fecha_su_ter',
                                'edad_dias_su_ter',
                                'DNI_cumple_tx_seg',
                                'Fecha_tx_seg',
                                'edad_dias_tx_seg',
                                'DNI_cumple_tx_ter',
                                'Fecha_tx_ter',
                                'edad_dias_tx_ter',
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
        $t_entrega  = DB::table('indicador_12meses')
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
                                'DNI_cumple_tamizaje',
                                'Fecha_tamizaje',
                                'edad_dias_tamizaje',
                                'DNI_cumple_anemia',
                                'Fecha_anemia',
                                'edad_dias_anemia',
                                'DNI_cumple_tx',
                                'Fecha_tx',
                                'edad_dias_tx',
                                'DNI_cumple_su',
                                'Fecha_su',
                                'edad_dias_su',
                                'DNI_cumple_su_seg',
                                'Fecha_su_seg',
                                'edad_dias_su_seg',
                                'DNI_cumple_su_ter',
                                'Fecha_su_ter',
                                'edad_dias_su_ter',
                                'DNI_cumple_tx_seg',
                                'Fecha_tx_seg',
                                'edad_dias_tx_seg',
                                'DNI_cumple_tx_ter',
                                'Fecha_tx_ter',
                                'edad_dias_tx_ter',
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
        $t_entrega  = DB::table('indicador_12meses')
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
                                    'DNI_cumple_tamizaje',
                                    'Fecha_tamizaje',
                                    'edad_dias_tamizaje',
                                    'DNI_cumple_anemia',
                                    'Fecha_anemia',
                                    'edad_dias_anemia',
                                    'DNI_cumple_tx',
                                    'Fecha_tx',
                                    'edad_dias_tx',
                                    'DNI_cumple_su',
                                    'Fecha_su',
                                    'edad_dias_su',
                                    'DNI_cumple_su_seg',
                                    'Fecha_su_seg',
                                    'edad_dias_su_seg',
                                    'DNI_cumple_su_ter',
                                    'Fecha_su_ter',
                                    'edad_dias_su_ter',
                                    'DNI_cumple_tx_seg',
                                    'Fecha_tx_seg',
                                    'edad_dias_tx_seg',
                                    'DNI_cumple_tx_ter',
                                    'Fecha_tx_ter',
                                    'edad_dias_tx_ter',
                                    'DNI_cumple_HIS',
                                ])
                        ->where('ANNO','=', $anno)
                        ->where('MES','=', $mes)
                        ->where('Nombre_EESS_atencion','=',$establecimiento)
                        ->where('DNI_cumple_HIS','=', 0)
                        ->get();
        }
        $date = date("d-m-Y");
        $pdf = PDF::loadView('admin.entrega.reporte', compact('t_entrega','date'))->setPaper('a4','landscape')->save('myfile.pdf');
        return $pdf->download('reporteentrega.pdf');
    }
}
