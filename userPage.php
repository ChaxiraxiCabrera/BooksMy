<?php 
	include("connection.php");
	session_start();

	if(isset($_SESSION['user'])){
		$user_id=$_SESSION['user'];

		$sql_query="SELECT COUNT(*) FROM libros WHERE id_usuario='$user_id'";
		$result=$dbConnection->query($sql_query);
		$row = $result->fetch_row();
		$count = $row[0];

		$sql_query="SELECT COUNT(*) FROM libros WHERE leido='Yes' AND id_usuario='$user_id'";
		$result=$dbConnection->query($sql_query);
		$row = $result->fetch_row();
		$count2 = $row[0];

		$book_query="SELECT * FROM usuarios WHERE id_usuario='$user_id'";
		$results=$dbConnection->query($book_query);
		foreach ($results as $row) {
			$name=$row['nombre'];
		}
	}
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

	<nav>
		<ul>
			<li>
				<a href="bookForm.php">
					<button type="button">Añadir libro</button>
				</a>
				<a href="selectBook.php">
					<button type="button">Recomendación</button>
				</a>
				<a href="statistics.php">
					<button type="button">Estadísticas</button>
				</a>
				<a href="logout.php">
					<button type="button">Cerrar sesión</button>
				</a>
			</li>
		</ul>
	</nav>

	<section id="content">
		<div id="titlePage">
			<h2>Bienvenido usuario: <i><?php echo $name?></i></h2>
		</div>

		<div id="list">
			<h2 id="headList">Resumen</h2>
			<ul id="resumeList">
				<a href="bookList.php"><li>Nº de libros registrados: <?php echo $count ?> </li></a>
				<a href="bookReadList.php"><li>Nº de libros leídos: <?php echo $count2 ?></li></a>
				<a href="bookNoReadList.php"><li>Nº de libros no leídos: <?php echo $count-$count2 ?></li></a>
			</ul>
		</div>
	</section>

	<div id="final_fringe"></div>
		<footer>
			&copy;2017. BooksMy.
		</footer>
</body>
</html>