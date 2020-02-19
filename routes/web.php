<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){

    //Sulfato
    Route::get('sulfato', 'SulfatoController@index')->name('admin.sulfato.index');
    Route::get('sulfato/show','SulfatoController@show')->name('admin.sulfato.show');
    //Excel distrito
    Route::get('sulfato-list', 'SulfatoController@exportExcel')->name('admin.sulfato.excel');
    //Excel microred
    Route::get('sulfato-microred', 'SulfatoController@exportExcelMicrored')->name('admin.sulfato.excel.microred');
    //Excel establecimineto
    Route::get('sulfato-establecimiento', 'SulfatoController@exportExcelEstablecimiento')->name('admin.sulfato.excel.establecimiento');
    //Excel detalle sulfato
    Route::get('sulfato-detalle', 'SulfatoController@exportExcelDetalle')->name('admin.sulfato.show.excel');
    //Reporte sulfato
    Route::get('reporte', 'ReporteSulfatoController@reporte')->name('admin.sulfato.reporte'); 
    ///*****************************************************************************************//
    
    //Materno
    Route::get('materno', 'MaternoController@index')->name('admin.materno.index');
    Route::get('materno/show','MaternoController@show')->name('admin.materno.show');

    //Excel distrito
    Route::get('materno-list', 'MaternoController@exportExcel')->name('admin.materno.excel');
    //Excel microred
    Route::get('materno-microred', 'MaternoController@exportExcelMicrored')->name('admin.materno.excel.microred');
    //Excel establecimineto
    Route::get('materno-establecimiento', 'MaternoController@exportExcelEstablecimiento')->name('admin.materno.excel.establecimiento');
    //Excel detalle materno
    Route::get('materno-detalle', 'MaternoController@exportExcelDetalle')->name('admin.materno.show.excel');
    //Reporte materno
    Route::get('reporte/materno', 'ReporteMaternoController@reporte')->name('admin.materno.reporte'); 
    ///*****************************************************************************************//

    //12 meses
    Route::get('entrega', 'EntregaController@index')->name('admin.entrega.index');
    Route::get('entrega/show','EntregaController@show')->name('admin.entrega.show');

    //Excel distrito
    Route::get('entrega-list', 'EntregaController@exportExcel')->name('admin.entrega.excel');
    //Excel microred
    Route::get('entrega-microred', 'EntregaController@exportExcelMicrored')->name('admin.entrega.excel.microred');
    //Excel establecimineto
    Route::get('entrega-establecimiento', 'EntregaController@exportExcelEstablecimiento')->name('admin.entrega.excel.establecimiento');
    //Excel detalle 12meses
    Route::get('entrega-detalle', 'EntregaController@exportExcelDetalle')->name('admin.entrega.show.excel');
    //Reporte 12 meses
    Route::get('reporte/entrega', 'ReporteEntregaController@reporte')->name('admin.entrega.reporte'); 
    ///*****************************************************************************************//

    //Inicio
    Route::get('inicio', 'InicioController@index')->name('admin.inicio.index');
    Route::get('inicio/show','InicioController@show')->name('admin.inicio.show');

    //Excel distrito
    Route::get('inicio-list', 'InicioController@exportExcel')->name('admin.inicio.excel');
    //Excel microred
    Route::get('inicio-microred', 'InicioController@exportExcelMicrored')->name('admin.inicio.excel.microred');
    //Excel establecimineto
    Route::get('inicio-establecimiento', 'InicioController@exportExcelEstablecimiento')->name('admin.inicio.excel.establecimiento');
    //Excel detalle 12meses
    Route::get('inicio-detalle', 'InicioController@exportExcelDetalle')->name('admin.inicio.show.excel');
    //Reporte 12 meses
    Route::get('reporte/inicio', 'ReporteInicioController@reporte')->name('admin.inicio.reporte'); 
    ///*****************************************************************************************//

    //Visita
    Route::get('visita', 'VisitaController@index')->name('admin.visita.index');
    Route::get('visita/show','VisitaController@show')->name('admin.visita.show');

    //Excel distrito
    Route::get('visita-list', 'VisitaController@exportExcel')->name('admin.visita.excel');
    //Excel microred
    Route::get('visita-microred', 'VisitaController@exportExcelMicrored')->name('admin.visita.excel.microred');
    //Excel establecimineto
    Route::get('visita-establecimiento', 'VisitaController@exportExcelEstablecimiento')->name('admin.visita.excel.establecimiento');
    //Excel detalle 12meses
    Route::get('visita-detalle', 'VisitaController@exportExcelDetalle')->name('admin.visita.show.excel');
    //Reporte 12 meses
    Route::get('reporte/visita', 'ReporteVisitaController@reporte')->name('admin.visita.reporte'); 
    ///*****************************************************************************************//

    //Visita Tratamiento
    Route::get('visita_tratamiento', 'VisitaTratamientoController@index')->name('admin.visita_tratamiento.index');
    Route::get('visita_tratamiento/show','VisitaTratamientoController@show')->name('admin.visita_tratamiento.show');

    //Excel distrito
    Route::get('visita-tratamiento-list', 'VisitaTratamientoController@exportExcel')->name('admin.visita_tratamiento.excel');
    //Excel microred
    Route::get('visita-tratamiento-microred', 'VisitaTratamientoController@exportExcelMicrored')->name('admin.visita_tratamiento.excel.microred');
    //Excel establecimineto
    Route::get('visita-tratamiento-establecimiento', 'VisitaTratamientoController@exportExcelEstablecimiento')->name('admin.visita_tratamiento.excel.establecimiento');
    //Excel detalle 12meses
    Route::get('visita-tratamiento-detalle', 'VisitaTratamientoController@exportExcelDetalle')->name('admin.visita_tratamiento.show.excel');
    //Reporte 12 meses
    Route::get('reporte/visita-tratamiento', 'ReporteVisitaTratamientoController@reporte')->name('admin.visita_tratamiento.reporte'); 
    ///*****************************************************************************************//

    //Sesion
    Route::get('sesion', 'SesionController@index')->name('admin.sesion.index');
    Route::get('sesion/show','SesionController@show')->name('admin.sesion.show');

    //Excel distrito
    Route::get('sesion-list', 'SesionController@exportExcel')->name('admin.sesion.excel');
    //Excel microred
    Route::get('sesion-microred', 'SesionController@exportExcelMicrored')->name('admin.sesion.excel.microred');
    //Excel establecimineto
    Route::get('sesion-establecimiento', 'SesionController@exportExcelEstablecimiento')->name('admin.sesion.excel.establecimiento');
    //Excel detalle sesion
    Route::get('sesion-detalle', 'SesionController@exportExcelDetalle')->name('admin.sesion.show.excel');
    //Reporte sesion
    Route::get('reporte/sesion', 'ReporteSesionController@reporte')->name('admin.sesion.reporte'); 
    ///*****************************************************************************************//
    
    
    
    
    
    
    
    
    //Reporte
    Route::get('reporte/{paciente}', 'ReporteController@show')->name('admin.reporte.show'); 
    
    //Procedimientos
    Route::get('diagnostico/{paciente}', 'DiagnosticoController@show')->name('admin.diagnostico.show'); 
    
    //Procedimientos
    Route::get('procedimientos/{paciente}', 'ProcedimientoController@show')->name('admin.procedimiento.show'); 
    
    //Insumos
    Route::get('insumo/{paciente}', 'InsumosController@show')->name('admin.insumo.show'); 
    
    //Medicinas
    Route::get('medicina', 'MedicinaController@index')->name('admin.medicina');
    Route::get('medicina/{paciente}', 'MedicinaController@show')->name('admin.medicina.show');


    //Paciente SIS
    Route::get('pacientesis', 'PacientesisController@index')->name('admin.pacientesis');
 
    //Paciente
    Route::get('paciente/{paciente}', 'PacienteController@show')->name('admin.paciente.show');
    Route::get('paciente', 'PacienteController@index')->name('admin.paciente');
    //Route::resource('paciente','PacienteController');    


    Route::get('/', 'AdminController@index')->name('admin.home');
    //Fecha de actualizacion
    Route::get('/', 'FechaController@index')->name('admin.home.index');

});

Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();


