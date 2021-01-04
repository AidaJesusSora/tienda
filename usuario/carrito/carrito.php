<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="./estilo/style_login.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body id="body-background">

	<header class="header">

		<h1 class="h1">BookMarket</h1>

	</header>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="#">BookMarket</a>
	  
		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active">
				<a class="nav-link" href="http://localhost/tienda/usuario/libros/libros.php">Libros</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="http://localhost:8080/php/tienda-main/usuario/carrito/carrito.php">Carrito</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="http://localhost/tienda/usuario/cuenta/cuenta-usuario.html">Mi cuenta</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" type="button" data-toggle="modal" data-target="#desconexion"
				onclick="funcionAlerta()">Log out</a>
			</li>
		  </ul>
		</div>
	</nav>

	<?php

listar();

function listar() {

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

	echo "<div class='row'>";

		echo "<div class='table-responsive mx-5'>";

			echo "<table class='table table-striped'>";

			$nickname = $_SESSION['nickname'];

			$instruccion = "SELECT * FROM carrito WHERE nickname = '$nickname'";
			$resultado = mysqli_query($con, $instruccion);
					
			echo "<thead class='thead-light'>";

				echo "<tr>";

					echo "<th scope='col'> ID </th>";
					echo "<th scope='col'> Titulo </th>";
					echo "<th scope='col'> Precio </th>";
					echo "<th scope='col'> Borrar </td>";

				echo "</tr>";

			echo "</thead>";

			while ($fila = $resultado->fetch_assoc()) {

				$id = $fila["id"];
				$titulo = $fila["titulo"];
			 	$precio = $fila["precio"];

			 	echo "<tr>";

			 		echo "<td scope='row'>" . $id . "</td>";
			 		echo "<td>" . $titulo . "</td>";
			 		echo "<td>" . $precio . "</td>";
			 		echo "<td><a class='far fa-trash-alt btn' href='./eliminar/principal.php'></a></td>";
					
			 	echo "</tr>";

			}

			echo "</table>";

		echo "</div>";
	
	echo "</div>";

}


	?>

	<br>

</body>

</html>