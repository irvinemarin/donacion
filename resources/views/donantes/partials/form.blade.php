<div class="row ">
    {!!Form::hidden('codDonante',null,['class'=>'validate']) !!}


    <div class="input-field col s12 m12  ">
        <i class="small material-icons prefix">
            account_circle
        </i>
        {!!Form::text('nombres',null,['class'=>'validate','data-length'=>'50','maxlength'=>'50','id'=>'nombres']) !!}

        <label for="nombres">
            Nombres :
        </label>

    </div>
    <div class="input-field col s12 m12 ">
        {!!Form::text('apellidoPaterno',null,['class'=>'validate ','data-length'=>'50','maxlength'=>'50']) !!}

        <label for="ape_paterno">
            Apellido Paterno :
        </label>

    </div>
    <div class="input-field col s12 m12">
        {!!Form::text('apellidoMaterno',null,['class'=>'validate','data-length'=>'50','maxlength'=>'50']) !!}
        <label for="ape_materno">
            Apellido Materno :
        </label>
    </div>
    <div class="input-field col s12 m12">
        {!!Form::text('dni',null,['class'=>'validate','data-length'=>'15','maxlength'=>'15']) !!}
        <label for="icon_prefix">
            DNI:
        </label>

    </div>
    <div class="input-field col s12 m12">
        <i class="small material-icons prefix">
            phone
        </i>
        {!!Form::tel('celular',null,['class'=>'validate','data-length'=>'15','maxlength'=>'15']) !!}
        <label for="celular">
            Celular:
        </label>
    </div>
    <div class="input-field col s12 m12">
        <i class="small material-icons prefix">
            email
        </i>
        {!!Form::email('email',null,['class'=>'validate']) !!}
        <label for="email">
            E-mail:
        </label>
    </div>
    <div class="input-field col s12 m12">
        <i class="small material-icons prefix">
            location_on
        </i>
        {!!Form::text('direccion',null,['class'=>'validate']) !!}
        <label for="direccion">
            Direccion:
        </label>

    </div>
    <?php
    $hoy = date("Y-m-d H:i:s");
    $cumple = date("d-m-Y");
    ?>
    <div class="input-field col s12 m12">
        <i class="material-icons prefix">
            today
        </i>
        {!!Form::text('fechaNac',null,['class'=>'datepicker validate',"placeholder"=>"Click para Selecionar Fecha"]) !!}

        <label for="fechaNac">
            Fecha Nacimiento:
        </label>
    </div>
    <div class="input-field col s12 m12">
        <i class="material-icons prefix">
            today
        </i>
        {!!Form::text('fechaReg',null ,['class'=>'datepicker validate',"placeholder"=>"Click para Selecionar Fecha"]) !!}
        <label for="fechaReg">
            Fecha Registro:
        </label>
    </div>
</div>
<div class="row">
    <h6>Ubicacion Laboral:</h6>
    @foreach($camposMisioneros as $camposMisionero)
        @php(
            $camposIds[$camposMisionero->id]=$camposMisionero->nombre
        )
    @endforeach
    <div class="input-field col s12 m12">
        {{Form::select('campoMisiId',$camposIds,null)}}
        <label>Campo Misionero :</label>
    </div>

    @foreach($Estados as $estado)
        @php(
            $estadoids[$estado->id]=$estado->nombre
        )
    @endforeach
    <div class="input-field col s12 m12">
        {{Form::select('idEstado',$estadoids,null)}}
        <label>Estado :</label>
    </div>


    <div class="input-field col s12 m12">
        {!!Form::text('cargo',null,['class'=>'validate']) !!}
        <label>Cargo</label>
    </div>
</div>
{!!Form::submit('Guardar',['class'=>'btn btn-small waves-effect waves-light right','id'=>'cl']) !!}