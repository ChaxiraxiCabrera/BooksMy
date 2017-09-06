<?php
	include("connection.php");
	$title="Añadir nuevo libro";
	$book_id=0;
	$name="";
	$author="";
	$saga="";
	$nPag="";
	$read="";
	if(isset($_GET['book_id'])){
		$title="Modificar libro";
		$book_id=$_GET['book_id'];
		$book_query="SELECT * FROM libros WHERE id_libro='$book_id'";
		$results=$dbConnection->query($book_query);
		foreach ($results as $book_row) {
			$name=$book_row['nombre'];
			$author=$book_row['autor'];
			$saga=$book_row['saga'];
			$nPag=$book_row['paginas'];
			$read=$book_row['leido'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Añadir Libro</title>
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
			</li>
		</ul>
	</nav>

	<section id="content">
		<div class="bookForm">
			<h2><?php echo $title ?></h2>
			<form action="save.php" method="POST">
				<label>Nombre*:</label> <input type="text" name="bookName" required="required" placeholder="Nombre Libro" value="<?php echo $name; ?>"> <br/>
				<label>Autor*:</label> <input type="text" name="bookAuthor" required="required" placeholder="Nombre Autor" value="<?php echo $author; ?>"><br />
				<label>Saga:</label> <input type="text" name="bookSaga" placeholder="Nombre Saga" value="<?php echo $saga; ?>"><br />
				<label>Páginas:</label> <input type="number" name="bookPages" value="<?php echo $nPag; ?>"><br />
				<label>Leido:</label> <input type="radio" name="read" value="Yes" <?php if($read=="Yes"){ ?> checked="checked" <?php } ?>> Si
						<input type="radio" name="read" value="No" <?php if($read=="No"){ ?> checked="checked" <?php } ?> required> No		
				<br />
				<input type="hidden" name="id_libro" value="<?php echo $book_id; ?>">
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