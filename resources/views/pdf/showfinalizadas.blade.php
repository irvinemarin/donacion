<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte Promesa</title>

    {!! Html::style('assets/css/materialize.css') !!}
    {!!Html::style('//fonts.googleapis.com/icon?family=Material+Icons')!!}
    {!! Html::style('assets/css/stylepdf.css') !!}
</head>
<body class=" " style="background-color: #a5b4c0; height: 29.7cm;">
<div class="card alto-hoja">
    <div class=" card-content">
        <div class="fixed-action-btn horizontal click-to-toggle">

            <a class="btn-floating btn-large mdl-color--primary tooltipped" href="#" onclick="window.print();">
                <i class="material-icons">print</i>
            </a>

        </div>
        <div>
            <div class="col s12 ">
                <header class="clearfix">
                    <div class="row ">
                        <div class="col s2 ">
                            <img style="width: 2.5cm; height: 2.5cm;" src="/assets/img/logo_izquierda.png" alt="">
                        </div>

                        <div class="col s8 center">
                            <h5>
                                <b>
                                    UNIVERSIDAD PERUANA UNIÓN
                                </b>
                            </h5>
                            <h5>
                                “Juntos en un mismo esfuerzo”
                            </h5>
                            <h6 class="red-text">
                                <b> DONACIONES FINALIZADAS</b>
                            </h6>
                        </div>
                        <div class="col s2 right">
                            <img style="width: 3cm; height: 3cm;" src="/assets/img/logo_derecha.png" alt="">
                        </div>
                    </div>
                </header>
            </div>

        </div>
        <div class="row">
            <div class=" card-content col s12">
                <table class="striped">
                    <thead>
                    <tr>

                        <th>Apellidos y Nombres Donante</th>
                        <th>Cod.Promesa</th>
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
                            <td>S/ {{ number_format($fila -> cantidad,2) }}</td>
                            <td>{{ $fila -> nroCuota }}</td>
                            <td>{{ $fila -> fechaFinal }}</td>
                            <td>
                                @foreach($listaProyectos as $proyecto)
                                    @if ($proyecto->id == $fila->idProyecto)
                                        {{ $proyecto -> nombre }}
                                    @endif

                                @endforeach


                            </td>
                            <td>
                            <!-- <a class="btn-floating  waves-effect waves-light blue tooltipped right" href="{{ route('donantes.show', $donantefila->id) }}" data-position="top" data-delay="50" data-tooltip="ver">
										<i class="material-icons">visibility</i>
									</a> -->

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            {!!$listaDonaciones ->render()!!}

        </div>


        <footer>
            Dirección Genreal de Cooperación y Relaciones Nacionales e Internacional –
            Villa Unión – Ñaña, altura Km 19 de la Carretera Central, Lurigancho – Chosica / Teléfono
            (01)6186340 / Email donaciones@upeu.edu.pe
            <P>
                <b>BBVA </b> S/. 0011-0661-02-00048940 - $: 0011-0661-01-00043380

                <b> BCP</b> S/. 193-32180705-0-62 - $: 191-09547660-1-99

            </P>
        </footer>
    </div>
</div>


</body>
</html>