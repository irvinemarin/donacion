@extends('layout-campos')
@section('content')
    <div class="col s8 offset-s2">
        <div class="card">
            <div id="" class="card-content">

                <div class="row center">
                    <H4 class="col s12 ">Crear Campo Misionero</H4>
                    <a class="btn-floating btn-small waves-effect waves-light blue tooltipped r"
                       href="{{ route('camposMisioneros.index')}}" data-position="top" data-delay="50"
                       data-tooltip="Cancelar">
                        <i class="material-icons">
                            replay
                        </i>
                    </a>
                </div>

                <div class="row center">
                    <div id="tabDatosPersonales" class="col s12 center">
                        {!! Form::open( ['route'=>'camposMisioneros.store','method'=>'POST']) !!}
                        @include('campos.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection