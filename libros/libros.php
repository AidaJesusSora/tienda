<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="./../estilo/style_interior_web.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script type="text/javascript" src="./../../js/java-script.js"> </script>

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

	$seleccion = 0;

	echo"<div class='row container'>

	<form method='GET'>
	
		<select  class='form-control container' name='seleccion'>

			<option value='0'>---</option>
			<option value='1'>Ordenar por Titulo</option>
			<option value='2'>Ordenar por Autor</option>
			<option value='3'>Ordenar por Publicacion</option>
			<option value='4'>Ordenar por Edicion</option>
			<option value='5'>Ordenar por Precio</option>
			<option value='6'>Ordenar por Genero</option>
			<option value='7'>Ordenar por Paginas</option>
			<option value='8'>Ordenar por Tipo</option>
			<option value='9'>Ordenar por Editorial</option>

		</select>

		<input type='submit' value='Enviar'>

	</form>
	</div>

	<div class='row'>";

		// Parámetros de conexión
		$servidor = "localhost";
		$usuario_bd = "root";
		$contrasena = "";
		$bd = "test";

		$seleccion = $_GET["seleccion"];

		if ($_GET["seleccion"] == null) {

			$seleccion = 0;

		} else {

			$seleccion = $_GET["seleccion"];

		}

		// realizamos la conexión
		$con = mysqli_connect($servidor, $usuario_bd, $contrasena, $bd);
		if (!$con) {

			die("Con se ha podido realizar la conexión: " . mysqli_connect_error() . "<br>");
		} else {

			mysqli_set_charset($con, "utf8");
		}

		if ($seleccion == 0) {

			echo "<table class='table table-striped ml-5 mr-5'>";
			$instruccion = "SELECT * FROM libros WHERE 1";
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

		} else if ($seleccion == 1) {

			echo "<table class='table table-striped ml-5 mr-5'>";
			$instruccion = "SELECT * FROM libros WHERE 1 ORDER BY titulo";
			$resultado = mysqli_query($con, $instruccion);
	
			echo "<tr>";
			echo "<th colspan='10' class='text-center'> Ordenador por Titulo </th>";
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

		} else if ($seleccion == 2) {

			echo "<table class='table table-striped ml-5 mr-5'>";
			$instruccion = "SELECT * FROM libros WHERE 1 ORDER BY autor";
			$resultado = mysqli_query($con, $instruccion);
	
			echo "<tr>";
			echo "<th colspan='10' class='text-center'> Ordenador por Autor </th>";
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

		} else if ($seleccion == 3) {

			echo "<table class='table table-striped ml-5 mr-5'>";
			$instruccion = "SELECT * FROM libros WHERE 1 ORDER BY publicacion";
			$resultado = mysqli_query($con, $instruccion);

			echo "<tr>";
			echo "<th colspan='10' class='text-center'> Ordenador por Publicacion </th>";
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

		} else if ($seleccion == 4) {

			echo "<table class='table table-striped ml-5 mr-5'>";
			$instruccion = "SELECT * FROM libros WHERE 1 ORDER BY edicion";
			$resultado = mysqli_query($con, $instruccion);

			echo "<tr>";
			echo "<th colspan='10' class='text-center'> Ordenador por Edicion</th>";
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

		} else if ($seleccion == 5) {

			echo "<table class='table table-striped ml-5 mr-5'>";
			$instruccion = "SELECT * FROM libros WHERE 1 ORDER BY precio";
			$resultado = mysqli_query($con, $instruccion);

			echo "<tr>";
			echo "<th colspan='10' class='text-center'> Ordenador por Precio</th>";
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

		} else if ($seleccion == 6) {

			echo "<table class='table table-striped ml-5 mr-5'>";
			$instruccion = "SELECT * FROM libros WHERE 1 ORDER BY genero";
			$resultado = mysqli_query($con, $instruccion);

			echo "<tr>";
			echo "<th colspan='10' class='text-center'> Ordenador por Genero</th>";
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

		} else if ($seleccion == 7) {

			echo "<table class='table table-striped ml-5 mr-5'>";
			$instruccion = "SELECT * FROM libros WHERE 1 ORDER BY paginas";
			$resultado = mysqli_query($con, $instruccion);

			echo "<tr>";
			echo "<th colspan='10' class='text-center'> Ordenador por Paginas</th>";
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

		} else if ($seleccion == 8) {

			echo "<table class='table table-striped ml-5 mr-5'>";
			$instruccion = "SELECT * FROM libros WHERE 1 ORDER BY tipo";
			$resultado = mysqli_query($con, $instruccion);

			echo "<tr>";
			echo "<th colspan='10' class='text-center'> Ordenador por Tipo</th>";
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

		} else if ($seleccion == 9) {

			echo "<table class='table table-striped ml-5 mr-5'>";
			$instruccion = "SELECT * FROM libros WHERE 1 ORDER BY editorial";
			$resultado = mysqli_query($con, $instruccion);

			echo "<tr>";
			echo "<th colspan='10' class='text-center'> Ordenador por Editorial</th>";
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

		}

        ?>
        
	</div>

</body>

<footer class="mt-4"> Aida Jesus Sora </footer>

</html>