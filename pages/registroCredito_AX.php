<?php
    session_start();
    $archivo = $_FILES["archivo"];
    $correo = $_SESSION["login"];
    
    date_default_timezone_set('America/Mexico_City');
    $hoy = date("g-i a");

    $nuevo_nombre = $correo.'_'.$hoy.'_';

    $dirUploads = "./files/"; //ruta donde se pondrán los datos
    $archUpload = $dirUploads.$nuevo_nombre.$archivo["name"]; //le vuelvo a cambiar el nombre y accedo a él

    $respAX_JSON = array();
    if(move_uploaded_file($_FILES["archivo"]["tmp_name"],"$archUpload")){
        $respAX_JSON["codigo"]= 1;
        $respAX_JSON["msj"] = "<h3>Gracias. Tu registro se realizó correctamente :) </h3>";
    } else{
        $respAX_JSON["codigo"]= 0;
        $respAX_JSON["msj"] = "<h3>Error, favor de intentarlo de nuevo :c </h3>";
    }
    echo json_encode($respAX_JSON);
?>