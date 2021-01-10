<?php

class modificar_books_bbdd {

	//Parámetros que vienen del POST

	public $id = null;
	public $titulo = null;
	public $autor = null;
	public $publicacion = null;
	public $edicion = null;
	public $precio = null;
	public $genero = null;
	public $paginas = null;
	public $tipo = null;
	public $editorial = null;
	
	//Parámetros de conexión

	function llamar_bbdd($titulo, $autor, $publicacion, $edicion, $editorial, $precio, $tipo, $genero, $paginas, $id) {

		$servidor="localhost";
		$usuario_bd="root";
		$contraseña="";
		$bd="test";

		//Realizamos la conexión
		$con=mysqli_connect($servidor,$usuario_bd,$contraseña,$bd);
		
			if(!$con) {
				
				die("Con se ha podido realizar la conexión: ". mysqli_connect_error() . "<br>");
				
			} 
			
			else {
				
				mysqli_set_charset($con,"utf8");
				$_SESSION["con"]=$con;
				
			}

		$sql = "UPDATE libros SET titulo='$titulo', autor='$autor', genero='$genero', editorial='$editorial', precio='$precio', publicacion='$publicacion', paginas='$paginas', edicion='$edicion', tipo='$tipo'where id='$id'";
		$con->query($sql) or die ("Error".mysqli_error($con));

		$consulta=mysqli_query($con, $sql);

			if(!$consulta) {
				
				die("Algo ha fallado");
				 
			} else {
				
				header ("Location: ./../libros-administrador.php");
								
			}
			
	}

}
