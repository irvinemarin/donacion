<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 2</title>

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
                            <img src="/assets/img/logo_izquierda.png" alt="">
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
                                <b> REPORTE POR DONANTE </b>
                            </h6>
                        </div>
                        <div class="col s2 right">
                            <img style="width: 3cm; height: 3cm;" src="/assets/img/logo_derecha.png" alt="">
                        </div>


                    </div>


                    <h6>Datos Donante</h6>
                    <div id="company" class="clearfix">


                        <div><span>EMAIL</span> {{ $donante1->email }}</div>
                        <div><span>F. NACIMIENTO</span>{{ $donante1->fechaNac }}</div>
                        <div><span>CAMPO MISIONERO</span>


                            {{$CampoMisionero->nombre }}</div>
                        <div><span>CARGO</span> {{ $donante1->cargo }}</div>
                        <div><span>ESTADO</span> {{ $Estado->nombre }}</div>
                    </div>
                    <div id="project">

                        <div><span>CODIGO DONANTE</span> {{ $donante1->codDonante }}</div>
                        <div>
                            <span>DONANTE</span>
                            {{strtoupper( $donante1 -> apellidoPaterno) }} {{strtoupper( $donante1 -> apellidoMaterno )}}
                            , {{ ucwords($donante1 -> nombres )}}
                        </div>

                        <div><span>DIRECCION</span> {{ $donante1->direccion }}</div>
                        <div><span>DNI</span> {{ $donante1->dni }}</div>
                        <div><span>CELULAR</span> {{ $donante1->celular }}</div>


                    </div>
                </header>

                <main>
                    <div class="row ">
                        <h4>Donaciones </h4>
                        <div class="col s12 m12">
                            <table class="striped responsive-table">
                                <thead>
                                <tr>


                                    <th>Codigo</th>
                                    <th>Cantidad</th>
                                    <th>N° Cuota</th>
                                    <th>Abono</th>
                                    <th>F. Inicio</th>
                                    <th>F. Final</th>


                                    <th>Proyecto</th>
                                    <th>Estado</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($listaDonaciones as $fila)
                                    <tr>

                                        <td>{{ $fila -> codDonacion }}</td>
                                        <td>S/ {{ number_format($fila -> cantidad,2) }}</td>
                                        <td>{{ $fila -> nroCuota }}</td>
                                        <td>S/ {{number_format($fila -> abono,2) }}</td>
                                        <td>{{ $fila -> fechain }}</td>
                                        <td>{{ $fila -> fechaFinal }}</td>


                                        <td>
                                            @foreach($ListaProyectos as $filaProyecto)


                                                @if($filaProyecto->id==$fila -> idProyecto)
                                                    {{$filaProyecto->nombre  }}

                                                @endif
                                            @endforeach
                                        </td>
                                        EstadoList
                                        <td>
                                            @foreach($EstadoList as $filaEstado)


                                                @if($filaEstado->id==$fila -> idEstado)
                                                    {{$filaEstado->nombre  }}

                                                @endif
                                            @endforeach
                                            {{ $fila -> estado }}
                                        </td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {!!$listaDonaciones ->render()!!}
                        </div>
                        <div class="right">Total S/.{{ number_format($total,2) }}</div>
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
                </main>
            </div>
        </div>
    </div>

</body>
</html>