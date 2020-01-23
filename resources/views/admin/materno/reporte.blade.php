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
    <h4><em>REPORTE PAQUETE GESTANTE QUE NO CUMPLEN EL INDICADOR</em></h4>
    <!-- Tabla Provincia -->
    <div class="box-body" style="display: block;">
        <div class="box-body table-responsive no-padding">
            <table class="table table-striped table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th width="20px">DNI</th>
                        <th>Nombre Madre</th>
                        <th>Gest</th>
                        <th>F. Parto</th>
                        <th>Acido Folico</th>
                        <th>1er Trimestre</th>
                        <th>Hemoglo</th>
                        <th>Orina</th>
                        <th>Sifilis</th>
                        <th>VIH</th>
                        <th>Perfil</th>
                        <th>2do Trimestre</th>
                        <th>Cant Ate.</th>
                        <th>Cant Suple</th>
                        <th>INDICADOR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($t_materno as $s)
                    <tr>
                        <td>{{ $s->Documento }}</td>
                        <td>{{ $s->NOMBRE_COMPLETO }}</td>
                        <td>{{ $s->Gestacion }}</td>
                        <td>{{ date('d-m-Y', strtotime($s->Fecha_parto)) }}</td>   
                        <td>{{ $s->cumple_acido_folico }}</td>                  
                        <td>{{ date('d-m-Y', strtotime($s->Fecha_Primer_Trimestre)) }}</td>
                        <td>{{ $s->cumple_hemoglobina}}</td>
                        <td>{{ $s->cumple_exam_orina }}</td>
                        <td>{{ $s->cumple_prueba_sifilis }}</td>
                        <td>{{ $s->cumple_pueba_VIH }}</td>
                        <td>{{ $s->cumple_perfil_obstetrico }}</td>
                        <td>{{ date('d-m-Y', strtotime($s->Fecha_Segundo_Trimestre)) }}</td>
                        <td>{{ $s->cantidad_atenciones }}</td>
                        <td>{{ $s->cantidad_suplemento }}</td>
                        <td>{{ $s->DNI_cumple_gestante }}</td>
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