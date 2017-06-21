<!DOCTYPE HTML>
<!--
	Aerial by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Sistema de Donaciones</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />

		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">
				<!-- Header -->
				<header id="header">
					<h1>“Dirección General de Cooperación y de Relaciones Nacionales e Internacionales”</h1>
					<!--<p>Chirimoyas 1° &nbsp;&bull;&nbsp; Chirimoyas 2° &nbsp;&bull;&nbsp; Chirimoyas 3°&nbsp;&bull;&nbsp;Chirimoyas 4°</p>-->
					<p>

						<span><a style="font-weight: bold; font-size: 48px;" href="{{route('donantes.index')}}">Ingresar</a></span>
					</p>
					<nav class="nav">
						<ul>
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>


						</ul>
					</nav>
				</header>
				<!-- Footer -->
				<footer id="footer">
					<span class="copyright">&copy; MHCS Consulting <a href="#">MHCS Consulting</a>.</span>
				</footer>
			</div>
		</div>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		{!!Html::script('assets/js/jquery.js')!!}
		{!!Html::script('assets/js/materialize.min.js')!!}
		{!!Html::script('assets/js/init.min.js')!!}
		{!!Html::script('assets/js/myscript.js')!!}
		<script>
			window.onload = function() { document.body.className = ''; }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 1; }
		</script>
	</body>
</html>