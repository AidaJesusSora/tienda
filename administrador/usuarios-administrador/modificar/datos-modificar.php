<?php

class modificar_usuario_bbdd {

	//Parámetros que vienen del POST

	public $id = null;
	public $nombre = null;
	public $apellidos = null;
	public $edad = null;
	public $telefono = null;
	public $nickname = null;
	public $correo = null;

	//Parámetros de conexión

	function llamar_bbdd($dni, $nombre, $apellidos, $edad, $telefono, $nickname, $correo, $id) {

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

		$sql = "UPDATE usuarios SET dni='$dni', nombre='$nombre', apellidos='$apellidos', edad='$edad', telefono='$telefono', nickname='$nickname', correo='$correo' where id='$id'";
		$con->query($sql) or die ("Error".mysqli_error($con));

		$consulta=mysqli_query($con, $sql);

			if(!$consulta) {
				
				die("Algo ha fallado");
				 
			} else {
				
				header ("Location: ./../usuarios-administrador.php");
								
			}
			
	}

}
