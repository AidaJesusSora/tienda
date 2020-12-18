<?php

//include("./../../libros-administrador.php"); 

    if ($_GET['seleccion'] == 0) {

        header('Location: ./../../libros-administrador.php');

    } else if ($_GET['seleccion'] == 1) {

        require_once('./generar-titulo.php'); 
        $objUsuario = new generar_titulo;
        $objUsuario->titulo();

    } else if ($_GET['seleccion'] == 2) {

        require_once('./generar-autor.php'); 
        $objUsuario = new generar_autor;
        $objUsuario->autor();

    } else if ($_GET['seleccion'] == 3) {

        require_once('./generar-publicacion.php'); 
        $objUsuario = new generar_publicacion;
        $objUsuario->publicacion();

    } else if ($_GET['seleccion'] == 4) {

        require_once('./generar-edicion.php'); 
        $objUsuario = new generar_edicion;
        $objUsuario->edicion();

    } else if ($_GET['seleccion'] == 5) {

        require_once('./generar-precio.php'); 
        $objUsuario = new generar_precio;
        $objUsuario->precio();

    } else if ($_GET['seleccion'] == 6) {

        require_once('./generar-genero.php'); 
        $objUsuario = new generar_genero;
        $objUsuario->genero();

    } else if ($_GET['seleccion'] == 7) {

        require_once('./generar-paginas.php'); 
        $objUsuario = new generar_paginas;
        $objUsuario->paginas();

    } else if ($_GET['seleccion'] == 8) {

        require_once('./generar-tipo.php'); 
        $objUsuario = new generar_tipo;
        $objUsuario->tipo();

    } else if ($_GET['seleccion'] == 9) {

        require_once('./generar-editorial.php'); 
        $objUsuario = new generar_editorial;
        $objUsuario->editorial();

    } else {

        require_once('./generar-todo.php'); 
        $objUsuario = new generar_todo;
        $objUsuario->todo();

    }

?>