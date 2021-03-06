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

		try {
			$conexion->query($query);
			return true;
		}
		catch (PDOException $exception) {
			
			return false; 
		}
						
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

		if (count($registro) != 0 ) {
			$id = $registro[0]->Id;
			insertarAcceso($id);
		}
		
		return $encontrado = count($registro);
	}

	// Función que seleciona los nombres de las provincias existentes en la base de datos y devuelve el resultado en un array
	function seleccionarProvincias(){

		// Se incluye el archivo php que se encarga de la conexión a la BBDD
		include 'conexion.php';
			
		// Se crea la query para consultar el nombre de las provincias
		$query = "SELECT Nombre FROM provincias";
		
		// Dentro de la variable $resultado se obtiene un resulset con lo registros almacenados
		$resultado = $conexion->query($query);
		
		// Almacenamos el resultado en un array de objetos 
		$arrayProvincias = $resultado->fetchAll (PDO::FETCH_OBJ);

		return $arrayProvincias;
	}

	// Función insertar provincia en la base de datos
	function insertarProvincia($nombre) {
		
		// Se establece conexión con la base de datos
		include 'conexion.php';

		// Se crea query de INSERT
		$query = "INSERT INTO provincias (Nombre) VALUES ('$nombre')";
		$resultado = $conexion->query($query);
				
		// Se cierra la conexión
		$conexion = null;
	}

	// Función que registrar los accesos de los usuarios a la base de datos
	function insertarAcceso($id){
		
		// Se establece conexión con la base de datos
		include 'conexion.php';
		$query = "INSERT INTO registroEntrada (IdUsuario) VALUES ($id)";
		$resultado = $conexion->query($query);
				
		// Se cierra la conexión
		$conexion = null;
	
	}

	// Función que va a seleccionar TODOS los usuarios de la base de datos
	function seleccionarUsuarios(){
		// Se establece conexión con la base de datos
		include 'conexion.php';

		// Se crea la query para consultar todos los usuarios de la tabla
		$query = "SELECT * FROM usuarios";

		// Dentro de la variable $resultado se obtiene un resulset con lo registros almacenados
		$resultado = $conexion->query($query);

		// Almacenamos el resultado en un array de objetos 
		$registros = $resultado->fetchAll (PDO::FETCH_OBJ);

		// Se cierra la conexión
		$conexion = null;
		
		return $registros;
	}

	// Función crear XML
	function crearXML(){

		$xml = new DomDocument('1.0', 'UTF-8');
	
		$usuarios = $xml->createElement('usuarios');
		$usuarios = $xml->appendChild($usuarios);
		$usuarios->setAttribute("fecha", date("D d/m/Y"));
		$usuarios->setAttribute("hora", date("G:i:s"));
	
		$registros = seleccionarUsuarios();

		for ($i = 0; $i < count($registros); $i++){
			
			$usuario = $xml->createElement('usuario');
			$usuario = $usuarios->appendChild($usuario);

			$id = $xml->createElement('id', $registros[$i]->Id);
			$id = $usuario->appendChild($id);

			$nombre = $xml->createElement('nombre', $registros[$i]->Nombre);
			$nombre = $usuario->appendChild($nombre);

			$contrasena = $xml->createElement('contrasena', $registros[$i]->Contrasena);
			$contrasena = $usuario->appendChild($contrasena);

			$email = $xml->createElement('email', $registros[$i]->Email);
			$email = $usuario->appendChild($email);

			$edad = $xml->createElement('edad', $registros[$i]->Edad);
			$edad = $usuario->appendChild($edad);

			$fechaNac = $xml->createElement('fechaNacimiento', $registros[$i]->FechaNacimiento);
			$fechaNac = $usuario->appendChild($fechaNac);

			$direccion = $xml->createElement('direccion', $registros[$i]->Direccion);
			$direccion = $usuario->appendChild($direccion);

			$codPostal = $xml->createElement('codigoPostal', $registros[$i]->CodigoPostal);
			$codPostal = $usuario->appendChild($codPostal);

			$provincia = $xml->createElement('provincia', $registros[$i]->Provincia);
			$provincia = $usuario->appendChild($provincia);

			$genero = $xml->createElement('genero', $registros[$i]->Genero);
			$genero = $usuario->appendChild($genero);
		}
		$xml->save('xml/usuarios.xml');
	}

	// Función crear TXT
	function crearTXT(){

		// Con la funcion fopen se crea el archivo, y con "w+" se sobreescribe en el caso de que ya exista
		$fichero = fopen("txt/usuarios.txt", "w+");

		// Con la función date() se guarda la fecha en una variable
		$fecha = date("D d/m/Y");
		$hora = date("G:i:s");
		 
		// Añadimmos las siguientes líneas como cabecera del documento txt
		fwrite($fichero, "USUARIOS REGISTRADOS\n");
		fwrite($fichero, "Fecha de Edición de archivo: " . $fecha . "\n");
		fwrite($fichero, "Hora de edición: " . $hora . "\n");
		fwrite($fichero, "________________________________________________________\n");
 
		// Se guarda en un variable el resultado de la query SELECT de los usuarios de la tabla usuarios
		$usuarios = seleccionarUsuarios();
 		// Se recorren los distintos usuarios con FOREACH y se escribe su información en el archivo creado
		foreach ($usuarios as $usuario){
 
			fwrite($fichero, "\nUsuario:\n");
			fwrite($fichero, "\tEmail: " . $usuario->Email . "\n");
			fwrite($fichero, "\tFecha de Nacimiento: " . $usuario->FechaNacimiento . "\n");
			fwrite($fichero, "________________________________________________________\n");
		}
 
		// Se cierra el fichero
		fclose($fichero);
		 
	 }

/*AÑADIDO NUEVO PARA LA PAC*/

	 // Función que guarda la ruta de la imagen en la base de datos
	 function guardarImgBBDD($ruta, $nombreImg, $tipoImg, $tamanoImg){

		// Se establece conexión con la base de datos
		include 'conexion.php';

		// Hay que apuntar al archivo con la función fopen para convertirlo a bytes (leer los bytes)
		/* fopen(ruta, permiso) -- Permiso r - solo lectura*/
		$archivo_imagen = fopen($ruta . $nombreImg, "r");

		// Se leen los bytes que forman parte de ese archivo
		$contenido = fread($archivo_imagen, $tamanoImg);

		// Es necesario escapar los / de la ruta ya que php no los interpreta
		// Almacena la ruta pero con las / escapadas para que php las interprete
		$contenido = addslashes($contenido);

		// Cerramos el flujo de datos
		fclose($archivo_imagen);

		$query = "INSERT INTO imagenes (nombre, tipo, contenido) VALUES ('$nombreImg', '$tipoImg', '$contenido')";

		$resultado = $conexion->query($query);

		$filasAfectadas = $resultado->rowCount();
				
		if ($filasAfectadas == 1){
			header("Location: formularioImagenes.php?resultado=ok");
			}
		else {
			header("Location: formularioImagenes.php?resultado=error");
		}
						
		// Se cierra la conexión
		$conexion = null;

		
	 }

/*AÑADIDO NUEVO PARA LA PAC*/

	 // Función que busca las imágenes en la BD para el slider
	 function leerImgBBDD(){
		
		// Se establece conexión con la base de datos
		include 'conexion.php';

		// Se crea la query para consultar todas las imágenes de la tabla fotos
		$query = "SELECT * FROM imagenes";

		// Dentro de la variable $resultado se obtiene un resulset con lo registros almacenados
		$resultado = $conexion->query($query);

		// Almacenamos el resultado en un array de objetos que contienen las imágenes
		$registros = $resultado->fetchAll (PDO::FETCH_OBJ);

		// Se cierra la conexión
		$conexion = null;
		
		return $registros;
	 }


/*AÑADIDO NUEVO PARA LA PAC*/

	// Función que coge el array de imágenes y las muestra en pantalla
	function mostrarImg($registros){
		
		// Se establece conexión con la base de datos
		include 'conexion.php';

		// Bucle que recorre todas las imágenes de la tabla imagenes y las muestra por pantalla
		foreach($registros as $imagen){
			echo "<div class='elementoSlider'><img src='data:" . $imagen->tipo . "; base64," . base64_encode($imagen->contenido) .
			"'alt='" .$imagen->nombre .  "'></div>" ;
		}
	
	}


/* AÑADIDO NUEVO PARA LA PAC */

	// Funcion que recupere el usuario del email del login
	function recuperarUsuario($email){
		// Se incluye la conexión
		include 'conexion.php';

		// Query que busca el usuario en función del email introducido en el login
		$query = "SELECT * FROM usuarios WHERE Email = '$email'";

		// Se ejecuta la sentencia SQL con la conexión
		$resultado = $conexion->query($query);

		// Se almacena el resultado en un array de objetos 
		$usuario = $resultado->fetchAll (PDO::FETCH_OBJ);

		return $usuario;
	}


/* AÑADIDO NUEVO PARA LA PAC */

	// Funcion que guarda el nuevo titulo de la web para un usuario
	function cambiarTitulo($title, $email){
		
		// Se incluye la conexión
		include 'conexion.php';
		
		$query = "UPDATE usuarios SET titulo = '$title' WHERE Email = '$email'";
		
		$resultado = $conexion->query($query);
		
		// Se cierra la conexión
		$conexion = null;
	}

	// Funcion que guarda el nuevo titulo de la web para un usuario
	function cambiarColores($colorHeader, $colorBody, $colorPie, $email){
		
		// Se incluye la conexión
		include 'conexion.php';
		
		$query = "UPDATE usuarios SET colorCabecera = '$colorHeader', colorBody = '$colorBody', colorPie = '$colorPie' WHERE Email = '$email'";
		
		$resultado = $conexion->query($query);
		
		// Se cierra la conexión
		$conexion = null;
	}


?>







