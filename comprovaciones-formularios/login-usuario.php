<?php

session_start();

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

	$nickname=$_SESSION["nickname"];

	$instruccion = "SELECT usuario FROM usuarios WHERE nickname = '$nickname'";
	$resultado = mysqli_query($con, $instruccion);

	// Comprovacion si el usuario esta logeado

    if (isset($_SESSION['nickname']) && $resultado->fetch_assoc() == 0 ) {

		$nickname=$_SESSION["nickname"];

    } else {

        header('Location: ./../fallos/sin-permiso.html');

        die();

    }

?>

