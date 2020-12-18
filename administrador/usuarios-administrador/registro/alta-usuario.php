<?php

	include './../comprovaciones-formularios/login-administrador.php';

?>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="./../../style/admin-style.css" rel="stylesheet" type="text/css">
	
	<!-- Link Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Link JavaScript -->
	<script type="text/javascript" src="../../../js/java-script.js"> </script>

	<!-- Script para menu mobil -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

	<header class="header">

		<h1 class="h1"> BookMarket </h1>

	</header>

	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand text-white" href="./../../usuario-administrador.php">BookMarket</a>
	  
		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item">
				<a class="nav-link text-white" href="./../../libros-administrador/libros-administrador.php">Libros</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" href="../../usuarios-administrador/usuarios-administrador.php">Usuarios</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" type="button" data-toggle="modal" data-target="#desconexion"
				onclick="funcionAlerta()">Log out</a>
			</li>
		  </ul>
		</div>
		
	</nav>

	<br>

	<h2 class="text-center">- AÑADIR USUARIO -</h2>

	<br>

	<form action="./principal.php" method="post" class="container">
	
		<div class="col-left">
	
			<div class="form-group">
				<input type="text" class="form-control" id="exampleInputNickname" name="nickname" placeholder="Nickname">
			</div>
			
			<div class="form-group">
				<input type="text" class="form-control" id="exampleInputDni" name="dni" placeholder="DNI">
			</div>
			
			<div class="form-group">
				<input type="tel" step="any" class="form-control" id="exampleInputTelefono" name="telefono" placeholder="Telefono">
			</div>
			
			<div class="form-group">
				<input type="mail" class="form-control" id="exampleInputEmail" name="correo" placeholder="Correo">
			</div>
		
		</div>
	
		<div class="col-right">
	
			<div class="form-group">
				<input type="text" class="form-control" id="exampleInputNombre" name="nombre" placeholder="Nombre">
			</div>
			
			<div class="form-group">
				<input type="text" class="form-control" id="exampleInputApellidos" name="apellidos" placeholder="Apellidos">
			</div>
			
			<div class="form-group">
				<input type="number" class="form-control" id="exampleInputEdad" name="edad" placeholder="Edad">
			</div>
			
			<div class="form-group">
				<input type="password" class="form-control" id="exampleInputPassword" name="passwd" placeholder="Contraseña">
			</div>
		
		</div>

		<div class="form-group">
			<input type="password" class="form-control" id="exampleInputPassword1" name="passwd1" placeholder="Introduzca la contraseña de nuevo">
		</div>
	
		<p><button type="submit" class="btn btn-outline-info btn-block">Entrar</button></p>
		
	</form>

</body>

</html>