@extends('layout2')
@section('content')
    <div class="">
        <div class="col s6 offset-s3">
            <div class="card">
                <div id="" class="card-content">

                    <div class="row center">
                        <a class="btn-floating btn-small waves-effect waves-light blue tooltipped right"
                           href="{{ route('donantes.index')}}" data-position="top" data-delay="50"
                           data-tooltip="Cancelar">
                            <i class="material-icons">
                                replay
                            </i>
                        </a>
                        <H4 class="col s12 ">Editando Donante</H4>
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

                    <div class="row">


                        <div id="tabDatosPersonales" class="col s12">

                            <h6>Datos personales del Donante </h6>

                            {!! Form::model($listDonantes, ['route' => ['donantes.update', $listDonantes->id], 'method' => 'PUT']) !!}

                            @include('donantes.partials.form')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection