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

});

Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();


