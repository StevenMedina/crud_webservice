<?php require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/app/model/classes/users.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/app/model/classes/posts.php'); ?>
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
						<!--<li class="active"><a href="#">Link<span class="sr-only">(current)</span></a></li>-->
						<li><a href="#">WEBSERVICES</a></li>
						<li class="active"><a href="#">CRUD<span class="sr-only">(current)</span></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Registro</a></li>
						<li><a href="#">Ingreso</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</header>
	<!-- Seccion #1 -->
	<section>
		<!-- Jumbotron -->
		<div class="container-fluid">
			<div class="jumbotron" id="jumbotronCrud">
				<h2>Crud</h2>
				<p>En computación CRUD es el acrónimo de Crear, Leer, Actualizar y Borrar (del original en inglés: Create, Read, Update and Delete). Se usa para referirse a las funciones básicas en bases de datos o la capa de persistencia en un software.</p>
				<a href="/crud_api/app/view/html/about.html" class="btn btn-warning"><span>Conocer mas...</span></a>
			</div>
		</div>
	</section>
	
	<?php 
		$user = new User();
		$conexion = new Conexion();
		$dataUser = $user::listar( $conexion );
	?>

	<?php 
		$post = new Post();
		$dataPost = $post::listar( $conexion );
	?>

	<section>
		<div class="container">
			<h2>Usuarios</h2>

			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Usuario</th>
						<th>Contraseña</th>
						<th>Ciudad</th>
						<th>Telefono</th>
				    </tr>
				</thead>
				<tbody>
					<?php $cantidadUser = count( $dataUser['result'] ); ?>
					<?php if ( $cantidadUser == 1 ) : ?>
						<?php for ( $i = 0; $i < $cantidadUser; $i++ ) : ?> 
							<tr>
								<td><?php echo( $dataUser['result'][$i]['id'] ); ?></td>
								<td><?php echo( $dataUser['result'][$i]['name'] ); ?></td>
								<td><?php echo( $dataUser['result'][$i]['user'] ); ?></td>
								<td><?php echo( $dataUser['result'][$i]['password'] ); ?></td>
								<td><?php echo( $dataUser['result'][$i]['city'] ); ?></td>
								<td><?php echo( $dataUser['result'][$i]['phone'] ); ?></td>
							</tr>
						<?php endfor; ?>
					<?php else : ?>
						<?php for ( $i = 0; $i < $cantidadUser ; $i++ ) : ?> 
							<tr>
								<td><?php echo( $dataUser['result'][$i]['id'] ); ?></td>
								<td><?php echo( $dataUser['result'][$i]['name'] ); ?></td>
								<td><?php echo( $dataUser['result'][$i]['user'] ); ?></td>
								<td><?php echo( $dataUser['result'][$i]['password'] ); ?></td>
								<td><?php echo( $dataUser['result'][$i]['city'] ); ?></td>
								<td><?php echo( $dataUser['result'][$i]['phone'] ); ?></td>
							</tr>
						<?php endfor; ?>
					<?php endif; ?>
					
				</tbody>
			</table>
		</div>
		<div class="container">
			<h2>Articulos</h2>
			
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Fecha</th>
				    </tr>
				</thead>
				<tbody>
					<?php $cantidadPost = count( $dataPost['result'] ); ?>
					<?php if ( $cantidadPost == 1 ) : ?>
						<?php for ( $j = 0; $j < $cantidadPost; $j++ ) : ?> 
							<tr>
								<td><?php echo( $dataPost['result'][$j]['id'] ); ?></td>
								<td><?php echo( $dataPost['result'][$j]['name'] ); ?></td>
								<td><?php echo( $dataPost['result'][$j]['description'] ); ?></td>
								<td><?php echo( $dataPost['result'][$j]['date'] ); ?></td>
							</tr>
						<?php endfor; ?>
					<?php else : ?>
						<?php for ( $j = 0; $j < $cantidadPost; $j++ ) : ?> 
							<tr>
								<td><?php echo( $dataPost['result'][$j]['id'] ); ?></td>
								<td><?php echo( $dataPost['result'][$j]['name'] ); ?></td>
								<td><?php echo( $dataPost['result'][$j]['description'] ); ?></td>
								<td><?php echo( $dataPost['result'][$j]['date'] ); ?></td>
							</tr>
						<?php endfor; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</section>
</body>
</html>