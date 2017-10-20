<div class="row ">


    {!!Form::hidden('id',null,['class'=>'validate','placeholder'=>'id']) !!}


    <div class="input-field col s12 m6 l4">
        {!!Form::number('abono',null,['class'=>'validate','placeholder'=>'Ingrese la cantidad a abonar','step'=>'any']) !!}
        <label for="abono">
            Cantidad de Abono:
        </label>
    </div>
    <div class="input-field col s12 m6 l4">
        <i class="material-icons prefix">
            today
        </i>
        {!!Form::text('fecha',null,['class'=>'datepicker','placeholder'=>'Ingrese la fecha de deposito']) !!}
        <label for="Fecha">
            Fecha de Deposito:
        </label>
    </div>
    <div class="input-field col s12 m6 l4">
        {!!Form::text('nroVaucher',null,['class'=>'validate','placeholder'=>'Ingrese Numero de Voucher']) !!}
        <label for="nroVaucher">
            Nro Voucher :
        </label>
    </div>
    {!!Form::hidden('campoMisioneroId',null,['class'=>'validate']) !!}
    {!!Form::hidden('idDonacion',null,['class'=>'validate']) !!}


</div>
{!!Form::submit('Guardar',['class'=>'waves-effect waves-light btn right']) !!}