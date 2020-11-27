<?php

//Parámetros que vienen del POST

require_once("./modificar-libro.php");
include("./../libros-administrador.php"); // Recoge los datos de esta ruta

	$objUsuario = new modificar_books;
	$objUsuario->llamar_bbdd($id);

?>


