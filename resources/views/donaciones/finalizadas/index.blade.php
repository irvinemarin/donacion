@extends('layout-finalizadas')
@section('content')
    <div class="fixed-action-btn horizontal click-to-toggle">

        <a class="btn-floating btn-large blue tooltipped" href="{{route('pdfs.showFinalizadas')}}" data-position="top"
           data-delay="50"
           data-tooltip="Ver Reporte">
            <i class="material-icons">library_books</i>
        </a>

    </div>
    <div class="container">
        <div class="card col s12 m10 l10 offset-l1">
            <div class="row">
                <h4 class="col s11 center">
                    Donaciones Finalizadas
                </h4>


                <div class="row">
                    <div class=" card-content col s12">
                        <table class="striped">
                            <thead>
                            <tr>

                                <th>Apellidos Nombres Donante</th>
                                <th>Codigo Donación</th>
                                <th>Cantidad</th>
                                <th>Nro Cuotas</th>
                                <th>Fecha Final</th>
                                <th>Proyecto</th>
                                <!-- <th >Accion</th> -->
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listaDonaciones as $fila)



                                <tr>
                                    <td>
                                        @foreach($donante as $donantefila)
                                            @if ($donantefila->id == $fila->idDonante)
                                                {{strtoupper( $donantefila -> apellidoPaterno) }} {{strtoupper( $donantefila -> apellidoMaterno )}}
                                                , {{ ucwords($donantefila -> nombres )}}
                                            @endif

                                        @endforeach


                                    </td>
                                    <td>{{ $fila -> codDonacion }}</td>
                                    <td>{{ $fila -> cantidad }}</td>
                                    <td>{{ $fila -> nroCuota }}</td>
                                    <td>{{ $fila -> fechaFinal }}</td>
                                    <td>
                                        @foreach($listaProyectos as $proyecto)
                                            @if ($proyecto->id == $fila->idProyecto)
                                                {{ $proyecto -> nombre }}
                                            @endif

                                        @endforeach


                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    {!!$listaDonaciones ->render()!!}

                </div>

            </div>
        </div>
@endsection