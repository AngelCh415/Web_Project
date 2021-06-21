<?php
    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    mysqli_set_charset($conexion,"utf8");

    $sql = "UPDATE cafeteria2021.usuarios SET numero = '".$_POST["phone"]."' WHERE (id_usuario = ".$_POST["usuario"].");";
    mysqli_query($conexion,$sql);

    echo "Número telefónico actualizado.";
?>