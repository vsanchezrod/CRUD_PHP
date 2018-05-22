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
		
		<?php
			
			// Iniciar o Renaudar sesión en el caso de que la hubiera
			session_start();

			/* Se comprueba en la cabecera si están llegando por POST datos desde el login
			con el fin de iniciar sesion y mostrar unos contenidos u otros*/
			if (isset($_POST['emailLogin'])) {
				include 'consultas.php';
				$usuario = comprobarUsuario($_POST['emailLogin'], $_POST['contrasena']);
						
				// Si se encuentra usuario registrado
				if ($usuario != 0) {
					// Se almacena en la variable superglobal el email del usuario
					$_SESSION['usuario'] = $_POST['emailLogin'];
				}

				else {
					// Si no hay usuario redirigimos a la página de login
					header("Location:login.php");
				}
			}

		?>

		<h1 class="titulo">PHP - MYSQL </h1>
		<div id="menu">
			<ul>
				<?php 

					// Si NO hay session abierta del usuario:
					if(!isset($_SESSION['usuario'])){ ?>
						<button><a href="login.php">LOGIN</a></button>
						<!--<button onclick="abrirVentana()">LOGIN</button>-->
						<li><a href="index.php">INICIO</a></li>
					<?php }

					else { ?>
						<!--Se crea un nuevo botón para acceder al LOGIN del usuario-->
						<!-- SI hay session abierta del usuario:-->
						<button id="logout"><a href="index.php?logout=1">LOGOUT</a></button>  
						<li> <?php echo $_SESSION['usuario']; ?> </li>
						<li><a href="index.php">INICIO</a></li>
						<li><a href="formularioUsuario.php?opcion=crear">CREAR USUARIO</a></li>
						<li><a href="formularioProvincias.php">CREAR PROVINCIA</a></li>
						<li><a href="formularioImagenes.php">IMÁGENES</a></li>
					<?php } 
				?>

				<!--NUEVOS ENLACES AÑADIDOS EN MENU -->
				<li><a href="menuUsuarios.php">MENU USUARIOS</a></li>
				<li><a class="ficheros" href="index.php?archivo=xml">CREAR XML</a></li>
				<li><a class="ficheros" href="index.php?archivo=txt">CREAR TXT</a></li>
				

			</ul>

		</div>
				
	</header>