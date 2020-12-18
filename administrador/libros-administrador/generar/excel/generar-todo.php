<?php

    class generar_todo {

        function todo () {
                    
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

                // Creamos la tabla para cuando el usuario se descargue el archivo

                echo "<table border='1' width='100%'>";
                $instruccion = "SELECT * FROM libros WHERE 1";
                $resultado = mysqli_query($con, $instruccion);

                echo"<thead>";

                    echo "<tr>";
                        echo "<td width='10%'> Titulo </td>";
                        echo "<td width='10%'> Autor </td>";
                        echo "<td width='10%'> Publicacion </td>";
                        echo "<td width='10%'> Edicion </td>";
                        echo "<td width='10%'> Precio </td>";
                        echo "<td width='10%'> Genero </td>";
                        echo "<td width='10%'> Paginas </td>";
                        echo "<td width='10%'> Libros </td>";
                        echo "<td width='10%'> Editorial</td>";
                    echo "</tr>";

                echo"</thead>";

                    while ($fila = $resultado->fetch_assoc()) {

                        $id = $fila["id"];
                        $titulo = $fila["titulo"];
                        $autor = $fila["autor"];
                        $publicacion = $fila["publicacion"];
                        $edicion = $fila["edicion"];
                        $precio = $fila["precio"];
                        $genero = $fila["genero"];
                        $paginas = $fila["paginas"];
                        $tipo = $fila["tipo"];
                        $editorial = $fila["editorial"];

                        echo"<tbody>";

                            echo "<tr>";
                                echo "<td>" . $titulo . "</td>";
                                echo "<td>" . $autor . "</td>";
                                echo "<td>" . $publicacion . "</td>";
                                echo "<td>" . $edicion . "</td>";
                                echo "<td>" . $precio . "</td>";
                                echo "<td>" . $genero . "</td>";
                                echo "<td>" . $paginas . "</td>";
                                echo "<td>" . $tipo . "</td>";
                                echo "<td>" . $editorial . "</td>";
                            echo "</tr>";

                        echo"</tbody>";

                    }

                    echo "</table>";

                header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
                header('Content-disposition: attachment; filename=excel-libros.xls');
        
        }

    }
?>