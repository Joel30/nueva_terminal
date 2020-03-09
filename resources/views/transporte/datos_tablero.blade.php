
@foreach($transportes as $transporte)
    <tr>
        <td>{{ $transporte->departamento->nombre }}</td>
        <td>{{ $transporte->empresa->nombre }}</td>
        <td>{{ $transporte->carril->anden }}</td>
        <td>{{ $transporte->carril->carril }}</td>
        <td>{{ $transporte->hora }}</td>
        <td>{{ $transporte->estado }}</td>
        <td>{{ $transporte->llegada_salida == 1 ? 'Llegada' : 'Salida'}}</td>
    </tr>
@endforeach