@extends('layout-proyectos')
@section('content')
    <div class="fixed-action-btn horizontal click-to-toggle">

        <a class="btn-floating btn-large mdl-color--primary tooltipped" href="{{ route('proyectos.create') }}"
           data-position="top" data-delay="50" data-tooltip="Agregar Proyecto">
            <i class="material-icons">add</i>
        </a>

    </div>
    <div class="card col s12 m12 l8 offset-l2">
        <div class="row">
            <h4 class="col s12 center">
                Lista de Proyectos
            </h4>

        </div>
        <div class="row">
            <div class="col s12">
                <table class="striped responsive-table">
                    <thead>
                    <tr>

                        <th>Nro</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Accion</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $nroOrden = 0;
                    ?>
                    @foreach($listProyectos as $proyecto)
                        <?php
                        $nroOrden++;
                        ?>
                        <tr>
                            {{--<td>{{  $nroOrden }}</td>--}}
                            <td>{{ $proyecto -> id }}</td>
                            <td>{{ $proyecto -> nombre }}</td>


                            <td>
                                @foreach($Estados as $estado)
                                    @if($estado->id== $proyecto -> idEstado)
                                        {{ $estado -> nombre }}

                                    @endif
                                @endforeach
                            </td>


                            <td>
                                <a class="btn-floating btn-small waves-effect waves-light blue tooltipped"
                                   data-position="right" data-delay="50" data-tooltip="Editar"
                                   href="{{route('proyectos.edit',$proyecto->id)}}">
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

            {!!$listProyectos ->render()!!}

        </div>

    </div>
@endsection