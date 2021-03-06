@extends('layouts.app')

@section('title')
    PAPELERA PERSONAL
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Papelera - Personal</li>
@endsection

@section('box')
    <div class="">
        <a href="{{route('personal.index')}}" class="boton btn-blue py-1 mb-3">
            <i class="fa fa-chevron-left fa-fw"></i>
            Regresar
        </a>
    </div>
@endsection

@section('content')

    <table class="table table-striped" id="nt_table_papelera_personal">
        <thead class="th-dark" id="thead_papelera">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>C. I.</th>
                <th>Fecha de Nacimiento</th>
                <th>Cleular</th>
                <th>Dirección</th>
                <th>Cargo</th>
                <th>Fecha de eliminación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        
    </table>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            let url ="{{route('personal.papelera')}}";
            let columns = [
                    {data: 'DT_RowIndex'},
                    {data: 'nombre'},
                    {data: 'ci'},
                    {data: 'fecha_nacimiento'},
                    {data: 'celular'},
                    {data: 'direccion'},
                    {data: 'cargo'},
                    {data: 'hora'},
                    {data: 'btn'}
                ];
            laravel_data_table(url,columns,'nt_table_papelera_personal');  
        });
    </script>
@endsection