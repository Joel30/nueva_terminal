<?php $cont = 1; ?>
@foreach($transportes as $transporte)
<?php 
    if(!isset($nombre)){
        $nombre = null;
    } else {
        $buscar = strtolower($nombre);
        $nombre_empresa = strtolower($transporte->empresa->nombre);
    }
 
?>
@if ( $nombre == null || strpos($nombre_empresa, $buscar) !== false)
    <tr>
        <td><b>{{ $cont++ }}</b></td>
        <td>{{ $transporte->departamento->nombre }}</td>
        <td>{{ $transporte->empresa->nombre }}</td>
        <td>{{ $transporte->empresa->telefono }}</td>
        <td>{{ $transporte->carril->anden }}</td>
        <td>{{ $transporte->carril->carril }}</td>
        <td>{{ $transporte->bus->tipo_bus }}</td>

        <td>
            <!-- <div class="row justify-content-start">
                <div class="col-4"> -->
                    <a href="{{route('transporte.editar', $transporte)}}" class="float-left pr-4"><input type=image src="{{asset('images/edit.png')}}" width="20" height="20" title="Editar"></a>

                <!-- </div>
                <div class="col-4"> -->
                    <form action="{{route('transporte.eliminar', $transporte)}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}

                        <input type=image src="{{asset('images/delete.png')}}" width="20" height="20" onclick="return confirm('Esta seguro de eliminar el Transporte con id: {{ $transporte->id}}')" title="Eliminar">
                    </form>
                <!-- </div>
            </div>  -->                       
        </td>
    </tr>
@endif
@endforeach