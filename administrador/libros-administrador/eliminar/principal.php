<?php

//Parámetros que vienen del POST

require_once("./eliminar-libro.php");
include("./../libros-administrador.php"); // Recoge los datos de esta ruta

	$objUsuario = new eliminar_books;
	$objUsuario->llamar_bbdd($id);

?>


