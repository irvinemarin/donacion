@extends('layout2')
@section('content')
    <div id="" class=" card col s12 m6 push-m3">
        <div class="card-content">
            <a class="btn-floating btn-small waves-effect waves-light blue tooltipped right"
               href="{{ route('donantes.show',$donante->id)}}" data-position="top" data-delay="50"
               data-tooltip="Cancelar">
                <i class="material-icons">
                    replay
                </i>
            </a>
            <h5 class="center">Agregando Donación  para </h5>
            <h5>{{strtoupper( $donante -> apellidoPaterno) }} {{strtoupper( $donante -> apellidoMaterno )}}
                , {{ ucwords($donante -> nombres )}} </h5>
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
            {!! Form::open( ['route'=>'donaciones.store','method'=>'POST','donante'=>$donante]) !!}
            <div class="row ">
                {!!Form::hidden('idDonante',$donante->id,['class'=>'validate','placeholder'=>'IdDonante']) !!}

                <?php  $hoy = date("Y");   ?>

                {!!Form::hidden('codDonacion',null,['class'=>'validate']) !!}

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
                <div class="input-field col s12 m4 l4">
                    <i class="material-icons prefix">
                        today
                    </i>
                    {!!Form::text('fechain',null,['class'=>'datepicker']) !!}

                    <label for="fechain">
                        Fecha Inicio:
                    </label>

                </div>
                <div class="input-field col s12 m4 l4">
                    <i class="material-icons prefix">
                        today
                    </i>
                    {!!Form::text('fechaFinal',null,['class'=>'datepicker']) !!}

                    <label for="fechaFinal">
                        Fecha Final:
                    </label>

                </div>


                <div class="input-field col s12 m4 l4">

                    {!!Form::text('modalidad',null,['class'=>'validate']) !!}
                    <label>Modalidad</label>
                </div>


                <div class="input-field col s12">
                    <select name="idProyecto">

                        @foreach($Proyectos as $proyectoFila)
                            <option value="{{$proyectoFila->id}}">{{$proyectoFila->nombre}}</option>
                        @endforeach
                    </select>
                    <label>Proyecto :</label>
                </div>
                <div class="input-field col s12">
                    <select name="idEstado">

                        @foreach($Estados as $estado)
                            <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                        @endforeach
                    </select>
                    <label>Estado :</label>

                </div>
                {!!Form::submit('Guardar',['class'=>'waves-effect waves-light btn right']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection