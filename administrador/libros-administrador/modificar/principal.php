<?php

//Parámetros que vienen del POST

require_once("./modificar-libro-admin.php");

$id=$_GET['id'];

	$objUsuario = new modificar_books;
	$objUsuario->llamar_bbdd($id);

?>
