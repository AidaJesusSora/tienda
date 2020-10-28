<?php 
   
session_start();

$logueado=0;

	$password="";

	$correo = $_POST["correo"];
	$passwd = $_POST["passwd"];

	$servidor="localhost";
	$usuario="root";
	$contrasena="";
	$bd="test";

	//Realizamos la conexión
	$con=mysqli_connect($servidor,$usuario,$contrasena,$bd);
	
	if (!$con) {
		
		die("Con se ha podido realizar la conexión: ". mysqli_connect_error() . "<br>");
		
	} else {
		
		mysqli_set_charset ($con, "utf8");
		echo "Se ha conectado a la base de datos" . "<br>";
		
	}
	
	$instruccion = "select count(*) as cuantos from usuario where correo = '$correo'";
	$resultado = mysqli_query($con, $instruccion);
		while ($fila = $resultado->fetch_assoc()) {
			$numero=$fila["cuantos"];
		}
	
	if($numero==0) {
		
		//echo "El usuario no existe";
		header('Location: ./conectado/usuario_incorrecto.html');

		
	} else {
		
		$instruccion = "select passwd as cuantos from usuario where passwd = '$passwd'";
		$resultado = mysqli_query($con, $instruccion);
		
			while ($fila = $resultado->fetch_assoc()) {
				
				$password=$fila["cuantos"];
				
			}
		
			if ((!strcmp($password, $passwd) == 0) || $passwd=="") {

				//echo "Contraseña incorrecta";
				header('Location: ./conectado/contrasena_incorrecta.html');

			} else {

				// Comprovar si el Usuario es Administrador

				$_SESSION["nickname_logueado"]=$nickname;
				$logueado=1;
				header('Location: ./conectado/conectado.html');

			}
	}
	
?>