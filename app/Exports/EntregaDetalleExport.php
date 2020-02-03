<?php

namespace App\Exports;

use App\Entrega;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EntregaDetalleExport implements FromCollection, WithHeadings
{
    public function __construct($e_anno,$e_mes,$e_provincia,$e_distrito,$e_red,$e_microred,$e_establecimiento) {
        
        $this->anno = $e_anno;
        $this->mes = $e_mes;
        $this->provincia = $e_provincia;
        $this->distrito = $e_distrito;
        $this->red = $e_red;
        $this->microred = $e_microred;
        $this->establecimiento = $e_establecimiento;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $t_entrega = [];

        if ($this->provincia != "")
        {
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('PROVINCIA','=', $this->provincia)
                        ->orderBy('Fecha_fin')
                        ->get();
        } 
        if ($this->distrito != "")
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('DISTRITO','=', $this->distrito)
                        ->get();
        } 
        if ($this->red != "")
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('NOMBRE_RED','=', $this->red)
                        ->get();
        } 
        if ($this->microred != "")
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('NOMBRE_MICRORED','=', $this->microred)
                        ->get();
        } 
        if ($this->establecimiento != "")
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('Nombre_EESS_atencion','=',$this->establec)
                        ->get();
        }
        return collect($t_entrega);
    }

    public function headings(): array
    {
        return [
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
        ];
    }
}
