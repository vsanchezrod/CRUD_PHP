
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

	// USUARIOS INSERTADO POST
	if(isset($_POST['id'])){

		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$contrasena = $_POST['contrasena'];
		$email = $_POST['email'];
		$edad = $_POST['edad'];
		$fecha = $_POST['fecha'];
		$direccion = $_POST['direccion'];
		$codigoPostal = $_POST['codigoPostal'];
		$provincia = $_POST['provincia'];
		$genero = $_POST['genero'];
		
		include 'consultas.php';

		insertar($nombre, $contrasena, $email, $edad, $fecha, $direccion, $codigoPostal, $provincia, $genero);
	}


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
		<!--Se pasa por URL con GET el valor de la variable id-->
		<a href="consultas.php?Id=<?php echo $usuario->Id?>">
			<input type="button" value="DEL" name="DEL" />
		</a>
			
	</td>
	
	<td>
		<a href="formularioUsuario.php?UsuarioId=<?php echo $usuario->Id?>">
			<input type="button" value="UPD" name="UPD" />
		</a>
	</td>

</tr>


<?php
	endforeach;

?>


</table>