<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Donaciones</title>
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <link rel="shortcut icon" href="images/favicon.png">

    {!!Html::style('fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en')!!}

    {!!Html::style('assets/css/material.min.css')!!}
    {!!Html::style('assets/css/styles.css')!!}
    {!!Html::style('//fonts.googleapis.com/icon?family=Material+Icons')!!}
    {!!Html::style('assets/css/materialize.css')!!}
    {!!Html::style('stylepdf.css')!!}


</head>
<body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">

{{--<div class="row">--}}
{{--<div class="col s4 m4">--}}
{{--{!! Form::open( ['route'=>'excel.import.donante','method'=>'POST']) !!}--}}
{{--<input id="fileinput" type="file" name="excel" accept=".xls,.xlsx">--}}
{{--{!! Form::submit('enviar',['class'=>'btn btn-small waves-effect waves-light right']) !!}--}}
{{--{!! Form::close() !!}--}}
{{--</div>--}}
{{--</div>--}}

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
        <div class="mdl-layout--large-screen-only mdl-layout__header-row" style="background-color: white;">
            <img src="http://cooperacion.upeu.edu.pe/wp-content/uploads/2017/05/logo-cooperacion-flotante.png">
        </div>
        <div>
            <a href="{{route('donantes.index')}}" class="mdl-layout__tab is-active">Donantes</a>
            <a href="{{route('donaciones.finalizadas.index')}}" class="mdl-layout__tab">Donaciones
                Finalizadas</a>
            <a href="{{route('camposMisioneros.index')}}" class="mdl-layout__tab">Campos Misioneros</a>
            <a href="{{route('proyectos.index')}}" class="mdl-layout__tab">Proyectos</a>
            <a href="{{route('usuarios.index')}}" class="mdl-layout__tab">Usuarios</a>

        </div>
    </header>
    <main class="">

        <div class="container">
            <div class="row">
                <div class="col s12 m12 center">
                    @yield('content')
                </div>
            </div>
        </div>


    </main>

</div>
<!-- Footer -->

</footer>


{!!Html::script('assets/js/jquery.js')!!}
{!!Html::script('assets/js/moment.js')!!}
{!!Html::script('assets/js/materialize.js')!!}
{!!Html::script('assets/js/init.min.js')!!}
{!!Html::script('assets/js/myscript.js')!!}
{!!Html::script('assets/js/material.min.js')!!}
@yield('script')
</body>
</html>
