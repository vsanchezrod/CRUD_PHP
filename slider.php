<div id="slider">

	<?php
		// Se guarda el array resultado con todas las imágenes en una variable
		include 'consultas.php';
		$imagenes = leerImgBBDD();
	
		mostrarImg($imagenes);
	?>

</div>

