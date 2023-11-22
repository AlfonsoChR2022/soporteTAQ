@extends('adminlte::page')

@section('title', 'Nueva Categoria')


@section('content_header')
    <h1>Nueva Categoría</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">


        {!! Form::open(['route' => 'categoria.store','autocomplete' => 'off','files' => true]) !!}
        @include('categoria.partials.form')
        <table style="margin: 0; auto; width:100%">
            <tr>
                <td style="display: flex; justify-content: right;">
                    <div class="display: flex; justify-content: right;">
                        {!! Form::submit('Crear Categoria', ['class' => 'btn-success rounded text-white px-3 py-1 text-base mx-1 float-rigth align-baseline']) !!}
                        <a href= "{{route('categoria.index')}}" style = "height:35px;" class="btn-warning rounded text-white px-3 py-1 text-base float-right">Cancelar</a>
                    </div>
                </td>
            </tr>
        </table>
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