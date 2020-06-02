<?php $i = 0;?>
@foreach($viajes as $viaje)
@if($i == 0)
    <tr style="background-color:#3c5ea5; border: hidden" class="p-0">
    <?php $i = 1;?>
    @else
    <tr style="background-color:#2e3069; border: hidden" class="p-0">
    <?php $i = 0;?>
@endif
        
    @switch($viaje->estado)
        @case('retrasado')
            <td class=" py-1">
                <div class="px-1" style="background-color:#2f2a52; color:#ffc300">
                    {{ $viaje->transporte->departamento->destino }}
                </div>
            </td>
            <td class="py-1">{{ $viaje->transporte->bus->empresa->nombre }}</td>
            <td class="text-center py-1">{{ $viaje->transporte->carril->anden }}</td>
            <td class="text-center py-1">{{ $viaje->transporte->carril->carril }}</td>
            <td class="text-center py-1">{{ $viaje->hora }}</td>
            <td class="text-center  py-1">
                <div style="background-color:#2f2a52; color:#ffc300">{{ $viaje->estado }}</div>
            </td>
            <td class="text-center  py-1">
                <div style="background-color:#2f2a52; color:#fff">{{ $viaje->llegada_salida }}</div>
            </td>
            @break

        @case('cancelado')
            <td class=" py-1">
                <div class="px-1" style="background-color:#2f2a52; color:#f00">
                    {{ $viaje->transporte->departamento->destino }}
                </div>
            </td>
            <td class="py-1">{{ $viaje->transporte->bus->empresa->nombre }}</td>
            <td class="text-center py-1">{{ $viaje->transporte->carril->anden }}</td>
            <td class="text-center py-1">{{ $viaje->transporte->carril->carril }}</td>
            <td class="text-center py-1">{{ $viaje->hora }}</td>
            <td class="text-center py-1">
                <div style="background-color:#2f2a52; color:#f00">{{ $viaje->estado }}</div>
            </td>
            <td class="text-center  py-1">
                <div style="background-color:#2f2a52; color:#fff">{{ $viaje->llegada_salida }}</div>
            </td>
            @break
        
        @case('llegado')
            <td class=" py-1">
                <div class="px-1" style="background-color:#2f2a52; color:#0f0">
                    {{ $viaje->transporte->departamento->destino }}
                </div>
            </td>
            <td class="py-1">{{ $viaje->transporte->bus->empresa->nombre }}</td>
            <td class="text-center py-1">{{ $viaje->transporte->carril->anden }}</td>
            <td class="text-center py-1">{{ $viaje->transporte->carril->carril }}</td>
            <td class="text-center py-1">{{ $viaje->hora }}</td>
            <td class="text-center py-1">
                <div style="background-color:#2f2a52; color:#0f0">Arribado</div>
            </td>
            <td class="text-center  py-1">
                <div style="background-color:#2f2a52; color:#fff">{{ $viaje->llegada_salida }}</div>
            </td>
            @break

        @default
            <td class=" py-1">
                <div class="px-1" style="background-color:#2f2a52; color:#fff">
                    {{ $viaje->transporte->departamento->destino }}
                </div>
            </td>
            <td class="py-1">{{ $viaje->transporte->bus->empresa->nombre }}</td>
            <td class="text-center py-1">{{ $viaje->transporte->carril->anden }}</td>
            <td class="text-center py-1">{{ $viaje->transporte->carril->carril }}</td>
            <td class="text-center py-1">{{ $viaje->hora }}</td>
            <td class="text-center py-1">
                <div style="background-color:#2f2a52; color:#fff">{{ $viaje->estado }}</div>
            </td>
            <td class="text-center  py-1">
                <div style="background-color:#2f2a52; color:#fff">{{ $viaje->llegada_salida }}</div>
            </td>
            @break
    @endswitch

    </tr>
@endforeach