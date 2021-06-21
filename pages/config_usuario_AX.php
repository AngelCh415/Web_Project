<?php
    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    mysqli_set_charset($conexion,"utf8");

    $sql = "SELECT * FROM cafeteria2021.usuarios WHERE correo = '".$_POST["email"]."'";
    $res = mysqli_query($conexion,$sql);
    $row = mysqli_num_rows($res);

    if($row == 1){
        //Ya existe alguien con ese correo
        echo "Error, ese correo ya está registrado.";
    }else{
        //no existe
        $sql = "UPDATE cafeteria2021.usuarios SET correo = '".$_POST["email"]."' WHERE (id_usuario = ".$_POST["usuario"].");";
        mysqli_query($conexion,$sql);

        echo "Correo actualizado, se cerrará su sesión.";
    }
?>