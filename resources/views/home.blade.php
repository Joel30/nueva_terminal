@extends('layouts.app_login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <div>
                <a href="{{route('bus.index')}}" class="btn btn-info">bus</a>
                <a href="{{route('carril.index')}}" class="btn btn-info">carril</a>
                <a href="{{route('departamento.index')}}" class="btn btn-info">departamento</a>
                <a href="{{route('empresa.index')}}" class="btn btn-info">empresa</a>
                <a href="{{route('personal.index')}}" class="btn btn-info">personal</a>
                <a href="{{route('transporte.index')}}" class="btn btn-info">transporte</a>
                <a href="{{route('usuario.index')}}" class="btn btn-info">usuario</a>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
