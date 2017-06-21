<div class="row ">


{!!Form::hidden('idDonante',null,['class'=>'validate','placeholder'=>'IdDonante']) !!}
<!-- <label for="idDonante">
													Donante :
	</label> -->

<?php

$hoy = date("Y");
?>

{!!Form::hidden('codDonacion',null,['class'=>'validate']) !!}
<!-- <label for="codDonacion">
													Codigo Donacion :
	</label> -->

    <div class="input-field col s12 m6 l4">
        {!!Form::number('cantidad',null,['class'=>'validate']) !!}
        <label for="cantidad">
            Cantidad a Donar :
        </label>
    </div>
    <div class="input-field col s12 m6 l4">
        {!!Form::text('nroCuota',null,['class'=>'validate']) !!}
        <label for="nroCuota">
            Nro Cuotas :
        </label>
    </div>
    <div class="input-field col s12 m6 l4">
        {!!Form::text('abono',null,['class'=>'validate']) !!}
        <label for="abono">
            abono :
        </label>
    </div>
    <div class="input-field col s12 m6 l4">
        {!!Form::text('frecuencia',null,['class'=>'validate']) !!}
        <label for="frecuencia">
            Frecuencia :
        </label>
    </div>
    <div class="input-field col s12 m6 l4">
        <i class="material-icons prefix">
            today
        </i>
        {!!Form::text('fechain',null,['class'=>'datepicker']) !!}

        <label for="fechain">
            Fecha Inicio:
        </label>

    </div>
    <div class="input-field col s12 m6 l4">
        <i class="material-icons prefix">
            today
        </i>
        {!!Form::text('fechaFinal',null,['class'=>'datepicker']) !!}

        <label for="fechaFinal">
            Fecha Final:
        </label>

    </div>

    <div class="input-field col s12 m6 l4">

        {!!Form::text('modalidad',null,['class'=>'validate']) !!}
        <label>Modalidad</label>
    </div>

    <div class="input-field col s12 m6 l6">
        <select name="idProyecto">

            @foreach($Proyectos as $proyectoFila)
                <option value="{{$proyectoFila->id}}">{{$proyectoFila->nombre}}</option>
            @endforeach
        </select>
        <label>Proyecto :</label>
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