<?php

namespace App\Exports;

use App\Materno;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MaternoDetalleExport implements FromCollection, WithHeadings
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
        $t_materno = [];

        if ($this->provincia != "")
        {
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('PROVINCIA','=', $this->provincia)
                        ->orderBy('Fecha_parto')
                        ->get();
        }
        if ($this->distrito != "")
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('DISTRITO','=', $this->distrito)
                        ->get();
        } 
        if ($this->red != "")
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('NOMBRE_RED','=', $this->red)
                        ->get();
        } 
        if ($this->microred != "")
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('NOMBRE_MICRORED','=', $this->microred)
                        ->get();
        } 
        if ($this->establecimiento != "")
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
                        ->where('ANNO','=', $this->anno)
                        ->where('MES','=', $this->mes)
                        ->where('NOM_EESS','=',$this->establecimiento)
                        ->get();
        }
        return collect($t_materno);
    }
    
    public function headings(): array
    {
        return [
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
            'cantidad_suplemento',
            'cantidad_suplemento_compuesto',
            'cantidad_anemia_materno',
            'DNI_cumple_gestante',
        ];
    }
        
}
