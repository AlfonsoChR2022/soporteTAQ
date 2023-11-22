@extends('adminlte::page')

@section('title', 'Editar Usuario')


@section('content_header')
<div class="container-fluid" style="width:100%;">
    <div class="row">
        <div class="co w-75">
            <h1>Editar Usuario #{{ $usuario->id}}</h1>
        </div>
        <div class="col align-self-end w-75">
            <div class="d-flex justify-content-end m-0 p-0 align-self-end co" >
                <a href="{{route('usuario.show', $usuario)}}" class="btn btn-info rounded text-white px-3 text-base mx-1 float-rigth align-baseline">Cancelar</a>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($usuario,['route' => ['usuario.update', $usuario],'autocomplete' => 'off','files' => true, 'method' => 'put']) !!}
            @include('usuario.partials.form')
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/body.css') }}">
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <style>
        .sidebar-dark-primary{
            background: #5f2167 !important;
            }
        .brand-link{
            background: #5f2167 !important;
            }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop