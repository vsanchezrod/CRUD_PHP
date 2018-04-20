<!-- Se crea la cabecera de la página en php -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>UF3 PAC1</title>
	<link rel="stylesheet" href="css/estilos.css">
	<script type="text/javascript" src="js/javascript.js"></script>
		
</head>
<body>

	<header>
		
		<h1 class="titulo">PHP - MYSQL </h1>
		<div id="menu">
			<ul>
				<!--Se crea un nuevo botón para acceder al LOGIN del usuario-->
				<button onclick="abrirVentana()">LOGIN</button>
				<li><a href="index.php">INICIO</a></li>
				<li><a href="formularioUsuario.php?opcion=crear">CREAR USUARIO</a></li>
				<li><a href="formularioProvincias.php">CREAR PROVINCIA</a></li>
			</ul>

		</div>
				
	</header>