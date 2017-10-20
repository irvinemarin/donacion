@extends('layout-campos')
@section('content')
    <div class="col s8 offset-s2">
        <div class="card">
            <div id="" class="card-content">

                <div class="row center">
                    <a class="btn-floating btn-small waves-effect waves-light blue tooltipped right"
                       href="{{ route('camposMisioneros.index')}}" data-position="top" data-delay="50"
                       data-tooltip="Cancelar">
                        <i class="material-icons">
                            replay
                        </i>
                    </a>
                    <H4>Editando Campo Misionero</H4>

                </div>

                <div class="row center">
                    <div id="tabDatosPersonales" class="col s12 center">
                        {!! Form::model($CampoMisionero, ['route' => ['camposMisioneros.update', $CampoMisionero->id], 'method' => 'PUT']) !!}
                        @include('campos.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection