<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="./../estilo/style_interior_web.css" rel="stylesheet" type="text/css">
	<link href="categorias-estilo.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body id="body-background">

	<header class="header">

		<h1 class="h1">BookMarket</h1>

	</header>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">BookMarket</a>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-link active" href="./../libros/libros.html">Libros</a>
				<a class="nav-link" href="./../editoriales/editoriales.html">Editoriales</a>
				<a class="nav-link" href="./../tipo-libro/tipo-libro.html">Tipo Libro</a>
				<a class="nav-link" href="./categoria-libro.html">Categoria</a>

				<a class="nav-link" href="#">Mi cuenta</a>
				<span class="glyphicon glyphicon-shopping-cart"><a class="nav-link" href="#"></a></span>
			</div>
		</div>
	</nav>

	<div class="row">
  	
  	
		<?php

		//Parámetros de conexión
		$servidor="localhost";
		$usuario="root";
		$contrasena="";
		$bd="test";

		//realizamos la conexión
		$con=mysqli_connect($servidor,$usuario,$contrasena,$bd);
		if(!$con) {

			die("Con se ha podido realizar la conexión: ". mysqli_connect_error() . "<br>");

		} else {

			mysqli_set_charset($con,"utf8");

		} 

		echo "<table class='table table-striped' style='width:100%; text-align: center'>";
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
				echo "<td> Tipo </td>";
				echo "<td> Editorial </td>";
				echo "<td> Portada </td>";
				echo "</tr>";

				while ($fila = $resultado->fetch_assoc()) {	

				$titulo=$fila["titulo"];
				$autor=$fila["autor"];
				$publicacion=$fila["publicacion"];
				$edicion=$fila["edicion"];
				$precio=$fila["precio"];
				$genero=$fila["genero"];
				$paginas=$fila["paginas"];
				$tipo=$fila["tipo"];
				$editorial=$fila["editorial"];
				$imagen=$fila["imagen"];

				echo "<tr>";
				echo "<td>".$titulo."</td>";
				echo  "<td>".$autor."</td>";
				echo "<td>".$publicacion."</td>";
				echo "<td>".$edicion."</td>";
				echo "<td>".$precio."</td>";
				echo "<td>".$genero."</td>";
				echo "<td>".$paginas."</td>";
				echo "<td>".$tipo."</td>";
				echo "<td>".$editorial."</td>";
				echo "<td> <a href='.$imagen.' target:_blank>Ver imagen</a></td>";
				echo "</tr>";

			}
		echo "</table>";



		?>
	
	</div>

	<footer>Aida Jesus Sora</footer>

</body>

</html>