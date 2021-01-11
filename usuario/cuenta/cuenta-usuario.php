<?php

	include './../../comprovacion-usuario/login-usuario.php';

?>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="./../style/style-usuario.css" rel="stylesheet" type="text/css">
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
		<a class="navbar-brand" href="./../usuario-conectado.php">BookMarket</a>
	  
		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item">
				<a class="nav-link" href="./../libros/libros.php">Libros</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./../carrito/carrito.php">Carrito</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./cuenta-usuario.php">Mi cuenta</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" type="button" data-toggle="modal" data-target="#desconexion"
				onclick="funcionAlerta()">Log out</a>
			</li>
		  </ul>
		</div>
	</nav>

	<br>

	<h2 class="text-center"> - Mi Cuenta - </h2>

	<div>

		<div class="container-fluid col-sm-5 offset-sm-2 col-md-6 offset-md-0 float-left">		

			<img src="./../img/mi-cuenta.jpg" class="mx-auto d-block">

		</div>

		<div class="container-fluid col-sm-5 offset-sm-2 col-md-6 offset-md-0 float-right">

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

			$nickname = $_SESSION['nickname'];

			$instruccion = "SELECT * FROM usuarios WHERE nickname = '$nickname'";
			$resultado = mysqli_query($con, $instruccion);

			echo "<br/>";

			while ($fila = $resultado->fetch_assoc()) {
				
				$dni = $fila["dni"];
				$nombre = $fila["nombre"];
				$edad = $fila["edad"];
				$correo = $fila["correo"];
				$nickname = $fila["nickname"];
				$passwd = $fila["passwd"];
				$apellidos = $fila["apellidos"];
				$telefono = $fila["telefono"];

				echo "<div>";

					echo "<h4 class='text-center'>Datos del usuario</h4>";

					echo "<div class='float-left'>";

						echo "<div class='form-group row'>";

							echo "<label class='col-sm-2 col-form-label'>Nombre</label> "; 
					
							echo "<div class='col-sm-10'>";
							
								echo "<input type='text' readonly class='form-control-plaintext' value='$nombre'>";

							echo "</div>";

						echo "</div>";
					
					  echo "</div>";

					echo "<div class='float-right'>";
					
						//echo "<h5><u>Nombre</u></h5> $nombre";
					
					echo "</div>";

				echo "</div>";

				// echo "<h4><u>Nombre</u></h4> $nombre";
				// echo "<h4><u>Apellido</u></h4> $apellidos";
				// echo "<h4><u>Correo</u></h4> $correo";
				// echo "<h4><u>Nickname</u></h4> $nickname";
				// echo "<h4><u>Telefono</u></h4> $telefono";
				// echo "<h4><u>Edad</u></h4> $edad";
				
			}

			?>

		</div>

	</div>

</body>

</html>