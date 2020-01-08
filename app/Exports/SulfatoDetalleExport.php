<?php

namespace App\Exports;

use App\Sulfato;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SulfatoDetalleExport implements FromCollection, WithHeadings
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
      
        $t_sulfato = [];
        
        if ($this->provincia != "")
        {
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=',  $this->mes)
                        ->where('PROVINCIA','=', $this->provincia)
                        ->orderBy('FECHA_FIN')
                        ->get();
        }
        if ($this->distrito != "")
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('DISTRITO','=', $this->distrito)
                        ->get();
        } 
        if ($this->red != "")
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
                        ->where('ANNO','=',$this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('NOMBRE_RED','=', $this->red)
                        ->get();
        } 
        if ($this->microred != "")
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('NOMBRE_MICRORED','=', $this->microred)
                        ->get();
        } 
        if ($this->establecimiento != "")
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('Nombre_EESS_atencion','=',$this->establecimiento)
                        ->get();
        }
            return collect($t_sulfato);
    }

    public function headings(): array
    {
        return [
            'DNI',
            'Nombre Niño',
            'Fecha Nacimiento',
            'Fecha Inicio',
            'Fecha Atencion',
            'Edad Atencion',
            'Indicador',
            'Fecha Fin',
            'Distrito',
            'Establecimiento',
            'Tipo Seguro',
            'Direccion',
            'DNI Madre',
            'Nombre Madre',
        ];
    }
}
