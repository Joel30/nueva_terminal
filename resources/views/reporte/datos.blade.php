<div class="alert alert-info" role="alert">
    @if ($viajes->fecha != null)
        @if($viajes->fecha_fin != null)
            <b style="text-transform: capitalize;"> {{$viajes->fecha.' - '.$viajes->fecha_fin}} </b>
        @else
            <b style="text-transform: capitalize;"> {{$viajes->fecha}} </b>
        @endif
    @else
        <b style="text-transform: capitalize;"> {{$viajes->fecha_fin}} </b>
    @endif
</div>
    
<div style="overflow-x:auto;">
    <table class="table table-striped">
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
                <td>{{ $viaje->transporte->departamento->destino }}</td>
                <td>{{ $viaje->transporte->empresa->nombre }}</td>
                <td>{{ $viaje->transporte->carril->anden }}</td>
                <td>{{ $viaje->transporte->carril->carril }}</td>
                <td>{{ $viaje->transporte->bus->tipo_bus }}</td>
                <td>{{ $viaje->fecha }}</td>
                <td>{{ $viaje->hora }}</td>
                <td>{{ $viaje->estado }}</td>
                <td>{{ $viaje->llegada_salida == 1 ? 'Llegada' : 'Salida'}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>  