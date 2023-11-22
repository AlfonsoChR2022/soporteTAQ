@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    @can('usuario.create')
    <a href="{{route('usuario.create')}}" style = "height: 40px;" class="btn-info rounded text-white px-3 py-2 text-base float-right">Nueva Usuario</a>
    @endcan
    <h1>Listado de Usuarios</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        @if ($usr->count())
        <div class="card-body">
                <table class="table table-striped text-sm"   style="margin: 0; auto;" cellspacing="0" cellpadding="0">
                    <thead style="padding:1px; background-color:#5f2167; color:white">
                        <th>#</th>
                        <th>Usuarios</th>
                        <th>E-Mail</th>
                        <th colspan="2"></th>
                    </thead>
                    <tbody>
                        @foreach ($usr as $Usuario)
                            <tr>
                                <td> {{ $Usuario -> id }} </td>
                                <td> {{ $Usuario -> name }} </td>
                                <td> {{ $Usuario -> email }} </td>
                                <td width="10px">
                                    @can('usuario.show')
                                        <a href= "{{route('usuario.show',$Usuario -> id )}}" style="width:100px" class="btn btn-primary">Ver Usuario</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer" >
            {{ $usr->links() }}
        </div>
        <div>
            @push('scripts')
                <script>
                    Livewire.restart();
                </script>
            @endpush
        </div>
        @else
            <strong>No hay ningun Usuario...</strong>
        @endif
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