<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte Promesa</title>

    {!! Html::style('assets/css/materialize.css') !!}
    {!! Html::style('//fonts.googleapis.com/icon?family=Material+Icons')!!}
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
            {{App::setLocale('es')}}
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
                            <h6>
                                <b> REPORTE POR PROMESA </b>
                            </h6>
                        </div>
                        <div class="col s2 right">
                            <img style="width: 3cm; height: 3cm;" src="/assets/img/logo_derecha.png" alt="">
                        </div>


                    </div>


                    <div id="company" class="clearfix">

                        <div><h6>Datos Promesa</h6></div>
                        <div><span>CODIGO PROMESA</span> {{$donacion->codDonacion}}</div>

                        <div><span>MONTO</span>S/ {{number_format($donacion->cantidad,2)}}</div>
                        <div><span>NRO DE CUOTAS</span> {{$donacion->nroCuota}}</div>
                        <div><span>AÑO PROMESA</span>
                            @php($año=date("Y",strtotime($donacion->fechain)))
                            {{ $año }}
                        </div>
                        <div><span>PROYECTO</span>
                            {{$Proyecto->nombre}}
                        </div>

                    </div>
                    <div id="project">

                        <div><h6>Datos Donante</h6></div>
                        <div><span>CODIGO DONANTE</span> {{ $donante1->codDonante }}</div>
                        <div>
                            <span>DONANTE</span>
                            {{strtoupper( $donante1 -> apellidoPaterno) }} {{strtoupper( $donante1 -> apellidoMaterno )}}
                            , {{ ucwords($donante1 -> nombres )}}
                        </div>
                        <div><span>DNI</span> {{ $donante1->dni }}</div>
                        <div><span>CAMPO MISIONERO</span> {{ $CampoMisionero->nombre }}</div>
                        <div><span>CARGO</span> {{ $donante1->cargo }}</div>


                    </div>
                </header>

                <main>

                    <div class="row ">
                        <h4>Depósitos Mensuales </h4>
                        <div class="col s12 m12">
                            <table class="striped responsive-table">
                                <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Campo Misionero</th>
                                    <th>Nro Voucher</th>
                                    <th class="right">Cantidad</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $nroOrden = 0;
                                ?>
                                @foreach($ListaAbonos as $fila)
                                    <tr>
                                        <?php
                                        $nroOrden++;
                                        ?>
                                        <td>
                                            {{ $fila->fecha->format('F Y ')   }}
                                        </td>
                                        <td>
                                            @php($campo=\App\CE_CampoMisionero::find($fila->campoMisioneroId))
                                            {{$campo->descripcion}}

                                        </td>


                                        <td>{{ $fila -> nroVaucher }}</td>
                                        <td class="right">S/ {{ number_format($fila -> abono,2) }}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {!!$ListaAbonos ->render()!!}
                        </div>
                        <div class="row">
                            <div class="right "><b>Total S/ {{ number_format($total,2) }} </b></div>
                        </div>
                        <?php
                        $Restante = 0.00;
                        $Restante = $donacion->cantidad - $total;
                        ?>
                        <div class="row">
                            <div class="right red-text"><b>Restante S/ {{ number_format($Restante,2)}}</b></div>
                        </div>

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
                </main>
            </div>
        </div>
    </div>
</div>

</body>
</html>