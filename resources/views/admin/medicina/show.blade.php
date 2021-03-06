@extends('adminlte::page') @section('title', 'Paciente') @section('content_header')
<h1>Medicamentos</h1>

<ol class="breadcrumb ">
    <li><a href="">Principal</a></a>
    </li>
    <li><a href="">Medicamentos de Paciente</a></a>
    </li>
</ol>
@stop @section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <a class="product-title">Diagnosticos</a>
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
                        @foreach($diagnosticos as $d)
                        <tr>
                            <td>{{ $d->CodigoCIE2004 }}</td>
                            <td>{{ $d->Descripcion }}</td>
                            <td>{{ $d->DescripcionTipoDx }}</td>
                        </tr>
                        @endforeach
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
                    @foreach($medicinas as $m)
                    @if ( $m->TipoProducto == 0)
                    <tr>
                        <td>{{ $m->Codigo }}</td>
                        <td>{{ $m->Nombre }}</td>
                        <td>{{ $m->Cantidad }}</td>
                        <td>{{ $m->SISDiagnostico }}</td>
                        <td>{{ $m->SISDiagnostico }}</td>
                        <td width="10px">
                            <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Editar</a>
                        </td>
                        <td width="10px">
                            <a href="#"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
                        </td>
                    </tr>
                    @else
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        Desarrollado por: Unidad de Sistemas e Informatica
    </div>
    <!-- box-footer -->
</div>
<!-- /.box -->
@stop