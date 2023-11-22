@extends('adminlte::page')

@section('title', 'Editar Ticket')


@section('content_header')
    <h1>Editar Ticket #{{$ticket->id}}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

        {!! Form::model($ticket,['route' => ['ticket.update', $ticket],'autocomplete' => 'off','files' => true, 'method' => 'put']) !!}
            @include('ticket.partials.form')
            <table style="margin: 0; auto; width:100%">
                <tr>
                    <td style="display: flex; justify-content: right;">
                        <div class="d-flex justify-content-end m-0 p-0 align-self-end" >
                            @can('ticket.update')
                                {!! Form::submit('Guardar Cambios', ['name' => 'btn-update','class' => 'btn-success rounded text-white px-3 py-1 text-base mx-1 float-rigth align-baseline']) !!}
                            @endcan
                            <a href="{{route('ticket.show', $ticket)}}" class="btn btn-info rounded text-white px-3 text-base mx-1 float-rigth align-baseline">Cancelar</a>
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