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
        border: 1px solid #ddd;
        }

        th, td {
        text-align: center;
        padding: 16px 0;
        }

        tr:nth-child(even) {
        background-color: #f2f2f2;
        }
    </style>
<body>
    <div id="resultados">
        <table >
            <thead class="th-dark">
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
                    <th>salida/llegada</th>
                </tr>
            </thead>
                <tbody>
                <?php $cont = 1; ?>
                @foreach($viajes as $viaje)
                <tr>
                    <td><b>{{ $cont++ }}</b></td>
                    <td>{{ array_get($viaje->departamento,'destino','') }}</td>
                    <td>{{ array_get($viaje->empresa,'nombre','') }}</td>
                    <td>{{ array_get($viaje->carril,'anden','') }}</td>
                    <td>{{ array_get($viaje->carril,'carril','') }}</td>
                    <td>{{ array_get($viaje->bus,'tipo_bus','') }}</td>
                    <td>{{ $viaje->fecha }}</td>
                    <td>{{ $viaje->hora }}</td>
                    <td>{{ $viaje->estado }}</td>
                    <td>{{ $viaje->llegada_salida }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
</body>
</html>