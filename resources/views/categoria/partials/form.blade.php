<table style="margin: 0; auto; width:100%">
    <tr>
        <td>
            <div class="form-group" >
                {!! Form::label('categoria', 'Nombre de Categoría:') !!}
                {!! Form::text('categoria',null,['class' => 'form-control','placeholder' => 'Ingrese el nombre de categoría']) !!}
                @error('categoria')<small class="text-danger">* {{ $message}}</small><br> @enderror
            </div>
        </td>
    </tr>
</table>