<?php

	// Se evalúa que operación se está realizando para mostrar un mensaje por pantalla
	// Las operaciones puende ser: borrado, actualizado o creado
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

<!-- Se crea una tabla con sus cabeceras, donde se mostrarán los usuarios de la BBDD-->
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

	// Se incluye el archivo php que se encarga de la conexión a la BBDD
	include 'conexion.php';

	// Se crea la query para consultar todos los usuarios de la tabla
	$query = "SELECT * FROM usuarios";
	
	// Dentro de la variable $resultado se obtiene un resulset con lo registros almacenados
	$resultado = $conexion->query($query);

	// Almacenamos el resultado en un array de objetos 
	$registros = $resultado->fetchAll (PDO::FETCH_OBJ);

	/* Se va a utilizar un bucle foreach para recorrer cada uno de los objetos contenidos en el array
	- Se va a crear una nueva fila en la tabla por cada usuario*/
	foreach($registros as $usuario): 
?>

<!-- Se crea una fila en la tabla por usuario-->
<tr>
	<!-- Se crean tantas columnas como campos tenga la tabla de la BBDD y se accede al valor de sus propiedades-->
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
		<!-- Formulario que pasa por queryparam la opción de borrado y la ID por POST-->
		<form action="formularioUsuario.php?opcion=borrar" method="POST">
			<input type="hidden" name="id" value="<?= $usuario->Id ?>" >			
			<input type="submit" value="Borrar" name="borrar" />
		</form>
			
	</td>

	<td>
		<!-- Formulario que pasa por queryparam la opción de actualizar y la ID por POST-->
		<form action="formularioUsuario.php?opcion=actualizar" method="POST">
			<input type="hidden" name="id" value="<?= $usuario->Id ?>" >			
			<input type="submit" value="Actualizar" name="actualizar" />
		</form>
			
	</td>
	
</tr>


<?php
	// Se cierra el bucle foreach
	endforeach;

?>

</table>