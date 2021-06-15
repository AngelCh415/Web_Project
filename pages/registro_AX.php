<?php
    $nombre = $_POST["namesignup"];
    $correo = $_POST["emailsignup"];
    $contrasena = md5($_POST["passwordsignup"]);


    ///*
    $respAX_JSON = array();
    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    $sql = "INSERT INTO `cafeteria2021`.`usuarios` (`nombre`, `correo`, `contrasena`, `tipo`, `saldo`, `auditoria`) VALUES ('$nombre', '$correo', '$contrasena', '2', '0', NOW())";
    $sqlCheckCorreo = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $resultadoCheckCorreo = mysqli_query($conexion,$sqlCheckCorreo);
    
    if(mysqli_num_rows($resultadoCheckCorreo) == 1){
        $respAX_JSON["codigo"]= 2;
        $respAX_JSON["msj"] = "<h3>Error, correo ya registrado, favor de intentarlo de nuevo :c </h3>";
    } else{
        $resultado = mysqli_query($conexion,$sql);
        if(mysqli_affected_rows($conexion) == 1){
            $respAX_JSON["codigo"]= 1;
            $respAX_JSON["msj"] = "<h3>Gracias. Tu registro se realizó correctamente :) </h3>";
        } else{
            $respAX_JSON["codigo"]= 0;
            $respAX_JSON["msj"] = "<h3>Error, favor de intentarlo de nuevo :c </h3>";
        }
    }
    echo json_encode($respAX_JSON);
    //*/

?>