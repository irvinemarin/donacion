@extends('layout2')
@section('content')

    <div class="fixed-action-btn vertical ">

        <a class="btn-floating btn-large mdl-color--primary">
            <i class="large material-icons">menu</i>
        </a>
        <ul>
            <li><a class="btn btn-floating red tooltipped" data-position="left" data-delay="50"
                   data-tooltip="Agregar Abono" href="{{route('detalledonacion.createToDonacion',$donacion->id )}}">
                    <i class="material-icons">add</i>
                </a>
            </li>
            <li><a class="btn-floating blue darken-1 tooltipped" data-position="left" data-delay="50"
                   data-tooltip="Reporte por Promesa"
                   href="{{route('pdfs.showPromesa',[$donante1->id,$donacion->id] )}}">
                    <i class="material-icons">library_books</i>
                </a>
            </li>
            {{--<li><a class="btn-floating green darken-1 tooltipped" data-position="left" data-delay="50"--}}
            {{--data-tooltip="Exportar a Excel" href="{{route('excel.promesas')}}">--}}
            {{--<i class="material-icons">library_books</i>--}}
            {{--</a>--}}
            {{--</li>--}}


        </ul>

    </div>
    <div class="col s12 m12 l3">

        @include('donantes.partials.infoDonante')
    </div>
    <div class="col s12 m12 l9 ">
        <div class="row">

            <div class="card">

                <div class="card-content">
                    <a class="btn-floating btn-small waves-effect waves-light blue tooltipped right"
                       href="{{ route('donantes.show',$donacion->idDonante)}}" data-position="top" data-delay="50"
                       data-tooltip="Lista de Promesas">
                        <i class="material-icons">
                            replay
                        </i>
                    </a>
                    <h5 class="center ">Promesa</h5>
                    <h6 class="left blue-text">codigo de Promesa :{{$donacion->codDonacion}} </h6>
                    <h6 class="right blue-text">Cantidad Total de la Promesa :
                        S/ {{number_format($donacion->cantidad,2)}} </h6>


                    @include('donaciones.partials.listadetalledonacion')
                </div>
            </div>
        </div>
    </div>

@endsection