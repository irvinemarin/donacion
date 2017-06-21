<div class="row">
    <div class="col s12 m12">
        <table class="striped responsive-table">
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Cantidad</th>
                <th>Cuotas</th>
                <th>Abono</th>
                <th>Frecuencia</th>
                <th>F. Inicio</th>
                <th>F. Final</th>
                <th>Modalidad</th>
                <th>Proyecto</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($listaDonaciones as $fila)
                <tr>

                    <td>{{ $fila -> codDonacion }}</td>
                    <td>S/{{number_format($fila -> cantidad,2) }}</td>
                    <td>{{ $fila -> nroCuota }}</td>
                    <td>S/{{number_format($fila -> abono,2) }}</td>
                    <td>{{ $fila -> frecuencia }}</td>
                    <td>{{ $fila -> fechain }}</td>
                    <td>{{ $fila -> fechaFinal }}</td>
                    <td>{{ $fila -> modalidad }}</td>

                    <td>

                        @foreach($Proyectos as $proyecto)
                            @if ($proyecto->id == $fila->idProyecto)
                                {{$proyecto->nombre}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($EstadosFull as $estado)
                            @if ($estado->id == $fila->idEstado)
                                {{$estado->nombre}}
                            @endif
                        @endforeach


                    </td>


                    <td>


                        <a class="waves-effect waves-light tooltipped "
                           data-position="right" data-delay="50" data-tooltip="Editar"
                           href="{{route('donaciones.edit', $fila->id)}}">
                            <i class="material-icons">
                                mode_edit
                            </i>
                        </a>
                        <a class="waves-effect waves-light tooltipped "
                           data-position="right" data-delay="50" data-tooltip="Ver Estado Promesa"
                           href="{{route('donaciones.show', $fila->id)}}">
                            <i class="material-icons">
                                visibility
                            </i>
                        </a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!!$listaDonaciones ->render()!!}
    </div>


</div>