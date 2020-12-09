<?php

//Parámetros que vienen del POST

require_once("./form_modificar_usuario.php");

$id=$_GET['id'];

	$objUsuario = new modificar_usuario;
	$objUsuario->llamar_bbdd($id);

?>


