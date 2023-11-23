@extends('adminlte::page')

@section('title', 'Mi perfil')


@section('content_header')
    <div class="container-fluid" style="width:100%;">
        <div class="row">
            <div class="co w-75">
                <h1>Mi perfil</h1>
            </div>
            <div class="col align-self-end w-75">
                <div class="d-flex justify-content-end m-0 p-0 align-self-end co" >
                    <a href="{{route('home')}}" class="btn btn-info rounded text-white px-3 text-base mx-1 float-rigth align-baseline">Salir</a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
@include('msjs')

<div class="card">
    <div class="card-body">
        <form action="{{route('changeProfile')}}" method="POST" class="needs-validation" novalidate>
            @csrf
            <table style="margin: 0; auto; width:100%">
                <tr>
                    <td style="width:40%">
                        <div class="form-group" >
                            <strong>ACTUALIZAR MIS DATOS</strong><br><br>
                                <div class="form-group" >
                                    <label for="name">Nombre de Usuario</label>
                                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control @error('name') is-invalid @enderror" required>
                                    @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                                <div class="form-group" >
                                    <label for="password_actual">Clave Actual</label>
                                    <input type="password" name="password_actual" class="form-control @error('password_actual') is-invalid @enderror" required>
                                    @error('password_actual')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                                <div class="form-group" >
                                    <label for="new_password ">Nueva Clave</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                    @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>/span>@enderror
                                </div>
                                <div class="form-group" >
                                    <label for="confirm_password">Confirmar nueva Clave</label>
                                    <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"required>
                                    @error('confirm_password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                                <div class="d-flex justify-content-end m-0 p-0 align-self-end" >
                                    <button type="submit" class="btn btn-success" id="formSubmit">Guardar Cambios</button>
                                </div>
                        </div>
                    </td>
                    <td style="width:20%">
                    </td>
                    <td style="width:40%">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>
@endsection

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