<?php

class eliminar_books {

	//Parámetros que vienen del POST

	public $id;
	
	//Parámetros de conexión

	function llamar_bbdd() {

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
				echo "Te has conectado a la BBDD<br>";
				$_SESSION["con"]=$con;
				
			}

		$instruccion = "select id as cuantos from usuarios where id = '$this->id'";
		$resultado = mysqli_query($con, $instruccion);
			while ($fila = $resultado->fetch_assoc()) {
				$numero=$fila["cuantos"];
			}

		$sql = "delete from libros where id='$this->id'";
		mysqli_query($con, $sql);

			if(!$sql) {
				
				die("Algo ha fallado");
				 
			} else {
				
				header ("Location: ./libros-administrador.php");
								
			}
			
	}

}
