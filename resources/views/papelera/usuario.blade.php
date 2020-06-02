@extends('layouts.app')

@section('title')
    PAPELERA USUARIOS
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Papelera - Usuarios</li>
@endsection

@section('content')

    <table class="table table-striped" id="nt_table_papelera_usuario">
        <thead class="th-dark" id="thead_papelera">
            <tr>
                <th>#</th>
                <th>E-mail</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        
    </table>
@endsection