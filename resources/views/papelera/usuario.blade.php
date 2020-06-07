@extends('layouts.app')

@section('title')
    PAPELERA USUARIOS
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Papelera - Usuarios</li>
@endsection

@section('box')
    <div class="">
        <a href="{{route('usuario.index')}}" class="btn btn-info py-1 mb-3">
            <i class="fa fa-chevron-left fa-fw"></i>
            Regresar
        </a>
    </div>
@endsection

@section('content')

    <table class="table table-striped" id="nt_table_papelera_usuario">
        <thead class="th-dark" id="thead_papelera">
            <tr>
                <th>#</th>
                <th>E-mail</th>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>Fecha de eliminación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        
    </table>
@endsection