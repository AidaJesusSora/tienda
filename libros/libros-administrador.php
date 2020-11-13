<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../estilo/style_interior_web.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>

</head>

<body>

	<header class="header">

		<h1 class="h1">BookMarket</h1>

	</header>

	<nav class="navbar navbar-expand-lg navbar-expand-sm navbar-dark bg-dark">
		<a class="navbar-brand" href="#">BookMarket</a>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-link" href="./../libros/libros-administrador.php">Libros</a>
				<a class="nav-link" href="./../usuarios/usuarios-administrador.html">Usuarios</a>
				<a class="nav-link" href="./../carrito/carrito.html">Carrito</a>
				<a class="nav-link" href="./../cuenta/cuenta-usuario.html">Mi cuenta</a>
				<a class="nav-link" type="button" data-toggle="modal" data-target="#desconexion" onclick="funcionAlerta()">Log out</a>
			</div>
		</div>
	</nav>

	<br>


	<div class="row ">

		<?php

		// Parámetros de conexión
		$servidor = "localhost";
		$usuario_bd = "root";
		$contrasena = "";
		$bd = "test";

		// realizamos la conexión
		$con = mysqli_connect($servidor, $usuario_bd, $contrasena, $bd);
		if (!$con) {

			die("Con se ha podido realizar la conexión: " . mysqli_connect_error() . "<br>");
		} else {

			mysqli_set_charset($con, "utf8");
		}

		echo "<table class='table table-striped'>";
		$instruccion = "SELECT * FROM libros WHERE 1";
		$resultado = mysqli_query($con, $instruccion);

		echo "<tr>";
		echo "<td> Titulo </td>";
		echo "<td> Autor </td>";
		echo "<td> Publicacion </td>";
		echo "<td> Edicion </td>";
		echo "<td> Precio </td>";
		echo "<td> Genero </td>";
		echo "<td> Paginas </td>";
		echo "<td> Libros </td>";
		echo "<td> Editorial</td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "</tr>";

		while ($fila = $resultado->fetch_assoc()) {

			$titulo = $fila["titulo"];
			$autor = $fila["autor"];
			$publicacion = $fila["publicacion"];
			$edicion = $fila["edicion"];
			$precio = $fila["precio"];
			$genero = $fila["genero"];
			$paginas = $fila["paginas"];
			$tipo = $fila["tipo"];
			$editorial = $fila["editorial"];

			echo "<tr>";
			echo "<td>" . $titulo . "</td>";
			echo "<td>" . $autor . "</td>";
			echo "<td>" . $publicacion . "</td>";
			echo "<td>" . $edicion . "</td>";
			echo "<td>" . $precio . "</td>";
			echo "<td>" . $genero . "</td>";
			echo "<td>" . $paginas . "</td>";
			echo "<td>" . $tipo . "</td>";
			echo "<td>" . $editorial . "</td>";
			echo "<td><i class='far fa-trash-alt'></i></td>";
			echo "<td></td>";
			echo "</tr>";
		}

		echo "</table>";

		?>

		<a class="btn btn-outline-info btn-group-lg btn-block container" href="./registro-producto/alta_libro.html" role="button">Registrar un libro</a>

	</div>

</body>

</html>