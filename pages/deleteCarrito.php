<?php
    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    mysqli_set_charset($conexion,"utf8");

    $sql = "DELETE FROM cafeteria2021.carrito WHERE id_usuario=".$_POST["usuario"]." AND id_producto=".$_POST["producto"];
    $res = mysqli_query($conexion,$sql);

    $respAX = array();
    $mensaje = "";

    if($res==1){
        $respAX["codigo"] = 1;
        $respAX["mensaje"] = "Eliminado del carrito.";
    }else{
        $respAX["codigo"] = 0;
        $respAX["mensaje"] = "Error al eliminar del carrito.";
    }

    echo json_encode($respAX);
?>