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

</head>

<body>

	<header class="header">

		<h1 class="h1">BookMarket</h1>

	</header>

	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="#">BookMarket</a>
	  
		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active">
				<a class="nav-link" href="./../libros-administrador/libros-administrador.php">Libros</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Usuarios</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" type="button" data-toggle="modal" data-target="#desconexion"
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
		echo "<table class='table table-striped ml-5 mr-5'>";
		$instruccion = "SELECT * FROM usuarios WHERE 1";
		$resultado = mysqli_query($con, $instruccion);

		echo "<tr>";
		echo "<td> ID </td>";
		echo "<td> Nombre </td>";
		echo "<td> Apellido </td>";
		echo "<td> Edad </td>";
		echo "<td> Telefono </td>";
		echo "<td> Nickname </td>";
		echo "<td> Correo </td>";
		echo "<td> Modificar </td>";
		echo "<td> Eliminar </td>";
		
		echo "</tr>";

		while ($fila = $resultado->fetch_assoc()) {

			$id = $fila["id"];
			$nombre = $fila["nombre"];
			$apellidos = $fila["apellidos"];
			$edad = $fila["edad"];
			$telefono = $fila["telefono"];
			$nickname = $fila["nickname"];
			$correo = $fila["correo"];

			echo "<tr>";
			echo "<td>" . $id . "</td>";
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

		?>

		<a class="btn btn-outline-info btn-group-lg btn-block container" href="./../../registro/registro-usuario.html" role="button">Registrar un usuario</a>

	</div>

</body>

<footer class="mt-4"> Aida Jesus Sora </footer>

</html>