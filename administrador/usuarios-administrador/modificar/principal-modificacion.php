<?php

//Parámetros que vienen del POST

require_once("datos-modificar.php");


	$objUsuario = new modificar_usuario_bbdd;
    $objUsuario->llamar_bbdd($_POST["dni"], $_POST["nombre"], $_POST["apellidos"], $_POST["edad"], $_POST["telefono"], $_POST["nickname"], $_POST["correo"], $_GET["id"]);
    
?>