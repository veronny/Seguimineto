@extends('adminlte::page') @section('title', 'Seguimiento SALUD') @section('content_header')
<h1>Panel de Control</h1>
@stop @section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">HIERRO EN GOTAS 4 MESES</span>
                <span class="info-box-number">1,500 niños aprox.</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 90%"></div>
                </div>
                <span class="progress-description">
          Meta Regional del 90%
        </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">TRATAMIENTO DE ANEMIA 12 MESES</span>
                <span class="info-box-number">1,250 niños aprox.</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
          Meta Regional del 70%
        </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">INDICADOR DE GESTANTE</span>
                <span class="info-box-number">1,800 gestantes aprox.</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                </div>
                <span class="progress-description">
          Meta Regional del 50%
        </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- /.col -->
</div>
@stop