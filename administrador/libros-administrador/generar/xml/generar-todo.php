<?php

    class generar_todo {

        function todo () {
                    
            error_reporting(E_ALL & ~E_NOTICE);

            $xml = new XMLWriter();
            $xml->openUri('file:///var/www/example.com/xml/output.xml');
            $xml->startDocument('1.0', 'utf-8');

            $xml->startElement('libros');
            $xml->writeAttribute('categoria', 'titulo');
            $xml->writeCdata('Lorem ipsum');
            $xml->endElement();
            

        }

    }
?>