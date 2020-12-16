<?php 
   
session_start();

$logueado=0;

	$password="";

	$nickname = $_POST["nickname"];
	$correo = $_POST["correo"];
	$passwd = $_POST["passwd"];
	$usuario = "";

	$servidor="localhost";
	$usuario_bd="root";
	$contrasena="";
	$bd="test";


	//Realizamos la conexión
	$con=mysqli_connect($servidor,$usuario_bd,$contrasena,$bd);
	
	if (!$con) {
		
		die("Con se ha podido realizar la conexión: ". mysqli_connect_error() . "<br>");
		
	} else {
		
		mysqli_set_charset ($con, "utf8");
		echo "Se ha conectado a la base de datos" . "<br>";
		
	}

	$instruccion = "select count(*) as cuantos from usuarios where nickname = '$nickname'";
	$resultado = mysqli_query($con, $instruccion);

		while ($fila = $resultado->fetch_assoc()) {

			$numero=$fila["cuantos"];

		} 
		
		if ($numero==0) {

			// Usuario no registrado
			header('Location: ./../fallos/usuario_noregistrado.html');

		} else {
	
			$instruccion = "select count(*) as cuantos from usuarios where correo = '$correo'";
			$resultado = mysqli_query($con, $instruccion);

				while ($fila = $resultado->fetch_assoc()) {

					$numero=$fila["cuantos"];

				}
	
				if($numero==0) {

					// Usuario no registrado					
					header('Location: ./../fallos/usuario_noregistrado.html');

				} else {
		
					$instruccion = "select passwd as cuantos from usuarios where passwd = '$passwd'";
					$resultado = mysqli_query($con, $instruccion);
					
						while ($fila = $resultado->fetch_assoc()) {
							
							$password=$fila["cuantos"];
							
						}
					
						if ((!strcmp($password, $passwd) == 0) || $passwd=="") {

							// Usuario fallido
							header('Location: ./../fallos/usuario_fallido.html');

						} else {

							$instruccion = "select usuario as cuantos from usuarios where correo = '$correo'";
							$resultado = mysqli_query($con, $instruccion);
							
								while ($fila = $resultado->fetch_assoc()) {
									
									$usuario=$fila["cuantos"];
									
								}

							if ($usuario != 0) {

								// Conexion del administrador
								$_SESSION["nickname"]=$nickname;
								$logueado=1;
								header ("Location: ./../administrador/usuario-administrador.php/");

							} else {

								// Conexion del usuario normal
								$_SESSION["nickname"]=$nickname;
								$logueado=1;
								header ("Location: ./../registrado/usuario-conectado.php");

							}

						}

					}

		}	
	
?>