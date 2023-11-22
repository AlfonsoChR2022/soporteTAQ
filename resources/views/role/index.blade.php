@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    @can('role.create')
        <a href="{{route('role.create')}}" style = "height: 40px;" class="btn-info rounded text-white px-3 py-2 text-base float-right">Nuevo Rol</a>
    @endcan
    <h1>Listado de Roles</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped text-sm"   style="margin: 0; auto;" cellspacing="0" cellpadding="0">
                <thead style="padding:1px; background-color:#5f2167; color:white">
                    <tr>
                        <th>#</th>
                        <th>Rol</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($role as $rol)
                        <tr>
                            <td> {{$rol->id}}</td>
                            <td> {{$rol->name}}</td>
                            <td width="10px">
                                @can('role.show')
                                    <a href="{{route('role.show',$rol)}}" style="width:150px" class="btn btn-sm btn-primary">Ver Rol</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="card-footer" >
                {{ $role->links() }}
            </div>
            <div>
                @push('scripts')
                    <script>
                        Livewire.restart();
                    </script>
                @endpush
            </div>

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