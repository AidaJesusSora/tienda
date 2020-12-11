<?php

//Parámetros que vienen del POST

require_once("modificar_libro.php");

	$objUsuario = new modificar_books_bbdd;
    $objUsuario->llamar_bbdd($_POST["titulo"], $_POST["autor"], $_POST["publicacion"], $_POST["edicion"], $_POST["editorial"], $_POST["precio"], $_POST["tipo"], $_POST["genero"], $_POST["paginas"], $_GET["id"]);
    
?>