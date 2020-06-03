@extends('layouts.app')

@section('title')

 
        <a id="pdf" href="{{route('export.pdf')}}?fecha_actual=true" target="_blank" class="btn btn-outline-danger btn-sm text-center">
            <i class="fa fa-file-pdf-o fa-fw"aria-hidden="true"></i>PDF
        </a>
        <a id="excel" href="{{route('export')}}?fecha_actual=true&archivo=reporte_de_viajes.xlsx" target="_blank" class="btn btn-outline-success btn-sm text-center">
            <i class="fa fa-file-excel-o fa-fw"aria-hidden="true"></i>EXCEL
        </a>
        <a id="csv" href="{{route('export')}}?fecha_actual=true&archivo=reporte_de_viajes.csv" target="_blank" class="btn btn-outline-primary btn-sm text-center">
            <i class="fa fa-file-excel-o fa-fw"aria-hidden="true"></i>CSV
        </a>
  

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Reportes</li>
@endsection

@section('content')
<div>   
    <div>
        <button class="btn btn-outline-primary btn-sm text-center mb-3 mb-md-0" onclick="buscar(1)">
            <i class="fa fa-list-alt fa-fw" aria-hidden="true"></i>Ver todos los registros
        </button>
    </div>

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
        @endif
        </tbody>
    </table>
</div>

<script>
    function buscar(val = 0){
        var fecha = document.getElementById("fecha");
        var fecha_inicio = document.getElementById("fecha-inicio");
        var fecha_fin = document.getElementById("fecha-fin");

        fecha = fecha != null ? fecha.value : 0;
        fecha_inicio = fecha_inicio != null ? fecha_inicio.value :  0; 
        fecha_fin = fecha_fin != null ? fecha_fin.value :  0; 

        fecha = fecha === "" ? 0: fecha;
        fecha_inicio = fecha_inicio === "" ? 0 : fecha_inicio; 
        fecha_fin = fecha_fin === "" ? 0 : fecha_fin; 

        var reporte_url = `{{route('reporte.buscar')}}?fecha=${fecha}&fecha_inicio=${fecha_inicio}&fecha_fin=${fecha_fin}`;

        if (fecha != 0 || fecha_inicio != 0  || fecha_fin != 0 || val != 0) {
            if(val == 1 ){
                reporte_url = `{{route('reporte.buscar')}}?registros=true`;
                $("#pdf").attr("href", `{{route('export.pdf')}}?registros=true`);
                $("#excel").attr("href", `{{route('export')}}?registros=1&archivo=reporte_de_viajes.xlsx`);
                $("#csv").attr("href", `{{route('export')}}?registros=1&archivo=reporte_de_viajes.csv`);
            } else {
                $("#pdf").attr("href", `{{route('export.pdf')}}?fecha=${fecha}&fecha_inicio=${fecha_inicio}&fecha_fin=${fecha_fin}`);
                $("#excel").attr("href", `{{route('export')}}?fecha=${fecha}&fecha_inicio=${fecha_inicio}&fecha_fin=${fecha_fin}&archivo=reporte_de_viajes.xlsx`);
                $("#csv").attr("href", `{{route('export')}}?fecha=${fecha}&fecha_inicio=${fecha_inicio}&fecha_fin=${fecha_fin}&archivo=reporte_de_viajes.csv`);
            }
            my_data_table = $('#nt_table').DataTable( {
                "destroy":true,
                "processing": true,
                "serverSide": true,
                language: language_es,
                ajax:{
                    url : reporte_url,
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