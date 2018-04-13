
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

	//<-- SELECCIONAR USUARIO-->

	function seleccionarUsuario($usuarioId){
		include 'conexion.php';
		$query = "SELECT * FROM usuarios WHERE Id = $usuarioId";
		$resultado = $conexion->query($query);
		$registro = $resultado->fetchAll (PDO::FETCH_OBJ);
		$conn = null;
		echo "Usuario seleccionado";
		return $registro;
	}

	function insertar($nombre, $contrasena, $email, $edad, $fecha, $direccion, $codigoPostal, $provincia, $genero){
		
		include 'conexion.php';
		$query = "INSERT INTO usuarios (Nombre, Contrasena, Email, Edad, FechaNacimiento, Direccion, CodigoPostal, Provincia, Genero) VALUES ('$nombre', '$contrasena', '$email', '$edad', '$fecha', '$direccion', '$codigoPostal', '$provincia', '$genero')";
		
		$resultado = $conexion->query($query);
		if($resultado){
			echo "<p> Un nuevo usuario ha sido insertado en la base de datos!!!</p>";
		}
	}

	function borrar($id){

		// Se establece conexión con la base de datos
		include 'conexion.php';
	
		// Se crea la query para borrar un usuario de la tabla
		$query = "DELETE FROM usuarios WHERE Id = $id";
		
		echo $query;
		// Dentro de la variable $resultado se tiene un resulset con el registro a borrar
		$resultado = $conexion->query($query);

		// Redirigimos a la página de inicio
		header("Location: index.php");

		// Se cierra la conexión con la base de datos
		$conn = null;

	}

	// FALTA EL MENSAJE DE QUE SE HA ELIMINADO UN USUARIO

	
?>


<!-- INSERTAR USUARIO-->
