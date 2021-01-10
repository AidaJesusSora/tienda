<?php

class books {

	//Parámetros que vienen del POST

	public $errores = 0;
	public $titulo = null;
	public $autor = null;
	public $publicacion = null;
	public $edicion = null;
	public $precio = null;
	public $genero = null;
	public $paginas = null;
	public $tipo = null;
	public $editorial = null;

	/* Titulo */
	
	public function getTitulo() {

		return $this->titulo;
	
	}

	public function setTitulo($titulo) {
		
		$this->titulo = $titulo;
		
	}
	
	function validar_titulo($titulo) {

		$this->titulo = $titulo;
		
		if (strlen($this->titulo) > 100 || strlen($this->titulo) < 4) {

			echo("El titulo del libro tiene que tener entre 4 y 100 caracteres<br>");
			$this->errores++;

		}
		
	}
	
	/* Autor */
		
	public function getAutor() {

		return $this->autor;

	}

	public function setAutor($autor) {
		
		$this->autor = $autor;
		
	}

	function validar_autor($autor) {

		$this->autor = $autor;
		
		if (strlen($this->autor) > 100 || strlen($this->autor) < 4) {

			echo("El autor del libro tiene que tener entre 4 y 100 caracteres<br>");
			$this->errores++;

		}
		
	}

	/* Publicacion */
	
	public function getPublicacion() {

		return $this->publicacion;
	
	}

	public function setPublicacion($publicacion) {
		
		$this->publicacion = $publicacion;
		
	}

	function validar_publicacion($publicacion) {

		$this->publicacion = $publicacion;

	}
	
	/* Edicion */
	
	public function getEdicion() {

		return $this->edicion;
	
	}

	public function setEdicion($edicion) {
		
		$this->edicion = $edicion;
		
	}
	
	function validar_edicion($edicion) {

		$this->edicion = $edicion;
		
		if ($this->edicion < 1 || $this->edicion > 100) {

			echo("La edicion del libro tiene que estar entre 1 y 100 <br>");
			$this->errores++;

		}
		
	}
	
	/* Precio */
	
	public function getPrecio() {

		return $this->precio;
	
	}

	public function setPrecio($precio) {
		
		$this->precio = $precio;
		
	}
	
	function validar_precio($precio) {

		$this->precio = $precio;
		
		if ($this->precio < 5 || $this->precio > 2000) {

			echo("El precio del libro tiene que ser entre 5€ y 2.000€ <br>");
			$this->errores++;

		}

	}
	
	/* Genero */
	
	public function getGenero() {

		return $this->genero;
	
	}

	public function setGenero($genero) {
		
		$this->genero = $genero;
		
	}
	
	function validar_genero($genero) {

		$this->genero = $genero;
		
	}
	
	/* Paginas */
	
	public function getPaginas() {

		return $this->paginas;
	
	}

	public function setPaginas($paginas) {
		
		$this->paginas = $paginas;
		
	}
	
	function validar_paginas($paginas) {

		$this->paginas = $paginas;
		
		if ($this->paginas < 20 || $this->paginas > 3400) {

			echo("Las paginas del libro tienen que ser entre 20 y 3.400 paginas <br>");
			$this->errores++;

		}
		
	}
	
	/* Libros */
	
	public function getLibro() {

		return $this->tipo;
	
	}

	public function setLibro($tipo) {
		
		$this->tipo = $tipo;
		
	}
	
	function validar_libro($tipo) {

		$this->tipo = $tipo;

	}

	/* Editorial */
	
	public function getEditorial() {

		return $this->editorial;
	
	}

	public function setEditorial($editorial) {
		
		$this->editorial = $editorial;
		
	}

	function validar_editorial($editorial) {

		$this->editorial = $editorial;

	}

	/* ID */

	public function getid($id) {

		$this->id = $id;

	}

	public function setid($id) {

		$this->id = $id;

	}
	
	
	//Parámetros de conexión

	function verificar_errores() {
			
		if ($this->errores != 0) {

			echo ("<br>Hay errores, vuelve a registrarte, gracias. <br>");
			echo ("<span>");
			echo ("(<a href='./alta-libro.php'>Registar libro</a>");
			echo (" de nuevo");
			die ("</span>)");

		}
	
	}
	
	function llamar_bbdd() {

		$servidor="localhost";
		$usuario_bd="root";
		$contraseña="";
		$bd="test";

		//Realizamos la conexión
		$con=mysqli_connect($servidor,$usuario_bd,$contraseña,$bd);
		
			if(!$con) {
				
				die("Con se ha podido realizar la conexión: ". mysqli_connect_error() . "<br>");
				
			} else {
				
				mysqli_set_charset($con,"utf8");
				$_SESSION["con"]=$con;
				
			}

		$consulta=mysqli_query($con,"insert into libros values ('$this->titulo','$this->autor','$this->genero','$this->editorial','$this->precio','$this->publicacion','$this->paginas','$this->edicion','$this->tipo', '$this->id')");

			if(!$consulta) {
				
				die("Algo ha fallado");
				 
			} else {
				
				header ("Location: ./../libros-administrador.php");
								
			}
			
	}

}
