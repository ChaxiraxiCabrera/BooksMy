<?php 
	include("connection.php");
	session_start();

	$user_id = $_SESSION['user'];

	$sql_query="SELECT * FROM libros WHERE id_usuario='$user_id' AND leido='NO'";
	$results=$dbConnection->query($sql_query);
	
	$book_array = array();

	foreach ($results as $result) {
		array_push($book_array, $result['nombre']);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista Libros</title>
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
				<a href="userPage.php">
					<button type="button">Inicio</button>
				</a>
				<a href="selectBook.php">
					<button type="button">Nueva recomendación</button>
				</a>
			</li>
		</ul>
	</nav>

	<section id="content">
			<h2 align="center">Libro recomendado: <?php  echo $book_array[array_rand($book_array)]; ?></h2>
	</section>
	
	<?php  mysqli_close($dbConnection); ?>

	<div id="final_fringe"></div>
		<footer>
			&copy;2017. BooksMy.
		</footer>
</body>
</html>