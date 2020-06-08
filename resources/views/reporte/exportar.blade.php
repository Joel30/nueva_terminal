<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }

        thead {
            background-color: #1d96b2;
            color: #fff;
            
        }

        th, td {
            text-align: center;
            padding: 10px 0px 10px 0px;
            font-size:14px
        }

        tr:nth-child(even) {
            background-color: #f0f5fc;
        }
    </style>
    
<body>
    <div>
        <table >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Destino</th>
                    <th>Empresa de Transporte</th>
                    <th>Anden</th>
                    <th>Carril</th>
                    <th>Tipo de Bus</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estado</th>
                    <th>salida / llegada</th>
                </tr>
            </thead>
                <tbody>
                <?php $cont = 1; ?>
                @foreach($viajes as $viaje)
                <tr>
                    <td style="padding:0px 4px"><b>{{ $cont++ }}</b></td>
                    <td style="text-align: left;">{{ array_get($viaje->departamento,'destino','') }}</td>
                    <td style="text-align: left;">{{ array_get($viaje->empresa,'nombre','') }}</td>
                    <td>{{ array_get($viaje->carril,'anden','') }}</td>
                    <td>{{ array_get($viaje->carril,'carril','') }}</td>
                    <td>{{ array_get($viaje->bus,'tipo_bus','') }}</td>
                    <td>{{ Carbon\Carbon::parse($viaje->fecha)->format('d/m/Y')}}</td>
                    <td>{{ Carbon\Carbon::parse($viaje->hora)->format('H:i') }}</td>
                    <td>{{ $viaje->estado }}</td>
                    <td>{{ $viaje->llegada_salida }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>