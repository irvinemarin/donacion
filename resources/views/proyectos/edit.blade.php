@extends('layout-proyectos')
@section('content')
    <div class="col s8 offset-s2">
        <div class="card">
            <div id="" class="card-content">

                <div class="row center">
                    <a class="btn-floating btn-small waves-effect waves-light blue tooltipped right"
                       href="{{ route('proyectos.index')}}" data-position="top" data-delay="50"
                       data-tooltip="Cancelar">
                        <i class="material-icons">
                            replay
                        </i>
                    </a>

                    <H4>Editando Proyecto</H4>

                </div>

                <div class="row center">
                    <div id="tabDatosPersonales" class="col s12 center">
                        {!! Form::model($proyecto, ['route' => ['proyectos.update', $proyecto->id], 'method' => 'PUT']) !!}
                        @include('proyectos.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection