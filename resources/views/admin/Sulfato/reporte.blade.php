<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: auto;
            font-size: x-small;
        }
        
        td,
        th {
            border: 0.5px solid #0f0f0f;
            text-align: center;
            padding: 1px;
            width: auto;
        }
        
        h3 {
            text-align: center;
            border: 0.1px solid #0f0f0f;
            font-size: xx-small;
            padding: 0px;
        }
        
        h4 {
            text-align: center;
            border: 0.5px solid #0f0f0f;
            font-size: x-small;
        }
        
        #medidesc {
            text-align: left;
        }
    </style>
    <div class="date" style="text-align: right;font-size: x-small;">
        Fecha del reporte: {{ $date }}
    </div>
    <h4><em>DIRECCION REGIONAL DE SALUD JUNIN</em></h4>
</head>

<body>
    <h4><em>REPORTE NOMINAL DEL NIÑOS QUE NO CUMPLEN EL INDICADOR</em></h4>
    <!-- Tabla Provincia -->
    <div class="box-body" style="display: block;">
        <div class="box-body table-responsive no-padding">
            <table class="table table-striped table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th width="20px">DNI</th>
                        <th>NOMBRE DEL NIÑO</th>
                        <th>FECHA NAC</th>
                        <th>RANGO INICIO</th>
                        <th>RANGO FINAL</th>
                        <th>SEGURO</th>
                        <th>DISTRITO</th>
                        <th>ESTABLECIMIENTO</th>
                        <th>DIRECCION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($t_sulfato as $s)
                    <tr>
                        <td>{{ $s->DNI_NINIO }}</td>
                        <td>{{ $s->NOMBRE_NINIO }}</td>
                        <td>{{ $s->FECHA_NAC }}</td>
                        <td>{{ date('d-m-Y', strtotime($s->FECHA_INICIO)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($s->FECHA_FIN)) }}</td>
                        <td>{{ $s->TIPO_SEGURO }}</td>
                        <td>{{ $s->DISTRITO }}</td>
                        <td>{{ $s->Nombre_EESS_atencion }}</td>
                        <td>{{ $s->DIRECCION }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
    <footer style="text-align: left;font-size: x-small;">
        <em>Copyright © 2020 Veronny</em>
    </footer>
</body>

</html>