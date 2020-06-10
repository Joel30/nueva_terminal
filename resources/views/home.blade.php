@extends('layouts.app')

@section('content')

    <div class="row justify-content-start justify-content-sm-end bg-dark pt-1 px-1">
        <a href="{{route('terminal.nacional')}}" class="boton btn-green mr-2 mb-1">Transporte Nacional</a>
        <a href="{{route('terminal.internacional')}}" class="boton btn-green mb-1">Transporte Internacional</a>
    </div>
    <div class="row">
        <div class="contenedor">
            <img src="{{asset('images/terminal-potosi.jpg')}}" class="img-with-text"/>
            <div class="text-above"></div>
            <div class="d-none d-lg-block centered px-5" style="background:#000a;font-family:Times;font-size:44px;color:#fff">¡BIENVENIDO!</div>
            <div class="d-lg-none centered px-2 px-sm-5" style="background:#000a;font-family:Times;font-size:30px;color:#fff">¡BIENVENIDO!</div>
        </div>
    <div>

@endsection
