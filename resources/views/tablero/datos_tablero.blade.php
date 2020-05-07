<?php $i = 0;?>
@foreach($viajes as $viaje)
@if($i == 0)
    <tr style="background-color:#3c5ea5;" class="p-0">
    <?php $i = 1;?>
    @else
    <tr style="background-color:#2e3069;" class="p-0">
    <?php $i = 0;?>
@endif
        <td class="py-1">{{ $viaje->transporte->departamento->destino }}</td>
        <td class="py-1">{{ $viaje->transporte->empresa->nombre }}</td>
        <td class="text-center py-1">{{ $viaje->transporte->carril->anden }}</td>
        <td class="text-center py-1">{{ $viaje->transporte->carril->carril }}</td>
        <td class="text-center py-1">{{ $viaje->hora }}</td>
      
        @switch($viaje->estado)
            @case('retrasado')
                <td class="text-center  py-1"><div style="background-color:#2f2a52; color:#ffc300">{{ $viaje->estado }}</div></td>
                @break

            @case('cancelado')
                <td class="text-center py-1"><div style="background-color:#2f2a52; color:#f00">{{ $viaje->estado }}</div></td>
                @break
            
            @case('llegado')
                <td class="text-center py-1"><div style="background-color:#2f2a52; color:#0f0">Arribado</div></td>
                @break

            @default
                <td class="text-center py-1"><div style="background-color:#2f2a52; color:#fff">{{ $viaje->estado }}</div></td>
                @break
        @endswitch
        
        @switch($viaje->llegada_salida)
                @case(1)
                    <td class="text-center  py-1"><div style="background-color:#2f2a52; color:#fff">Llegada</div></td>
                    @break

                @case(0)
                    <td class="text-center py-1"><div style="background-color:#2f2a52; color:#fff">Salida</div></td>
                    @break
            @endswitch
    
    </tr>
@endforeach