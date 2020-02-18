<?php

namespace App\Exports;

use App\VisitaTratamiento;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VisitaTratamientoDetalleExport implements FromCollection, WithHeadings
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
        
        $t_visita_tto = [];

        if ($this->provincia != "")
        {
        $t_visita_tto  = DB::table('indicador_visita_tratamiento')
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
                'DNI_cumple_dx',
                'Fecha_dx',
                'edad_dias_dx',
                'DNI_cumple_1v',
                'Fecha_1v',
                'edad_dias_1v',
                'DNI_cumple_2v',
                'Fecha_2v',
                'edad_dias_2v',
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
        $t_visita_tto  = DB::table('indicador_visita_tratamiento')
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
                        'DNI_cumple_dx',
                        'Fecha_dx',
                        'edad_dias_dx',
                        'DNI_cumple_1v',
                        'Fecha_1v',
                        'edad_dias_1v',
                        'DNI_cumple_2v',
                        'Fecha_2v',
                        'edad_dias_2v',
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
        $t_visita_tto = DB::table('indicador_visita_tratamiento')
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
                            'DNI_cumple_dx',
                            'Fecha_dx',
                            'edad_dias_dx',
                            'DNI_cumple_1v',
                            'Fecha_1v',
                            'edad_dias_1v',
                            'DNI_cumple_2v',
                            'Fecha_2v',
                            'edad_dias_2v',
                            'DNI_cumple_HIS',
                        ])
                ->where('ANNO','=', $this->anno)
                ->where('MES','=', $this->mes)
                ->where('NOMBRE_RED','=', $this->red)
                ->orderBy('Fecha_fin')
                ->get();
    }
    if ($this->microred != "")
    {                        
    // Query Tabla microred    
    $t_visita_tto  = DB::table('indicador_visita_tratamiento')
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
                                'DNI_cumple_dx',
                                'Fecha_dx',
                                'edad_dias_dx',
                                'DNI_cumple_1v',
                                'Fecha_1v',
                                'edad_dias_1v',
                                'DNI_cumple_2v',
                                'Fecha_2v',
                                'edad_dias_2v',
                                'DNI_cumple_HIS',
                            ])
                    ->where('ANNO','=', $this->anno)
                    ->where('MES','=', $this->mes)
                    ->where('NOMBRE_MICRORED','=', $this->microred)
                    ->orderBy('Fecha_fin')
                    ->get();
    }
    if ($this->establec != "")
    {
    // Query Tabla Distrito       
    $t_visita_tto  = DB::table('indicador_visita_tratamiento')
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
                        'DNI_cumple_dx',
                        'Fecha_dx',
                        'edad_dias_dx',
                        'DNI_cumple_1v',
                        'Fecha_1v',
                        'edad_dias_1v',
                        'DNI_cumple_2v',
                        'Fecha_2v',
                        'edad_dias_2v',
                        'DNI_cumple_HIS',
                                ])
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('Nombre_EESS_atencion','=',$this->establec)
                        ->get();
        }    
        return collect($t_visita_tto);
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
            'DNI_cumple_1v',
            'Fecha_1v',
            'edad_dias_1v',
            'DNI_cumple_2v',
            'Fecha_2v',
            'edad_dias_2v',
            'DNI_cumple_HIS',         
        ];
    }
}
