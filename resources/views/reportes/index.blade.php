@extends('adminlte::page')

@section('title', 'Reporte General')

@section('content_header')
<h1>Reporte General</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        @livewire('reporte-ticket-component') <br><br>
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
            
        /* .navbar{background: #5f2167 !important;} */

    </style>
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
    {{-- @stack('modals') --}}
    @livewireScripts
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
@stop