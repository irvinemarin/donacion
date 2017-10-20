@extends('layout2')
@section('content')
    <div class="fixed-action-btn vertical ">

        <a class="btn-floating btn-large mdl-color--primary">
            <i class="large material-icons">menu</i>
        </a>
        <ul>
            <li><a class="btn btn-floating red tooltipped" data-position="left" data-delay="50"
                   data-tooltip="Agregar Donacion" href="{{route('donaciones.createToDonante',$donante1->id )}}">
                    <i class="material-icons">add</i>
                </a>
            </li>
            <li><a class="btn-floating blue darken-1 tooltipped" data-position="left" data-delay="50"
                   data-tooltip="Reporte por donante" href="{{route('pdfs.show',$donante1->id )}}">
                    <i class="material-icons">library_books</i>
                </a>
            </li>
        </ul>

    </div>
    <div class="col s12 m12 l3">
        @include('donantes.partials.infoDonante')
    </div>
    <div class="col s12 m12 l9 ">
        <div class="row">
            <div class="card">
                <div class="card-content">
                    <h5 class="center">Lista de Promesas </h5>
                    @include('donantes.partials.listadonaciones')
                </div>
            </div>
        </div>
    </div>
@endsection