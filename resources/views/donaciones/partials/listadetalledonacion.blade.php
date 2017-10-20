<div class="row">
    <div class="col s12 m12">
        <table class="striped responsive-table">
            <thead>
            <tr>

                <th>Fecha Registro</th>
                <th>Campo Misionero</th>
                <th>Nro Voucher</th>
                <th>Cantidad Abonada</th>
                <th class="right">Accion</th>
            </tr>
            </thead>
            <tbody>
            @php($nroOrden=0)
            @php($Suma=0)
            @foreach($ListaDetalleDonacion as $fila)
                @php($Suma=$fila->abono+$Suma)
                <tr>

                    <td>{{ strtoupper($fila -> fecha->format("F Y")) }}</td>
                    <td>
                        @foreach($camposMisioneros as $canpoMisionero)
                            @if ($canpoMisionero->id== $fila -> campoMisioneroId)
                                {{$canpoMisionero->descripcion}}
                            @endif
                        @endforeach

                    </td>
                    <td>{{ $fila -> nroVaucher }}</td>
                    <td>S/ {{ number_format($fila -> abono,2) }}</td>

                    <td>


                        <a class="waves-effect waves-light tooltipped  right"
                           data-position="right" data-delay="50" data-tooltip="Editar"
                           href="{{route('detalledonacion.edit', $fila->id)}}">
                            <i class=" material-icons ">
                                mode_edit
                            </i>
                        </a>


                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        {{--        <p class="blue-text right"> Total de S/.{{$donacion->cantidad}}.00 - </p>--}}
        <br>
        <br>
        <p class="blue-text right"> Total de S/.{{ number_format($Suma,2)}}</p>
        <br>
        <br>
        <p class="red-text right">
            <?php
            $Restante = $donacion->cantidad - $Suma;
            ?>
            Restante S/ {{number_format($Restante,2)}}
        </p>
        {!!$ListaDetalleDonacion ->render()!!}
    </div>


</div>