<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="./../estilo/style_interior_web.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script type="text/javascript" src="./../js/java-script.js"> </script>

</head>

<body>

	<header class="header">

		<h1 class="h1">BookMarket</h1>

	</header>

	<nav class="navbar navbar-expand-lg navbar-expand-sm navbar-dark bg-dark">
		<a class="navbar-brand" href="./../registrado/usuario-conectado.html">BookMarket</a>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-link" href="#">Libros</a>
				<a class="nav-link" type="button" data-toggle="modal" data-target="#desconexion" onclick="funcionAlerta()">Log out</a>
			</div>
		</div>
	</nav>

	<br>

	<?php

	error_reporting(E_ALL & ~E_NOTICE);

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

		echo"<div class='row'>";
		
			echo "<table class='table table-striped ml-5 mr-5'>";
				$instruccion = "SELECT * FROM libros WHERE 1 ORDER BY $orden";
				$resultado = mysqli_query($con, $instruccion);
		
				echo "<tr>";
				echo "<th colspan='10' class='text-center'>Libros</th>";
				echo "</tr>";

				echo "<tr>";
				echo "<td> Titulo </td>";
				echo "<td> Autor </td>";
				echo "<td> Publicacion </td>";
				echo "<td> Edicion </td>";
				echo "<td> Precio </td>";
				echo "<td> Genero </td>";
				echo "<td> Paginas </td>";
				echo "<td> Tipo </td>";
				echo "<td> Editorial</td>";
				echo "<td> Carrito </td>";
				echo "</tr>";
		
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
					echo "<td><a class='fas fa-shopping-cart btn' href='./carrito/principal.php?id=$id' ></a></td>";
					echo "</tr>";
		
				}
		
				echo "</table>";

			echo "</div>";

	}
				
		?>
        
	</div>

</body>

<footer class="mt-4"> Aida Jesus Sora </footer>

</html>