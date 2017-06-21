@extends('layout-proyectos')
@section('content')
    <div class="col s8 offset-s2">
        <div class="card">
            <div id="" class="card-content">

                <div class="row center">
                    <H4 class="col s12 ">Crear Proyecto </H4>
                </div>

                <div class="row center">
                    <div id="tabDatosPersonales" class="col s12 center">
                        {!! Form::open( ['route'=>'proyectos.store','method'=>'POST']) !!}
                        @include('proyectos.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection