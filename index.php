<!-- Se incluye la cabecera.php-->
<?php
		
	// Se incluyen los archivos php
	include 'cabecera.php';
	include 'contenido.php';
	include 'conexion.php';
	

	// PRUEBA PARA VER LAS SESIONES (BORRAR)
	if(!isset($_SESSION['usuario'])){
		echo "No hay session";
	}
	else {
		echo "Usuario de session: " . $_SESSION['usuario'];
	}
	include 'pie.php';

?>





