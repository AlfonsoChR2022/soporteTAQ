<div>
    {{-- Searh: {{  $search }} <br>
    Count: {{ $tkts->count() }} --}}
    <div class="card-header">
        <input type="text" wire:model="search" class="form-control" placeholder="Buscar evento">
    </div>

@if($tkts->count())
    <table class="table table-striped text-sm"   style="margin: 0; auto;" cellspacing="0" cellpadding="0">
        <thead style="padding:1px; background-color:#5f2167; color:white">
            <th wire:click="order('id')" class="cursor-pointer" width="20px">#
                @if ($sort == 'id')
                    @if ($direction == 'asc')
                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                    @else
                        <i class="fas fa-sort-alpha-down-alt  float-right mt-1"></i>
                    @endif
                @else
                    <i class="fas fa-sort float-right mt-1"></i>
                @endif
            </th>
            <th wire:click="order('id_categoria')" class="cursor-pointer" width="100px">Categoria
                @if ($sort == 'id_categoria')
                    @if ($direction == 'asc')
                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                    @else
                        <i class="fas fa-sort-alpha-down-alt  float-right mt-1"></i>
                    @endif
                @else
                    <i class="fas fa-sort float-right mt-1"></i>
                @endif
            </th>
            <th wire:click="order('evento')" class="cursor-pointer" width="150px">Evento
                @if ($sort == 'evento')
                    @if ($direction == 'asc')
                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                    @else
                        <i class="fas fa-sort-alpha-down-alt  float-right mt-1"></i>
                    @endif
                @else
                    <i class="fas fa-sort float-right mt-1"></i>
                @endif
            </th>
            <th wire:click="order('prioridad')" class="cursor-pointer" width="100px">Prioridad
                @if ($sort == 'prioridad')
                    @if ($direction == 'asc')
                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                    @else
                        <i class="fas fa-sort-alpha-down-alt  float-right mt-1"></i>
                    @endif
                @else
                    <i class="fas fa-sort float-right mt-1"></i>
                @endif
            </th>
            <th wire:click="order('fecha_crea')" class="cursor-pointer" width="150px">Fecha Creación
                @if ($sort == 'fecha_crea')
                    @if ($direction == 'asc')
                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                    @else
                        <i class="fas fa-sort-alpha-down-alt  float-right mt-1"></i>
                    @endif
                @else
                    <i class="fas fa-sort float-right mt-1"></i>
                @endif
            </th>
            <th wire:click="order('fecha_cierre')" class="cursor-pointer" width="150px">Fecha Cierre
                @if ($sort == 'fecha_cierre')
                    @if ($direction == 'asc')
                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                    @else
                        <i class="fas fa-sort-alpha-down-alt  float-right mt-1"></i>
                    @endif
                @else
                    <i class="fas fa-sort float-right mt-1"></i>
                @endif
            </th>
            <th width="10px"></th>
        </thead>
        <tbody>
            @foreach ($tkts as $ticket)
                <tr>
                    <td> {{ $ticket -> id }} </td>
                    <td>
                        @foreach( $t_evto->where('id', $ticket -> id_categoria) as $algo )
                            {{ $algo -> categoria }}
                        @endforeach
                    </td>
                    <td> {{ $ticket -> evento }} </td>
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
                        @can('reportes.show')
                            <a href= "{{route('reportes.show',['reporte' => $ticket->id]) }}" style="width:100px" class="btn btn-primary">Ver Ticket</a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <div class="card-footer" >
        {{ $tkts->links() }}
    </div> --}}

    {{-- <div>
        @push('scripts')
            <script>
                Livewire.restart();
            </script>
        @endpush
    </div> --}}
@else
    <div class="card-header">
        <p>Ningun registro...</p>
    </div>
@endif
</div>

