@extends('adminlte::page') @section('title', 'Paciente') @section('content_header')
<h1>Niñas y Niños que cumplen 130 dias de edad, que han recibido gotas con hierro</h1>
<ol class="breadcrumb" style="margin-right: 30px;">
    <li><a href="#">Principal</a></li>
    <li><a href="#">AP ENDIS</a></li>
    <li><a href="#">Hierro en Gotas a 4 meses</a></li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <div class="box-tools">                       
                        {{ Form::open(['route' => 'admin.sulfato.index','method' => 'GET', 'class' => 'form-inline pull-right' ]) }}
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
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i>  Consultar
                                </button>
                            </div>
                        {{ Form::close()}}         
                    </div>
                </h3>
            </div>                
        </div>
    </div>

    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <div class="box-tools">
                        <td width="10px">
                            <a href="{{ route('admin.sulfato.show') }}" class="btn btn-warning">
                                <i class="fa fa-users"></i> Informacion Nominal</a>
                        </td>
                    </div>
                </h3>
            <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Avance Regional</h3>
                    <div class="box-tools pull-right"></div>
            <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0;top:0"></div></div></div>
                <canvas id="region" style="width: 100%; display: block;" width="507" height="253" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Avance por provincia</h3>
                    <div class="box-tools pull-right">
                    <!-- modal grafico -->
                        <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalProv">
                            <i class="fa fa-bar-chart"></i> Grafico Estadistico
                        </button>
                                                                      
                        <div class="modal fade" id="myModalProv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Cerrar</span>
                                        </button>
                                        <h4 class="provincia" id="myModalLabel">Grafico Avance</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class='modal-body1'>
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                                <canvas id="provincia" style="width: 100%; display: block;" width="1000" height="500" class="chartjs-render-monitor"></canvas>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
                <div class="box-body table-responsive no-padding">
                    <table id="prov" class="table table-hover">
                        <thead>
                            <tr>
                                <th>PROVINCIA</th>
                                <th>NIÑOS</th>
                                <th>CUMPLEN</th>
                                <th>%</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($provincia as $provin)
                            <tr>
                                <td><font color="#4682B4">{{ $provin->PROVINCIA }}</font></td>
                                <td>{{ $provin->NUM }}</td>
                                <td>{{ $provin->DEN }}</td>
                                @if($provin->PORCENTAJE <= 90)         
                                    <td><font color="#FF0000">{{ $provin->PORCENTAJE }}</font></td>         
                                @else
                                    <td><font color="#008000">{{ $provin->PORCENTAJE }}</font></td>          
                                @endif                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Avance por Distritos</h3>
                    <div class="box-tools pull-right">
                        {{ Form::open(['route' => 'admin.sulfato.excel','method' => 'GET', 'class' => 'form-inline pull-right' ]) }}
                        <div class="form-group">                                
                            <input name="r_anno" id="r_anno" value="@foreach($r_anno as $r){{ $r->ANNO }}@endforeach" style="visibility:hidden;width:1px;heigth:1px" />
                        </div>
                        <div class="form-group">
                            <input name="r_mes" id="r_mes" value="@foreach($r_mes as $m){{ $m->MES }}@endforeach" style="visibility:hidden;width:1px;heigth:1px" />
                        </div>
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fa fa-file-excel-o"></i> Descargar
                            </button>                           
                        </div>
                        {{ Form::close()}} 
                        <!-- /.box-tools -->
                    </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
                <div class="box-body table-responsive no-padding">
                    <table id="distrito" class="table table-hover">
                        <thead>
                            <tr>
                                <th>DISTRITO</th>
                                <th>NIÑOS</th>
                                <th>CUMPLEN</th>
                                <th>%</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($distrito as $d)
                            <tr>
                                <td><font color="#4682B4">{{ $d->DISTRITO }}</font></td>
                                <td>{{ $d->NUM }}</td>
                                <td>{{ $d->DEN }}</td>
                                @if($d->PORCENTAJE <= 90)         
                                    <td><font color="#FF0000">{{ $d->PORCENTAJE }}</font></td>         
                                @else
                                    <td><font color="#008000">{{ $d->PORCENTAJE }}</font></td>          
                                @endif                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
            <!-- /.Tabla de distritos-->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Avance por redes de Salud</h3>
                    <div class="box-tools pull-right">
                    <!-- modal grafico -->
                        <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalRedes">
                            <i class="fa fa-bar-chart"></i> Grafico Estadistico
                        </button>
                                                                      
                        <div class="modal fade" id="myModalRedes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Cerrar</span>
                                        </button>
                                        <h4 class="redes" id="myModalLabel">Grafico Avance</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class='modal-body1Redes'>
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                                <canvas id="redes" style="width: 100%; display: block;" width="6000" height="5000" class="chartjs-render-monitor"></canvas>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
                <div class="box-body table-responsive no-padding">
                    <table id="redes" class="table table-hover">
                        <thead>
                            <tr>
                                <th>REDES</th>
                                <th>NIÑOS</th>
                                <th>CUMPLEN</th>
                                <th>%</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($redes as $re)
                            <tr>
                                <td><font color="#4682B4">{{ $re->NOMBRE_RED }}</font></td>
                                <td>{{ $re->NUM }}</td>
                                <td>{{ $re->DEN }}</td>
                                @if($re->PORCENTAJE <= 90)         
                                    <td><font color="#FF0000">{{ $re->PORCENTAJE }}</font></td>         
                                @else
                                    <td><font color="#008000">{{ $re->PORCENTAJE }}</font></td>          
                                @endif                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

    <div class="col-md-4">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Avance por Micro Redes</h3>
                    <div class="box-tools pull-right">
                        {{ Form::open(['route' => 'admin.sulfato.excel.microred','method' => 'GET', 'class' => 'form-inline pull-right' ]) }}
                        <div class="form-group">                                
                            <input name="r_anno" id="r_anno" value="@foreach($r_anno as $r){{ $r->ANNO }}@endforeach" style="visibility:hidden;width:1px;heigth:1px" />
                        </div>
                        <div class="form-group">
                            <input name="r_mes" id="r_mes" value="@foreach($r_mes as $m){{ $m->MES }}@endforeach" style="visibility:hidden;width:1px;heigth:1px" />
                        </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fa fa-file-excel-o"></i> Descargar
                            </button>                           
                        </div>
                        {{ Form::close()}} 
                    </div>
            <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
                <div class="box-body table-responsive no-padding">
                    <table id="microred" class="table table-hover">
                        <thead>
                            <tr>
                                <th>MICRORED</th>
                                <th>NIÑOS</th>
                                <th>CUMPLEN</th>
                                <th>%</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($microred as $mr)
                            <tr>
                                <td><font color="#4682B4">{{ $mr->NOMBRE_MICRORED }}</font></td>
                                <td>{{ $mr->NUM }}</td>
                                <td>{{ $mr->DEN }}</td>
                                @if($mr->PORCENTAJE <= 90)         
                                    <td><font color="#FF0000">{{ $mr->PORCENTAJE }}</font></td>         
                                @else
                                    <td><font color="#008000">{{ $mr->PORCENTAJE }}</font></td>          
                                @endif                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

    <div class="col-md-4">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Avance por Establecimientos</h3>
                    <div class="box-tools pull-right">
                        <div class="box-tools pull-right">
                            {{ Form::open(['route' => 'admin.sulfato.excel.establecimiento','method' => 'GET', 'class' => 'form-inline pull-right' ]) }}
                            <div class="form-group">                                
                                <input name="r_anno" id="r_anno" value="@foreach($r_anno as $r){{ $r->ANNO }}@endforeach" style="visibility:hidden;width:1px;heigth:1px" />
                            </div>
                            <div class="form-group">
                                <input name="r_mes" id="r_mes" value="@foreach($r_mes as $m){{ $m->MES }}@endforeach" style="visibility:hidden;width:1px;heigth:1px" />
                            </div>
                                <div class="form-group">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-file-excel-o"></i> Descargar
                                </button>                           
                            </div>
                            {{ Form::close()}} 
                        </div>
                    </div>
            <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
                <div class="box-body table-responsive no-padding">
                    <table id="establecimiento" class="table table-hover">
                        <thead>
                            <tr>
                                <th>ESTABLEC</th>
                                <th>NIÑOS</th>
                                <th>CUMPLEN</th>
                                <th>%</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($establecimiento as $e)
                            <tr>
                                <td><font color="#4682B4">{{ $e->Nombre_EESS_atencion }}</font></td>
                                <td>{{ $e->NUM }}</td>
                                <td>{{ $e->DEN }}</td>
                                @if($e->PORCENTAJE <= 90)         
                                    <td><font color="#FF0000">{{ $e->PORCENTAJE }}</font></td>         
                                @else
                                    <td><font color="#008000">{{ $e->PORCENTAJE }}</font></td>          
                                @endif                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
@stop

@section('js')
<script type="text/javascript">   
    $(document).ready(function() {
        $('#distrito').DataTable({  
            "lengthMenu": [[6, 25, 50, -1], [6, 25, 50, "Todos"]],
            "language": {
                "info": "_TOTAL_ registros",
                "search":"Buscar",
                "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior",
                },
                "lengthMenu": 'Ver <select>'+
                                '<option value="6">6</option>'+
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

<script type="text/javascript">   
    $(document).ready(function() {
        $('#microred').DataTable({  
            "lengthMenu": [[8, 25, 50, -1], [8, 25, 50, "Todos"]],
            "language": {
                "info": "_TOTAL_ registros",
                "search":"Buscar",
                "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior",
                },
                "lengthMenu": 'Ver <select>'+
                                '<option value="8">8</option>'+
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

<script type="text/javascript">   
    $(document).ready(function() {
        $('#establecimiento').DataTable({  
            "lengthMenu": [[8, 25, 50, -1], [8, 25, 50, "Todos"]],
            "language": {
                "info": "_TOTAL_ registros",
                "search":"Buscar",
                "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior",
                },
                "lengthMenu": 'Ver <select>'+
                                '<option value="8">8</option>'+
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

<script type="text/javascript">
    $(document).ready(function() {
        $(".modalProv").on("hidden.bs.modal", function() {
            $(".modal-body1Prov").html("ss Where did he go?!?!?!");
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".modalRedes").on("hidden.bs.modal", function() {
            $(".modal-body1Redes").html("Recagafar pafonoWhere did he go?!?!?!");
        });
    });
</script>


<script type="text/javascript">
// Select año y mes
    $(document).ready(function() {
        $('.anno').select2({
            dropdownAutoWidth: true
        });
        $('.mes').select2({
            dropdownAutoWidth: true
        });
    });
</script>

<script type="text/javascript">
// Grafico por region
var ctx = document.getElementById("region");    
var regionnum = <?php echo $regionnum; ?>;
var regionden = <?php echo $regionden; ?>;

var myChart = new Chart(ctx, {  
    type: 'doughnut',
    data: {
        labels: ["Avance","Faltantes"],
        datasets: [{
            data: [regionnum,regionden],         
            backgroundColor: [ 
                        'rgb(75, 192, 192)', //green
                        'rgb(201, 203, 207)' // grey
            ],
            borderColor: [
                        'rgb(75, 192, 192)', //green
                        'rgb(201, 203, 207)' // grey
            ],
            borderWidth: 2
        }]
    },
    options: {
        rotation: 1 * Math.PI,
        circumference: 1 * Math.PI,
        percentageInnerCutout: 40,
        legend: {
            display: false,
        },
    },
});

// Grafico por provincia
$(function () {
    function randomScalingFactor() {
    return Math.floor(Math.random() * 100)
    }

    window.chartColors = {
        red   : 'rgb(255, 99, 132)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green : 'rgb(75, 192, 192)',
        blue  : 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey  : 'rgb(201, 203, 207)'
    };
    
    var data_prov = <?php echo $prov; ?>;
    var prov_num = <?php echo $prov_num; ?>;
    var prov_den = <?php echo $prov_den; ?>;
    var barChartData = {
        labels: data_prov,
        datasets:[
                {
                    label: 'Niños que Cumplen',
                    stack: 'Stack 0',
                    borderColor: window.chartColors.green,
                    backgroundColor: window.chartColors.green,
                    borderWidth: 2,
                    data: prov_den
                },
                {
                    label: 'Cantidad de Niños',
                    stack: 'Stack 0',
                    borderColor: window.chartColors.grey,
                    borderWidth: 2,
                    data: prov_num
                },
                ],        
    };

    var ctx = document.getElementById('provincia').getContext('2d');
    new Chart(ctx, {
                    type: 'bar',
                    data: barChartData,
                    options: {
                                responsive: true,
                                legend: {
                                        position: 'top',
                                        },
                                title: {
                                        display: false,
                                        },
                                legend: {
                                        display: false,
                                    },
                                scales: {
                                        yAxes: [{
                                            ticks:{
                                                fontSize: 8,
                                                gridLines: {
                                                            display: false,
                                                            }
                                                }
                                            }],
                                        xAxes: [{
                                            ticks:{
                                                fontSize: 6,
                                                gridLines: {
                                                            display: false,
                                                            }
                                                }
                                            }],
                                        },
                    }
             });
});    

// Grafico por redes
$(function () {
    function randomScalingFactor() {
    return Math.floor(Math.random() * 100)
    }

    window.chartColors = {
        red   : 'rgb(255, 99, 132)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green : 'rgb(75, 192, 192)',
        blue  : 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey  : 'rgb(201, 203, 207)'
    };
    
    var data_red = <?php echo $red; ?>;
    var red_num = <?php echo $red_num; ?>;
    var red_den = <?php echo $red_den; ?>;
    var barChartData = {
        labels: data_red,
        datasets:[
                {
                    label: 'Niños que Cumplen',
                    stack: 'Stack 0',
                    borderColor: window.chartColors.green,
                    backgroundColor: window.chartColors.green,
                    borderWidth: 2,
                    data: red_den
                },
                {
                    label: 'Cantidad de Niños',
                    stack: 'Stack 0',
                    borderColor: window.chartColors.grey,
                    borderWidth: 2,
                    data: red_num
                },
                ]         
    };

    var ctx = document.getElementById('redes').getContext('2d');
    new Chart(ctx, {
                    type: 'bar',
                    data: barChartData,
                    options: {
                                responsive: true,
                                legend: {
                                        position: 'top',
                                        },
                                title: {
                                        display: false,
                                        },
                                legend: {
                                        display: false,
                                },
                                scales: {
                                        yAxes: [{
                                                ticks:{
                                                    fontSize: 8,
                                                    gridLines: {
                                                                display: false,
                                                               }
                                                    }
                                                }],
                                        xAxes: [{
                                                ticks:{
                                                    fontSize: 4,
                                                    gridLines: {
                                                                display: false,
                                                                }
                                                }
                                                }],
                                            },
                    }
            });
});    
</script>
@stop