<?php

// Parámetros de conexión
$servidor = "localhost";
$usuario_bd = "root";
$contrasena = "";
$bd = "test";

// Realizamos la conexión
$con = mysqli_connect($servidor, $usuario_bd, $contrasena, $bd);
if (!$con) {

    die("Con se ha podido realizar la conexión: " . mysqli_connect_error() . "<br>");

} else {

    mysqli_set_charset($con, "utf8");

}

$nickname = $_SESSION['nickname'];

$instruccion = "SELECT * FROM usuarios WHERE nickname = $nickname";
$resultado = mysqli_query($con, $instruccion);

while ($fila = $resultado->fetch_assoc()) {
    
    $dni = $fila["dni"];
    $nombre = $fila["nombre"];
    $edad = $fila["edad"];
    $correo = $fila["correo"];
    $nickname = $fila["nickname"];
    $passwd = $fila["passwd"];
    $apellidos = $fila["apellidos"];
    $telefono = $fila["telefono"];

}

echo "<form action='./principal-modificacion.php?id=$id' method='post' class='container'>";

    //Columna unica

    echo"<div class='form-group'>
            <label>Nombre</label>
            <input type='text' class='form-control' name='nombre' value='".$nombre."'>
    </div>";

    echo"<div class='form-group'>
            <label>Apellidos</label>
            <input type='text' class='form-control' name='apellidos' value='".$apellidos."'>
    </div>";

    echo"<div class='form-group'>
            <label>DNI</label>
            <input type='text' class='form-control' name='nombre' value='".$dni."'>
    </div>";

    echo"<div class='form-group'>
            <label>Edad</label>
            <input type='number' class='form-control' name='nombre' value='".$edad."'>
    </div>";

    echo"<div class='form-group'>
            <label>Correo/label>
            <input type='email' class='form-control' name='nombre' value='".$correo."'>
    </div>";

    echo"<div class='form-group'>
            <label>Telefono</label>
            <input type='number' class='form-control' name='nombre' value='".$telefono."'>
    </div>";

    echo"<div class='form-group'>
            <label>Contraseña</label>
            <input type='text' class='form-control' name='nombre' value='".$passwd."'>
    </div>";


echo "</form>"

?>
