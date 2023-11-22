@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    @can('categoria.create')
        <a href="{{route('categoria.create')}}" style = "height: 40px;" class="btn-info rounded text-white px-3 py-2 text-base float-right">Nueva Categoria</a>
    @endcan
    <h1>Listado de Categorías</h1>
@stop

@section('content')
    @if (session('info'))
            <div class="alert alert-success">
                <strong>{{ session('info') }}</strong>
            </div>
        @endif
     <div class="card">
        @if ($cates->count())
        <div class="card-body">
            <table class="table table-striped text-sm"   style="margin: 0; auto;" cellspacing="0" cellpadding="0">
                <thead style="padding:1px; background-color:#5f2167; color:white">
                        <th >#</th>
                        <th >Categoría</th>
                        <th colspan="2"></th>
                </thead>
                <tbody>
                    @foreach ($cates as $categoria)
                        <tr>
                            <td> {{ $categoria -> id }} </td>
                            <td> {{ $categoria -> categoria }} </td>
                            <td width="10px">
                                @can('categoria.show')
                                    <a href= "{{route('categoria.show',$categoria->id)}}" style="width:150px" class="btn btn-primary">Ver Categoría</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer" >
            {{ $cates->links() }}
        </div>
        <div>
            @push('scripts')
                <script>
                    Livewire.restart();
                </script>
            @endpush
        </div>
        @else
            <strong>No hay ninguna Categoría...</strong>
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