<?php

//Parámetros que vienen del POST

require_once("./insertar-carrito.php");
//include("./../../libros/libros.php"); // Recoge los datos de esta ruta

$id=$_GET['id'];

	$objUsuario = new insert_carrito;
	$objUsuario->llamar_bbdd($id);

?>


