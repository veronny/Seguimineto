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
        <a class="product-title">Filtros</a>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="20px">CODIGO</th>
                            <th>DESCRIPCION</th>
                            <th>TIPO</th>
                        </tr>
                    </thead>
                    <tbody>
 
                    </tbody>
                </table>
            </div>
        <div class="box-tools pull-right">
            <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Volver</a>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <!-- box-body -->
    <div class="box-body">
        <div class="box-body table-responsive no-padding">
            <a class="product-title">Medicamentos</a>
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th width="20px">SISMED</th>
                        <th>NOMBRE (Denom,Conc,Pres,FF)</th>
                        <th>PRES</th>
                        <th>ENTR</th>
                        <th>DX</th>
                        <th colspan="2">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        Desarrollado por: Veronny Morales
    </div>
    <!-- box-footer -->
</div>
<!-- /.box -->
@stop