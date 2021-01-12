<?php

	include './../../comprovacion-usuario/login-usuario.php';

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

<body>

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
				<a class="nav-link" href="./libros.php">Libros</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./../carrito/carrito.php">Carrito</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./../cuenta/cuenta-usuario.html">Mi cuenta</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" type="button" data-toggle="modal" data-target="#desconexion"
				onclick="funcionAlerta()">Log out</a>
			</li>
		  </ul>
		</div>
	</nav>


	<br>

<?php

	error_reporting(E_ALL & ~E_NOTICE); // Eliminacion del warning NOTICE

	$seleccion = 0;
	$orden = null;
	
	mostrar($seleccion, $orden);

	function mostrar($seleccion, $orden) {

		echo"<div class='row container'>

			<form method='GET' class='ml-4'>

				<div class='input-group mb-3'>

					<div class='input-group-prepend'>

						<label class='input-group-text' for='inputGroupSelect01'>Ordenar por...</label>

					</div>

					<select class='custom-select' name='seleccion'>

						<option value='0'>---</option>
						<option value='1'>Titulo</option>
						<option value='2'>Autor</option>
						<option value='3'>Publicacion</option>
						<option value='4'>Edicion</option>
						<option value='5'>Precio</option>
						<option value='6'>Genero</option>
						<option value='7'>Paginas</option>
						<option value='8'>Tipo</option>
						<option value='9'>Editorial</option>

					</select>

					<input type='submit' class='btn btn-outline-success ml-2' value='Enviar'>

				</div>

			</form>

		</div>";

		if (is_null($_GET["seleccion"]) != true) {

			$seleccion = $_GET["seleccion"];
			listar($seleccion, $orden);

		} else {

			$seleccion = 0;
			listar($seleccion, $orden);

		}

	}

	function listar($seleccion, $orden) {

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

		if ($seleccion == 0 || $seleccion == null) {

			$orden = 'id';

		} else if ($seleccion == 1) {

			$orden = 'titulo';

		} else if ($seleccion == 2) {

			$orden = 'autor';

		} else if ($seleccion == 3) {

			$orden = 'publicacion';

		} else if ($seleccion == 4) {

			$orden = 'edicion';

		} else if ($seleccion == 5) {

			$orden = 'precio';

		} else if ($seleccion == 6) {

			$orden = 'genero';

		} else if ($seleccion == 7) {

			$orden = 'paginas';

		} else if ($seleccion == 8) {

			$orden = 'tipo';

		} else if ($seleccion == 9) {

			$orden = 'editorial';

		}

		echo "<div class='row'>";

			echo "<div class='table-responsive mr-5 ml-5'>";
			
				echo "<table class='table table-striped'>";
					$instruccion = "SELECT * FROM libros WHERE 1 ORDER BY $orden";
					$resultado = mysqli_query($con, $instruccion);

					echo "<thead class='thead-light'>";
		
						echo "<tr>";

							echo "<th scope='col'> Titulo </th>";
							echo "<th scope='col'> Autor </th>";
							echo "<th scope='col'> Publicacion </th>";
							echo "<th scope='col'> Edicion </th>";
							echo "<th scope='col'> Precio </th>";
							echo "<th scope='col'> Genero </th>";
							echo "<th scope='col'> Paginas </th>";
							echo "<th scope='col'> Tipo </th>";
							echo "<th scope='col'> Editorial</th>";
							echo "<th scope='col'> Carrito </th>";

						echo "</tr>";

					echo "</thead>";
					
					while ($fila = $resultado->fetch_assoc()) {
			
						$id = $fila["id"];
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
							echo "<td><a class='fas fa-shopping-cart btn' href='./../carrito/insertar/principal.php?id=$id'></a></td>";

						echo "</tr>";	
			
					}
					
				echo "</table>";

			echo "</div>";
		
		echo "</div>";

	}
			
?>

	</div>

</body>

</html>