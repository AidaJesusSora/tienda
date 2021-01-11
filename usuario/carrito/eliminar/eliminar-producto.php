<?php

class eliminar_producto {

	//Parámetros de conexión

	function llamar_bbdd($id_fila) {

		$servidor="localhost";
		$usuario_bd="root";
		$contraseña="";
		$bd="test";

		//Realizamos la conexión
		$con=mysqli_connect($servidor,$usuario_bd,$contraseña,$bd);
		
			if(!$con) {
				
				die("Con se ha podido realizar la conexión: ". mysqli_connect_error() . "<br>");
				
			} else {
				
				mysqli_set_charset($con,"utf8");
				$_SESSION["con"]=$con;
				
			}

		$sql = "DELETE from carrito where id_fila = $id_fila";
		$con->query($sql) or die ("Error".mysqli_error($con));

		if(!$sql) {
			
			die("Algo ha fallado");
				
		} else {
			
			//Redireccionamos a libros
			header ("Location: ./../carrito.php");
							
		}
			
	}

}
