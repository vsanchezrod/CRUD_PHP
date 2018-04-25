<?php

	// FUNCIONES PARA LAS CONSULTAS A BASE DE DATOS

	// Función para actualizar usuarios
	function actualizarUsuario($id, $nombre, $contrasena, $email, $edad, $fecha, $direccion, $codigoPostal, $provincia, $genero){

		// Conectamos con la base de datos
		include 'conexion.php';

		// Se crea query de UPDATE
		$query = "UPDATE usuarios SET Nombre = '$nombre', Contrasena = '$contrasena', Email = '$email', Edad = '$edad', FechaNacimiento = '$fecha', Direccion = '$direccion', CodigoPostal =  '$codigoPostal', Provincia = '$provincia', Genero = '$genero' WHERE Id = '$id'";

		// Se ejecuta la query
		$conexion->query($query);

		// Se cierra la conexión con la base de datos
		$conexion = null;
	}

	// Función seleccionar un usuario de la base de datos
	function seleccionarUsuario($usuarioId){
		
	// Se establece conexión con la base de datos
		include 'conexion.php';
		
		// Se crea la query de SELECT
		$query = "SELECT * FROM usuarios WHERE Id = $usuarioId";
		
		// Se ejecuta la query y se guarda en un resulset
		$resultado = $conexion->query($query);
		
		// Se almacena el resultado en un array de objetos 
		$registro = $resultado->fetchAll (PDO::FETCH_OBJ);
		
		// Se cierra la conexión
		$conexion = null;
		
		return $registro;

	}

	// Función insertar un usuario de la base de datos
	function insertar($nombre, $contrasena, $email, $edad, $fecha, $direccion, $codigoPostal, $provincia, $genero){
		
		// Se establece conexión con la base de datos
		include 'conexion.php';

		// Se crea query de INSERT
		$query = "INSERT INTO usuarios (Nombre, Contrasena, Email, Edad, FechaNacimiento, Direccion, CodigoPostal, Provincia, Genero) VALUES ('$nombre', '$contrasena', '$email', '$edad', '$fecha', '$direccion', '$codigoPostal', '$provincia', '$genero')";
		
		$resultado = $conexion->query($query);
				
		// Se cierra la conexión
		$conexion = null;
	}

	// Función borrar un usuario de la base de datos
	function borrar($id){

		// Se establece conexión con la base de datos
		include 'conexion.php';
	
		// Se crea la query para borrar un usuario de la tabla
		$query = "DELETE FROM usuarios WHERE Id = $id";
		
		// Dentro de la variable $resultado se tiene un resulset con el registro a borrar
		$resultado = $conexion->query($query);

		// Se cierra la conexión con la base de datos
		$conexion = null;

	}

/*AÑADIDO NUEVO LOGIN*/

	// Función que comprueba si existe un usuario en la base de datos
	function comprobarUsuario($email, $contrasena){

		// Se incluye la conexión
		include 'conexion.php';

		// Query que busca el Id del usuario que se han introducido en el login
		$query = "SELECT Id FROM usuarios WHERE Email = '$email' AND Contrasena = '$contrasena'";

		// Se ejecuta la sentencia SQL con la conexión
		$resultado = $conexion->query($query);

		// Se almacena el resultado en un array de objetos 
		$registro = $resultado->fetchAll (PDO::FETCH_OBJ);

		// Se utiliza la funcion count() para ver cuantos elementos tiene el array
		/*Si el valor es 0, no existe ese usuario, si es 1 si existe*/
		return $encontrado = count($registro);
	}

?>



