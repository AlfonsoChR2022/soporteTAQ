@extends('adminlte::page')

@section('title', 'Ver Rol')

@section('content_header')

    <div class="container-fluid" style="width:100%;">
        <div class="row">
            <div class="co w-75">
                <h1>Editar Rol #{{$role->id}}</h1>
            </div>
        </div>
    </div>




@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">

            {!! Form::model($role, ['route' => ['role.update', $role], 'method' => 'put']) !!}
                @include('role.partials.form')

                <table style="margin: 0; auto; width:100%">
                    <tr>
                        <td style="display: flex; justify-content: right;">
                            <div class="d-flex justify-content-end m-0 p-0 align-self-end" >
                                @can('role.update')
                                    {!! Form::submit('Guardar Cambios', ['class' => 'btn-update','class' => 'btn-success rounded text-white px-3 py-1 text-base mx-1 float-rigth align-baseline']) !!}
                                @endcan
                                <a href= "{{route('role.index')}}" class="btn btn-info rounded text-white px-3 text-base mx-1 float-rigth align-baseline">Cancelar</a>
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