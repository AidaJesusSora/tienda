<?php

//Parámetros que vienen del POST

require_once("./insertar_carrito.php");
include("./../libros/libros.php"); // Recoge los datos de esta ruta

	$objUsuario = new insert_carrito;
	$objUsuario->llamar_bbdd($id);

?>


