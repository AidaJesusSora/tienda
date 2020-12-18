<?php

class eliminar_users {

	//Parámetros que vienen del POST

	public $id;

	//Parámetros de conexión

	function llamar_bbdd($id) {

		$servidor = "localhost";
		$usuario_bd = "root";
		$contraseña = "";
		$bd = "test";

		//Realizamos la conexión
		$con = mysqli_connect($servidor, $usuario_bd, $contraseña, $bd);

		if (!$con) {

			die("Con se ha podido realizar la conexión: " . mysqli_connect_error() . "<br>");

		} else {

			mysqli_set_charset($con, "utf8");
			echo "Te has conectado a la BBDD<br>";
			$_SESSION["con"] = $con;

		}

		//Eliminamos el registro
		$sql = "DELETE from usuarios where id='$id'";
		$con->query($sql) or die ("Error".mysqli_error($con));

		if (!$sql) {

			die("Algo ha fallado");

		} else {

			header("Location: ./../usuarios-administrador.php");

		}

	}

}
