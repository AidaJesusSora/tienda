<?php

//Parámetros que vienen del POST

require_once("comprovacion-registro.php");

	$objUsuario = new dades;
	$objUsuario->validar_dni($_POST["dni"]);
	$objUsuario->validar_nombre($_POST["nombre"]);
	$objUsuario->validar_edad($_POST["edad"]);
	$objUsuario->validar_correo($_POST["correo"]);
	$objUsuario->validar_nickname($_POST["nickname"]);
	$objUsuario->validar_contrasena(($_POST["passwd"]),($_POST["passwd1"]));
	$objUsuario->validar_telefono($_POST["telefono"]);
	$objUsuario->validar_apellidos($_POST["apellidos"]);
	$objUsuario->llamar_bbdd();
	$objUsuario->verificar_errores();
	$objUsuario->llamar_bbdd_2();
?>


