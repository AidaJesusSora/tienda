<?php

//Parámetros que vienen del POST

require_once("./eliminar_usuario.php"); 
include("./../usuarios-administrador.php"); // Decimos de donde cogemos los valores de los parametros necesarios

	$objUsuario = new eliminar_users;
	$objUsuario->llamar_bbdd($id);

?>


