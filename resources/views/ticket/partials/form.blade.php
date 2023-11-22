{!! Form::hidden('user_id', Auth()->user()->id) !!}
<table style="margin: 0; auto; width:100%">
    <tr>
        <td>
            <table style="margin: 0; auto; width:100%">
                <tr>
                    <td style="width:40%">
                        <div class="form-group" >
                            {!! Form::label('terminalx', 'Terminal:') !!}
                            {!! Form::text('terminalx',$terminal->descrip . " @ " . $terminal->cla_empre,['class' => 'form-control', 'readonly']) !!}
                            {!! Form::text('terminal',$terminal->cla_empre,['class' => 'form-control', 'hidden']) !!}

                        </div>
                    </td>
                    <td style="width:20%;">

                    </td>
                    <td style="width:40%">
                        <div class="form-group">
                            {!! Form::label('id_categoria', 'Categoria:') !!}
                            {!! Form::select('id_categoria', $categories, null, ['class' => 'form-control']) !!}
                            @error('category_id')<small class="text-danger">* {{ $message }}</small>@enderror
                        </div>
                    </td>
                </tr>

                <tr>
                    <td style="width:40%">
                        <div class="form-group" >
                            {!! Form::label('evento', 'Evento:') !!}
                            {!! Form::text('evento',null,['class' => 'form-control','placeholder' => 'Ingrese título del evento']) !!}
                            @error('evento')<small class="text-danger">* {{ $message}}</small><br> @enderror
                        </div>
                    </td>
                    <td style="width:20%">

                    </td>
                    <td style="width:40%">
                        <div class="form-group" >
                            {!! Form::label('solicita', 'Solicita:') !!}
                            {!! Form::text('solicita',$user->name,['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </td>
                </tr>

                <tr>
                    <td style="width:40%">
                        <div class="form-group">
                            {!! Form::label('prioridad', 'Prioridad:') !!}
                            {!! Form::select('prioridad', ['1'=>'Alta','2' => 'Media','3' => 'Baja'], 0, ['class' => 'form-control']) !!} 
                        </div>
                    </td>
                    <td style="width:20%">

                    </td>
                    <td style="width:40%">
                        <div class="form-group" >
                            {!! Form::label('status', 'Status:') !!}
                            {!! Form::text('status','En espera',['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </td>
                </tr>
            </table>


            <table style="margin: 0; auto; width:100%">
                <tr>
                    <td>
                        <div class="form-group">
                            {!! Form::label('descrip', 'Descripción:') !!}
                            <div >
                                {!! Form::textarea('descrip', null, ['class' => 'form-control','placeholder' => 'Ingrese el descripción del evento']) !!}
                            </div>
                            @error('descrip')<small class="text-danger">* {{ $message}}</small><br> @enderror
                        </div>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
    
</table>