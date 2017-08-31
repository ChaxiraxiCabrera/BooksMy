<?php 
	include('configExample.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	
</head>
<body>
	<div id="fringe"></div>
	<header>
		<h1 align="center">BooksMy</h1>	
	</header>

	<section id="content">
		<div class="userForm">
			<h2>Iniciar sesión</h2>
			<form action="checkLogin.php" method="POST">
				<label>Nombre:</label> <input type="text" name="userName" required="required" placeholder="Nombre Usuario"> <br/>
				<label>Contraseña:</label> <input type="password" name="userPass" required="required" placeholder="Contraseña"><br />
				<input type="submit" value="Log in"><br><br>
				<a href="newUserForm.php">Registrarse</a>
			</div>
		</form>
	</section>

	<div id="final_fringe"></div>
		<footer>
			&copy;2017. BooksMy.
		</footer>
</body>
</html>