<?php

	//Se incluye la cabecera.php	
	include 'cabecera.php';
	
	// NUEVO - Si no hay sessio iniciada se redirige al index
	if(!isset($_SESSION['usuario'])){
		header ("Location: login.php");
	}

?>

<form class="formulario" id="formularioProvincia" action="index.php" method="post">
	
	<div class="row">
		<label for="id"></label>
		<input name="id" type="hidden" value="">
	</div>


	<div class="row">
		<label for="nombre">NOMBRE PROVINCIA</label>
		<input name="nombre" type="text" value="">
	</div>

	<div class="row">
		<input class="enviar" type="submit" value="Enviar">
	</div>

</form>


<?php

	// Se incluye el pie de página en php
	include 'pie.php';
?>
