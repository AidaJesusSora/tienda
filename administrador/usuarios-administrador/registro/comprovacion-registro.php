<?php

class dades {

	//Parámetros que vienen del POST

	public $errores = 0;

	public $dni = null;
	public $nombre = null;
	public $edad = null;
	public $correo = null;
	public $nickname = null;
	public $passwd = null;
	public $passwd1 = null;
	public $apellidos = null;
	public $telefono = null;
	public $usuario = false; // False = Usuario Normal - True = Administrador

	/* Condiciones */ 
	
		/*DNI*/
		
		public function getdni() {

			return $this->dni;
		
		}

		public function setdni($dni) {
			
			$this->dni = $dni;
			
		}

		function validar_dni($dni) {

			$this->dni = $dni;

			$letra = substr($dni, -1);
			$numeros = substr($dni, 0, -1);

			if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) != $letra && strlen($letra) != 1 && strlen ($numeros) != 8 ) {

				echo("El dni es incorrecto<br><br>");	
				$this->errores++;

			}

		}
		
		/*Nombre*/
		
		public function getnombre() {

			return $this->nombre;
		
		}

		public function setnombre($nombre) {
			
			$this->nombre = $nombre;
			
		}
		
		function validar_nombre($nombre) {

			$this->nombre = $nombre;

			if (strlen($nombre) > 30 || strlen($nombre) < 2) {

				echo("El nombre tiene que estar entre 2 y 30 caracteres<br><br>");
				$this->errores++;

			}
			
		}
		
		/*Edad*/
		
		public function getedad() {

			return $this->edad;
		
		}

		public function setedad($edad) {
			
			$this->edad = $edad;
			
		}

		function validar_edad($edad) {

			$this->edad = $edad;

			if ($edad < 18 || $edad > 99) {

				echo("Edad erronea tiene que ser entre 18 y 99<br><br>");
				$this->errores++;

			}

		}
		
		/* Correo */
		
		public function getecorreo() {

			return $this->correo;
		
		}

		public function setcorreo($correo) {
			
			$this->correo = $correo;
			
		}
		
		// Falta Validacion

		function validar_correo($correo) {

			$this->correo = $correo;

		}


		/*Nickname*/
		
		public function getnickname() {

			return $this->nickname;
		
		}

		public function setnickname($nickname) {
			
			$this->nickname = $nickname;
			
		}
		
		function validar_nickname($nickname) {

			$this->nickname = $nickname;
			
			if (strlen($nickname) > 15 || strlen($nickname) < 2) {

				echo("El nickname tiene que estar entre 2 y 15 caracteres<br><br>");
				$this->errores++;

			}

		}

		/*Contraseña*/
		
		public function getpasswd() {

			return $this->passwd;
			return $this->passwd1;
		
		}

		public function setpasswd($passwd, $passwd1) {
			
			$this->passwd = $passwd;
			$this->passwd1 = $passwd1;
			
		}

		function validar_contrasena($passwd, $passwd1) {

			$this->passwd = $passwd;
			$this->passwd1 = $passwd1;

			if (strlen($passwd) > 15 || strlen($passwd) < 9) {

				echo("La contraseña tiene que estar entre 9 y 15 caracteres<br><br>");
				$this->errores++;

				if ($passwd === $passwd1) {

					echo "Las contraseñas son iguales";
	
				} else {
	
					echo "Las contraseñas no son iguales";
	
				}

			} else {

				if ($passwd === $passwd1) {

					echo "Las contraseñas son iguales";
	
				} else {
	
					echo "Las contraseñas no son iguales";
					$this->errores++;

				}

			}

		}
		
		/*Apellidos*/
		
		public function getapellidos() {

			return $this->apellidos;
		
		}

		public function setapellidos($apellidos) {
			
			$this->apellidos = $apellidos;
			
		}

		function validar_apellidos($apellidos) {

			$this->apellidos = $apellidos;

			if (strlen($apellidos) > 30 || strlen($apellidos) < 1) {

				echo("El apellido tiene que estar entre 1 y 30 caracteres<br><br>");
				$this->errores++;
			} 

		}
			
		/*Telefono*/
		
		public function gettelefono() {

			return $this->telefono;
		
		}

		public function settelefono($telefono) {
			
			$this->telefono = $telefono;
			
		}
		
		function validar_telefono($telefono) {

			$this->telefono = $telefono;
		
			$pattern = '/([0-9]{9})/';

			if(!preg_match($pattern, $telefono)) {
				
				echo('El telefono es incorrecto<br><br>');
				$this->errores++;
				
			}
			
		}

		/* Usuario */

		public function getUser($usuario) {

			$this->usuario = $usuario;

		}

		public function setUser($usuario) {

			$this->usuario = $usuario;

		}

		/* ID */

		public function getid($id) {

			$this->id = $id;
	
		}
	
		public function setid($id) {
	
			$this->id = $id;
	
		}

		//Parámetros de conexión
	
		function llamar_bbdd() {

			$nickname = $_POST["nickname"];
			$correo = $_POST["correo"];

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
				echo "Te has conectado a la BBDD<br>";
				$_SESSION["con"]=$con;
				
			}

			$instruccion = "select count(*) as cuantos from usuarios where nickname = '$nickname'";
			$resultado = mysqli_query($con, $instruccion);
				while ($fila = $resultado->fetch_assoc()) {
					$numero=$fila["cuantos"];
				} 
				
				if ($numero !=0) {

					$this->errores++;

				} else {

					$instruccion = "select count(*) as cuantos from usuarios where correo = '$correo'";
					$resultado = mysqli_query($con, $instruccion);

						while ($fila = $resultado->fetch_assoc()) {

							$numero=$fila["cuantos"];
							
						} 
						
						if ($numero>=1) {

							$this->errores++;

						}
				}


		}

		function verificar_errores() {
		
			if ($this->errores != 0) {

				header ('Location: ./../../../fallos/registro_fallido.html');

			} else {

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
				echo "Te has conectado a la BBDD<br>";
				$_SESSION["con"]=$con;
				
			}

			$sql_insert = "INSERT INTO usuarios VALUES ('null','$this->dni','$this->nombre','$this->edad','$this->correo','$this->nickname','$this->passwd','$this->apellidos','$this->telefono','$this->passwd1','$this->usuario')";

			$consulta=mysqli_query($con, $sql_insert);
			
			if(!$consulta) {
				
				die("Algo ha fallado");
				
			} else {

				$nombre_tabla = $this->nickname.'_carrito';

				$creacion_carrito = "CREATE TABLE $nombre_tabla (
					id_fila BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
					id BIGINT(20) UNSIGNED,
					titulo VARCHAR (100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
					preu decimal(4,2),
					PRIMARY KEY (id_fila),
					FOREIGN KEY (id) REFERENCES libros(id)
				);";

				mysqli_query($con, $creacion_carrito) or die ("Error".mysqli_error($con));
				
				header ("Location: ./../usuarios-administrador.php");
					
			}

		}

	}

}
	
?>


