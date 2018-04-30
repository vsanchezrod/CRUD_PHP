<?php

	// Creación de un array con todas las provincias españolas
	$arrayProvincias = ['Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Barcelona','Burgos','Cáceres',
	'Cádiz','Cantabria','Castellón','Ceuta','Ciudad Real','Córdoba','La Coruña','Cuenca','Gerona','Granada','Guadalajara',
	'Guipúzcoa','Huelva','Huesca','Islas Baleares','Jaén','León','Lérida','Lugo','Madrid','Málaga','Melilla','Murcia','Navarra',
	'Orense','Palencia','Las Palmas','Pontevedra','La Rioja','Salamanca','Segovia','Sevilla','Soria','Tarragona',
    'Santa Cruz de Tenerife','Teruel','Toledo','Valencia','Valladolid','Vizcaya','Zamora','Zaragoza'];	
    
    for($i = 0; $i < count($arrayProvincias); $i++){
        $texto = "(".($i+1). ", '".$arrayProvincias[$i]. "')";
        // Se establece conexión con la base de datos
		include 'conexion.php';
	
		$query = "INSERT INTO provincias (Id, Nombre) VALUES $texto";
		
		// Dentro de la variable $resultado se tiene un resulset con el registro a borrar
		$resultado = $conexion->query($query);

		// Se cierra la conexión con la base de datos
		$conexion = null;
    }
?>