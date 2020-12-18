<?php

//Parámetros que vienen del POST

require_once("./modificar-usuario-admin.php");

$id=$_GET['id'];

	$objUsuario = new modificar_usuario;
	$objUsuario->llamar_bbdd($id);

?>
