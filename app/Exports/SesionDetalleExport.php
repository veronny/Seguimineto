<?php

namespace App\Exports;

use App\Sesion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SesionDetalleExport implements FromCollection, WithHeadings
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
        $t_visita = [];

        if ($this->provincia != "")
        {
        $t_inicio  = DB::table('indicador_sesion')
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('PROVINCIA','=',$this->provincia)
                        ->orderBy('Fecha_fin')
                        ->get();
        }
        if ($this->distrito != "")
        {
        // Query Tabla Distrito       
        $t_inicio  = DB::table('indicador_sesion')
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('DISTRITO','=', $this->distrito)
                        ->get();
        } 
        if ($this->red != "")
        {
        // Query Tabla Red    
        $t_inicio = DB::table('indicador_sesion')
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('NOMBRE_RED','=', $this->red)
                        ->get();
        } 
        if ($this->microred != "")
        {                        
        // Query Tabla microred    
        $t_inicio  = DB::table('indicador_sesion')
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('NOMBRE_MICRORED','=', $this->microred)
                        ->get();
        } 
        if ($this->establecimiento != "")
        { 
        // Query Tabla establecimiento    
        $t_inicio  = DB::table('indicador_sesion')
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('Nombre_EESS_atencion','=',$this->establecimiento)
                        ->get();
        }
        return collect($t_inicio);
    }

    public function headings(): array
    {
        return [
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
        ];
    }
}
