<?php
	//Se incluye la cabecera.php	
	include 'cabecera.php';
	
	// NUEVO - Si no hay sessio iniciada se redirige al index
	if(!isset($_SESSION['usuario'])){
		header ("Location: login.php");
	}

	//Control del resultado de la subida del archivo a la base de datos
	if(!empty($_GET['resultado'])){

		if ($_GET['resultado'] == "ok") {
			echo "<H3 class='fade'>Imagen subida con éxito</H3></br>";
		}

		if ($_GET['resultado'] == "error") {
			echo "<H3 class='fade'>Fallo en la subida de archivos. Inténtelo de nuevo</H3></br>";
		}

		if ($_GET['resultado'] == "errorFormato") {
			echo "<H3 class='fade'>Formato de imagen no permitido</H3></br>";
		}

		if ($_GET['resultado'] == "errorTamano") {
			echo "<H3 class='fade'>El tamaño máximo de la imagen es de 2MB</H3></br>";
		}
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