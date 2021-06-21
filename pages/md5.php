<?php
    $contrasena = md5("12345678");
    date_default_timezone_set('America/Mexico_City');
    $fecha_actual = date("Y-m-d");

    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    mysqli_set_charset($conexion,"utf8");

    $sqlInvVen = "SELECT * FROM detalle_pedido";
    $resInvVen = mysqli_query($conexion, $sqlInvVen);
    while($filas = mysqli_fetch_array($resInvVen, MYSQLI_BOTH )){
        echo "<br>".$filas[5];
    }

    echo "<br>".$contrasena;
    echo "<br>".$fecha_actual;
?>