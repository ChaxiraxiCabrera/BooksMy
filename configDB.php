<?php
	$server="localhost";
	$dbUser="root";
	$dbPass="";

	$conn= new mysqli($server, $dbUser, $dbPass);
	//check connection
	if($conn->connect_errno>0){
		die("Imposible conectarse con la BD".$conn->connect_errno);
	}

	//create database
	$sql = "CREATE DATABASE IF NOT EXISTS booksmydb";
	if ($conn->query($sql)=== TRUE) {
		echo "Base de datos creada correctamente";
	}else{
		echo "Error al crear la base de datos".$conn->error;
	}

	$sql = "USE booksmydb";
	if ($conn->query($sql)=== TRUE) {
		echo "Usando la BD";
	}else{
		echo "Error usar la BD".$conn->error;
	}

	//create table users
	$sql = "CREATE TABLE IF NOT EXISTS usuarios (
		id_usuario INT UNSIGNED AUTO_INCREMENT NOT NULL, 
		nombre VARCHAR(120) NOT NULL,
		password VARCHAR(120) NOT NULL,
		PRIMARY KEY(id_usuario)		
		)";

	if ($conn->query($sql)=== TRUE) {
		echo "Tabla usuarios creada correctamente";
	}else{
		echo "Error al crear tabla".$conn->error;
	}

	//Insert data
	$sql = "INSERT INTO usuarios (nombre, password) 
			SELECT * FROM (SELECT 'Admin', '21232f297a57a5a743894a0e4a801fc3') AS tmp
			WHERE NOT EXISTS (SELECT nombre FROM usuarios WHERE nombre = 'Admin') LIMIT 1";
	if ($conn->query($sql)=== TRUE) {
		echo "Tabla usuarios creada correctamente";
	}else{
		echo "Error al crear tabla".$conn->error;
	}

	//create table books
	$sql = "CREATE TABLE IF NOT EXISTS libros (
		id_libro INT UNSIGNED AUTO_INCREMENT NOT NULL, 
		nombre VARCHAR(120) NOT NULL,
		autor VARCHAR(120) NOT NULL,
		saga VARCHAR(120),
		paginas INT,
		leido VARCHAR(5) NOT NULL,
		id_usuario INT UNSIGNED NOT NULL,
		PRIMARY KEY (id_libro),
    	FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)	
		)";

	if ($conn->query($sql)=== TRUE) {
		echo "Tabla usuarios creada correctamente";
	}else{
		echo "Error al crear tabla".$conn->error;
	}

	//insert data 
	$sql = "INSERT INTO libros (nombre, autor, saga, paginas, leido, id_usuario) 
			SELECT * FROM (SELECT 'Harry Potter y La Piedra Filosofal', 'J.K. Rowling', 'Harry Potter', '256', 'Yes', '1') AS tmp
			WHERE NOT EXISTS (SELECT nombre FROM libros WHERE nombre = 'Harry Potter y La Piedra Filosofal' AND id_usuario = '1') LIMIT 1;";
	$sql .= "INSERT INTO libros (nombre, autor, saga, paginas, leido, id_usuario) 
			SELECT * FROM (SELECT 'Juego de Tronos', 'George R.R. Martin', 'Canción de Hielo y Fuego', '800', 'No', '1') AS tmp
			WHERE NOT EXISTS (SELECT nombre FROM libros WHERE nombre = 'Juego de Tronos' AND id_usuario = '1') LIMIT 1";		
	if ($conn->multi_query($sql)=== TRUE) {
		echo "Tabla usuarios creada correctamente";
	}else{
		echo "Error al crear tabla".$conn->error;
	}
	
	
	$conn->close();

?>