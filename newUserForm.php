<?php
	include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<div id="fringe"></div>
	<header>
		<h1 align="center">BooksMy</h1>
	</header>

	<nav>
		<ul>
			<li>
				<a href="index.php">
					<button type="button">Inicio</button>
				</a>
			</li>
		</ul>
	</nav>

	<section id="content">
		<div class="userForm">
			<h2>Registro de nuevo usuario</h2>
			<form action="saveNewUser.php" method="POST">
				<label>Nombre*:</label> <input type="text" name="userName" required="required" placeholder="Nombre"> <br/>
				<label>Contraseña*:</label> <input type="password" name="pass1" required="required"><br />
				<label>Repetir Contraseña*:</label> <input type="password" name="pass2" ><br />
				<input type="submit" value="Enviar Datos">
				<p>* Campos obligatorios.</p>
			</div>
		</form>
	</section>

	<div id="final_fringe"></div>
		<footer>
			&copy;2017. BooksMy.
		</footer>
</body>
</html>