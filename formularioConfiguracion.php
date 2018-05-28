<?php
	//Se incluye la cabecera.php	
    include 'cabecera.php';
?>

<form class="formulario" id="formularioConfig" action="index.php" method="POST">

    <h4>¡Configura la web!</h4>

    <label for="tituloConfig">Título de la web:</label>
    <input id="newTitle" name="tituloConfig" type="text">
    <input class="enviar" type="button" value="Cambiar">

    <div id="colores">
        <label for="cabeceraConfig">Color de la cabecera:</label>
        <input class="inputColor" name="cabeceraConfig" type="color" >
        
        <label for="bodyConfig">Color del body:</label>
        <input class="inputColor" name="bodyConfig" type="color">

        <label for="pieConfig">Color del footer:</label>
        <input class="inputColor" name="pieConfig" type="color">

        <input class="enviar" type="submit" value="Guardar">
        <a href="index.php"><input class="cancelar" type="button" value="Cancelar"></a>
    </div>
</form>

    <?php
    //Se incluye el pie.php
    include 'pie.php';
?>