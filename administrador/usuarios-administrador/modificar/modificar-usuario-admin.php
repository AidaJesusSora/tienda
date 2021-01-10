<?php

	include './../../../comprovacion-usuario/login-administrador.php';

?>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="./../../style/admin-style.css" rel="stylesheet" type="text/css">
	
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
		<a class="navbar-brand text-white" href="./../usuarios-administrador.php">BookMarket</a>
	  
		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item">
				<a class="nav-link text-white" href="./../../libros-administrador/libros-administrador.php">Libros</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" href="../../usuarios-administrador/usuarios-administrador.php">Usuarios</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" type="button" data-toggle="modal" data-target="#desconexion"
				onclick="funcionAlerta()">Log out</a>
			</li>
		  </ul>
		</div>
		
	</nav>

	<br>

	<h2 class="text-center">- Modificar Usuario -</h2>

    <br>

    <?php

        class modificar_usuario {

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
            
            $instruccion = "SELECT * FROM usuarios WHERE id='$id'";
            $resultado = mysqli_query($con, $instruccion);

            while($fila = $resultado->fetch_assoc()) {

                $id = $fila["id"];
                $dni = $fila["dni"];
                $nombre = $fila["nombre"];
                $apellidos = $fila["apellidos"];
                $edad = $fila["edad"];
                $telefono = $fila["telefono"];
                $nickname = $fila["nickname"];
                $correo = $fila["correo"];

            echo "<form action='./principal-modificacion.php?id=$id' method='post' class='container'>
	
				<div class='col-left'>
			
					<div class='form-group'>
						<input type='text' class='form-control' id='exampleInputNickname' name='nickname' value='".$nickname."' placeholder='Nickname'>
					</div>
					
					<div class='form-group'>
						<input type='text' class='form-control' id='exampleInputDni' name='dni' value='".$dni."' placeholder='DNI'>
					</div>
					
					<div class='form-group'>
						<input type='tel' step='any' class='form-control' id='exampleInputTelefono' name='telefono' value='".$telefono."' placeholder='Telefono'>
					</div>
				
				</div>
			
				<div class='col-right'>
			
					<div class='form-group'>
						<input type='text' class='form-control' id='exampleInputNombre' name='nombre' value='".$nombre."' placeholder='Nombre'>
					</div>
					
					<div class='form-group'>
						<input type='text' class='form-control' id='exampleInputApellidos' name='apellidos' value='".$apellidos."' placeholder='Apellidos'>
					</div>
					
					<div class='form-group'>
						<input type='number' class='form-control' id='exampleInputEdad' name='edad' value='".$edad."' placeholder='Edad'>
					</div>
				
				</div>

				<div class='form-group'>
					<input type='mail' class='form-control' id='exampleInputEmail' name='correo' value='".$correo."' placeholder='Correo'>
				</div>
			
				<p><button type='submit' class='btn btn-outline-info btn-block'>Entrar</button></p>
				
            </form>";
            
            }

        }

    }

    ?>

</body>

</html>