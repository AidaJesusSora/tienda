<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="./../../../estilo/style_interior_web.css" rel="stylesheet" type="text/css">
	
	<!-- Link Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Link JavaScript -->
	<script type="text/javascript" src="../../../js/java-script.js"> </script>

</head>

<body>

	<header class="header">

		<h1 class="h1"> BookMarket </h1>

    </header>
    
	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="#">BookMarket</a>
	  
		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active">
                <a class="nav-link" href="../libros-administrador.php">Libros</a>
			</li>
			<li class="nav-item">
                <a class="nav-link" href="../../usuarios-administrador/usuarios-administrador.php">Usuarios</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" type="button" data-toggle="modal" data-target="#desconexion"
				onclick="funcionAlerta()">Log out</a>
			</li>
		  </ul>
		</div>
		
	</nav>

	<br>

	<h2 class="text-center">- Modificar Producto -</h2>

    <br>

    <?php

        class modificar_books {

        public $id;
    
            function llamar_bbdd($id) {

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
            
            $instruccion = "SELECT * FROM libros WHERE id='$id'";
            $resultado = mysqli_query($con, $instruccion);

            while($fila = $resultado->fetch_assoc()) {

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

        echo "<form action='./principal_libro_modificar.php?id=$id' method='post' class='container'>";

            //Columna unica

            echo"<div class='form-group'>
                    <label>Titulo del Libro</label>
                    <input type='text' class='form-control' name='titulo' value='".$titulo."'>
            </div>";
            
            //Columna Izquierda

            echo"<div class='col-left'>

                <div class='form-group'>
                    <label>Autor del Libro</label>
                    <input type='text' class='form-control' name='autor' value='".$autor."'>
                </div>

                <div class='form-group'>
                    <label>Fecha de Publicacion</label>
                    <input type='date' class='form-control' name='publicacion' value='".$publicacion."'>
                </div>

                <div class='form-group'>
                    <label>Numero de Edicion</label>
                    <input type='number' class='form-control' name='edicion' value='".$edicion."'>
                </div>

                <div class='form-group'>
                    <label>Precio</label>
                    <input type='number' step='any' class='form-control' name='precio' value='".$precio."'>
                </div>

            </div>";
            
            //Columna Derecha
        
            echo"<div class='col-right'>

                <div class='form-group'>
                    <label>Genero del Libro</label>
                    <select class='form-control' name='genero' values='$genero'>
                        <option value='Terror/Suspense'>Terror/Suspense</option>
                        <option value='Teatro'>Teatro</option>
                        <option value='Drama'>Drama</option>
                        <option value='Ciencia Ficcion'>Ciencia Ficcion</option>
                        <option value='Negra'>Negra</option>
                        <option value='Ficción Historica'>Ficción Historica</option>
                        <option value='Aventuras'>Aventuras</option>
                        <option value='Fantasía'>Fantasía</option>
                        <option value='Relatos'>Relatos</option>
                        <option value='Romance'>Romance</option>
                        <option value='Eroticos'>Eroticos</option>
                        <option value='Humor'>Humor</option>
                        <option value='Infantil'>Infantil</option>
                        <option value='Otros'>Otros...</option>
                    </select>
                </div>

                <div class='form-group'>
                    <label>Numero de Paginas</label>
                    <input type='numero' class='form-control' name='paginas' id='paginas' value='".$paginas."'>
                </div>

                <div class='form-group'>
                    <label>Tipo de Libro</label>
                    <select class='form-control' name='tipo' value='".$tipo."'>
                        <option value='Bolsillo'>Bolsillo</option>
                        <option value='Tapa Blanda'>Tapa Blanda</option>
                        <option value='Tapa Dura'>Tapa Dura</option>
                    </select>
                </div>

                <div class='form-group'>
                    <label>Editorial</label>
                    <select class='form-control' name='editorial' value='".$editorial."'>
                        <option value='Alfaguara'>Alfaguara</option>
                        <option value='Penguin Random House'>Penguin Random House</option>
                        <option value='Edebé'>Édebe</option>
                        <option value='Empúries'>Editorial Empúries</option>
                        <option value='Planeta'>Editorial Planeta</option>
                        <option value='Salamandra'>Editorial Salamandra</option>
                    </select>
                </div>

            </div>";
            
            }

            //Envio

            echo "<button type='submit' class='btn btn-outline-info'>Guardar Libro</a>

        </form>";
    
        }

    }

    ?>

</body>

</html>