@extends('adminlte::page')

@section('title', 'Ver Ticket')


@section('content_header')
<div class="container-fluid" style="width:100%;">
    <div class="row">
        <div class="co w-75">
            <h2 style="color:#5f2167">
                TICKET #{{$ticket -> id}}
            </h2>
        </div>
            <div class="col align-self-end w-75">
                <div class="d-flex justify-content-end m-0 p-0 align-self-end co" >
                    @can('ticket.edit')
                        <a href= "{{route('ticket.edit',$ticket -> id)}}" class="btn-primary rounded text-white px-3 py-2 mx-1 text-base float-right">Editar Ticket</a>
                    @endcan

                    @can('ticket.destroy')
                        <form action="{{route('ticket.destroy',$ticket)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger rounded text-white px-3 py-2 mx-1 text-base float-right">Eliminar Ticket</a>
                        </form>
                    @endcan
                </div>
            </div>

    </div>

    <div class="row">
        <div class="col align-self-end">
            <span class="d-block p-0 align-bottom text-base" style="font-size:12px;font-weight: normal;">
                TERMINAL: {{ $terminal->descrip }} @ {{ $terminal->cla_empre }}
            </span>
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

            <div class="container-fluid" style="width:100%;">

                <div class="row" >
                    <div class="co w-100">
                        <h3 style="color:#5f2167; text-transform: uppercase">
                            {{$categoria}}
                        </h3>
                    </div>
                </div>
                <hr class="mt-1 mb-1"/>

                <div class="row" >
                    <div class="co w-100">
                        <h3 class="text-info">
                            {{$ticket -> evento}}
                        </h3>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col align-self-end">
                        <span class="d-block p-0 align-bottom text-base" style="font-size:12px;font-weight: normal;">
                            SOLICITA: {{$user}} @ {{$ticket -> fecha_crea}}
                        </span>
                        <span class="d-block p-0 align-bottom text-base" style="font-size:12px;font-weight: normal;">
                            ATIENDE: {{$atiende}} @ {{$ticket -> fecha_cierre}}
                        </span>
                    </div>
                    <div class="col align-self-end">
                        <div class="d-flex align-items-end justify-content-end m-0 p-0 align-self-end" >
                            <span class="d-block p-0 align-bottom text-base" style="font-size:12px;font-weight: normal;">ESTADO: </span>
                                @switch($ticket -> status)
                                    @case(1)
                                        <span class="d-block p-0 text-success">EN ESPERA</span>
                                        @break
                                    @case(2)
                                        <span class="d-block p-0 text-warning">EN PROCESO</span>
                                        @break
                                    @case(3)
                                        <span class="d-block p-0 text-primary">TERMINADO</span>
                                        @break
                                    @case(4)
                                        <span class="d-block p-0 text-danger">CANCELADO</span>
                                        @break
                                    @default
                                        <span class="d-block p-0">---</span>
                                        @break
                                @endswitch
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-1 mb-1"/><br>


            <strong>PRIORIDAD: </strong>
            @switch($ticket->prioridad)
            @case(1)
                <span class="text-danger">ALTA</span>
                @break
            @case(2)
                <span class="text-warning">MEDIA</span>
                @break
            @case(3)
                <span class="text-success">BAJA</span>
                @break
            @default
                <span>---</span>
                @break
        @endswitch <br><br>

        <div class="row" >
            <div class="col">
                <div class="stl_body">
                    <strong>DESCRIPCION: </strong><br>
                    <span style="color:black; font-weight: normal; font-size:18px">
                            {!!$ticket->descrip!!}
                    </span>
                </div>
            </div>
        </div>



        <hr class="mt-1 mb-1"/><br>
        <div class="row">
            <div class="col">
                <strong class="d-block p-0 color:black;" >
                    SOLUCIÓN:
                </strong>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="stl_body">


                    <form action="{{route('ticket.update',$ticket)}}" method="POST">
                        @csrf
                        @method('put')
                        
                        @if ($ticket->status == '1'  || $ticket->status == '2')
                            <div class="stl_body2">
                                {!! Form::textarea('solucion', $ticket->solucion, ['class' => 'form-control']) !!}
                            </div><br>
                        @else
                            <span style="color:black; font-weight: normal; font-size:18px">
                                {!!$ticket->solucion!!}
                            </span>
                        @endif

                        <div style="display: flex; justify-content: right;">
                            <div class="d-flex justify-content-end m-0 p-0 align-self-end">
                               
                                @can('ticket.request')
                                    @if ($ticket->status == '1'  || $ticket->status == '2')
                                        <input type="submit" name="btn-guarda" class="btn-warning rounded text-white px-3 py-1 text-base mx-1 float-rigth align-baseline" value="Guardar" />
                                        <input type="submit" name="btn-finaliza" class="btn-success rounded text-white px-3 py-1 text-base mx-1 float-rigth align-baseline" value="Finalizar Ticket" />
                                        <input type="submit" name="btn-cancela" class="btn-danger rounded text-white px-3 py-1 text-base mx-1 float-rigth align-baseline" value="Cancelar Ticket" />
                                    @endif
                                @endcan
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <hr class="mt-1 mb-1"/><br>
            <div style="display: flex; justify-content: right;">
                <div class="d-flex justify-content-end m-0 p-0 align-self-end">
                        <a href= "{{route('ticket.index')}}" class="btn-info rounded text-white px-3 py-1 text-base mx-1 float-rigth align-baseline">Volver</a>
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