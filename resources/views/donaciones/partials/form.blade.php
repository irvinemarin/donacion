<div class="row ">
    {!!Form::hidden('idDonante',null,['class'=>'validate','placeholder'=>'IdDonante']) !!}
    <?php
    $hoy = date("Y");
    ?>

    {!!Form::hidden('codDonacion',null,['class'=>'validate']) !!}


    <div class="input-field col s12 m6 l4">
        {!!Form::number('cantidad',null,['class'=>'validate']) !!}
        <label for="cantidad">
            Cantidad a Donar :
            <span class="red-text">*</span>
        </label>
    </div>

    <div class="input-field col s12 m6 l4">
        {!!Form::text('nroCuota',null,['class'=>'validate']) !!}
        <label for="nroCuota">
            Nro Cuotas :
            <span class="red-text">*</span>
        </label>
    </div>

    {!!Form::hidden('abono',null,['class'=>'validate']) !!}

    <div class="input-field col s12 m6 l4">
        {!!Form::text('frecuencia',null,['class'=>'validate','id'=>'frecuencia']) !!}
        <label for="frecuencia">
            Frecuencia :
            <span class="red-text">*</span>
        </label>
    </div>

    <div class="input-field col s12 m4 l4">
        <i class="material-icons prefix">
            today
        </i>
        {!!Form::text('fechain',null,['class'=>'datepicker','id'=>'fechain']) !!}

        <label for="fechain">
            Fecha Inicio:
            <span class="red-text">*</span>
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
        <label>Modalidad
            <span class="red-text">*</span>
        </label>
    </div>


    @foreach($Proyectos as $proyectoFila)
        @php(
            $proyectoIds[$proyectoFila->id]=$proyectoFila->nombre
        )
    @endforeach
    <div class="input-field col s12 m6">
        {{Form::select('idProyecto',$proyectoIds,null)}}
        <label>Proyecto :</label>
    </div>

    @foreach($Estados as $estado)
        @php(
            $estadoids[$estado->id]=$estado->nombre
        )
    @endforeach
    <div class="input-field col s12 m6">
        {{Form::select('idEstado',$estadoids,null)}}
        <label>Estado :</label>
    </div>


</div>
{!!Form::submit('Guardar',['class'=>'waves-effect waves-light btn right']) !!}