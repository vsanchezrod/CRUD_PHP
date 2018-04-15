<?php

	// Con el bloque try catch se controlas y capturas las excepciones relacionadas con la conexión a BBDD
	try{

		// Creamos la conexión con PDO
		$conexion = new PDO('mysql:host=localhost; dbname=M07', 'root', '');
		
		// Para gestionar las excepciones
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch (PDOException $exception) {

		echo "Fallo al conectar a MySQL:" . $exception->getMessage();
	}

?>



