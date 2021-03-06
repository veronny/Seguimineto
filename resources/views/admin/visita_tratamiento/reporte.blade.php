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
                        <th>Diagnostico</th>
                        <th>Edad Dx</th>
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
                        <!-- Diagnostico de anemia --> 
                        @if($s->Fecha_dx != null)
                        <td class="text-green">{{ date('d-m-Y', strtotime($s->Fecha_dx)) }}</td>
                        @else
                        <td class="text-green">{{ $s->Fecha_dx }}</td>
                        @endif

                        @if($s->edad_dias_dx >= 0 && $s->edad_dias_dx <=225)
                        <td>{{ $s->edad_dias_dx }}</font></td>
                        @else
                        <td>{{ $s->edad_dias_dx }}</font></td>
                        @endif  
                        
                        <!-- 1ra fecha visita --> 
                        @if($s->Fecha_1v != null)
                        <td class="text-green">{{ date('d-m-Y', strtotime($s->Fecha_1v)) }}</td>
                        @else
                        <td class="text-green">{{ $s->Fecha_1v }}</td>
                        @endif

                        @if($s->edad_dias_1v >= 0 && $s->edad_dias_1v <=149)
                        <td>{{ $s->edad_dias_1v }}</font></td>
                        @else
                        <td>{{ $s->edad_dias_1v }}</font></td>
                        @endif  

                        <!-- 2da fecha visita -->
                        @if($s->Fecha_2v != null)
                        <td class="text-green">{{ date('d-m-Y', strtotime($s->Fecha_2v)) }}</td>
                        @else
                        <td class="text-green">{{ $s->Fecha_2v }}</td>
                        @endif

                        @if($s->edad_dias_2v >= 151 && $s->edad_dias_2v <=179)
                        <td>{{ $s->edad_dias_2v }}</font></td>
                        @else
                        <td>{{ $s->edad_dias_2v }}</font></td>
                        @endif
                                                                            
                        <td class="text-yellow">{{ date('d-m-Y', strtotime($s->Fecha_fin)) }}</td>
                                               
                        @if($s->DNI_cumple_HIS >= 1)
                        <td><span class="label label-success">Cumple</span></td>
                        @else
                        <td><span class="label label-danger">No Cumple</td>
                        @endif
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