@extends('layout-campos')
@section('content')
    <div class="fixed-action-btn horizontal click-to-toggle">

        <a class="btn-floating btn-large mdl-color--primary tooltipped" href="{{ route('camposMisioneros.create') }}"
           data-position="top" data-delay="50" data-tooltip="Agregar Campo Misionero"
        >
            <i class="material-icons">add</i>
        </a>

    </div>
    <div class="card col s12 m12 l8 offset-l2">
        <div class="row">
            <h4 class="col s12 center">
                Campos Misioneros
            </h4>

        </div>
        <div class="row">
            <div class="col s12">
                <table class="striped responsive-table">
                    <thead>
                    <tr>


                        <th>Siglas</th>
                        <th>Descripción</th>
                        <th>Tipo Entidad</th>
                        <th>Acción</th>

                    </tr>
                    </thead>
                    <tbody>


                    @foreach($ListaCamposMis as $camposMisionero)

                        <tr>


                            <td>{{ $camposMisionero -> nombre }}</td>
                            <td>{{ $camposMisionero -> descripcion }}</td>
                            <td>{{ $camposMisionero -> lugarSuperior }}</td>


                            <td>
                                <a class="btn-floating btn-small waves-effect waves-light blue "
                                   href="{{route('camposMisioneros.edit',$camposMisionero->id)}}">
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

            {!!$ListaCamposMis ->render()!!}

        </div>

    </div>
@endsection