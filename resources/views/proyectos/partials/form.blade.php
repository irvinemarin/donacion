<div class="row ">


    {!!Form::hidden('id',null,['class'=>'validate','placeholder'=>'id']) !!}


    <div class="input-field col s12 m6 l4">
        {!!Form::text('nombre',null,['class'=>'validate']) !!}
        <label for="nombre">
            Nombre :
        </label>
    </div>

    <div class="input-field col s12 m6 l4">
        {!!Form::text('descripcion',null,['class'=>'validate']) !!}
        <label for="descripcion">
            Descripcion :
        </label>
    </div>



    <div class="input-field col s12 m6 l6">
        <select name="idEstado">

            @foreach($Estados as $estado)
                <option value="{{$estado->id}}">{{$estado->nombre}}</option>
            @endforeach
        </select>
        <label>Estado :</label>
    </div>

</div>
{!!Form::submit('Guardar',['class'=>'waves-effect waves-light btn right']) !!}