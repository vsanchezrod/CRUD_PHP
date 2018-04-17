<?php

	//Se incluye la cabecera.php	
	include 'cabecera.php';

?>

<form class="formulario" id="formularioLogin" action="index.php" method="post">
	
	<div class="row">
		<label for="email">EMAIL</label>
		<input name="email" type="email" value="">
	</div>


	<div class="row">
		<label for="contrasena">CONTRASEÑA</label>
		<input name="contrasena" type="password" value="">
	</div>

	<div class="row">
		<input class="enviar" type="submit" value="Login">
	</div>

</form>


<?php

	// Se incluye el pie de página en php
	include 'pie.php';
?>
