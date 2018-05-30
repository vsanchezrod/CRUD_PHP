<?php

	/*if(isset($_GET['logout'])){
		if ($_GET['logout'] == "1") {
			session_destroy();
			header ("Location:index.php");
		}
	}*/

	/* GENERACIÓN DE ARCHIVOS XML Y TXT*/
	if (!empty ($_GET['archivo'])) {

		if ($_GET['archivo'] == "xml") {
			crearXML();
			echo "<H3 class='fade'>Archivo XML generado. <a href='xml/usuarios.xml' download> Descargar!</a></H3></br>";
		}

		if ($_GET['archivo'] == "txt") {
			crearTXT();
			echo "<H3 class='fade'>Archivo txt generado. <a href='txt/usuarios.txt' download> Descargar!</a></H3></br>";
		}
	}

	// Se elimina todo el código que mostraba la tabla de usuarios, y se incluyen las noticias en el contenido principal
	include 'noticias.php';

	
?>
