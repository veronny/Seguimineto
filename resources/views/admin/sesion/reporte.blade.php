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
    <h4><em>REPORTE SESIONES DEMOSTRATIVAS QUE NO CUMPLEN EL INDICADOR</em></h4>
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
                        <th>Fecha Sesion</th>
                        <th>Edad Sesion</th>
                        <th>Fecha Fin</th>
                        <th>Indicador</th>
                        <th>Nombre EESS</th>
                        <th>Distrito</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($t_sesion as $s)
                    <tr>
                        <td>
                            {{ $s->DNI_MENOR }}</font>
                        </td>
                        <td>
                            {{ $s->NOMBRE_COMPLETO }}</font>
                        </td>
                        <td>
                            {{ $s->Fecha_Nacimiento }}</font>
                        </td>
                        <td class="text-yellow">{{ date('d-m-Y', strtotime($s->Fecha_inicio)) }}</td>
                        <!-- 1ra fecha sesion --> 
                        @if($s->Fecha_HIS != null)
                        <td class="text-green">{{ date('d-m-Y', strtotime($s->Fecha_HIS)) }}</td>
                        @else
                        <td class="text-green">{{ $s->Fecha_HIS }}</td>
                        @endif

                        @if($s->edad_dias_HIS >= 0 && $s->edad_dias_HIS <=256)
                        <td>{{ $s->edad_dias_HIS }}</font></td>
                        @else
                        <td>{{ $s->edad_dias_HIS }}</font></td>
                        @endif  
                                                                           
                        <td class="text-yellow">{{ date('d-m-Y', strtotime($s->Fecha_fin)) }}</td>
                                               
                        @if($s->DNI_cumple_HIS >= 1)
                        <td><span class="label label-success">Cumple</span></td>
                        @else
                        <td><span class="label label-danger">No Cumple</td>
                        @endif

                        <td>{{ $s->Nombre_EESS_atencion }}</td>
                        <td>{{ $s->DISTRITO }}</td>
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