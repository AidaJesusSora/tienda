<?php

    class generar_precio {

        function precio() {
            
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

                // Creamos la tabla que vera el usuario al descargar-se el archivo
    
                echo "<table border='1' width='25%'>";
                $instruccion = "SELECT precio FROM libros WHERE 1";
                $resultado = mysqli_query($con, $instruccion);
    
                    echo"<thead>";

                        echo "<tr>";
                            echo "<th> Precio </th>";
                        echo "</tr>";

                    echo"</thead>";
    
                while ($fila = $resultado->fetch_assoc()) {
    
                    $precio = $fila["precio"];
    
                    echo"<tbody>";

                        echo "<tr>";
                            echo "<td>" . $precio . "</td>";
                        echo "</tr>";

                    echo"</tbody>";
        
                }
    
                echo "</table>";
                
                header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
                header('Content-disposition: attachment; filename=precio-libros.xls');
            
        }

    }

?>