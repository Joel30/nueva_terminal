@extends('layouts.app')

@section('title')
    REPORTES
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Reportes</li>
@endsection

@section('content')
<div id="buscador" class="mb-3 row justify-content-end">
    <div class="col col-sm-8 col-md-6 col-lg-4">
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <label class="input-group-text input-color1" for="fecha" id="buscar" onclick="buscar()"><i class="fa fa-search"></i></label>
            </div>
            <input type="month" class="form-control borde" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="fecha">
            <div class="input-group-append">
                <button class="btn btn-outline-info fa fa-plus py-0 ml-0" onclick="dos()"></button> 
            </div> 
        </div>
    </div>
</div>

<div id="resultados">
    <table class="table table-striped" id="nt_table">
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
        @if(isset($viajes))
            <?php $cont = 1; ?>
            @foreach($viajes as $viaje)
            
            <tr>
                <td><b>{{ $cont++ }}</b></td>
                <td>{{ $viaje->transporte->departamento->destino }}</td>
                <td>{{ $viaje->transporte->bus->empresa->nombre }}</td>
                <td>{{ $viaje->transporte->carril->anden }}</td>
                <td>{{ $viaje->transporte->carril->carril }}</td>
                <td>{{ $viaje->transporte->bus->tipo_bus }}</td>
                <td>{{ $viaje->fecha }}</td>
                <td>{{ $viaje->hora }}</td>
                <td>{{ $viaje->estado }}</td>
                <td>{{ $viaje->llegada_salida == 1 ? 'Llegada' : 'Salida'}}</td>

            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
    <script>

        function buscar(){
            var fecha = document.getElementById("fecha");
            var fecha_fin = document.getElementById("fecha-fin");
            if(fecha !== null && fecha_fin !== null){
                if (fecha.value == "") {
                    if (fecha_fin.value == ""){
                        console.log("fecha y fecha_fin sin valor");
                    } else {
                        //console.log("fecha sin valor, fecha fin con valor");
                        fetch(`{{route('reporte.buscar')}}?fecha_fin=${fecha_fin.value}`,{method:'get'})
                            .then(response  =>  response.text() )
                            .then(html      =>  {document.getElementById("resultados").innerHTML = html});
                    }
                } else {
                    if (fecha_fin.value == ""){
                        //console.log("fech con valor, fecha_fin sin valor");
                        fetch(`{{route('reporte.buscar')}}?fecha=${fecha.value}`,{method:'get'})
                            .then(response  =>  response.text() )
                            .then(html      =>  {document.getElementById("resultados").innerHTML = html});
                    } else {
                        //console.log("fecha y fecha_fin con valor");
                        fetch(`{{route('reporte.buscar')}}?fecha=${fecha.value}&fecha_fin=${fecha_fin.value}`,{ method:'get'})
                            .then(response  =>  response.text() )
                            .then(html      =>  {document.getElementById("resultados").innerHTML = html});
                    }
                }
                
            } else {
                if (fecha.value == "") {
                    console.log('fecha sin valor');
                } else {
                    //console.log('fecha con valor');
                    fetch(`{{route('reporte.buscar')}}?fecha=${fecha.value}`,{method:'get'})
                            .then(response  =>  response.text() )
                            .then(html      =>  {document.getElementById("resultados").innerHTML = html});
                }
            }
            //prueba();
            
        }
        
        function uno(){
            document.getElementById("buscador").innerHTML =`<div class="col col-sm-8 col-md-6 col-lg-4">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <label class="input-group-text input-color1" for="fecha" onclick="buscar()"><i class="fa fa-search"></i></label>
                    </div>
                    <input type="month" class="form-control borde" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="fecha">
                    <div class="input-group-append">
                        <button class="btn btn-outline-info fa fa-plus py-0 ml-0" onclick="dos()"></button> 
                    </div> 
                </div>
            </div>`; 
        }
        function dos(){
            document.getElementById("buscador").innerHTML = `<div class="col col-sm-8 col-md-7 col-lg-5">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <label class="input-group-text input-color1" for="fecha" onclick="buscar()"><i class="fa fa-search"></i></label>
                    </div>
                    <input type="date" class="form-control borde" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="fecha">
                    <input type="date" class="form-control borde" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{date('Y-m-d')}}" id="fecha-fin">
                    <div class="input-group-append">
                        <button class="btn btn-outline-info fa fa-chevron-left py-0 ml-0" onclick="uno()"></button> 
                    </div> 
                </div>
            </div>`;
        }
    </script>
@endsection