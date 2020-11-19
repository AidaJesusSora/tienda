<?php

//Parámetros que vienen del POST

require_once("eliminar_libro.php");

	$objUsuario = new eliminar_books;
	$objUsuario->llamar_bbdd($_POST[$titulo]);

?>


