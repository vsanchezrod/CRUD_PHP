<!-- Se incluye la cabecera.php-->
<?php
	
	include 'cabecera.php';

	// Opción de Actualizar (carga los datos en el formulario)
	if(!empty($_GET['opcion']) && $_GET['opcion'] == 'actualizar'){

		echo "<H3>Actualización de usuario</H3>";
		include 'consultas.php';
		$usuario = seleccionarUsuario($_POST['id']);
	}

	// Opción de Crear (carga el formulario vacío)
	if(!empty($_GET['opcion']) && $_GET['opcion'] == 'crear'){

		echo "<H3>Creación de usuario</H3>";
	}
	
	// Opción de insertar (inserta o modifica el usuario en la base de datos)
	if(!empty($_GET['opcion']) && $_GET['opcion'] == 'insertar'){

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
		
		if(!empty($id)){
			actualizarUsuario($id, $nombre, $contrasena, $email, $edad, $fecha, $direccion, $codigoPostal, $provincia, $genero);
			header("Location: index.php?resultado=usuarioActualizado");
		}

		else {
			insertar($nombre, $contrasena, $email, $edad, $fecha, $direccion, $codigoPostal, $provincia, $genero);
			header("Location: index.php?resultado=usuarioCreado");
		}
	}

	// Opción de borrar (borra el usuario)
	if(!empty($_GET['opcion']) && $_GET['opcion'] == 'borrar'){

		include 'consultas.php';
		borrar($_POST['id']);
		// Redirigimos a la página de inicio
		header("Location: index.php?resultado=usuarioBorrado");
	}








	// Array con todas las provincias españolas
	$arrayProvincias = ['Alava','Albacete','Alicante','Almería','Asturias','Avila','Badajoz','Barcelona','Burgos','Cáceres',
	'Cádiz','Cantabria','Castellón','Ceuta','Ciudad Real','Córdoba','La Coruña','Cuenca','Gerona','Granada','Guadalajara',
	'Guipúzcoa','Huelva','Huesca','Islas Baleares','Jaén','León','Lérida','Lugo','Madrid','Málaga','Melilla','Murcia','Navarra',
	'Orense','Palencia','Las Palmas','Pontevedra','La Rioja','Salamanca','Segovia','Sevilla','Soria','Tarragona',
	'Santa Cruz de Tenerife','Teruel','Toledo','Valencia','Valladolid','Vizcaya','Zamora','Zaragoza'];
	
?>

<form id="formulario" action="formularioUsuario.php?opcion=insertar" method="post">
	
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

				$provinciaUsuario = $usuario[0]->Provincia;

				for($i = 0; $i < count($arrayProvincias); $i++) { 

					if ($arrayProvincias[$i] == $provinciaUsuario){ ?> 
						<option selected="selected" value="<?= $arrayProvincias[$i] ?>"> <?= $arrayProvincias[$i] ?> </option> 
					<?php }
					else{ ?>
						<option value="<?= $arrayProvincias[$i] ?>"> <?= $arrayProvincias[$i] ?> </option> 
					<?php }?>
					
				<?php }	
			?>
	
		</select>

	


	</div>

	<div class="row">
		
		
		<label for="genero">GÉNERO</label>
		
		<?php 
			
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
			else {
				echo "<input name='genero' type='radio' value='Hombre'> Hombre";
				echo "<input name='genero' type='radio' value='Mujer'> Mujer";
			}

		?>

	</div>

	<div class="row">
		
		<input checked required name="condiciones" type="checkbox"> Acepto los <em><u>Términos y Condiciones</u></em> y la <em><u>Política de protección de datos.</u></em></p>

	</div>

	<div class="row">
		
		<input class="enviar" type="submit" value="Enviar">
		<input class="limpiar" type="reset" value="Limpiar">
		<a href="index.php"><input class="cancelar" type="button" value="Cancelar"></a>

	</div>

</form>


<?php

	include 'pie.php';

?>

