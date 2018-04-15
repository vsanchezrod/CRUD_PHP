<?php
	if(!empty($_GET['resultado'])){

		if ($_GET['resultado'] == "usuarioBorrado") {
			echo "<H3>Usuario Borrado</H3></br>";
		}

		if ($_GET['resultado'] == "usuarioActualizado") {
			echo "<H3>Usuario Actualizado</H3></br>";
		}

		if ($_GET['resultado'] == "usuarioCreado") {
			echo "<H3>Usuario Creado</H3></br>";
		}
	}

?>


<table>

	<tr>

	    <th>Id</th>

	    <th>Nombre</th>

	    <th>Contraseña</th>

	    <th>Email</th>

	    <th>Edad</th>

	    <th>Fecha Nacimiento</th>

	    <th>Dirección</th>

	    <th>Código Postal</th>

	    <th>Provincia</th>

	    <th>Género</th>

</tr>

<?php

	// Crea la conexión
	include 'conexion.php'; /*NO SE SI LO TENGO QUE QUITAR O QUE!!!*/

	// Se crea la query para consultar los usuarios de la tabla
	$query = "SELECT * FROM usuarios";
	
	// Dentro de la variable $resultado se tiene un resulset con lo registros almacenados
	$resultado = $conexion->query($query);

	// Almacenamos el resultado en un array de objetos 
	$registros = $resultado->fetchAll (PDO::FETCH_OBJ);

	/* Se va a utilizar un bucle foreach para ir recorriendo cada uno de los objetos contenidos en el array
	- Se va a crear una nueva fila en la tabla por cada usuario que contenga. */

	foreach($registros as $usuario): 
?>

<tr>
	<td> <?php echo $usuario->Id?> </td>
	<td> <?php echo $usuario->Nombre?> </td>
	<td> <?php echo $usuario->Contrasena?> </td>
	<td> <?php echo $usuario->Email?> </td>
	<td> <?php echo $usuario->Edad?> </td>
	<td> <?php echo $usuario->FechaNacimiento?> </td>
	<td> <?php echo $usuario->Direccion?> </td>
	<td> <?php echo $usuario->CodigoPostal?> </td>
	<td> <?php echo $usuario->Provincia?> </td>
	<td> <?php echo $usuario->Genero?> </td>
	
	<td>
		<!--PRUEBA actualizar con post-->
		<form action="formularioUsuario.php?opcion=borrar" method="POST">
			<input type="hidden" name="id" value="<?= $usuario->Id ?>" >			
			<input type="submit" value="Borrar" name="borrar" />
		</form>
			
	</td>

	<td>
		<!--PRUEBA actualizar con post-->
		<form action="formularioUsuario.php?opcion=actualizar" method="POST">
			<input type="hidden" name="id" value="<?= $usuario->Id ?>" >			
			<input type="submit" value="Actualizar" name="actualizar" />
		</form>
			
	</td>
	
</tr>


<?php
	endforeach;

?>


</table>