@extends('adminlte::page')

@section('title', 'Nuevo Ticket')


@section('content_header')
    <h1>Nuevo Ticket</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">


    {!! Form::open(['route' => 'ticket.store','autocomplete' => 'off','files' => true]) !!}
        @include('ticket.partials.form')
        <table style="margin: 0; auto; width:100%">
            <tr>
                <td style="display: flex; justify-content: right;">
                    <div class="display: flex; justify-content: right;">
                        {!! Form::submit('Crear Ticket', ['class' => 'btn-success rounded text-white px-3 py-1 text-base mx-1 float-rigth align-baseline']) !!}
                        <a href= "{{route('ticket.index')}}" style = "height:35px;" class="btn-warning rounded text-white px-3 py-1 text-base float-right">Cancelar</a>

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