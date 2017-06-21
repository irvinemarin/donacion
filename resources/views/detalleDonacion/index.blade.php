@extends('layout2')
@section('content')
    <div class="fixed-action-btn horizontal click-to-toggle">

        <a class="btn-floating btn-large mdl-color--primary tooltipped" href="{{ route('detalledonacion.create') }}"
           data-position="top" data-delay="50" data-tooltip="Agregar Abono"
        >
            <i class="material-icons">add</i>
        </a>

    </div>
    <div class="card col s12 m12 l8 offset-l2">
        <div class="row">
            <h4 class="col s12 center">


                Promesa para
            </h4>

        </div>
        <div class="row">
            <div class="col s12">
                <table class="striped responsive-table">
                    <thead>
                    <tr>

                        <th>Nro</th>
                        <th>idDonacion</th>
                        <th>abono</th>
                        <th>fecha</th>
                        <th>Nro Voucher</th>
                        <th>Acción</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ListaDetalleDonacion as $detalleDonacion)
                        <tr>
                            <td>{{ $detalleDonacion -> id }}</td>
                            <td>{{ $detalleDonacion -> idDonacion }}</td>
                            <td>{{ $detalleDonacion -> abono }}</td>
                            <td>{{ $detalleDonacion -> fecha }}</td>
                            <td>{{ $detalleDonacion -> campoMisioneroId }}</td>
                            <td>{{ $detalleDonacion -> nroVaucher }}</td>


                            <td>
                                <a class="btn-floating btn-small waves-effect waves-light blue "
                                   href="{{route('detalledonacion.edit',$detalleDonacion->id)}}">
                                    <i class="material-icons right">
                                        mode_edit
                                    </i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {!!$ListaDetalleDonacion ->render()!!}

        </div>

    </div>
@endsection