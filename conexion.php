<?php

	try{

		// Creamos la conexión con PDO
		$conexion = new PDO('mysql:host=localhost; dbname=M07', 'root', '');
		//$conexion = new mysqli("localhost", "root", "", "M07");

		// Para gestionar las excepciones
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch (Exception $exception) {

		echo "Fallo al conectar a MySQL:" . $exception->getMessage();
	}


?>