
<!-- ELIMINAR USUARIO-->

<?php

	//<-- ELIMINAR USUARIO-->

	// Se hace una comprobación para ver que le está seteada la variable
	if(isset($_GET['Id'])){
	
		$id = $_GET['Id'];

		// Se llama a la función borrar para eliminar el registro
	   	borrar($id);
	}


	// FUNCIONES

	function actualizarUsuario($id, $nombre, $contrasena, $email, $edad, $fecha, $direccion, $codigoPostal, $provincia, $genero){

		include 'conexion.php';
		$query = "UPDATE usuarios SET Nombre = '$nombre', Contrasena = '$contrasena', Email = '$email', Edad = '$edad', FechaNacimiento = '$fecha', Direccion = '$direccion', CodigoPostal =  '$codigoPostal', Provincia = '$provincia', Genero = '$genero' WHERE Id = '$id'";

		$conexion->query($query);
		// Se cierra la conexión con la base de datos
		$conexion = null;
	}






	//<-- SELECCIONAR USUARIO-->

	function seleccionarUsuario($usuarioId){
		include 'conexion.php';
		$query = "SELECT * FROM usuarios WHERE Id = $usuarioId";
		$resultado = $conexion->query($query);
		$registro = $resultado->fetchAll (PDO::FETCH_OBJ);
		// Se cierra la conexión con la base de datos
		$conexion = null;
		return $registro;

	}

	function insertar($nombre, $contrasena, $email, $edad, $fecha, $direccion, $codigoPostal, $provincia, $genero){
		
		include 'conexion.php';
		$query = "INSERT INTO usuarios (Nombre, Contrasena, Email, Edad, FechaNacimiento, Direccion, CodigoPostal, Provincia, Genero) VALUES ('$nombre', '$contrasena', '$email', '$edad', '$fecha', '$direccion', '$codigoPostal', '$provincia', '$genero')";
		
		$resultado = $conexion->query($query);
		if($resultado){
			echo "<p> Un nuevo usuario ha sido insertado en la base de datos!!!</p>";
		}
		// Se cierra la conexión con la base de datos
		$conexion = null;
	}

	function borrar($id){

		// Se establece conexión con la base de datos
		include 'conexion.php';
	
		// Se crea la query para borrar un usuario de la tabla
		$query = "DELETE FROM usuarios WHERE Id = $id";
		
		echo $query;
		// Dentro de la variable $resultado se tiene un resulset con el registro a borrar
		$resultado = $conexion->query($query);

		// Se cierra la conexión con la base de datos
		$conexion = null;

	}
?>



