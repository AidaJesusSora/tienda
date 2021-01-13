<?php

	require ('./../../comprovacion-usuario/login-usuario.php');

?>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="./../style/style-usuario.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script type="text/javascript" src="./../../js/java-script.js"> </script>

	<!-- Script para menu mobil -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body id="body-background">

	<header class="header">

		<h1 class="h1">BookMarket</h1>

	</header>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="./../usuario-conectado.php">BookMarket</a>
	  
		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item">
				<a class="nav-link" href="./../libros/libros.php">Libros</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./carrito.php">Carrito</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./../cuenta/cuenta-usuario.php">Mi cuenta</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" type="button" data-toggle="modal" data-target="#desconexion"
				onclick="funcionAlerta()">Log out</a>
			</li>
		  </ul>
		</div>
	</nav>

	<?php

	error_reporting(E_ALL & ~E_NOTICE); // Eliminacion del warning NOTICE

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

		echo "<div class='row my-5 mx-5'>";

			echo "<div class='table-responsive'>";

				echo "<table class='table table-striped'>";

				$nickname = $_SESSION['nickname'];

				$nombre_tabla = $nickname.'_carrito';

				$instruccion = "SELECT * FROM $nombre_tabla";
				$resultado = mysqli_query($con, $instruccion);
						
				echo "<thead class='thead-light'>";

					echo "<tr>";

						echo "<th scope='col'> ID Producto </th>";
						echo "<th scope='col'> Titulo </th>";
						echo "<th scope='col'> Precio </th>";
						echo "<th scope='col'> Borrar </td>";

					echo "</tr>";

				echo "</thead>";

				while ($fila = $resultado->fetch_assoc()) {

					$id = $fila["id"];
					$id_fila = $fila["id_fila"];
					$titulo = $fila["titulo"];
					$preu = $fila["preu"];

					echo "<tr>";

						echo "<td scope='row'>" . $id. "</td>";
						echo "<td>" . $titulo . "</td>";
						echo "<td>" . $preu . "</td>";
						echo "<td><a class='far fa-trash-alt btn' href='./eliminar/principal.php?id_fila=$id_fila'></a></td>";
						
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