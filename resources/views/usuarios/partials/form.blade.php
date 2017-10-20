<div class="row ">
    {!!Form::hidden('id',null,['class'=>'validate','placeholder'=>'id']) !!}


    <div class="input-field col s12 m12">
        {!!Form::text('userName',null,['class'=>'validate']) !!}
        <label for="userName">
            Usuario :
        </label>
    </div>

    <div class="input-field col s12 m12">
        {!!Form::text('userPassword',null,['class'=>'validate']) !!}
        <label for="userPassword">
            Password :
        </label>
    </div>


    @foreach($Estados as $estado)
        @php(
            $estadoids[$estado->id]=$estado->nombre
        )
    @endforeach
    <div class="input-field col s12 m12">
        {{Form::select('estado',$estadoids,null)}}
        <label>Estado :</label>
    </div>

</div>
{!!Form::submit('Guardar',['class'=>'waves-effect waves-light btn right']) !!}