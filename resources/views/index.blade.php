<!DOCTYPE HTML>
<!--
	Aerial by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Sistema de Donaciones</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>


    <link rel="stylesheet" href="assets/css/main.css"/>
    {!!Html::style('fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en')!!}

    {!!Html::style('assets/css/material.min.css')!!}
    {!!Html::style('//fonts.googleapis.com/icon?family=Material+Icons')!!}
    {!!Html::style('assets/css/materialize.css')!!}

</head>
<body class="loading">
<div id="wrapper">
    <div id="bg"></div>
    <div id="overlay"></div>
    <div id="main">
        <!-- Header -->
        <header id="header2">
            <h1>“Dirección General de Cooperación y de Relaciones Nacionales e Internacionales”</h1>
            <!--<p>Chirimoyas 1° &nbsp;&bull;&nbsp; Chirimoyas 2° &nbsp;&bull;&nbsp; Chirimoyas 3°&nbsp;&bull;&nbsp;Chirimoyas 4°</p>-->
            <p>
            <H5>
                <a href="#modal1">Ingresar</a>
            </H5>
            </p>
        </header>
        <!-- Footer -->
        <footer id="footer">
            <span class="copyright">&copy; MHCS Consulting <a href="#">MHCS Consulting</a>.</span>
        </footer>
    </div>
    s
</div>
<!-- Modal Trigger -->

<!-- Modal Structure -->
<div id="modal1" class="modal light-blue-text">

    <div class="row ">
        <div class="row center">
            <div id="tabDatosPersonales" class="col s12 center">
                {!! Form::open( ['route'=>'usuarios.login','method'=>'POST']) !!}
                <div class="row  col s12  center">
                    <div class="card ">
                        <div id="tabDatosPersonales" class="col s12  center card-content">
                            <h4 class="black-text">Iniciar Sesion</h4>
                            <div class="row ">
                                {!!Form::hidden('id',null,['class'=>'validate','placeholder'=>'id']) !!}


                                <div class="input-field col s12 m12 center ">
                                    {!!Form::text('userName',null,['class'=>'validate  black-text center']) !!}
                                    <label for="userName">
                                        Usuario :
                                    </label>
                                </div>

                                <div class="input-field col s12 m12 center ">
                                    {!!Form::password('userPassword',null,['class'=>'validate  black-text center blue' ]) !!}
                                    <label for="userPassword">
                                        Password :
                                    </label>
                                </div>


                                {!!Form::hidden('estado',8,['class'=>'validate']) !!}


                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12 center ">
                                    {!!Form::submit('Ingresar',['class'=>'waves-effect waves-light btn col s12 ']) !!}

                                </div>
                                <div class="input-field col s12 m12 center ">
                                    <a class="waves-effect waves-light btn  col s12">Cancelar</a>
                                </div>


                            </div>

                        </div>

                    </div>

                </div>
                {!! Form::close() !!}
            </div>
        </div>



    </div>


</div>


<!--[if lte IE 8]>
<script src="assets/js/ie/respond.min.js"></script><![endif]-->
{!!Html::script('assets/js/jquery.js')!!}
{!!Html::script('assets/js/moment.js')!!}
{!!Html::script('assets/js/materialize.js')!!}
{!!Html::script('assets/js/init.min.js')!!}
{!!Html::script('assets/js/myscript.js')!!}
{!!Html::script('assets/js/material.min.js')!!}
<script>
    window.onload = function () {
        document.body.className = '';
    }
    window.ontouchmove = function () {
        return false;
    }
    window.onorientationchange = function () {
        document.body.scrollTop = 1;
    }
</script>
</body>
</html>