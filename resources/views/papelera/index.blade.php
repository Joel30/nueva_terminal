@extends('layouts.app')

@section('title')
    PAPELERA
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Papelera</li>
@endsection

@section('content')

    <div id="buscador" class="mb-3 row justify-content-start">
        <div class="col col-sm-8 col-md-6 col-lg-4">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <label class="input-group-text input-color1" for="usuario" id="buscar">Ver </label>
                </div>
                <select name="" id="" class="form-control borde" onchange="select(this.value)">
                    <option value="personal">Personal</option>
                    <option value="usuario">Usuarios</option>
                </select>
            </div>
        </div>
    </div>
    <table class="table table-striped" id="nt_table_papelera">
        <thead class="th-dark" id="thead_papelera">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>C. I.</th>
                <th>Fecha de Nacimiento</th>
                <th>Cleular</th>
                <th>Dirección</th>
                <th>Cargo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        
    </table>


    <script>
        var dt_papelera = '';
        function papelera_data_table( p_url, p_columns ) {
            dt_papelera = $('#nt_table_papelera').DataTable( {
                "destroy": true,
                "serverSide": true,
                language: language_es,
                ajax:{
                    url : p_url,
                },
                "columns": p_columns,            
            });
            $('#nt_table_papelera').parent().css('overflow-x', 'auto');
            $('#nt_table_papelera_info').removeClass("dataTables_info");  
            $('#nt_table_papelera_info').addClass("text-info text-center");
        }
        function select(val) {


            if (val == 'personal') {
                document.getElementById("thead_papelera").innerHTML =`<th>#</th><th>Nombre</th><th>C. I.</th><th>Fecha de Nacimiento</th><th>Cleular</th><th>Dirección</th><th>Cargo</th><th>Acciones</th>`;

                let papelera_columns = [
                    {data: 'id'},
                    {data: 'nombre'},
                    {data: 'ci'},
                    {data: 'fecha_nacimiento'},
                    {data: 'celular'},
                    {data: 'direccion'},
                    {data: 'cargo'},
                    {data: 'btn'}
                ];

                papelera_data_table('{{route('personal.papelera')}}', papelera_columns); 
            } else {
                document.getElementById("thead_papelera").innerHTML =`<th>#</th><th>E-mail</th><th>Nombre</th><th>Acciones</th>`; 

                let papelera_columns = [
                    {data: 'id'},
                    {data: 'email'},
                    {data: 'personal.nombre'},
                    {data: 'btn'}
                ];

                papelera_data_table('{{route('usuario.papelera')}}', papelera_columns); 
            }
              
        }
    </script>
@endsection