<?php
    session_start();

    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    mysqli_set_charset($conexion,"utf8");
    $sql = "SELECT * FROM usuarios WHERE id_usuario=".$_POST["usuario"];
    $res = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($res);

    $correo = $row[2];
    $_SESSION["recuperacionContrasena"] = $correo; 

    echo "ok";
?>