<?php

//Parámetros que vienen del POST

require_once("./form_modificar_libro.php");

$id=$_GET['id'];

	$objUsuario = new modificar_books;
	$objUsuario->llamar_bbdd($id);

?>
