<?php

header('Content-Type: text/html; charset=UTF-8');


// Comprovacion si el usuario esta logeado

    if (isset($_SESSION['nickname'])) {

        $nickname=$_SESSION["nickname"];

        header('Location: ./../fallos/usuario_noregistrado.html');

        exit();

    }

    

?>