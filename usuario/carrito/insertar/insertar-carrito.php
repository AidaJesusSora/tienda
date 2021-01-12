<?php

@session_start();

class insert_carrito {
	
	//Parámetros de conexión

	function llamar_bbdd($id) {

		$servidor="localhost";
		$usuario_bd="root";
		$contraseña="";
		$bd="test";

		//Realizamos la conexión
		$con=mysqli_connect($servidor,$usuario_bd,$contraseña,$bd);
		
			if(!$con) {
				
				die("Con se ha podido realizar la conexión: ". mysqli_connect_error() . "<br>");
				
			} 
			
			else {
				
				mysqli_set_charset($con,"utf8");
				$_SESSION["con"]=$con;
				
			}

		$select ="SELECT * FROM libros WHERE id=$id";
		$resultado = mysqli_query($con, $select);

		while ($fila = $resultado->fetch_assoc()) {

			$id = $fila["id"];
			$titulo = $fila["titulo"];
			$precio = $fila["precio"];

		}

		$nickname = $_SESSION['nickname'];

		$sql = "INSERT INTO carrito VALUES ('NULL','$id','$titulo','$precio','$nickname')";
		$con->query($sql) or die ("Error".mysqli_error($con));

		if(!$sql) {
			
			die("Algo ha fallado");
				
		} else {
			
			header ("Location: ./../carrito.php");
							
		}
			
	}

}
