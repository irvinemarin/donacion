@extends('layout2')
@section('content')
    <div class="col s8 offset-s2">
        <div class="card">
            <div id="" class="card-content">

                <div class="row center">
                    <a class="btn-floating btn-small waves-effect waves-light blue tooltipped right"
                       href="{{ route('donantes.show',$donante->id)}}" data-position="top" data-delay="50"
                       data-tooltip="Cancelar">
                        <i class="material-icons">
                            replay
                        </i>
                    </a>
                    <H4 class="center ">Editando Detalle Donacion</H4>

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
                        {!! Form::model($detalleDonacion, ['route' => ['detalledonacion.update', $detalleDonacion->id], 'method' => 'PUT']) !!}
                        @include('detalledonacion.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection