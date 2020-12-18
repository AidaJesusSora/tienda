<?php

    class generar_todo {

        function todo () {
                    
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
           
            $instruccion = "SELECT * FROM libros WHERE 1";
            $resultado = mysqli_query($con, $instruccion);

            $xml->startElement("catalogo"); 

                $xml->startElement("libro");

                    while ($fila = $resultado->fetch_assoc()) {

                        $titulo = $fila["titulo"];
                        $xml->writeElement("titulo", $titulo);
                        $autor = $fila["autor"];
                        $xml->writeElement("autor", $autor);
                        $publicacion = $fila["publicacion"];
                        $xml->writeElement("publicacion", $publicacion);
                        $edicion = $fila["edicion"];
                        $xml->writeElement("edicion", $edicion);
                        $precio = $fila["precio"];
                        $xml->writeElement("precio", $precio);
                        $genero = $fila["genero"];
                        $xml->writeElement("genero", $genero);
                        $paginas = $fila["paginas"];
                        $xml->writeElement("paginas", $paginas);
                        $tipo = $fila["tipo"];
                        $xml->writeElement("tipo", $tipo);
                        $editorial = $fila["editorial"];
                        $xml->writeElement("editorial", $editorial);
                    }
                
                $xml->endElement();

            $xml->endElement();

            $content = $xml->outputMemory();

            ob_end_clean();
            ob_start();
            header('Content-Type: application/xml; charset=UTF-8');
            header('Content-Encoding: UTF-8');
            header("Content-Disposition: attachment;filename=titulo-libros.xml");
            header('Expires: 0');
            header('Pragma: cache');
            header('Cache-Control: private');
            echo $content;

        }

    }
?>