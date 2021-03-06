<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crud and API</title>
	<!-- Scripts -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!-- Styles -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<link rel="stylesheet" href="../css/main.css">
</head>
<body>
	<!-- Navbar -->
	<header>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/crud_api">Crud+</a>
				</div>

				<div class="collapse navbar-collapse" id="navbar1">
					<ul class="nav navbar-nav">
						<!--<li class="active"><a href="#">Link<span class="sr-only">(current)</span></a></li>-->
						<li><a href="/crud_api/app/view/html/webservices/webservice.php">WEBSERVICES</a></li>
						<li><a href="/crud_api/app/view/html/crud/crud.php">CRUD</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/crud_api/app/view/html/register/register.php">Registro</a></li>
						<li><a href="/crud_api/app/view/html/login/login.php">Ingreso</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</header>
	<!-- Seccion #1 -->
	<section>
		<div class="container">
			<div class="jumbotron bg-trasparent-black">
				<h2>Acerca de...</h2>
				<p>Desarrollo de una Aplicacion Web para crear registros, inicio de sesion, CRUD, Web Service que retorna valores en JSON.</p>
				<p>Creacion para obtener datos de una BD para un dispositivo movil, ya sea en JAVA (Android) Swift (IOS) o cualquier otro lenguaje de programacion.</p>
				<p>
					Un servicio web (en inglés, Web Service o Web services) es una tecnología que utiliza un conjunto de protocolos y estándares que sirven para intercambiar datos entre aplicaciones. Distintas aplicaciones de software desarrolladas en lenguajes de programación diferentes, y ejecutadas sobre cualquier plataforma, pueden utilizar los servicios web para intercambiar datos en redes de ordenadores como Internet. La interoperabilidad se consigue mediante la adopción de estándares abiertos. Las organizaciones OASIS y W3C son los comités responsables de la arquitectura y reglamentación de los servicios Web. Para mejorar la interoperabilidad entre distintas implementaciones de servicios Web se ha creado el organismo WS-I, encargado de desarrollar diversos perfiles para definir de manera más exhaustiva estos estándares. Es una máquina que atiende las peticiones de los clientes web y les envía los recursos solicitados.
				</p>
				<p style="color: #76508E; ">Autor: Steven Medina</p>
			</div>
		</div>
	</section>
</body>
</html>