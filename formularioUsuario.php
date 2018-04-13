<!-- Se incluye la cabecera.php-->
<?php
	
	include 'cabecera.php';
	$arrayProvincias = array(0=>"Álava", 1=>"Albacete", 2=>"Alicante", 3=>"Almería", 4=>"Asturias", 5=>"Ávila", 6=>"Badajoz", 7=>"Barcelona", 8=>"Burgos", 9=>"Cáceres", 10=>"Cádiz", 11=>"Cantabria", 12=>"Castellón", 13=>"Ceuta", 14=>"Ciudad Real", 15=>"Córdoba", 16=>"Cuenca", 17=>"Gerona", 18=>"Granada", 19=>"Guadalajara", 20=>"Guipúzcoa", 21=>"Huelva", 22=>"Huesca", 23=>"Islas Baleares", 24=>"Jaén", 25=>"La Coruña", 26=>"La Rioja", 27=>"Las Palmas", 28=>"León", 29=>"Lérida", 30=>"Lugo", 31=>"Madrid", 32=>"Málaga", 33=>"Melilla", 34=>"Murcia", 35=>"Navarra", 36=>"Orense", 37=>"Palencia", 38=>"Pontevedra", 39=>"Salamanca", 40=>"Santa Cruz de Tenerife", 41=>"Segovia", 42=>"Sevilla", 43=>"Soria", 44=>"Tarragona", 45=>"Teruel", 46=>"Toledo", 47=>"Valencia", 48=>"Valladolid", 49=>"Vizcaya", 50=>"Zamora", 51=>"Zaragoza");

	if(isset($_GET['UsuarioId'])){
		$usuarioId = $_GET['UsuarioId'];
		echo "<p id='usuarioUpdate'> ID del usuario: " . $usuarioId . "</p>";
		include 'consultas.php';
		$usuario = seleccionarUsuario($usuarioId);
		
		// ESTO ES PARA ENTENDERME!!! xDD

		//var_dump($usuario);
		echo "<p> ARRAY COMPLETO <br></p>";
		// Array con un objeto que es el usuario de la tabla
		var_dump($usuario);
		// Muestro el primer elemento del array que es el objeto del usuario
		echo "<p> PRIMER ELEMENTO DEL ARRAY <br></p>";
		var_dump($usuario[0]);
		// Con eso muestro la propiedad Nombre del usuario
		echo "<p> ELEMENTO NOMBRE DEL PRIMER ELEMENTO DEL ARRAY <br></p>";
		var_dump($usuario[0]->Nombre);
		echo "<p> TEXTO DEL NOMBRE </p>";
		// Muestro el valor del nombre del usuario
		echo $usuario[0]->Provincia;

		$id = array_search($usuario[0]->Provincia, $arrayProvincias);
		echo "ID DEL ARRAY ASOCIATIVO ES: " . $id;



	} else {

		echo "Se va a crear un usuario nuevo:";
	}

	

	$arrayProvincias33 = array("Álava", "Albacete", "Alicante", "Almería", "Asturias", "Ávila", "Badajoz", "Barcelona", "Burgos", "Cáceres", "Cádiz", "Cantabria", "Castellón", "Ceuta", "Ciudad Real", "Córdoba", "Cuenca", "Gerona", "Granada", "Guadalajara", "Guipúzcoa", "Huelva", "Huesca", "Islas Baleares", "Jaén", "La Coruña", "La Rioja", "Las Palmas", "León", "Lérida", "Lugo", "Madrid", "Málaga", "Melilla", "Murcia", "Navarra", "Orense", "Palencia", "Pontevedra", "Salamanca", "Santa Cruz de Tenerife", "Segovia", "Sevilla", "Soria", "Tarragona", "Teruel", "Toledo", "Valencia", "Valladolid", "Vizcaya", "Zamora", "Zaragoza");

	for ($i=0; $i < count($arrayProvincias33); $i++) { 
		echo  $i."=>\"".$arrayProvincias33[$i]."\", ";
	}
?>

<form id="formulario" action="index.php" method="post">
	
	<div class="row">
		
		<label for="id"></label>
		<input name="id" type="hidden" value="">

	</div>

	<div class="row">
		
		<label for="nombre">NOMBRE</label>
		<input name="nombre" type="text" value="<?php if(isset($_GET['UsuarioId'])){echo $usuario[0]->Nombre;} ?> ">

	</div>

	<div class="row">
		
		<label for="contrasena">CONTRASEÑA</label>
		<input name="contrasena" type="password" value="<?php if(isset($_GET['UsuarioId'])){echo $usuario[0]->Contrasena;} ?>">

	</div>

	<div class="row">
		
		<label for="email">EMAIL</label>
		<input name="email" type="email" value="<?php if(isset($_GET['UsuarioId'])){echo $usuario[0]->Email;} ?>">

	</div>

	<div class="row">
		
		<label for="edad">EDAD</label>
		<input name="edad" type="number" value="<?php if(isset($_GET['UsuarioId'])){echo $usuario[0]->Edad;} ?>">

	</div>

	<div class="row">
		
		<label for="fecha">FECHA DE NACIMIENTO</label>
		<input name="fecha" type="date" min="1900-01-01" value="<?php if(isset($_GET['UsuarioId'])){echo $usuario[0]->FechaNacimiento;}?>">

	</div>

	<div class="row">
		
		<label for="direccion">DIRECCIÓN</label>
		<input name="direccion" type="text" value="<?php if(isset($_GET['UsuarioId'])){echo $usuario[0]->Direccion;} ?>">

	</div>

	<div class="row">
		
		<label for="codigoPostal">CÓDIGO POSTAL</label>
		<input name="codigoPostal" type="number" value="<?php if(isset($_GET['UsuarioId'])){echo $usuario[0]->CodigoPostal;}?>">

	</div>

	<div class="row">
		
		<label for="provincia">PROVINCIA</label>
		<select name="provincia" value="<?php if(isset($_GET['UsuarioId'])){echo $usuario[0]->Provincia;} ?>">
	
		

			<option value='Álava'>Álava</option>
			<option value='Albacete'>Albacete</option>
			<option value='Alicante'>Alicante</option>
			<option value='Almería'>Almería</option>
			<option value='Asturias'>Asturias</option>
			<option value='Ávila'>Ávila</option>
			<option value='Badajoz'>Badajoz</option>
			<option value='Barcelona'>Barcelona</option>
			<option value='Burgos'>Burgos</option>
			<option value='Caceres'>Cáceres</option>
			<option value='Cádiz'>Cádiz</option>
			<option value='Cantabria'>Cantabria</option>
			<option value='Castellón'>Castellón</option>
			<option value='Ceuta'>Ceuta</option>
			<option value='Ciudad Real'>Ciudad Real</option>
			<option value='Córdoba'>Córdoba</option>
			<option value='Cuenca'>Cuenca</option>
			<option value='Girona'>Girona</option>
			<option value='Las Palmas'>Las Palmas</option>
			<option value='Granada'>Granada</option>
			<option value='Guadalajara'>Guadalajara</option>
			<option value='Guipuzcoa'>Guipúzcoa</option>
			<option value='Huelva'>Huelva</option>
			<option value='Huesca'>Huesca</option>
			<option value='Islas Baleares'>Islas Baleares</option>
			<option value='Jaén'>Jaén</option>
			<option value='A Coruña'>A Coruña</option>
			<option value='La Rioja'>La Rioja</option>
			<option value='León'>León</option>
			<option value='Lleida'>Lleida</option>
			<option value='Lugo'>Lugo</option>
			<option value='Madrid'>Madrid</option>
			<option value='Málaga'>Málaga</option>
			<option value='Melilla'>Melilla</option>
			<option value='Murcia'>Murcia</option>
			<option value='Navarra'>Navarra</option>
			<option value='Ourense'>Ourense</option>
			<option value='Palencia'>Palencia</option>
			<option value='Pontevedra'>Pontevedra</option>
			<option value='Salamanca'>Salamanca</option>
			<option value='Segovia'>Segovia</option>
			<option value='Sevilla'>Sevilla</option>
			<option value='Soria'>Soria</option>
			<option value='Tarragona'>Tarragona</option>
			<option value='Santa Cruz de Tenerife'>Santa Cruz de Tenerife</option>
			<option value='Teruel'>Teruel</option>
			<option value='Toledo'>Toledo</option>
			<option value='Valencia'>Valencia</option>
			<option value='Valladolid'>Valladolid</option>
			<option value='Vizcaya'>Vizcaya</option>
			<option value='Zamora'>Zamora</option>
 			<option value='Zaragoza'>Zaragoza</option>
		
		</select>

	</div>

	<div class="row">
		
		<label for="genero">GÉNERO</label>
		<input name="genero" type="radio" value="Hombre" checked> Hombre 
		<input name="genero" type="radio" value="Mujer"> Mujer 

	</div>

	<div class="row">
		
		<input checked required name="condiciones" type="checkbox"> Acepto los <em><u>Términos y Condiciones</u></em> y la <em><u>Política de protección de datos.</u></em></p>

	</div>

	<div class="row">
		
		<input class="enviar" type="submit" value="Enviar">
		<input class="limpiar" type="reset" value="Limpiar">
		<a href="index.php"><input class="cancelar" type="button" value="Cancelar"></a>

	</div>

</form>


<?php

	include 'pie.php';

?>

