<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LOGIN</title>
	<link rel="stylesheet" href="css/estilosLogin.css">
</head>
<body>
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

/*PRUEBAS DEL LOGIN*/

/*include 'consultas.php';

	if (isset($_POST['email'])) {
		$usuario = comprobarUsuario($_POST['email'], $_POST['contrasena']);
		echo 'Usuario encontrado';
		var_dump($usuario);
	}
*/

?>

</body>
</html>

