@extends('layout-users')
@section('content')
    <div class="col s4 offset-s4">
        <div class="card">
            <div id="" class="card-content">

                <div class="row center">
                    <H4 class="col s12 ">Crear Usuario </H4>
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
                        {!! Form::open( ['route'=>'usuarios.store','method'=>'POST']) !!}
                        @include('usuarios.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection