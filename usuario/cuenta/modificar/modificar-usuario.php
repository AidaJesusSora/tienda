<?php

        include './../../../comprovacion-usuario/login-usuario.php';

?>

<html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="./../../style/style-usuario.css" rel="stylesheet" type="text/css">
	
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
				<a class="nav-link" href="./../../libros/libros.php">Libros</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./../../carrito/carrito.php">Carrito</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./../cuenta-usuario.php">Mi cuenta</a>
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

			<img src="./../../img/mi-cuenta.jpg" class="mx-auto d-block" width="570px">

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

					echo "<h4 class='text-left'>Datos del usuario: $nickname</h4>";

					echo "<br>";

					echo "<div clas='row'>";

						echo "<div class='col-sm-8'>";
						
							echo "<div class='card'>";

								echo "<div class='card-body'>";

									echo "<form action='./principal-modificacion.php' method='post' class='container'>";
										
										echo "<div class='form-group'>";
										
											echo "<label>Nombre</label>";
											
											echo "<input type='text' class='form-control' value='$nombre' name='nombre'>";

										echo "</div>";

										echo "<div class='form-group'>";
										
											echo "<label>Apellidos</label>";
										
											echo "<input type='text' class='form-control' value='$apellidos' name='apellidos'>";
										
										echo "</div>";

										echo "<div class='form-group'>";
										
											echo "<label>Correo</label>";
										
											echo "<input type='email' class='form-control' value='$correo' name='correo'>";
										
										echo "</div>";

										echo "<div class='form-group'>";
										
											echo "<label>Telefon</label>";
										
											echo "<input type='text' class='form-control' value='$telefono' name='telefono'>";
										
										echo "</div>";

										echo "<div class='form-group'>";
										
											echo "<label>DNI</label>";
										
											echo "<input type='text' class='form-control' value='$dni' name='dni'>";
										
										echo "</div>";

										echo "<button type='submit' class='btn btn-primary'>Guardar</a>";

									echo "</form>";
							
								echo "</div>";

							echo "</div>";

						echo "</div>";

					echo "</div>";

				echo "</div>";
				
			}

			?>

		</div>

	</div>

</body>

</html>