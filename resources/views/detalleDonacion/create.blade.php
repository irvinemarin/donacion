@extends('layout2')
@section('content')
    <div class="col s4 offset-s4">
        <div class="card">
            <div id="" class="card-content">

                <div class="row center">
                    <H4 class="">Agregar Abono</H4>
                    @if (count($errors) > 0)
                        <div id="card-alert" class="card red lighten-5">
                            <a class="btn-flat close red-text right" data-dismiss="alert"
                               aria-label="Close">x
                            </a>
                            <div class="card-content red-text">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <i class="left material-icons">error</i>
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="row center">
                    <div id="tabDatosPersonales" class="col s12 center">
                        {!! Form::open( ['route'=>'detalledonacion.store','method'=>'POST']) !!}
                        <div class="row ">
                            {!!Form::hidden('id',null,['class'=>'validate','placeholder'=>'id']) !!}
                            <div class="input-field col s12 ">
                                {!!Form::number('abono',null,['class'=>'validate','placeholder'=>'Ingrese la cantidad de Deposito']) !!}
                                <label for="abono">
                                    Cantidad de Abono:
                                </label>
                            </div>
                            <div class="input-field col s12 ">
                                <i class="material-icons prefix">
                                    today
                                </i>
                                {!!Form::text('fecha',null,['class'=>'datepicker','placeholder'=>'Click para Seleccionar una fecha']) !!}
                                <label for="Fecha">
                                    Fecha de Deposito :
                                </label>
                            </div>
                            <div class="input-field col s12 ">
                                {!!Form::text('nroVaucher',null,['class'=>'validate','placeholder'=>'Ingrese el nro del Voucher']) !!}
                                <label for="nroVaucher">
                                    Nro Voucher :
                                </label>
                            </div>

                            {!!Form::hidden('campoMisioneroId',$donante->campoMisiId) !!}
                            {!!Form::hidden('idDonacion',$Donacion->id) !!}
                            {!!Form::submit('Guardar',['class'=>'waves-effect waves-light btn right']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection