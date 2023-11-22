@extends('adminlte::page')

@section('title', 'Soporte TAQ')


@section('content_header')
    <h1>Mi Perfil</h1>
@stop

@section('content')

<div class="container mb-5" style="background-color: #fff;">

<!--- Mensajes -->
@include('msjs')

  <h4 class="text-center">Actualizar mis Datos <hr></h4>
  <div class="row justify-content-center">
      <div class="col-md-8">
        <form action="{{route('changeProfile')}}" method="POST" class="needs-validation" novalidate>
            @csrf 

            <div class="row mb-3">
                <div class="form-group mt-3">
                    <label for="name">Nombre de Usuario</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control @error('name') is-invalid @enderror" required>
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>    
            <div class="row mb-3">
              <div class="form-group mt-3">
                  <label for="password_actual">Clave Actual</label>
                  <input type="password" name="password_actual" class="form-control @error('password_actual') is-invalid @enderror" required>
                    @error('password_actual')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-group mt-3">
                    <label for="new_password ">Nueva Clave</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-group mt-3">
                    <label for="confirm_password">Confirmar nueva Clave</label>
                    <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"required>
                    @error('confirm_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row text-center mb-4 mt-5">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="formSubmit">Guardar Cambios</button>
                    <a href="/home" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
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