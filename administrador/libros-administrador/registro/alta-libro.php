<?php

	include './../../../comprovacion-usuario/login-administrador.php';

?>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="./../../style/admin-style.css" rel="stylesheet" type="text/css">
	
	<!-- Link Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Link JavaScript -->
	<script type="text/javascript" src="./../../../js/java-script.js"> </script>

	<!-- Script para menu mobil -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>

	<header class="header">

		<h1 class="h1"> BookMarket </h1>

	</header>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand text-white" href="./../../usuario-administrador.php">BookMarket</a>
	  
		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item">
				<a class="nav-link text-white" href="./../libros-administrador.php">Libros</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" href="./../../usuarios-administrador/usuarios-administrador.php">Usuarios</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" type="button" data-toggle="modal" data-target="#desconexion"
				onclick="funcionAlerta()">Log out</a>
			</li>
		  </ul>
		</div>
		
	</nav>

	<br>

	<h2 class="text-center">- AÑADIR PRODUCTO -</h2>

	<br>

	<form action="principal.php" method="post" class="container">

		<!-- Columna unica -->

		<div class="form-group one-column">
			<label>Titulo del Libro</label>
			<input type="text" class="form-control" name="titulo">
		</div>

		<!-- Columna Izquierda -->

		<div class="col-left">

			<div class="form-group">
				<label>Autor del Libro</label>
				<input type="text" class="form-control" name="autor">
			</div>

			<div class="form-group">
				<label>Fecha de Publicacion</label>
				<input type="date" class="form-control" name="publicacion">
			</div>

			<div class="form-group">
				<label>Numero de Edicion</label>
				<input type="number" class="form-control" name="edicion">
			</div>

			<div class="form-group">
				<label>Precio</label>
				<input type="number" step="any" class="form-control" name="precio">
			</div>

		</div>

		<!-- Columna Derecha -->

		<div class="col-right">

			<div class="form-group">
				<label>Genero del Libro</label>
				<select class="form-control" name="genero">
					<option value="Terror/Suspense" selected>Terror/Suspense</option>
					<option value="Teatro">Teatro</option>
					<option value="Drama">Drama</option>
					<option value="Ciencia Ficcion">Ciencia Ficcion</option>
					<option value="Negra">Negra</option>
					<option value="Ficción Historica">Ficción Historica</option>
					<option value="Aventuras">Aventuras</option>
					<option value="Fantasía">Fantasía</option>
					<option value="Relatos">Relatos</option>
					<option value="Romance">Romance</option>
					<option value="Eroticos">Eroticos</option>
					<option value="Humor">Humor</option>
					<option value="Infantil">Infantil</option>
					<option value="Otros">Otros...</option>
				</select>
			</div>

			<div class="form-group">
				<label>Numero de Paginas</label>
				<input type="numero" class="form-control" name="paginas" id="paginas">
			</div>

			<div class="form-group">
				<label>Tipo de Libro</label>
				<select class="form-control" name="tipo">
					<option value="Bolsillo">Bolsillo</option>
					<option value="Tapa Blanda">Tapa Blanda</option>
					<option value="Tapa Dura">Tapa Dura</option>
				</select>
			</div>

			<div class="form-group">
				<label>Editorial</label>
				<select class="form-control" name="editorial">
					<option value="Alfaguara">Alfaguara</option>
					<option value="Penguin Random House">Penguin Random House</option>
					<option value="Edebé">Édebe</option>
					<option value="Empúries">Editorial Empúries</option>
					<option value="Planeta">Editorial Planeta</option>
					<option value="Salamandra">Editorial Salamandra</option>
				</select>
			</div>

		</div>

		<!-- Envio -->

		<div>

			<div class="col-left">

				<button type="submit" class="btn btn-outline-success btn-block">Añadir Producto</button>

			</div>

			<div class="col-right">

				<a class="btn btn-outline-danger btn-block" id="hov-cancelar" href="./../libros-administrador.php">Cancelar</a>

			</div>
		
		</div>

	</form>

</body>

</html>