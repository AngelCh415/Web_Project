<?php
    session_start();

    $contrasena = md5($_POST["passwordsignup"]);


    ///*
    $respAX_JSON = array();
    $correo = $_SESSION["recuperacionContrasena"];
    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    $sql = "UPDATE `cafeteria2021`.`usuarios` SET contrasena = '$contrasena' WHERE correo = '$correo'";
    $sqlCheckCorreo = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $resultadoCheckCorreo = mysqli_query($conexion,$sqlCheckCorreo);
    
    if(mysqli_num_rows($resultadoCheckCorreo) == 1){
        $resultado = mysqli_query($conexion,$sql);
        if(mysqli_affected_rows($conexion) == 1){
            $respAX_JSON["codigo"]= 1;
            $respAX_JSON["msj"] = "<h3>Tu contraseña se ha actualizado</h3>";
        } else{
            $respAX_JSON["codigo"]= 0;
            $respAX_JSON["msj"] = "<h3>Error, favor de intentarlo de nuevo</h3>";
        }
    } else{
        $respAX_JSON["codigo"]= 2;
        $respAX_JSON["msj"] = "<h3>Error, favor de solicitar el cambio nuevamente</h3>";
    }
    echo json_encode($respAX_JSON);
    //*/

?>