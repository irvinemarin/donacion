<table class="striped">
    <thead>
    <tr>
        <th>Nro. Registro</th>
        <th>Código Donante</th>
        <th>Apellidos y Nombres</th>
        <th>Campo Misionero</th>

        <th class="right">Acción</th>
    </tr>
    </thead>

    <tbody>
    @foreach($listDonantes as $donantefila)
        <tr>
            <td>{{ $donantefila -> id }}</td>
            <td>{{ $donantefila -> codDonante }}</td>            <td>
                {{strtoupper( $donantefila -> apellidoPaterno) }} {{strtoupper( $donantefila -> apellidoMaterno )}} {{ ucwords($donantefila -> nombres )}}
            </td>

            <td>
                @foreach($camposMisioneros as $campofila)
                    @if ($campofila->id == $donantefila->campoMisiId)
                        {{$campofila->descripcion}}
                    @endif
                @endforeach
            </td>

            <td class="center">
                <a
                        style="width: 40px;padding-right: 0px;padding-left: 0px;"
                        class="btn-flat blue-text waves-effect waves-light  tooltipped right "
                        href="{{ route('donantes.show', $donantefila->id) }}"
                        data-position="top"
                        data-delay="50"
                        data-tooltip="ver">
                    <i class="material-icons center">visibility</i>
                </a>


                {!! Form::open(['route' => ['donantes.destroy', $donantefila->id], 'method' => 'DELETE']) !!}
                <button
                        style="width: 40px;padding-right: 0px;padding-left: 0px;"
                        class="btn-flat red-text waves-effect waves-light  tooltipped  right"
                        data-position="top"
                        data-delay="50"
                        data-tooltip="Eliminar">
                    <i class="material-icons center">delete_forever</i>
                </button>
                {!! Form::close() !!}

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!!$listDonantes ->render()!!}