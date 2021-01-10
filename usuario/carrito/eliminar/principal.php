<?php

//Parámetros que vienen del POST

require_once("./eliminar-producto.php");
include("./../carrito.php"); //Recoge los datos de esta ruta

	$objUsuario = new eliminar_producto;
	$objUsuario->llamar_bbdd($id_fila);

?>


