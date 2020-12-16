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

// Comprovacion si el usuario esta logeado

    if (isset($_SESSION['nickname']) || $_SESSION['user'] == 1 ) {

        echo $_SESSION['nickname'];

        $nickname=$_SESSION["nickname"];

    } else {

        header('Location: ./../fallos/usuario_noregistrado.html');

        die();

    }

?>

