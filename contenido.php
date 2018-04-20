<?php

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

	



	/*-----------------------------------NUEVO---------------------------------------------*/

	/*Es necesario saber cuantos registro totales se tienen, y en cuantas páginas se van a dividir los registros*/

	// Variable que le dice al programa cuantos registros habrá por página
	$registrosPorPagina = 10;

	// Variable que mostrará la pagina cuando cargamos nuestro index (empezará por defecto en la página 1)
	$pagina = 1;

	// Se crea una variable para indicar desde que registro se va a empezar a mostrar.
	// Si estamos en la pagina 1, el primer registro va a ser ((1-1)*10) = 0
	// Si estamos en la pagina 2, el primer registro va a ser ((2-1)*10) = 10
	// Si estamos en la pagina 3, el primer registro va a ser ((3-1)*10) = 20

	$primerRegistro = ($pagina-1)*$registrosPorPagina;

	/*--------------------------------FIN NUEVO---------------------------------------------*/






	// Dentro de la variable $resultado se obtiene un resulset con lo registros almacenados
	$resultado = $conexion->query($query);

	// Almacenamos el resultado en un array de objetos 
	$registros = $resultado->fetchAll (PDO::FETCH_OBJ);






	/*-----------------------------------NUEVO---------------------------------------------*/

	// Ejecutamos la funcion count() de los arrays para saber el nº de registros totales y se almacena en una variable
	$numeroRegistros = count($registros);
	// Se calcula el nº de páginas que tendrá la paginación, usando la función ceil que redondea el resultado hacia arriba
	$numeroPaginas = ceil($numeroRegistros/$registrosPorPagina);

	echo "Número de registros por columna: " . $registrosPorPagina ."<br>";
	echo "Número de registros totales: " . $numeroRegistros ."<br>";
	echo "Número de páginas disponibles: " . $numeroPaginas ."<br>";


	/************ AHORA. Añadimos a query el LIMIT que puede recibir dos parámetros*************
	1.Cual es el primer registro que quieres ver y 2. Cuantos registros a partir del primero quieres ver*/
	$queryLimite = "SELECT * FROM usuarios LIMIT $primerRegistro,$registrosPorPagina";

	// Dentro de la variable $resultado se obtiene un resulset con lo registros almacenados
	$resultadoLimite = $conexion->query($queryLimite);

	// Almacenamos el resultado en un array de objetos 
	$registrosLimite = $resultadoLimite->fetchAll (PDO::FETCH_OBJ);


	/*--------------------------------FIN NUEVO---------------------------------------------*/




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


<?php 






?>