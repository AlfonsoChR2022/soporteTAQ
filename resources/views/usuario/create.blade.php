@extends('adminlte::page')

@section('title', 'Nuevo Usuario')


@section('content_header')
    <h1>Nuevo Usuario</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

    {!! Form::open(['route' => 'usuario.store','autocomplete' => 'off','files' => true]) !!}
        <table style="margin: 0; auto; width:100%;">
            <tr>
                <td style="width:40%;">
                    <strong>DATOS PERSONALES</strong><br><br>
                    <table style="margin: 0; auto; width:100%;">
                        <tr>
                            <td style="width:40%">
                                <div class="form-group" >
                                    {!! Form::label('name', 'Nombre:') !!}
                                    {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Ingrese nombre del usuario']) !!}
                                    @error('name')<small class="text-danger">* {{ $message}}</small><br> @enderror
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:40%">
                                <div class="form-group" >
                                    {!! Form::label('email', 'Correo Electrónico:') !!}
                                    {!! Form::text('email',null,['class' => 'form-control','placeholder' => 'Ingrese correo elctrónico del usuario']) !!}
                                    @error('email')<small class="text-danger">* {{ $message}}</small><br> @enderror
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:40%">
                                <div class="form-group" >
                                    {!! Form::label('password', 'Contraseña:') !!}
                                    {!! Form::text('password',null,['class' => 'form-control','placeholder' => 'Ingrese contraseña del usuario']) !!}
                                    @error('password')<small class="text-danger">* {{ $message}}</small><br> @enderror
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width:20%;">

                </td>
                <td style="width:40%; display: flex; vertical-align:top;">
                    <table style="margin: 0; auto; width:100%;">
                        <tr>
                            <td style="width:40%">
                                <strong>ASIGNAR ROLES</strong><br><br>
                                    @foreach ($role as $rol)
                                        <div>
                                            <label>
                                                {!! Form::checkbox('role[]', $rol->id, null, ['class' => 'mr-1']) !!}
                                                {{ $rol->name}}
                                            </label>
                                        </div>
                                    @endforeach
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <table style="margin: 0; auto; width:100%;">
                        <tr>
                            <td style="display: flex; justify-content: right;">
                                <div class="display: flex; justify-content: right;">
                                    {!! Form::submit('Crear Usuario', ['class' => 'btn-success rounded text-white px-3 py-1 text-base mx-1 float-rigth align-baseline']) !!}
                                    <a href= "{{route('usuario.index')}}" style = "height:35px;" class="btn-warning rounded text-white px-3 py-1 text-base float-right">Cancelar</a>
                                </div>
                            </td>
                        </tr>
                    </table>
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