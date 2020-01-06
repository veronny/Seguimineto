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
                <label class="btn btn-sm btn-primary 5e0fb4efa5e27-filter-btn active" title="Cribado">
                    <input type="checkbox"><i class="fa fa-filter"></i><span class="hidden-xs"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">&nbsp;&nbsp;Seleccione Filtros</font></font></span>
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
                    <li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Provincia</font></font></a></li>
                    <li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Distrito</font></font></a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Red</font></font></a></li>
                    <li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Microred</font></font></a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Establecimiento</font></font></a></li>
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
    <!-- PROVINCIA -->
    <div class="box-header with-border" id="filter-box">
        <form action="#" class="form-horizontal" pjax-container="" method="get">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8"></div>
                    <div class="box-body">
                        <div class="fields-group">
                            <div class="form form-inline">
                                <div class="col-sm-2">
                                    <select name="anno" class="form-control dynamic anno" id="anno">     
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select name="mes" class="form-control dynamic mes" id="mes">
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select name="provincia" class="form-control dynamic provincia">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- /.box-body -->  
        <div class="box-footer">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="btn-group pull-left">              
                                <button class="btn btn-success submit btn-sm">
                                    <i class="fa fa-search"></i>  Buscar
                                </button>
                            </div>
                            <div class="btn-group pull-left " style="margin-left: 10px;">
                                <a href="#" class="btn btn-default btn-sm">
                                <i class="fa fa-undo"></i>  Cerrar
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        </form>
    </div>
      



    <!-- /.box-header -->
    <!-- box-body -->
    <div class="box-body">
        <div class="box-body table-responsive no-padding">
            <a class="product-title">Padron de Niños</a>
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
        Desarrollado por: Veronny Morales Castillo
    </div>
    <!-- box-footer -->
</div>
<!-- /.box -->
@stop

@section('js')
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
        });
</script>
@stop