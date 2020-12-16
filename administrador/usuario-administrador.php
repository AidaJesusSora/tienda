<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="./style/admin-style.css" rel="stylesheet" type="text/css">

	<!-- Bootstrap link -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- JavaScript Link -->
	<script type="text/javascript" src="./../js/java-script.js"> </script>
</head>

<?php

	include './../comprovaciones-formularios/login.php';

?>

<body>

	<header class="header">

		<h1 class="h1">BookMarket Administrador</h1>

	</header>

	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand text-white" href="#">BookMarket</a>
	  
		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item">
				<a class="nav-link text-white" href="./libros-administrador/libros-administrador.php">Libros</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" href="./usuarios-administrador/usuarios-administrador.php">Usuarios</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" type="button" data-toggle="modal" data-target="#desconexion"
				onclick="funcionAlerta()">Log out</a>
			</li>
		  </ul>
		  
		</div>
	</nav>


	<!-- Seccion Libros -->

	<h2 class="text-center mt-3">- Libros -</h2>

	<div class="container-fluid mt-3 row text-justify">

		<div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At ad dolorum mollitia consectetur excepturi enim unde nisi eaque est, autem vero blanditiis qui nemo voluptatum maxime fugit eligendi iure reprehenderit sint, neque fuga hic! Nisi dolore perspiciatis voluptate, vero eveniet ratione aspernatur fugiat assumenda exercitationem libero tempore veritatis minima at harum reprehenderit quam id voluptatibus perferendis quia nobis cum ab labore vitae. Perspiciatis error quo distinctio aspernatur deleniti minus similique incidunt velit dolorem quas impedit et, at, tenetur eius ea voluptatem hic sapiente veniam dolores, delectus quam. A necessitatibus, blanditiis, earum consectetur aliquid corporis, quis ducimus et dolores modi enim.</p>
			<br>
			<a class="btn btn-outline-info btn-group-lg btn-block container" href="./libros-administrador/libros-administrador.php" role="button">Ver los libros</a>
		</div>
		<div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0"><img src="./../img/books.jpg" class="img-fluid"></div>

	</div>

	<br>

	<!-- Seccion Random -->

	<div class="container-fluid mt-3" id="sec-random">

		<h4 class="text-center">Qué maravilloso es que nadie necesite esperar ni un sólo momento antes de comenzar a mejorar el mundo.</h4>
		<h5 class="text-center">- El diario de Ana Frank -</h5>

	</div>

	<br>

	<!-- Seccion Usuarios -->

	<h2 class="text-center">- Usuarios -</h2>

	<div class="container-fluid mt-3 row text-justify mb-5">

		<div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0"><img src="./../img/usuarios.jpg" class="img-fluid"></div>

		<div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At ad dolorum mollitia consectetur excepturi enim unde nisi eaque est, autem vero blanditiis qui nemo voluptatum maxime fugit eligendi iure reprehenderit sint, neque fuga hic! Nisi dolore perspiciatis voluptate, vero eveniet ratione aspernatur fugiat assumenda exercitationem libero tempore veritatis minima at harum reprehenderit quam id voluptatibus perferendis quia nobis cum ab labore vitae. Perspiciatis error quo distinctio aspernatur deleniti minus similique incidunt velit dolorem quas impedit et, at, tenetur eius ea voluptatem hic sapiente veniam dolores, delectus quam. A necessitatibus, blanditiis, earum consectetur aliquid corporis, quis ducimus et dolores modi enim.</p>
			<br>
			<a class="btn btn-outline-info btn-group-lg btn-block container" href="./usuarios-administrador/usuarios-administrador.php" role="button">Ver los usuarios</a>
		</div>

	</div>
	
</body>

<footer class="mt-4"> Aida Jesus Sora </footer>

</html>