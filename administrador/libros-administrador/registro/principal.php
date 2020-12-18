<?php

//Parámetros que vienen del POST

require_once("datos-libro.php");

	$objUsuario = new books;
	$objUsuario->validar_titulo($_POST["titulo"]);
	$objUsuario->validar_autor($_POST["autor"]);
	$objUsuario->validar_publicacion($_POST["publicacion"]);
	$objUsuario->validar_edicion($_POST["edicion"]);
	$objUsuario->validar_precio($_POST["precio"]);
	$objUsuario->validar_genero($_POST["genero"]);
	$objUsuario->validar_paginas($_POST["paginas"]);
	$objUsuario->validar_libro($_POST["tipo"]);
	$objUsuario->validar_editorial($_POST["editorial"]);
	$objUsuario->verificar_errores();
	$objUsuario->llamar_bbdd();

?>


