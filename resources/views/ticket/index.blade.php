@extends('adminlte::page')

@section('title', 'Tickets')

@section('content_header')
    @can('ticket.create')
    <a href="{{route('ticket.create')}}" style = "height: 40px;" class="btn-info rounded text-white px-3 py-2 text-base float-right">Nuevo Ticket</a>
    @endcan
    
    <h1>Listado de Tickets</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        @if ($tkts->count())
        <div class="card-body">
                <table class="table table-striped text-sm"   style="margin: 0; auto;" cellspacing="0" cellpadding="0">
                    <thead style="padding:1px; background-color:#5f2167; color:white">
                        <th width="20px">#</th>
                        {{-- <th width="20px">Terminal</th> --}}
                        <th width="100px">Categoria</th>
                        <th width="150px">Evento</th>
                        {{-- <th width="200px">Descripción</th> --}}
                        <th width="100px">Prioridad</th>
                        <th width="150px">Fecha Creación</th>
                        <th width="150px">Fecha Cierre</th>
                        <th width="150px">Status</th>
                        <th width="150px">Solicita</th>
                        <th width="150px">Atiende</th>
                        <th width="10px"></th>
                    </thead>
                    <tbody>
                    @foreach ($tkts as $ticket)
                        <tr>
                            <td> {{ $ticket -> id }} </td>
                            {{-- <td> {{ $ticket -> terminal }} </td> --}}
                            <td>
                                @foreach( $t_evto->where('id', $ticket -> id_categoria) as $algo )
                                    {{ $algo -> categoria }}
                                @endforeach
                            </td>
                            <td> {{ $ticket -> evento }} </td>
                            {{-- <td width="200px">
                                <div style=" overflow:hidden; white-space:nowrap; text-overflow: ellipsis; width:200px; height:20px;">
                                {{ $ticket -> descrip }}
                                </div>
                            </td> --}}
                            <td>
                                @switch($ticket->prioridad)
                                    @case(1)
                                        <p class="text-danger">Alta</p>
                                        @break
                                    @case(2)
                                        <p class="text-warning">Media</p>
                                        @break
                                    @case(3)
                                        <p class="text-success">Baja</p>
                                        @break
                                    @default
                                        <p>---</p>
                                        @break
                                @endswitch
                            </td>
                            <td> {{ $ticket -> fecha_crea }} </td>
                            <td> {{ $ticket -> fecha_cierre }} </td>
                            <td>
                                @switch($ticket -> status)
                                    @case(1)
                                        <p class="text-success">En espera</p>
                                        @break
                                    @case(2)
                                        <p class="text-warning">En proceso</p>
                                        @break
                                    @case(3)
                                        <p class="text-primary">Terminado</p>
                                        @break
                                    @case(4)
                                        <p class="text-danger">Cancelado</p>
                                        @break
                                    @default
                                        <p>---</p>
                                        @break
                                @endswitch
                            </td>
                            <td>
                                @foreach( $userX->where('id', $ticket -> user) as $algo2 )
                                    {{ $algo2 -> name }}
                                @endforeach
                            </td>
                            <td>
                                @foreach( $userX->where('id', $ticket -> atiende) as $algo3 )
                                    {{ $algo3 -> name }}
                                @endforeach
                            </td>
                            <td>
                                @can('ticket.show')
                                    <a href= "{{route('ticket.show',$ticket -> id )}}" style="width:100px" class="btn btn-primary">Ver Ticket</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer" >
            {{ $tkts->links() }}
        </div>
        <div>
            @push('scripts')
                <script>
                    Livewire.restart();
                </script>
            @endpush
        </div>
        @else
            <strong>No hay ningun Ticket...</strong>
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