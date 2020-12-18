<?php

    class generar_genero {

        function genero() {
            
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
    
                // Creamos archivo XML

                $xml = new XMLWriter();
                $xml->openMemory();
                $xml->setIndent(true);
                $xml->setIndentString('        ');
                $xml->startDocument('1.0', 'UTF-8');
               
                $instruccion = "SELECT genero FROM libros WHERE 1";
                $resultado = mysqli_query($con, $instruccion);
    
                $xml->startElement("catalogo"); 

                    $xml->startElement("libro");

                        while ($fila = $resultado->fetch_assoc()) {
    
                            $genero = $fila["genero"];
                            $xml->writeElement("genero", $genero);
                        }
                    
                    $xml->endElement();

                $xml->endElement();

                $content = $xml->outputMemory();

                ob_end_clean();
                ob_start();
                header('Content-Type: application/xml; charset=UTF-8');
                header('Content-Encoding: UTF-8');
                header("Content-Disposition: attachment;filename=genero-libros.xml");
                header('Expires: 0');
                header('Pragma: cache');
                header('Cache-Control: private');
                echo $content;     

        }

    }

?>