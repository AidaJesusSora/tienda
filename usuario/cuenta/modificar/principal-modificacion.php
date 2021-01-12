<?php

//Parámetros que vienen del POST

require_once("./datos-modificar.php");

	$objUsuario = new modificar_usuario;
    $objUsuario->llamar_bbdd($_POST["nombre"], $_POST["apellidos"], $_POST["correo"], $_POST["telefono"], $_POST["dni"]);
    
?>