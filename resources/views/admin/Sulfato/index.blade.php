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
                        {{ Form::open(['route' => 'admin.sulfato','method' => 'GET', 'class' => 'form-inline pull-right' ]) }}
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
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
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
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-success">
                        Informacion Nominal
                    </button>  
                </div>
                </h3>
            <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="box">
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

    <div class="col-md-5">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Avance por provincias de Junin</h3>
                    <div class="box-tools pull-right"></div>
            <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
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
            <!-- /.box-body -->
        </div>
    </div>

    <div class="col-md-5">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Avance por redes de Salud</h3>
                    <div class="box-tools pull-right"></div>
            <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                <canvas id="redes" style="width: 100%; display: block;" width="507" height="253" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Avance por Distritos</h3>
                    <div class="box-tools pull-right">
                        {{ Form::open(['route' => 'admin.sulfato.excel','method' => 'GET', 'class' => 'form-inline pull-right' ]) }}
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
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fa fa-file-excel-o"></i> Descargar</a>
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

    <div class="col-md-4">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Micro Redes</h3>
                    <div class="box-tools pull-right"></div>
            <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                <canvas id="scatter" style="width: 100%; display: block;" width="507" height="253" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

    <div class="col-md-4">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Establecimientos</h3>
                    <div class="box-tools pull-right"></div>
            <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                <canvas id="line" style="width: 100%; display: block;" width="507" height="253" class="chartjs-render-monitor"></canvas>
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
            "language": {
                "info": "_TOTAL_ registros",
                "search":"Buscar",
                "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior",
                },
                "lengthMenu": 'Ver <select>'+
                                '<option value="10">10</option>'+
                                '<option value="30">30</option>'+
                                '<option value="124">124</option>'+
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
                                        display: true,
                                        },
                                legend: {
                                        display: false,
                                    },
                                scales: {
                                        yAxes: [{
                                                ticks:{
                                                        fontSize: 10,
                                                        gridLines: {
                                                                    display: false,
                                                                    }
                                                }
                                            }],
                                        xAxes: [{
                                            ticks:{
                                                fontSize: 8,
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
                    type: 'horizontalBar',
                    data: barChartData,
                    options: {
                                responsive: true,
                                legend: {
                                        position: 'top',
                                        },
                                title: {
                                        display: true,
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
                                                    fontSize: 10,
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