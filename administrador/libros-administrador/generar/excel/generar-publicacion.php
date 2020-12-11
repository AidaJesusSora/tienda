<?php

    class generar_publicacion {

        function publicacion() {
            
            error_reporting(E_ALL & ~E_NOTICE);

            // Parámetros de conexión
                $servidor = "localhost";
                $usuario_bd = "root";
                $contrasena = "";
                $bd = "test";
    
                // realizamos la conexión
                $con = mysqli_connect($servidor, $usuario_bd, $contrasena, $bd);
                if (!$con) {
    
                    die("Con se ha podido realizar la conexión: " . mysqli_connect_error() . "<br>");

                } else {
    
                    mysqli_set_charset($con, "utf8");

                }
    
                echo "<table border='1' width='25%'>";
                $instruccion = "SELECT publicacion FROM libros WHERE 1";
                $resultado = mysqli_query($con, $instruccion);
    
                echo "<tr>";
                echo "<th> Publicacion </th>";

                echo "</tr>";
    
                while ($fila = $resultado->fetch_assoc()) {
    
                    $publicacion = $fila["publicacion"];
    
                    echo "<tr>";
                    echo "<td>" . $publicacion . "</td>";
                    echo "</tr>";
    
                }
    
                echo "</table>";
            
                header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
                header('Content-disposition: attachment; filename=publicacion-libros.xls');
            
            

        }

    }

?>