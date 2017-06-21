@extends('layout2')
@section('content')
    <div class="col s8 offset-s2">
        <div class="card">
            <div id="" class="card-content">

                <div class="row center">
                    <H4 class="col s12 ">Editando Donacion</H4>
                    <a class="btn-floating btn-small waves-effect waves-light blue tooltipped r"
                       href="{{ route('donantes.show',$donante->id)}}" data-position="top" data-delay="50"
                       data-tooltip="Cancelar">
                        <i class="material-icons">
                            replay
                        </i>
                    </a>
                </div>

                <div class="row center">


                    <div id="tabDatosPersonales" class="col s12 center">


                        {!! Form::model($donacion, ['route' => ['donaciones.update', $donacion->id], 'method' => 'PUT']) !!}

                        @include('donaciones.partials.form')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection