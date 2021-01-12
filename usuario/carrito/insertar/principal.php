<?php

//Parámetros que vienen del POST

require_once("./insertar-carrito.php");

$id=$_GET['id'];

	$objUsuario = new insert_carrito;
	$objUsuario->llamar_bbdd($id);

?>


