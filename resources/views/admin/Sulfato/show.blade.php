@extends('adminlte::page') @section('title', 'Paciente') @section('content_header')
<h1>Nominal Niñas y Niños que cumplen 130 dias de edad, que han recibido gotas con hierro</h1>

<ol class="breadcrumb ">
    <li><a href="">Principal</a></a>
    </li>
    <li><a href="">Hierro en Gotas a 4 meses</a>
    </li>
</ol>
@stop @section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="pull-left">
            <!-- Button con nombre-->
            <div class="btn-group" style="margin-right: 5px" data-toggle="buttons">
                <label class="btn btn-sm btn-primary btn-filter active" title="Cribado">
                    <input type="checkbox"><i class="fa fa-filter"></i><span class="hidden-xs"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">  Seleccione Filtros</font></font></span>
                </label>
                <!-- button de lista desplegable -->
                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                        <span class="sr-only">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Desplegar alternar</font></font> 
                        </span>
                </button>
                <!-- Lista desplegable -->
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="#" class="btn-filter-btn">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Provincia</font>
                            </font>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="btn-filter-distrito">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Distrito</font>
                            </font>
                        </a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="#" class="btn-filter-red">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Red</font>
                            </font>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="btn-filter-microred">
                            <font style=" vertical-align: inherit; ">
                                <font style="vertical-align: inherit; ">Microred</font>
                            </font>
                        </a>
                    </li>
                    <li role="separator " class="divider "></li>
                    <li>
                        <a href="# " class="btn-filter-establecimiento">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Establecimiento</font>
                            </font>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Botton de DNI-->
            <form action="#" pjax-container="" style="display: inline-block;">
                <div class="input-group input-group-sm" style="display: inline-block;">
                    <input type="text" name="__search__" class="form-control grid-quick-search" style="width: 200px;" value="" placeholder="Ingrese de Nro DNI">
                    <div class="input-group-btn" style="display: inline-block;">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
            </form>
            <!-- Botton de Nombre-->
            <form action="#" pjax-container="" style="display: inline-block;">
                <div class="input-group input-group-sm" style="display: inline-block;">
                    <input type="text" name="__search__" class="form-control grid-quick-search" style="width: 200px;" value="" placeholder="Nombre Apellidos y Nombres">
                    <div class="input-group-btn" style="display: inline-block;">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Botton para volver -->
        <div class="box-tools pull-right">
            <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Volver</a>
        </div>
        <!-- /.box-tools -->
    </div>
    <div class="box-header with-border">
        <!-- PROVINCIA -->
        <div id="filter-box">
            {{ Form::open(['route' => 'admin.sulfato.show','method' => 'GET', 'class' => 'form-inline pull-left' ]) }}
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8"></div>
                    <div class="box-body">
                        <div class="fields-group">
                            <div class="form-group">
                                <select name="anno" class="form-control dynamic anno" id="anno">
                                        @foreach($m_anno as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option> 
                                        @endforeach      
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="mes" class="form-control dynamic mes" id="mes">
                                        @foreach($m_mes as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option> 
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <select name="provincia" class="form-control dynamic provincia">
                                    <option>-- Seleccione provincia --</option>    
                                    @foreach($provincia as $key => $value)
                                            <option value="{{ $value }}">{{ $value }}</option> 
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-12">
                                    <div class="btn-group pull-left">
                                        <button class="btn btn-success submit btn-sm">
                                            <i class="fa fa-search"></i>  Buscar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close()}}
        </div>

        <!-- DISTRITO -->
        <div id="filter-distrito">
            {{ Form::open(['route' => 'admin.sulfato.show','method' => 'GET', 'class' => 'form-inline pull-left' ]) }}
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8"></div>
                    <div class="box-body">
                        <div class="fields-group">
                            <div class="form-group">
                                <select name="anno" class="form-control dynamic anno" id="anno">
                                        @foreach($m_anno as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option> 
                                        @endforeach      
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="mes" class="form-control dynamic mes" id="mes">
                                        @foreach($m_mes as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option> 
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="distrito" class="form-control dynamic distrito">
                                    <option>-- Seleccione distrito --</option>
                                        @foreach($distrito as $key => $value)
                                            <option value="{{ $value }}">{{ $value }}</option> 
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-12">
                                    <div class="btn-group pull-left">
                                        <button class="btn btn-success submit btn-sm">
                                            <i class="fa fa-search"></i>  Buscar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close()}}
        </div>

        <!-- RED -->
        <div id="filter-red">
            {{ Form::open(['route' => 'admin.sulfato.show','method' => 'GET', 'class' => 'form-inline pull-left' ]) }}
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8"></div>
                    <div class="box-body">
                        <div class="fields-group">
                            <div class="form-group">
                                <select name="anno" class="form-control dynamic anno" id="anno">
                                        @foreach($m_anno as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option> 
                                        @endforeach      
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="mes" class="form-control dynamic mes" id="mes">
                                        @foreach($m_mes as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option> 
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="red" class="form-control dynamic red">
                                    <option>-- Seleccione Red --</option>
                                        @foreach($red as $key => $value)
                                            <option value="{{ $value }}">{{ $value }}</option> 
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-12">
                                    <div class="btn-group pull-left">
                                        <button class="btn btn-success submit btn-sm">
                                            <i class="fa fa-search"></i>  Buscar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close()}}
        </div>

        <!-- MICRO RED -->
        <div id="filter-microred">
            {{ Form::open(['route' => 'admin.sulfato.show','method' => 'GET', 'class' => 'form-inline pull-left' ]) }}
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8"></div>
                    <div class="box-body">
                        <div class="fields-group">
                            <div class="form-group">
                                <select name="anno" class="form-control dynamic anno" id="anno">
                                        @foreach($m_anno as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option> 
                                        @endforeach      
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="mes" class="form-control dynamic mes" id="mes">
                                        @foreach($m_mes as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option> 
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="microred" class="form-control dynamic microred" id="microred">
                                    <option>-- Seleccione Micro Red --</option>
                                        @foreach($microred as $key => $value)
                                            <option value="{{ $value }}">{{ $value }}</option> 
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-12">
                                    <div class="btn-group pull-left">
                                        <button class="btn btn-success submit btn-sm">
                                            <i class="fa fa-search"></i>  Buscar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close()}}
        </div>

        <!-- ESTABLECIMIENTO -->
        <div id="filter-establecimiento">
            {{ Form::open(['route' => 'admin.sulfato.show','method' => 'GET', 'class' => 'form-inline pull-left' ]) }}
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8"></div>
                    <div class="box-body">
                        <div class="fields-group">
                            <div class="form-group">
                                <select name="anno" class="form-control dynamic anno" id="anno">
                                        @foreach($m_anno as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option> 
                                        @endforeach      
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="mes" class="form-control dynamic mes" id="mes">
                                        @foreach($m_mes as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option> 
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="red" class="form-control dynamic establecimiento">
                                        <option>-- Seleccione establecimiento --</option>
                                        @foreach($establecimiento as $key => $value)
                                            <option value="{{ $value }}">{{ $value }}</option> 
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-12">
                                    <div class="btn-group pull-left">
                                        <button class="btn btn-success submit btn-sm">
                                            <i class="fa fa-search"></i>  Buscar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close()}}
        </div>
    </div>
    <!-- /.box-header -->

    <!-- Tabla Provincia -->
    <div class="box-body" style="display: block;">
        <div class="box-body table-responsive no-padding">
            <table id="dt_provincia" class="table table-striped table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th width="20px">DNI</th>
                        <th>NOMBRE DEL NIÑO</th>
                        <th>FECHA NAC</th>
                        <th>RANGO INICIO</th>
                        <th>FECHA ATE</th>
                        <th>EDAD ATE</th>
                        <th>RANGO FINAL</th>
                        <th>INDICADOR</th>
                        <th>TIPO SEGURO</th>
                        <th>DISTRITO</th>
                        <th>ESTABLECIMIENTO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($t_provincia as $provin)
                        <tr>
                            <td><font color="#4682B4">{{ $provin->DNI_NINIO }}</font></td>
                            <td><font color="#4682B4">{{ $provin->NOMBRE_NINIO }}</font></td>
                            <td>{{ $provin->FECHA_NAC }}</td>
                            <td><font color="#F08080">{{ date('d-m-Y', strtotime($provin->FECHA_INICIO)) }}</font></td>
                            @if($provin->DNI_cumple_HIS != null)
                                <td><font color="#2E8B57">{{ date('d-m-Y', strtotime($provin->Fecha_HIS)) }}</font></td>  
                            @else
                                <td><font color="#2E8B57">{{ $provin->Fecha_HIS }}</font></td>
                            @endif                           
                            <td><font color="#008000">{{ $provin->edad_dias_HIS }}</font></td>
                            <td><font color="#F08080">{{ date('d-m-Y', strtotime($provin->FECHA_FIN)) }}</font></td>
                            @if($provin->DNI_cumple_HIS >= 1)         
                                <td class="badge bg-green" style="font-size: 10px;">Cumple</td>         
                            @else
                                <td class="badge bg-red" style="font-size: 10px;">No Cumple</td>          
                            @endif      
                            <td>{{ $provin->TIPO_SEGURO }}</td> 
                            <td>{{ $provin->DISTRITO }}</td>
                            <td>{{ $provin->Nombre_EESS_atencion }}</td>
                        </tr>
                    @endforeach
                    <!-- Tabla Distrito -->
                    @foreach($t_distrito as $distri)
                        <tr>
                            <td><font color="#4682B4">{{ $distri->DNI_NINIO }}</font></td>
                            <td><font color="#4682B4">{{ $distri->NOMBRE_NINIO }}</font></td>
                            <td>{{ $distri->FECHA_NAC }}</td>
                            <td><font color="#F08080">{{ date('d-m-Y', strtotime($distri->FECHA_INICIO)) }}</font></td>
                            @if($distri->DNI_cumple_HIS != null)
                                <td><font color="#2E8B57">{{ date('d-m-Y', strtotime($distri->Fecha_HIS)) }}</font></td>  
                            @else
                                <td><font color="#2E8B57">{{ $distri->Fecha_HIS }}</font></td>
                            @endif                           
                            <td><font color="#008000">{{ $distri->edad_dias_HIS }}</font></td>
                            <td><font color="#F08080">{{ date('d-m-Y', strtotime($distri->FECHA_FIN)) }}</font></td>
                            @if($distri->DNI_cumple_HIS >= 1)         
                                <td class="badge bg-green" style="font-size: 10px;">Cumple</td>         
                            @else
                                <td class="badge bg-red" style="font-size: 10px;">No Cumple</td>          
                            @endif      
                            <td>{{ $distri->TIPO_SEGURO }}</td> 
                            <td>{{ $distri->DISTRITO }}</td>
                            <td>{{ $distri->Nombre_EESS_atencion }}</td>
                        </tr>
                    @endforeach
                    <!-- Tabla Red -->
                    @foreach($t_red as $re)
                        <tr>
                            <td><font color="#4682B4">{{ $re->DNI_NINIO }}</font></td>
                            <td><font color="#4682B4">{{ $re->NOMBRE_NINIO }}</font></td>
                            <td>{{ $re->FECHA_NAC }}</td>
                            <td><font color="#F08080">{{ date('d-m-Y', strtotime($re->FECHA_INICIO)) }}</font></td>
                            @if($re->DNI_cumple_HIS != null)
                                <td><font color="#2E8B57">{{ date('d-m-Y', strtotime($re->Fecha_HIS)) }}</font></td>  
                            @else
                                <td><font color="#2E8B57">{{ $re->Fecha_HIS }}</font></td>
                            @endif                           
                            <td><font color="#008000">{{ $re->edad_dias_HIS }}</font></td>
                            <td><font color="#F08080">{{ date('d-m-Y', strtotime($re->FECHA_FIN)) }}</font></td>
                            @if($re->DNI_cumple_HIS >= 1)         
                                <td class="badge bg-green" style="font-size: 10px;">Cumple</td>         
                            @else
                                <td class="badge bg-red" style="font-size: 10px;">No Cumple</td>          
                            @endif      
                            <td>{{ $re->TIPO_SEGURO }}</td> 
                            <td>{{ $re->DISTRITO }}</td>
                            <td>{{ $re->Nombre_EESS_atencion }}</td>
                        </tr>
                    @endforeach
                    <!-- Tabla Microred -->
                    @foreach($t_microred as $mi)
                    <tr>
                        <td><font color="#4682B4">{{ $mi->DNI_NINIO }}</font></td>
                        <td><font color="#4682B4">{{ $mi->NOMBRE_NINIO }}</font></td>
                        <td>{{ $mi->FECHA_NAC }}</td>
                        <td><font color="#F08080">{{ date('d-m-Y', strtotime($mi->FECHA_INICIO)) }}</font></td>
                        @if($mi->DNI_cumple_HIS != null)
                            <td><font color="#2E8B57">{{ date('d-m-Y', strtotime($mi->Fecha_HIS)) }}</font></td>  
                        @else
                            <td><font color="#2E8B57">{{ $mi->Fecha_HIS }}</font></td>
                        @endif                           
                        <td><font color="#008000">{{ $mi->edad_dias_HIS }}</font></td>
                        <td><font color="#F08080">{{ date('d-m-Y', strtotime($mi->FECHA_FIN)) }}</font></td>
                        @if($mi->DNI_cumple_HIS >= 1)         
                            <td class="badge bg-green" style="font-size: 10px;">Cumple</td>         
                        @else
                            <td class="badge bg-red" style="font-size: 10px;">No Cumple</td>          
                        @endif      
                        <td>{{ $mi->TIPO_SEGURO }}</td> 
                        <td>{{ $mi->DISTRITO }}</td>
                        <td>{{ $mi->Nombre_EESS_atencion }}</td>
                    </tr>
                    @endforeach
                    <!-- Tabla Establecimiento -->
                    @foreach($t_establec as $es)
                    <tr>
                        <td><font color="#4682B4">{{ $es->DNI_NINIO }}</font></td>
                        <td><font color="#4682B4">{{ $es->NOMBRE_NINIO }}</font></td>
                        <td>{{ $es->FECHA_NAC }}</td>
                        <td><font color="#F08080">{{ date('d-m-Y', strtotime($es->FECHA_INICIO)) }}</font></td>
                        @if($es->DNI_cumple_HIS != null)
                            <td><font color="#2E8B57">{{ date('d-m-Y', strtotime($es->Fecha_HIS)) }}</font></td>  
                        @else
                            <td><font color="#2E8B57">{{ $es->Fecha_HIS }}</font></td>
                        @endif                           
                        <td><font color="#008000">{{ $es->edad_dias_HIS }}</font></td>
                        <td><font color="#F08080">{{ date('d-m-Y', strtotime($es->FECHA_FIN)) }}</font></td>
                        @if($es->DNI_cumple_HIS >= 1)         
                            <td class="badge bg-green" style="font-size: 10px;">Cumple</td>         
                        @else
                            <td class="badge bg-red" style="font-size: 10px;">No Cumple</td>          
                        @endif      
                        <td>{{ $es->TIPO_SEGURO }}</td> 
                        <td>{{ $es->DISTRITO }}</td>
                        <td>{{ $es->Nombre_EESS_atencion }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        Desarrollado por: Veronny Morales Castillo
    </div>
    <!-- box-footer -->
</div>
<!-- /.box -->
@stop @section('js')
<script type="text/javascript">
    // Select año y mes
    $(document).ready(function() {
        $('.anno').select2({
            dropdownAutoWidth: true
        });
        $('.mes').select2({
            dropdownAutoWidth: true
        });
        $('.provincia').select2({
            dropdownAutoWidth: true
        });
        $('.distrito').select2({
            dropdownAutoWidth: true
        });
        $('.red').select2({
            dropdownAutoWidth: true
        });
        $('.microred').select2({
            dropdownAutoWidth: true
        });
        $('.establecimiento').select2({
            dropdownAutoWidth: true
        });
    });
</script>

<script type="text/javascript">
    // boton para ocular todos
    $('.btn-filter').unbind('click');
    $('.btn-filter').click(function(e) {    
        $('#filter-box').addClass('hide');
        $('#filter-distrito').addClass('hide');
        $('#filter-red').addClass('hide');
        $('#filter-microred').addClass('hide');
        $('#filter-establecimiento').addClass('hide');
    });
</script>

<script type="text/javascript">
    // boton para ocular header provincia
    $('#filter-box').addClass('hide');
    $('.btn-filter-btn').unbind('click');
    $('.btn-filter-btn').click(function(e) {
        if ($('#filter-box').is(':visible')) {
            $('#filter-box').addClass('hide');
        } else {
            $('#filter-box').removeClass('hide');
        }
    });
</script>

<script type="text/javascript">
    // boton para ocular distrito
    $('#filter-distrito').addClass('hide');
    $('.btn-filter-distrito').unbind('click');
    $('.btn-filter-distrito').click(function(e) {
        if ($('#filter-distrito').is(':visible')) {
            $('#filter-distrito').addClass('hide');
        } else {
            $('#filter-distrito').removeClass('hide');
        }
    });
</script>

<script type="text/javascript">
    // boton para ocular red
    $('#filter-red').addClass('hide');
    $('.btn-filter-red').unbind('click');
    $('.btn-filter-red').click(function(e) {
        if ($('#filter-red').is(':visible')) {
            $('#filter-red').addClass('hide');
        } else {
            $('#filter-red').removeClass('hide');
        }
    });
</script>

<script type="text/javascript">
    // boton para ocular microred
    $('#filter-microred').addClass('hide');
    $('.btn-filter-microred').unbind('click');
    $('.btn-filter-microred').click(function(e) {
        if ($('#filter-microred').is(':visible')) {
            $('#filter-microred').addClass('hide');
        } else {
            $('#filter-microred').removeClass('hide');
        }
    });
</script>

<script type="text/javascript">
    // boton para ocular establecimiento
    $('#filter-establecimiento').addClass('hide');
    $('.btn-filter-establecimiento').unbind('click');
    $('.btn-filter-establecimiento').click(function(e) {
        if ($('#filter-establecimiento').is(':visible')) {
            $('#filter-establecimiento').addClass('hide');
        } else {
            $('#filter-establecimiento').removeClass('hide');
        }
    });
</script>

<script type="text/javascript">   
    $(document).ready(function() {
        $('#dt_provincia').DataTable({  
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
            "fixedHeader": true,
            "order": [[ 6, "asc" ]],
            "language": {
                "info": "_TOTAL_ registros",
                "search":"Buscar",
                "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior",
                },
                "lengthMenu": 'Ver <select>'+
                                '<option value="10">10</option>'+
                                '<option value="25">25</option>'+
                                '<option value="50">50</option>'+
                                '<option value="-1">Todos</option>'+
                                '</select> registros',
                "loadingRecords": "Cargando...",
                "processing": "Procesando",
                "emptyTable": "No hay datos",
                "zeroRecords":"No hay conincidencias",
                "infoEmpty": "",
                "infoFiltered":"",
            }
        });
    });
</script>

@stop