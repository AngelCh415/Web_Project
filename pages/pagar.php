<?php
    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    mysqli_set_charset($conexion,"utf8");

    $sql = "SELECT * FROM cafeteria2021.carrito WHERE id_usuario=".$_POST["usuario"];
    $res = mysqli_query($conexion,$sql);
    $usuario = $_POST["usuario"];

    while($filas=mysqli_fetch_array($res,2)){
        $sql2 = "INSERT INTO `cafeteria2021`.`detalle_pedido` (`id_producto`, `cantidad`, `id_usuario`, `estado`,`auditoria`) VALUES ('$filas[1]','$filas[2]','$usuario','0', NOW());";
        mysqli_query($conexion,$sql2);
    }

    $sql = "UPDATE cafeteria2021.usuarios SET saldo = saldo - ".$_POST["total"]." WHERE (id_usuario = ".$_POST["usuario"].");";
    mysqli_query($conexion,$sql);

    $sql = "DELETE FROM cafeteria2021.carrito WHERE id_usuario = ".$_POST["usuario"];
    mysqli_query($conexion,$sql);

    echo "Pagado";
?>