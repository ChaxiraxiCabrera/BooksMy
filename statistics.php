<?php 
	include("connection.php");
	session_start();
	$user_id=$_SESSION['user'];
	
	$sql_query="SELECT COUNT(*) FROM libros WHERE id_usuario='$user_id'";
	$result=$dbConnection->query($sql_query);
	$row = $result->fetch_row();
	$totalBooks = $row[0];

	if ($totalBooks != 0) {
		$sql_query="SELECT COUNT(*) FROM libros WHERE leido='Yes' AND id_usuario='$user_id'";
		$result=$dbConnection->query($sql_query);
		$row = $result->fetch_row();
		$readBooks = $row[0];

		$noReadBooks = $totalBooks-$readBooks;

		$pRead = ($readBooks * 100)/$totalBooks;
		$pNoRead = ($noReadBooks * 100)/$totalBooks;
	}else{
		$pRead = 0;
		$pNoRead = 0;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Estadísticas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script type="text/javascript" src="JS/script.js"></script>
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
				<a href="bookForm.php">
					<button type="button">Añadir libro</button>
				</a>
				<a href="selectBook.php">
					<button type="button">Recomendación</button>
				</a>
				<a href="logout.php">
					<button type="button">Cerrar sesión</button>
				</a>
			</li>
		</ul>
	</nav>


	<section id="content">
		<h2 align="center">Porcentaje de libros</h2>
		<div class="container">
		  	<div class="skills read" <?php echo "style=\"width: $pRead%;\"  " ?> >Leídos: <?php echo $pRead."%"?> </div>
		</div>
		<br>
		<div class="container">
		  	<div class="skills noRead" <?php echo "style=\"width: $pNoRead%;\"  " ?>>No leídos: <?php echo $pNoRead."%"?></div>
		</div>
	</section>
	
	<div id="final_fringe"></div>
		<footer>
			&copy;2017. BooksMy.
		</footer>
</body>
</html>