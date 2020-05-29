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
                <td>{{ array_get($viaje->departamento,'destino','') }}</td>
                <td>{{ array_get($viaje->bus['empresa'],'nombre','') }}</td>
                <td>{{ array_get($viaje->carril,'anden','') }}</td>
                <td>{{ array_get($viaje->carril,'carril','') }}</td>
                <td>{{ array_get($viaje->bus,'tipo_bus','') }}</td>
                <td>{{ $viaje->fecha }}</td>
                <td>{{ $viaje->hora }}</td>
                <td>{{ $viaje->estado }}</td>
                <td>{{ $viaje->llegada_salida }}</td>

            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>

<script>
    function buscar(){
        var fecha = document.getElementById("fecha");
        var fecha_inicio = document.getElementById("fecha-inicio");
        var fecha_fin = document.getElementById("fecha-fin");

        fecha = fecha != null ? fecha.value : 0;
        fecha_inicio = fecha_inicio != null ? fecha_inicio.value :  0; 
        fecha_fin = fecha_fin != null ? fecha_fin.value :  0; 

        fecha = fecha === "" ? 0: fecha;
        fecha_inicio = fecha_inicio === "" ? 0 : fecha_inicio; 
        fecha_fin = fecha_fin === "" ? 0 : fecha_fin; 

        if (fecha != 0 || fecha_inicio != 0  || fecha_fin != 0) {
            if(my_data_table!=""){
                my_data_table.destroy();
            }
            my_data_table = $('#nt_table').DataTable( {
                "processing": true,
                "serverSide": true,
                language: language_es,
                ajax:{
                    url : `{{route('reporte.buscar')}}?fecha=${fecha}&fecha_inicio=${fecha_inicio}&fecha_fin=${fecha_fin}`,
                },
                "columns": [
                    {data: 'id'},
                    {data: 'departamento.destino'},
                    {data: 'empresa.nombre'},
                    {data: 'carril.anden'},
                    {data: 'carril.carril'},
                    {data: 'bus.tipo_bus'},
                    {data: 'fecha'},
                    {data: 'hora'},
                    {data: 'estado'},
                    {data:  'llegada_salida'}
                ]            
            });
            $('#nt_table').parent().css('overflow-x', 'auto');
            $('#nt_table_info').addClass("text-info"); 
        }
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
                    <label class="input-group-text input-color1" for="fecha-inicio" onclick="buscar()"><i class="fa fa-search"></i></label>
                </div>
                <input type="date" class="form-control borde" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="fecha-inicio">
                <input type="date" class="form-control borde" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{date('Y-m-d')}}" id="fecha-fin">
                <div class="input-group-append">
                    <button class="btn btn-outline-info fa fa-chevron-left py-0 ml-0" onclick="uno()"></button> 
                </div> 
            </div>
        </div>`;
    }
</script>
@endsection