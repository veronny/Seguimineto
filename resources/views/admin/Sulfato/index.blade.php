@extends('adminlte::page') @section('title', 'Paciente') @section('content_header')
<h1>Niñas y Niños que cumplen 130 dias de edad en el mes de evaluacion, que han recibido gotas con hierro</h1>
<ol class="breadcrumb" style="margin-right: 30px;">
    <li><a href="#">Principal</a></li>
    <li><a href="#">AP ENDIS</a></li>
    <li><a href="#">Hierro en Gotas a 4 meses</a></li>
</ol>

    <div class="row">
        <div class="col-md-12">
            <h4 style="background-color:#D3D3D3; font-size: 18px; text-align: left; padding: 7px 10px; margin-top: 0;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-success">
                    Informacion Nominal
                </button>
            </h4>
        </div>
    </div>
@stop

@section('content')

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
            <div class="box-body" style="display: block;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0;top:0"></div></div></div>
                <canvas id="provincia" style="width: 100%; display: block;" width="507" height="253" class="chartjs-render-monitor"></canvas>
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
                <h3 class="box-title">Distritos</h3>
                    <div class="box-tools pull-right"></div>
            <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                <canvas id="canvas" style="width: 100%; display: block;" width="507" height="253" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.box-body -->
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

@section('adminlte_js')
<script>
//Grafico por region
var ctx = document.getElementById("region");
    var myChart = new Chart(ctx, {

    type: 'doughnut',
    data: {
        labels: ["Avance","Faltantes"],
        datasets: [{
          //  label: '# de niños que cumplen',
            data: ['80','20'],
            backgroundColor: [ 
                      //  'rgba(255,99,132,1)', //red
                        'rgb(75, 192, 192)', //green
                        'rgb(201, 203, 207)' // grey
            ],
            borderColor: [
                     //   'rgba(255,99,132,1)', //red
                        'rgb(75, 192, 192)', //green
                        'rgb(201, 203, 207)' // grey
            ],
            borderWidth: 1
        }]
    },
    options: {
        rotation: 1 * Math.PI,
        circumference: 1 * Math.PI,
        legend: {
            display: false,
            labels:{
                fontSize: 5,
            }
        },
    }
});
//Grafico por provincia
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
    
    var barChartData = {
        labels: <?php echo json_encode($Provincia); ?>,
        datasets: [{
                    label: 'Cantidad de Niños',
                    borderColor: window.chartColors.green,
                    borderWidth: 1,
                    data: <?php echo json_encode($Data_p); ?>
                }]
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
                                        labels:{
                                                fontSize: 10,
                                            }
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
//Grafico por redes
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
    
    var barChartData = {
        labels: <?php echo json_encode($Redes); ?>,
        datasets: [{
                    label:'Cantidad de Niños',      
                    borderColor: window.chartColors.green,
                    borderWidth: 1,
                    data: <?php echo json_encode($Data_red); ?>
                }]
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

</script>

@stop