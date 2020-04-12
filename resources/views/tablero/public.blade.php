<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('ample/bootstrap/bootstrap.min.css')}}" crossorigin="anonymous">
</head>
<body>
    <div style="overflow-x:auto;">
        <table class="table table-striped">
            <thead class="th-dark">
                <tr>
                    <th>#</th>
                    <th>Destino</th>
                    <th>Empresa de Transporte</th>
                    <th>Teléfono</th>
                    <th>Anden</th>
                    <th>Carril</th>
                    <th>Bus</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estado</th>
                    <th>salida/llegada</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody >
            <?php $cont = 1; ?>
            @foreach($viajes as $viaje)
                <tr>
                    <td><b>{{ $cont++ }}</b></td>
                    <td>{{ $viaje->transporte->departamento->nombre }}</td>
                    <td>{{ $viaje->transporte->empresa->nombre }}</td>
                    <td>{{ $viaje->transporte->empresa->telefono }}</td>
                    <td>{{ $viaje->transporte->carril->anden }}</td>
                    <td>{{ $viaje->transporte->carril->carril }}</td>
                    <td>{{ $viaje->transporte->bus->tipo_bus }}</td>
                    <td>{{ $viaje->fecha }}</td>
                    <td>{{ $viaje->hora }}</td>
                    <td>{{ $viaje->estado }}</td>
                    <td>{{ $viaje->llegada_salida == 1 ? 'Llegada' : 'Salida'}}</td>

                    <td>
                        <div class="row justify-content-start">
                            <div class="col-4">
                                <a href="{{route('viaje.editar', $viaje)}}"><input type=image src="{{asset('images/edit.png')}}" width="20" height="20" title="Editar"></a>

                            </div>
                            <div class="col-4">
                                <form action="{{route('viaje.eliminar', $viaje)}}" method="POST">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}

                                    <input type=image src="{{asset('images/delete.png')}}" width="20" height="20" onclick="return confirm('Esta seguro de eliminar el viaje con id: {{ $viaje->id}}')" title="Eliminar">
                                </form>
                            </div>
                        </div>                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>  
</body>
</html>