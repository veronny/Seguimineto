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
        <em><font color="gray">Fecha del reporte: {{ $date }}</font></em>
    </div>
    <h4><em>DIRECCION REGIONAL DE SALUD JUNIN</em></h4>
</head>

<body>
    <h4><em>REPORTE 8 MESES QUE VISITAS DOMICILIARIAS NO CUMPLEN EL INDICADOR</em></h4>
    <!-- Tabla Provincia -->
    <div class="box-body" style="display: block;">
        <div class="box-body table-responsive no-padding">
            <table class="table table-striped table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th width="20px">DNI</th>
                        <th>Nombre Niño</th>
                        <th>F. Nac</th>
                        <th>F. Inicio</th>
                        <th>1ra visita</th>
                        <th>Edad 1v</th>
                        <th>2da visita</th>
                        <th>Edad 2v</th>
                        <th>Fecha Fin</th>
                        <th>Indicador</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($t_visita_tratamiento as $s)
                    <tr>
                        <td>{{ $s->DNI_MENOR }}</td>
                        <td>{{ $s->NOMBRE_COMPLETO }}</td>
                        <td>{{ $s->Fecha_Nacimiento }}</td>
                        <td>{{ date('d-m-Y', strtotime($s->Fecha_inicio)) }}</td>                  
                        
                        @if($s->Fecha_1v != null)
                        <td>{{ date('d-m-Y', strtotime($s->Fecha_1v)) }}</td>
                        @else
                        <td>{{ $s->Fecha_1v }}</td>
                        @endif
                        <td>{{ $s->edad_dias_1v}}</td>
                        
                        @if($s->Fecha_2v != null)
                        <td>{{ date('d-m-Y', strtotime($s->Fecha_2v)) }}</td>
                        @else
                        <td>{{ $s->Fecha_2v }}</td>
                        @endif
                        <td>{{ $s->edad_dias_2v }}</td>
                        
                        <td>{{ date('d-m-Y', strtotime($s->Fecha_fin)) }}</td>
                        <td>{{ $s->DNI_cumple_HIS }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
    <footer style="text-align: left;font-size: x-small;">
        <br>
        <em><font color="gray">Copyright © 2020 -- Developer Veronny --</font></em>
    </footer>
</body>

</html>