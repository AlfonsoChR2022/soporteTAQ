{!! Form::hidden('user_id', Auth()->user()->id) !!}
            <table style="margin: 0; auto; width:100%">
                <tr>
                    <td style="width:40%">
                        <div class="form-group" >
                            <strong>DATOS PERSONALES</strong><br><br>
                            <div class="form-group" >
                                {!! Form::label('name', 'Nombre:') !!}
                                {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Ingrese nombre del usuario']) !!}
                                @error('name')<small class="text-danger">* {{ $message}}</small><br> @enderror
                            </div>
                            <div class="form-group" >
                                {!! Form::label('email', 'Correo Electrónico:') !!}
                                {!! Form::text('email',null,['class' => 'form-control','placeholder' => 'Ingrese correo elctrónico del usuario']) !!}
                                @error('email')<small class="text-danger">* {{ $message}}</small><br> @enderror
                            </div>
                            <div class="form-group" >
                                {!! Form::label('password', 'Contraseña:') !!}
                                {!! Form::text("'password'",'*********',['class' => 'form-control','readonly']) !!}
                            </div><br>

                            <table style="margin: 0; auto; width:100%">
                                <tr>
                                    <td style="display: flex; justify-content: right;">
                                        <div class="d-flex justify-content-end m-0 p-0 align-self-end" >
                                            @can('usuario.update')
                                                {!! Form::submit('Guardar Datos', ['name' => 'btn-datos','class' => 'btn-success rounded text-white px-3 py-1 text-base mx-1 float-rigth align-baseline']) !!}
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </td>
                    <td style="width:20%;">

                    </td>
                    <td style="width:40%; position:relative">
                        <div style="position:absolute; top:0; left:0; width:100%;">
                            <strong>ASIGNAR ROLES</strong><br><br>
                            {!! Form::model($usuario, ['route' => ['usuario.update',$usuario],'method' => 'put']) !!}
                                @foreach ($roles as $role)
                                        <label>
                                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                            {{ $role->name}}
                                        </label><br>
                                 @endforeach
                                <div class="d-flex justify-content-end m-0 p-0 align-self-end" >
                                    @can('usuario.update')
                                        {!! Form::submit('Asignar Rol', ['name' => 'btn-roles','class' => 'btn-success rounded text-white px-3 py-1 text-base mx-1 float-rigth align-baseline']) !!}    
                                    @endcan
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>

            
                </tr>
            </table>


          
