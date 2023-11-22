@extends('adminlte::page')

@section('title', 'Ver Categoría')

@section('content_header')
<div class="container-fluid" style="width:100%;">
    <div class="row">
        <div class="co w-75">
            <h2 style="color:#5f2167">
                CATEGORÍA #{{$categorium -> id}}
            </h2>
        </div>
        <div class="col align-self-end w-75">
            <div class="d-flex justify-content-end m-0 p-0 align-self-end co" >
                @can('categoria.edit')
                    <a href= "{{route('categoria.edit',$categorium -> id)}}" class="btn-primary rounded text-white px-3 py-2 mx-1 text-base float-right">Editar Categoría</a>
                @endcan

                @can('categoria.destroy')
                    <form action="{{route('categoria.destroy',$categorium)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger rounded text-white px-3 py-2 mx-1 text-base float-right">Eliminar Categoría</a>
                    </form>
                @endcan
                
                
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">

            <div class="row" >
                <div class="col">
                    <div class="stl_body">
                        <div class="row" >
                            <div class="co w-100">
                                <h5 style="color:#5f2167; text-transform: uppercase">
                                    DESCRIPCIÓN
                                </h5>
                            </div>
                        </div>
                        <hr class="mt-1 mb-1"/>

                        <div class="row" >
                            <div class="co w-100">
                                <h5 class="text-info">
                                    {!!$categorium->categoria!!}
                                </h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <hr class="mt-1 mb-1"/>

            <div style="display: flex; justify-content: right;">
                <div class="d-flex justify-content-end m-0 p-0 align-self-end">
                        <a href= "{{route('categoria.index')}}" class="btn-info rounded text-white px-3 py-1 text-base mx-1 float-rigth align-baseline">Volver</a>
                </div>
            </div>

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