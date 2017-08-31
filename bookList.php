<?php 
	include("connection.php");
	session_start();
	$user_id=$_SESSION['user'];
	$sql_query="SELECT * FROM libros WHERE id_usuario='$user_id'";
	$results=$dbConnection->query($sql_query);
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
				<a href="bookForm.php">
					<button type="button">Añadir libro</button>
				</a>
			</li>
		</ul>
	</nav>


	<section id="content">
		<table border="2" id="bookTable">
			<caption>Listado Libros</caption>
				<tr>
					<th>Título</th>
					<th>Autor</th>
					<th>Saga</th>
					<th>Nº Páginas</th>
					<th>Leído</th>
					<th>Eliminar</th>
				</tr>
			
				<?php 
					foreach ($results as $result) {
				?>
				<tr>
					<td><a href="bookForm.php?book_id=<?php echo $result['id_libro']; ?>"><?php echo $result['nombre']; ?></a></td>
					<td><?php echo $result['autor']; ?></td>
					<td><?php echo $result['saga']; ?></td>
					<td><?php echo $result['paginas']; ?></td>
					<td><?php echo $result['leido']; ?></td>
					<td><a href="delete.php?book_id=<?php echo $result['id_libro']; ?>"><button type="button">X</button></a></td>
				</tr>
				<?php  
					} 
					mysqli_close($dbConnection);
				?>
		</table>
	</section>
	
	<div id="final_fringe"></div>
		<footer>
			&copy;2017. BooksMy.
		</footer>
</body>
</html>