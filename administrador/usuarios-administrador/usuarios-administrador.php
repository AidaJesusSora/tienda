<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../../estilo/style_interior_web.css" rel="stylesheet" type="text/css">

	<!-- Link Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<!-- Link Iconas -->
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>

	<!-- Link JavaScript -->
	<script type="text/javascript" src="./../../js/java-script.js"> </script>

	<!-- Script para menu mobil -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>

	<header class="header">

		<h1 class="h1">BookMarket</h1>

	</header>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand text-white" href="./../usuario-administrador.php">BookMarket</a>
	  
		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item">
				<a class="nav-link text-white" href="./../libros-administrador/libros-administrador.php">Libros</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" href="#">Usuarios</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" type="button" data-toggle="modal" data-target="#desconexion"
				onclick="funcionAlerta()">Log out</a>
			</li>
		  </ul>
		</div>
	</nav>

	<br>

	<div class="row">

		<?php

		// Parámetros de conexión
		$servidor = "localhost";
		$usuario_bd = "root";
		$contrasena = "";
		$bd = "test";

		// Realizamos la conexión
		$con = mysqli_connect($servidor, $usuario_bd, $contrasena, $bd);
		if (!$con) {

			die("Con se ha podido realizar la conexión: " . mysqli_connect_error() . "<br>");

		} else {

			mysqli_set_charset($con, "utf8");
		}

		// Generacion de la tabla cogiendo los datos del phpmyadmin
		echo "<div class='table-responsive mx-5'>";

			echo "<table class='table table-striped'>";
			$instruccion = "SELECT * FROM usuarios WHERE 1";
			$resultado = mysqli_query($con, $instruccion);

			echo "<thead class='thead-light'>";

				echo "<tr>";

					echo "<th scope='col'> ID </th>";
					echo "<th scope='col'> Nombre </th>";
					echo "<th scope='col'> Apellido </th>";
					echo "<th scope='col'> Edad </th>";
					echo "<th scope='col'> Telefono </th>";
					echo "<th scope='col'> Nickname </th>";
					echo "<th scope='col'> Correo </th>";
					echo "<th scope='col'> Modificar </th>";
					echo "<th scope='col'> Eliminar </th>";

				echo "</tr>";

			echo "</thead>";

			while ($fila = $resultado->fetch_assoc()) {

				$id = $fila["id"];
				$nombre = $fila["nombre"];
				$apellidos = $fila["apellidos"];
				$edad = $fila["edad"];
				$telefono = $fila["telefono"];
				$nickname = $fila["nickname"];
				$correo = $fila["correo"];

				echo "<tr>";

					echo "<td scope='row'>" . $id . "</td>";
					echo "<td>" . $nombre . "</td>";
					echo "<td>" . $apellidos . "</td>";
					echo "<td>" . $edad . "</td>";
					echo "<td>" . $telefono . "</td>";
					echo "<td>" . $nickname . "</td>";
					echo "<td>" . $correo . "</td>";
					echo "<td><a class='far fa-edit btn' href='./modificar/principal.php?id=$id'></a></td>";
					echo "<td><a class='far fa-trash-alt btn' href='./eliminar/principal.php'></a></td>";
					
				echo "</tr>";
				
			}

			echo "</table>";

		echo "</div>";

		?>

		<div class="mx-5 btn btn-lg btn-block">

			<a class="btn btn-outline-info container" href="./registro/alta-usuario.php" role="button">Registrar un usuario</a>

		</div>

	</div>

</body>

</html>