<?php

	//Se incluye la cabecera.php	
	include 'cabecera.php';
	
	// NUEVO - Si no hay sessio iniciada se redirige al index
	if(!isset($_SESSION['usuario'])){
		header ("Location: login.php");
	}

	// Opción de insertar provincia en la base de datos
	if(!empty($_GET['opcion']) && $_GET['opcion'] == 'insertarProvincia'){

		// Se guarda en una variable el nombre de la provincia
		$nombre = $_POST['nombre'];
		include 'consultas.php';
		insertarProvincia($nombre);
		
		// Redirección al menuUsuarios.php pasándole el resultado de provincia creada
		header("Location: menuUsuarios.php?resultado=provinciaInsertada");
	}

?>

<form class="formulario" id="formularioProvincia" action="formularioProvincias.php?opcion=insertarProvincia" method="POST">
	
	<div class="row">
		<label for="id"></label>
		<input name="id" type="hidden" value="">
	</div>


	<div class="row">
		<label for="nombre">NOMBRE PROVINCIA</label>
		<input required name="nombre" type="text" value="">
	</div>

	<div class="row">
		<input class="enviar" type="submit" value="Enviar">
	</div>

</form>


<?php

	// Se incluye el pie de página en php
	include 'pie.php';
?>
