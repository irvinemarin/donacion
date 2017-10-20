@extends('layout-users')
@section('content')
    <div class="col s4 offset-s4">
        <div class="card">
            <div id="" class="card-content">

                <div class="row center">
                    <a class="btn-floating btn-small waves-effect waves-light blue tooltipped right"
                       href="{{ route('usuarios.index')}}" data-position="top" data-delay="50"
                       data-tooltip="Cancelar">
                        <i class="material-icons">
                            replay
                        </i>
                    </a>

                    <H4>Editando Usuario</H4>
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
                        {!! Form::model($Usuario, ['route' => ['usuarios.update', $Usuario->id], 'method' => 'PUT']) !!}
                        @include('usuarios.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection