<?php

    /*Se accede a las propiedades del archivo subido a través de la variable superglobal $_FILES
    Sus propiedades son: name, type, size y tmp_name*/
    $nombreImg = $_FILES['imagen']['name'];
    $tipoImg = $_FILES['imagen']['type'];
    $tamanoImg = $_FILES['imagen']['size'];
    $carpetaTemporal = $_FILES['imagen']['tmp_name'];

    // Control del tamaño de la imagen - Se pone un límite de 2MB
    // Podría no hacer falta controlar el tamaño, ya que viene delimitado por el tipo de campo elegido, en este caso LONGBLOB
    if($tamanoImg <= 2000000){

        if ($tipoImg == "image/jpg" || $tipoImg == "image/jpeg" || $tipoImg == "image/png" || $tipoImg == "image/gif"){
        
            /* Se crea una variable para indicar la ruta donde se guardarán las imágenes en el servidor
        Se usa la variable superglobal $_SERVER*/
        $ruta = $_SERVER['DOCUMENT_ROOT'].'/Practica3/uploads/';

        /* Pasar archivo de la carpeta temporal a la carpeta uploads usando el método:
        move_uploaded_file() que recibe dos parámetros, la carpeta temporal y la carpeta final*/
        move_uploaded_file($carpetaTemporal, $ruta.$nombreImg);

        include 'consultas.php';
        guardarImgBBDD($ruta, $nombreImg, $tipoImg, $tamanoImg);


        }
        else {
            echo "Formato de imagen no permitido";
        }
    }
    else {
        echo "El tamaño máximo de la imagen es de 2MB";
    }

?>