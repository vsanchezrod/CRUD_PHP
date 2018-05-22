<?php
	//Se incluye la cabecera.php	
	include 'cabecera.php';
	
	// NUEVO - Si no hay sessio iniciada se redirige al index
	if(!isset($_SESSION['usuario'])){
		header ("Location: login.php");
	}
?>

<!--Se crea un formulario con método POST ya que se van a mandar imágenes al servidor (no texto)
Es necesario incluir el atributo enctype para especificar el tipo de archivo de envio -->
<form class="formulario" id="formularioImagenes" action="imagenes.php" method="POST" enctype="multipart/form-data">

	<label for="imagenes">Imagen:</label>
	<input type="file" name="imagen">
	<input class="enviar" type="submit" value="Enviar">

</form>

<?php
	// Se incluye el pie de página en php
	include 'pie.php';
?>