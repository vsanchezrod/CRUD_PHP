<?php

	//Se incluye la cabecera.php	
	include 'cabecera.php';
	
	// Se tra aquí todo el código que se ocupa de mostrar los usuarios y la paginación

	// Se evalúa que operación se está realizando para mostrar un mensaje por pantalla
	// Las operaciones puende ser: borrado, actualizado o creado
	if(!empty($_GET['resultado'])){

		if ($_GET['resultado'] == "usuarioBorrado") {
			echo "<H3 class='fade'>Usuario Borrado</H3></br>";
		}

		if ($_GET['resultado'] == "usuarioActualizado") {
			echo "<H3 class='fade'>Usuario Actualizado</H3></br>";
		}

		if ($_GET['resultado'] == "usuarioCreado") {
			echo "<H3 class='fade'>Usuario Creado</H3></br>";
		}
		if ($_GET['resultado'] == "provinciaInsertada") {
			echo "<H3 class='fade'>Provincia Creada</H3></br>";
		}
		if ($_GET['resultado'] == "falloBorrar") {
			echo "<H3 class='fade'>No puede borrar SU usuario!</H3></br>";
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
	/*Es necesario saber cuantos registro totales se tienen, y en cuantas páginas se van a dividir los registros*/
	
	// Variable que le dice al programa cuantos registros habrá por página
	$registrosPorPagina = 10;

	/* Si la variable pagina está seteada, es decir, se está usando la paginación porque le llega por URL
	el valor de la variable pagina, entonces vamos a ver que página es*/

	if(isset($_GET['pagina'])){

		// COGER POR GET LA PAGINA QUE SE QUIERE VER
		if ($_GET['pagina'] == 1){

			// Si la variable página que llega por la URL vale 1, se redirige la página al menuUsuario.php
			header ("Location:menuUsuarios.php"); /******************************* */
		}

		else {
			// Guardamos en la variable $pagina el valor que llega por GET
			$pagina = $_GET['pagina'];
		}

	}

	else {

		// Variable que mostrará la pagina cuando cargamos nuestro menuUsuario (empezará por defecto en la página 1)
		$pagina = 1;
	}

	// Se crea una variable para indicar desde que registro se va a empezar a mostrar.
	// Si estamos en la pagina 1, el primer registro va a ser ((1-1)*10) = 0
	// Si estamos en la pagina 2, el primer registro va a ser ((2-1)*10) = 10
	// Si estamos en la pagina 3, el primer registro va a ser ((3-1)*10) = 20

	$primerRegistro = ($pagina-1)*$registrosPorPagina;

	// Dentro de la variable $resultado se obtiene un resulset con lo registros almacenados
	$resultado = $conexion->query($query);

	// Almacenamos el resultado en un array de objetos 
	$registros = $resultado->fetchAll (PDO::FETCH_OBJ);

	// Ejecutamos la funcion count() de los arrays para saber el nº de registros totales y se almacena en una variable
	$numeroRegistros = count($registros);
	// Se calcula el nº de páginas que tendrá la paginación, usando la función ceil que redondea el resultado hacia arriba
	$numeroPaginas = ceil($numeroRegistros/$registrosPorPagina);

	/************ AHORA. Añadimos a query el LIMIT que puede recibir dos parámetros*************
	1.Cual es el primer registro que quieres ver y 2. Cuantos registros a partir del primero quieres ver*/
	$queryLimite = "SELECT * FROM usuarios LIMIT $primerRegistro,$registrosPorPagina";

	// Dentro de la variable $resultado se obtiene un resulset con lo registros almacenados
	$resultadoLimite = $conexion->query($queryLimite);

	// Almacenamos el resultado en un array de objetos 
	$registrosLimite = $resultadoLimite->fetchAll (PDO::FETCH_OBJ);


	/* Se va a utilizar un bucle foreach para recorrer cada uno de los objetos contenidos en el array
	- Se va a crear una nueva fila en la tabla por cada usuario*/

	/*NUEVO HE CAMBIADO EL ARRAY PARA MOSTRAR*/
	foreach($registrosLimite as $usuario): 
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
	
	
	<?php
	// Si existe sessión iniciada	
		if(isset($_SESSION['usuario'])){ ?>

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
		<?php }
	?>
	
</tr>


<?php

	// Se cierra el bucle foreach
	endforeach;
?>

</table>

<div id="paginacion">
	
	<a href="menuUsuarios.php?pagina=<?php	if ($pagina != 1) {echo $pagina-1;} else {echo '1';}?>"><img src="images/backward2.png" alt="Anterior"></a>

	<?php 

	// NUEVO---------------------- PAGINACIÓN ------------------------------------

		// Bucle FOR que crea la paginación
		for ($i = 1; $i <= $numeroPaginas; $i++) {

			// Se crea un enlace a la página correspondiente de la paginación
			// Se le va a pasar en la URL un parámetro que se llama página
			echo "<a href='?pagina=" . $i . "'>" . $i . "</a> ";
		}

	?>
	
	<a href="menuUsuarios.php?pagina=<?php	if ($pagina != $numeroPaginas) {echo $pagina+1;} else {echo $numeroPaginas;}  ?>"><img src="images/forward3.png" alt="Posterior"></a>


</div>

<?php

	// Se incluye el pie de página en php
	include 'pie.php';
?>