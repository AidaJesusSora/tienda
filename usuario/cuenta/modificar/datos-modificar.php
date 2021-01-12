<?php

session_start();

class modificar_usuario {

	//Parámetros que vienen del POST

	public $nickname = null;
	public $nombre = null;
	public $apellidos = null;
	public $telefono = null;
	public $correo = null;
	public $dni = null;
	
	//Parámetros de conexión

	function llamar_bbdd($nombre, $apellidos, $correo, $telefono, $dni) {

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

		$nickname = $_SESSION['nickname'];

		$sql = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', correo='$correo', telefono='$telefono', dni='$dni' where nickname='$nickname'";
		$con->query($sql) or die ("Error".mysqli_error($con));

		$consulta=mysqli_query($con, $sql);

			if(!$consulta) {
				
				die("Algo ha fallado");
				 
			} else {
				
				header ("Location: ./../cuenta-usuario.php");
								
			}
			
	}

}
