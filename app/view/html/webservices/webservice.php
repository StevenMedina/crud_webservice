<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crud and API</title>
	<!-- Scripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/sweetalert2/1.3.4/sweetalert2.min.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.10.2/validator.min.js" crossorigin="anonymous"></script>
	<script src="../../../controller/js/users.js"></script>

	<!-- Styles -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/1.3.4/sweetalert2.min.css">
	<link rel="stylesheet" href="../../css/main.css">
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
						<li class="active"><a href="#">WEBSERVICES<span class="sr-only">(current)</span></a></li>
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
		<!-- Jumbotron -->
		<div class="container-fluid">
			<div class="jumbotron bg-trasparent-black">
				<h2>Web Service</h2>
				<p>Un servicio web (en inglés, Web Service o Web services) es una tecnología que utiliza un conjunto de protocolos y estándares que sirven para intercambiar datos entre aplicaciones. Distintas aplicaciones de software desarrolladas en lenguajes de programación diferentes, y ejecutadas sobre cualquier plataforma, pueden utilizar los servicios web para intercambiar datos en redes de ordenadores como Internet</p>
				<a href="/crud_api/app/view/html/about.html" class="btn btn-warning"><span>Conocer mas...</span></a>
			</div>
		</div>
	</section>
	
	<!-- Seccion #2 -->
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="jumbotron bg-trasparent-black">
						<span class="label label-success">Usuarios</span>
						<p>Peticion de usuarios por metodo get, listandolos por retorno en JSON.</p>
						<a href="/crud_api/app/controller/php/petitions/users/usersAll.php" class="btn btn-primary">Listar</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="jumbotron bg-trasparent-black">
						<span class="label label-success">Usuarios</span>
						<p>Peticion de usuarios por ID con el metodo GET, listandolo por retorno en JSON.</p>
						<a href="/crud_api/app/controller/php/petitions/users/userID.php" class="btn btn-primary">Listar</a>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="jumbotron bg-trasparent-black">
						<span class="label label-success">Articulos</span>
						<p>Peticion de articulos por metodo get, listandolos por retorno en JSON.</p>
						<a href="/crud_api/app/controller/php/petitions/posts.php" class="btn btn-primary">Listar</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>