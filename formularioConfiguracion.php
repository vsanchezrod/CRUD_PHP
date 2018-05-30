<?php
	//Se incluye la cabecera.php	
    include 'cabecera.php';

    // NUEVO - Si no hay sesion iniciada se redirige al index
	if(!isset($_SESSION['usuario'])){
		header ("Location: login.php");
	}

    // Variables que contienen los colores de las distintas partes de la web
    $cabeceraColor = '#F1AB16';
    $bodyColor = 'rgb(233, 196, 149)';
    $piecolor = '#F1AB16';

?>

<!--Se crean dos formularios distintos para modificar diferentes aspectos de la web -->

<!-- Formulario para modificar el título -->
<form class="formulario" id="formularioConfig" action="index.php" method="POST">

    <h4>¡Configura el título web!</h4>

    <label for="tituloConfig">Título de la web:</label>
    <input id="newTitle" name="tituloNuevo" type="text">
    <input class="enviar" type="submit" value="Cambiar">
</form>

<!-- Formulario para modificar los colores -->
<form class="formulario" id="formularioConfigColor" action="index.php" method="POST">
    
    <h4>¡Configura los colores!</h4>
    <div id="colores">
        
        <label for="cabeceraConfig">Color de la cabecera:</label>
        <input class="inputColor" name="cabeceraConfig" type="color" >
        
        <label for="bodyConfig">Color del body:</label>
        <input class="inputColor" name="bodyConfig" type="color">

        <label for="pieConfig">Color del footer:</label>
        <input class="inputColor" name="pieConfig" type="color">

        <input class="enviar" type="submit" value="Cambiar">
        <a href="index.php"><input class="cancelar" type="button" value="Cancelar"></a>
    </div>

</form>

<?php
    //Se incluye el pie.php
    include 'pie.php';
?>