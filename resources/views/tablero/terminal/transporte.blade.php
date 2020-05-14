<div style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr class="text-uppercase">
                    <!-- <th>#</th> -->
                    <th>Destino</th>
                    <th>Empresa de Transporte</th>
                    <th>Teléfono</th>
                    <th>Anden</th>
                    <th>Carril</th>
                    <th>Bus</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody >
            <?php $cont = 1; ?>
            @foreach($transportes as $transporte)
                <tr>
                    <!-- <td><b>{{ $cont++ }}</b></td> -->
                    <td>{{ $transporte->departamento->destino }}</td>
                    <td>{{ $transporte->bus->empresa->nombre }}</td>
                    <td>{{ $transporte->bus->empresa->telefono }}</td>
                    <td>{{ $transporte->carril->anden }}</td>
                    <td>{{ $transporte->carril->carril }}</td>
                    <td>{{ $transporte->bus->tipo_bus }}</td>
                    <td>{{ $transporte->hora }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>  