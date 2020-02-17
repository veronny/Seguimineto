@extends('adminlte::page') @section('title', 'Inicio') @section('content_header')
<h1>Niñ@s de 8 meses que iniciaron tratamiento con hierro o suplementacion preventiva</h1>

<ol class="breadcrumb ">
    <li><a href="">Principal</a></a>
    </li>
    <li><a href="">8 Meses que inician</a>
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
            <div class="btn-group" style="margin-right: 5px">
                {{ Form::open(['route' => 'admin.inicio.show','method' => 'GET', 'class' => 'form-inline pull-left' ]) }}
                <div class="input-group input-group-sm" style="display: inline-block;">
                    <input type="text" name="dni" class="form-control grid-quick-search" style="width: 200px;" value="" placeholder="Ingrese de Nro DNI">
                    <div class="input-group-btn" style="display: inline-block;">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
                {{ Form::close()}}
            </div>
            <!-- Botton de Nombre-->
            <div class="btn-group" style="margin-right: 5px">
                {{ Form::open(['route' => 'admin.inicio.show','method' => 'GET', 'class' => 'form-inline pull-left' ]) }}
                <div class="input-group input-group-sm" style="display: inline-block;">
                    <input type="text" name="nombre" class="form-control grid-quick-search" style="width: 200px;" value="" placeholder="Nombre Apellidos y Nombres">
                    <div class="input-group-btn" style="display: inline-block;">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
                {{ Form::close()}}
            </div>
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
            {{ Form::open(['route' => 'admin.inicio.show','method' => 'GET', 'class' => 'form-inline pull-left' ]) }}
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
                                <select name="provincia" class="form-control dynamic provincia" id="provicia">
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
            {{ Form::open(['route' => 'admin.inicio.show','method' => 'GET', 'class' => 'form-inline pull-left' ]) }}
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
                                <select name="distrito" class="form-control dynamic distrito" id="distrito">
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
            {{ Form::open(['route' => 'admin.inicio.show','method' => 'GET', 'class' => 'form-inline pull-left' ]) }}
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
                                <select name="red" class="form-control dynamic red" id="red">
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
            {{ Form::open(['route' => 'admin.inicio.show','method' => 'GET', 'class' => 'form-inline pull-left' ]) }}
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
            {{ Form::open(['route' => 'admin.inicio.show','method' => 'GET', 'class' => 'form-inline pull-left' ]) }}
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
                                <select name="establecimiento" class="form-control dynamic establecimiento">
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
    <!-- EXPORTAR -->
    <div class="box-header with-border">
        <div class="pull-right">
            {{ Form::open(['route' => 'admin.inicio.show.excel','method' => 'GET', 'class' => 'form-inline pull-left' ]) }}
            <div class="form-group">
                <input name="e_anno" id="e_anno" value="@foreach($e_anno as $a){{ $a->ANNO }}@endforeach" style="visibility:hidden;width:1px;" />
            </div>
            <div class="form-group">
                <input name="e_mes" id="e_mes" value="@foreach($e_mes as $m){{ $m->MES }}@endforeach" style="visibility:hidden;width:1px;" />
            </div>
            <div class="form-group">
                <input name="e_provincia" id="e_provincia" value="@foreach($e_provincia as $p){{ $p->PROVINCIA }}@endforeach" style="visibility:hidden;width:1px;" />
            </div>
            <div class="form-group">
                <input name="e_distrito" id="e_distrito" value="@foreach($e_distrito as $d){{ $d->DISTRITO }}@endforeach" style="visibility:hidden;width:1px;" />
            </div>
            <div class="form-group">
                <input name="e_red" id="e_red" value="@foreach($e_red as $r){{ $r->NOMBRE_RED }}@endforeach" style="visibility:hidden;width:1px;" />
            </div>
            <div class="form-group">
                <input name="e_microred" id="e_microred" value="@foreach($e_microred as $mr){{ $mr->NOMBRE_MICRORED }}@endforeach" style="visibility:hidden;width:1px;" />
            </div>
            <div class="form-group">
                <input name="e_establecimiento" id="e_establecimiento" value="@foreach($e_establecimiento as $e){{ $e->Nombre_EESS_atencion }}@endforeach" style="visibility:hidden;width:1px;" />
            </div>
            <div class="btn-group pull-right" style="margin-right: 10px">
                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-download"></i> Exportar Excel
                    </button>
                </div>
            </div>
            {{ Form::close()}}
        </div>
        <!-- PDF NO CUMPLEN -->
        <div class="pull-right">
            {{ Form::open(['route' => 'admin.inicio.reporte','method' => 'GET', 'class' => 'form-inline pull-left' ]) }}
            <div class="form-group">
                <input name="e_anno" id="e_anno" value="@foreach($e_anno as $a){{ $a->ANNO }}@endforeach" style="visibility:hidden;width:1px;" />
            </div>
            <div class="form-group">
                <input name="e_mes" id="e_mes" value="@foreach($e_mes as $m){{ $m->MES }}@endforeach" style="visibility:hidden;width:1px;" />
            </div>
            <div class="form-group">
                <input name="e_provincia" id="e_provincia" value="@foreach($e_provincia as $p){{ $p->PROVINCIA }}@endforeach" style="visibility:hidden;width:1px;" />
            </div>
            <div class="form-group">
                <input name="e_distrito" id="e_distrito" value="@foreach($e_distrito as $d){{ $d->DISTRITO }}@endforeach" style="visibility:hidden;width:1px;" />
            </div>
            <div class="form-group">
                <input name="e_red" id="e_red" value="@foreach($e_red as $r){{ $r->NOMBRE_RED }}@endforeach" style="visibility:hidden;width:1px;" />
            </div>
            <div class="form-group">
                <input name="e_microred" id="e_microred" value="@foreach($e_microred as $mr){{ $mr->NOMBRE_MICRORED }}@endforeach" style="visibility:hidden;width:1px;" />
            </div>
            <div class="form-group">
                <input name="e_establecimiento" id="e_establecimiento" value="@foreach($e_establecimiento as $e){{ $e->Nombre_EESS_atencion }}@endforeach" style="visibility:hidden;width:1px;" />
            </div>
            <div class="btn-group pull-right" style="margin-right: 10px">
                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fa fa-file-pdf-o"></i>  No Cumplen
                    </button>
                </div>
            </div>
            {{ Form::close()}}
        </div>

    </div>

    <!-- Tabla Provincia -->
    <div class="box-body" style="display: block;">
        <div class="box-body table-responsive no-padding">
            <table id="dt_indicador" class="table table-striped table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th width="20px">DNI</th>
                        <th>Nombre Niño</th>
                        <th>F. Nac</th>
                        <th>F. Inicio</th>
                        <th><font color="#2E8B57">Tamizaje</th>
                        <th><font color="#2E8B57">D Tam</th>
                        <th><font color="#4272A6">Suplemento</th>
                        <th><font color="#4272A6">D Suple</th>
                        <th><font color="#CD5C5C">Dx Anemia</th>
                        <th><font color="#CD5C5C">D Dx</th>
                        <th><font color="#708090">Tratamien</th>
                        <th><font color="#708090">D Tx</th>
                        <th>Fecha Fin</th>
                        <th>Indicador</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($t_inicio as $s)
                    <tr>
                        <td>
                            <font color="#4682B4">{{ $s->DNI_MENOR }}</font>
                        </td>
                        <td>
                            <font color="#4682B4">{{ $s->NOMBRE_COMPLETO }}</font>
                        </td>
                        <td>
                            <font color="#4682B4">{{ $s->Fecha_Nacimiento }}</font>
                        </td>
                        <td class="text-yellow">{{ date('d-m-Y', strtotime($s->Fecha_inicio)) }}</td>
                        <!-- Tamizaje --> 
                        @if($s->Fecha_tamizaje != null)
                        <td class="text-green">{{ date('d-m-Y', strtotime($s->Fecha_tamizaje)) }}</td>
                        @else
                        <td class="text-green">{{ $s->Fecha_tamizaje }}</td>
                        @endif

                        @if($s->edad_dias_tamizaje >= 0 && $s->edad_dias_tamizaje <=275)
                        <td><font color="#008000">{{ $s->edad_dias_tamizaje }}</font></td>
                        @else
                        <td><font color="#FF0000">{{ $s->edad_dias_tamizaje }}</font></td>
                        @endif  

                        <!-- 1 Suplem -->
                        @if($s->Fecha_su != null)
                        <td class="text-green">{{ date('d-m-Y', strtotime($s->Fecha_su)) }}</td>
                        @else
                        <td class="text-green">{{ $s->Fecha_su }}</td>
                        @endif

                        @if($s->edad_dias_su >= 0 && $s->edad_dias_su <=7)
                        <td><font color="#008000">{{ $s->edad_dias_su }}</font></td>
                        @else
                        <td><font color="#FF0000">{{ $s->edad_dias_su }}</font></td>
                        @endif
                                                                
                        <!-- Diagnostico -->
                        @if($s->Fecha_anemia != null)
                        <td class="text-green">{{ date('d-m-Y', strtotime($s->Fecha_anemia)) }}</td>
                        @else
                        <td class="text-green">{{ $s->Fecha_anemia }}</td>
                        @endif
                        
                        @if($s->edad_dias_anemia >= 0 && $s->edad_dias_anemia <=7)
                        <td><font color="#008000">{{ $s->edad_dias_anemia }}</font></td>
                        @else
                        <td><font color="#FF0000">{{ $s->edad_dias_anemia }}</font></td>
                        @endif    
                        
                        <!-- 1 Tramamiento -->
                        @if($s->Fecha_tx != null)
                        <td class="text-green">{{ date('d-m-Y', strtotime($s->Fecha_tx)) }}</td>
                        @else
                        <td class="text-green">{{ $s->Fecha_tx }}</td>
                        @endif
                        
                        @if($s->edad_dias_tx >= 0 && $s->edad_dias_tx <=7)
                        <td><font color="#008000">{{ $s->edad_dias_tx }}</font></td>
                        @else
                        <td><font color="#FF0000">{{ $s->edad_dias_tx }}</font></td>
                        @endif
                                                
                        <td class="text-yellow">{{ date('d-m-Y', strtotime($s->Fecha_fin)) }}</td>
                                               
                        @if($s->DNI_cumple_HIS >= 1)
                        <td><span class="label label-success">Cumple</span></td>
                        @else
                        <td><span class="label label-danger">No Cumple</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <font color="#4682B4">Desarrollado por: </font><em>Veronny Jhony Morales Castillo</em>
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
        $('#dt_indicador').DataTable({
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "Todos"]
            ],
            "fixedHeader": true,
            "order": [
                [12, "asc"]
            ],
            "language": {
                "info": "_TOTAL_ registros",
                "search": "Buscar",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior",
                },
                "lengthMenu": 'Ver <select>' +
                    '<option value="10">10</option>' +
                    '<option value="25">25</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">Todos</option>' +
                    '</select> registros',
                "loadingRecords": "Cargando...",
                "processing": "Procesando",
                "emptyTable": "No hay datos",
                "zeroRecords": "No hay conincidencias",
                "infoEmpty": "",
                "infoFiltered": "",
            }
        });
    });
</script>
@stop