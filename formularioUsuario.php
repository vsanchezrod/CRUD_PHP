<?php

	//Se incluye la cabecera.php	
	include 'cabecera.php';

	// Opción de Actualizar (carga los datos en el formulario)
	if(!empty($_GET['opcion']) && $_GET['opcion'] == 'actualizar'){

		echo "<h3>Actualización de usuario</h3>";
		include 'consultas.php';
		$usuario = seleccionarUsuario($_POST['id']);
	}

	// Opción de Crear (carga el formulario vacío)
	if(!empty($_GET['opcion']) && $_GET['opcion'] == 'crear'){

		echo "<h3>Creación de usuario</h3>";
	}
	
	// Opción de insertar (inserta o modifica el usuario en la base de datos)
	if(!empty($_GET['opcion']) && $_GET['opcion'] == 'insertar'){

		// Se guardan en variables las propiedades del usuario
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$contrasena = $_POST['contrasena'];
		$email = $_POST['email'];
		$edad = $_POST['edad'];
		$fecha = $_POST['fecha'];
		$direccion = $_POST['direccion'];
		$codigoPostal = $_POST['codigoPostal'];
		$provincia = $_POST['provincia'];
		$genero = $_POST['genero'];

		include 'consultas.php';
		
		// Si se ha recibido un id entonces se llama a la funcion ACTUALIZAR
		if(!empty($id)){
			actualizarUsuario($id, $nombre, $contrasena, $email, $edad, $fecha, $direccion, $codigoPostal, $provincia, $genero);
			
			// Redirección al index.php pasándole el resultado de usuario actualiado
			header("Location: index.php?resultado=usuarioActualizado");
		}

		// Si NO se ha recibido un id entonces se llama a la funcion INSERTAR
		else {
			insertar($nombre, $contrasena, $email, $edad, $fecha, $direccion, $codigoPostal, $provincia, $genero);

			// Redirección al index.php pasándole el resultado de usuario creado
			header("Location: index.php?resultado=usuarioCreado");
		}
	}

	// Opción de borrar (borra el usuario)
	if(!empty($_GET['opcion']) && $_GET['opcion'] == 'borrar'){

		include 'consultas.php';
		borrar($_POST['id']);

		// Redirección al index.php pasándole el resultado de usuario borrado
		header("Location: index.php?resultado=usuarioBorrado");
	}


	// Creación de un array con todas las provincias españolas
	$arrayProvincias = ['Alava','Albacete','Alicante','Almería','Asturias','Avila','Badajoz','Barcelona','Burgos','Cáceres',
	'Cádiz','Cantabria','Castellón','Ceuta','Ciudad Real','Córdoba','La Coruña','Cuenca','Gerona','Granada','Guadalajara',
	'Guipúzcoa','Huelva','Huesca','Islas Baleares','Jaén','León','Lérida','Lugo','Madrid','Málaga','Melilla','Murcia','Navarra',
	'Orense','Palencia','Las Palmas','Pontevedra','La Rioja','Salamanca','Segovia','Sevilla','Soria','Tarragona',
	'Santa Cruz de Tenerife','Teruel','Toledo','Valencia','Valladolid','Vizcaya','Zamora','Zaragoza'];
	
?>

<!-- FORMULARIO  HTML
Se crea formulario completo que se usa para insertar usuarios o actualizar datos de un usuario existente-->


<form class="formulario" action="formularioUsuario.php?opcion=insertar" method="post">
	
	<!-- En cada input de formulario se controla si se le está pasando un usuario o no para mostrar datos -->
	<div class="row">
		
		<label for="id"></label>
		<input name="id" type="hidden" value="<?php if(!empty($usuario[0]->Id)) {echo $usuario[0]->Id;} ?>">

	</div>


	<div class="row">
		
		<label for="nombre">NOMBRE</label>
		<input name="nombre" type="text" value="<?php if(!empty($usuario[0]->Nombre)) {echo $usuario[0]->Nombre;} ?>">

	</div>

	<div class="row">
		
		<label for="contrasena">CONTRASEÑA</label>
		<input name="contrasena" type="password" value="<?php if(!empty($usuario[0]->Contrasena)) {echo $usuario[0]->Contrasena;} ?>">

	</div>

	<div class="row">
		
		<label for="email">EMAIL</label>
		<input name="email" type="email" value="<?php if(!empty($usuario[0]->Email)) {echo $usuario[0]->Email;} ?>">

	</div>

	<div class="row">
		
		<label for="edad">EDAD</label>
		<input name="edad" type="number" value="<?php if(!empty($usuario[0]->Edad)) {echo $usuario[0]->Edad;} ?>">
	</div>

	<div class="row">
		
		<label for="fecha">FECHA DE NACIMIENTO</label>
		<input name="fecha" type="date" min="1900-01-01" value="<?php if(!empty($usuario[0]->FechaNacimiento)) {echo $usuario[0]->FechaNacimiento;} ?>">

	</div>

	<div class="row">
		
		<label for="direccion">DIRECCIÓN</label>
		<input name="direccion" type="text" value="<?php if(!empty($usuario[0]->Direccion)) {echo $usuario[0]->Direccion;} ?>">

	</div>

	<div class="row">
		
		<label for="codigoPostal">CÓDIGO POSTAL</label>
		<input name="codigoPostal" type="number" value="<?php if(!empty($usuario[0]->CodigoPostal)) {echo $usuario[0]->CodigoPostal;} ?>">

	</div>

	<div class="row">
		
		<label for="provincia">PROVINCIA</label>
		<select name="provincia" value="">
			
			<?php 

				// Se guarda en una variable la provincia en el caso de que se le esté pasando un usuario
				$provinciaUsuario = $usuario[0]->Provincia;

				// Se recorre con un bucle FOR todos los valores del array para crear los distintos opctiones del select
				for($i = 0; $i < count($arrayProvincias); $i++) { 

					// Si el valor es igual a la variable creada se le añade el atributo de SELECTED
					if ($arrayProvincias[$i] == $provinciaUsuario){ ?> 
						<option selected="selected" value="<?= $arrayProvincias[$i] ?>"> <?= $arrayProvincias[$i] ?> </option> 
					<?php }

					// Si no, se crea el option si el atributo SELECTED
					else{ ?>
						<option value="<?= $arrayProvincias[$i] ?>"> <?= $arrayProvincias[$i] ?> </option> 
					<?php }?>
					
				<?php }	
			?>
	
		</select>
	</div>

	<div class="row" id="cajagenero">
		
		<label for="genero">GÉNERO</label>
		
		<?php 

			// Si el género no está vacío se busca que input está CHECHEK			
			if(!empty($usuario[0]->Genero)){
				if($usuario[0]->Genero == "Hombre"){
					echo "<input name='genero' type='radio' value='Hombre' checked> Hombre";
					echo "<input name='genero' type='radio' value='Mujer'> Mujer";
				}
				else {
					echo "<input name='genero' type='radio' value='Hombre'> Hombre";
					echo "<input name='genero' type='radio' value='Mujer' checked> Mujer";
				}
			}

			// Si el género está vació no se marca ninguna opción
			else {
				echo "<input name='genero' type='radio' value='Hombre'> Hombre";
				echo "<input name='genero' type='radio' value='Mujer'> Mujer";
			}

		?>

	</div>

	<div class="row" id="condiciones">
		
		<!-- Input para aceptar los términos y condiciones-->
		<input checked required name="condiciones" type="checkbox"> Acepto los <em><u>Términos y Condiciones</u></em> y la <em><u>Política de protección de datos.</u></em></p>

	</div>

	<div class="row">
		
		<!-- Se añaden 3 inputs, uno para enviar datos, otro para limpiar el formulario y otro para cancelar-->
		<input class="enviar" type="submit" value="Enviar">
		<input class="limpiar" type="reset" value="Limpiar">
		<a href="index.php"><input class="cancelar" type="button" value="Cancelar"></a>

	</div>

</form>

<?php
	// Se incluye el pie de página en php
	include 'pie.php';
?>

