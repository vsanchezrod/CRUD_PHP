<!-- Se crea la cabecera de la página en php -->
<!DOCTYPE html>
<html lang="en">
<head>

<?php
	
	// Iniciar o Renaudar sesión en el caso de que la hubiera
	session_start();
	include 'consultas.php';

	if(isset($_GET['logout'])){
		if ($_GET['logout'] == "1") {
			session_destroy();
			header ("Location:index.php");
		}
	}
	
	/* Se comprueba en la cabecera si están llegando por POST datos desde el login
	con el fin de iniciar sesion y mostrar unos contenidos u otros*/
	if (isset($_POST['emailLogin'])) {
		
		$numUsuarios = comprobarUsuario($_POST['emailLogin'], $_POST['contrasena']);
		// Si se encuentra usuario registrado
		if ($numUsuarios != 0) {
			// Se almacena en la variable superglobal el email del usuario
			$_SESSION['usuario'] = $_POST['emailLogin'];
			
		}
		else {
			// Si no hay usuario redirigimos a la página de login
			header("Location:login.php");
		}
	}
	
	if (isset($_SESSION['usuario'])){
		$perfilUsuario = recuperarUsuario($_SESSION['usuario']);
		$title = $perfilUsuario[0]->titulo;
		$colorHeader = $perfilUsuario[0]->colorCabecera;
		$colorBody = $perfilUsuario[0]->colorBody;
		$colorFooter = $perfilUsuario[0]->colorPie;
	}
	else {
		$title = "PAC SERVIDOR";
	}

	if (isset($_POST['tituloNuevo'])){
		$title = $_POST['tituloNuevo'];
		cambiarTitulo($title, $_SESSION['usuario']);
	}

	if (isset($_POST['cabeceraConfig'])){
		$colorHeader = $_POST['cabeceraConfig'];
		$colorBody = $_POST['bodyConfig'];
		$colorFooter = $_POST['pieConfig'];
		cambiarColores($colorHeader, $colorBody, $colorFooter, $_SESSION['usuario']);
	}

?>

	<meta charset="UTF-8">
	<title><?php echo $title;?></title>
	<link rel="stylesheet" href="css/estilos.css">
	<script	type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/javascript.js"></script>
			
</head>
<body style="background:<?php echo $colorBody;?>">

	<header style="background:<?php echo $colorHeader;?>">
		
		<h1 class="titulo">PHP - MYSQL </h1>
		<div id="menu">
			<ul>
				<?php 

					// Si NO hay session abierta del usuario:
					if(!isset($_SESSION['usuario'])){ ?>
						<button><a href="login.php">LOGIN</a></button>
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
						<li><a href="formularioConfiguracion.php">CONFIGURACIÓN</a></li>
					<?php } 
				?>

				<!--NUEVOS ENLACES AÑADIDOS EN MENU -->
				<li><a href="menuUsuarios.php">MENU USUARIOS</a></li>
				<li><a class="ficheros" href="index.php?archivo=xml">CREAR XML</a></li>
				<li><a class="ficheros" href="index.php?archivo=txt">CREAR TXT</a></li>
				

			</ul>

		</div>
				
	</header>