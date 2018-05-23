<div id="slider">

			<?php
				// Se guarda el array resultado con todas las imágenes en una variable
				include 'consultas.php';
				$imagenes = rescatarImgBBDD();
				$ruta = $imagenes[0]->rutaFoto;
			?>

			<img src="/Practica3/uploads/<?php echo $ruta;?>" alt="Imagen1">

</div>

