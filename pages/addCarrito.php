<?php
    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    mysqli_set_charset($conexion,"utf8");

    $sql = "SELECT * FROM cafeteria2021.carrito WHERE id_usuario=".$_POST["usuario"]." AND id_producto=".$_POST["producto"];
    $res = mysqli_query($conexion,$sql);
    $cols = mysqli_num_rows($res);

    $respAX = array();
    $mensaje = "";

    if($cols==1){
        //Update
        $sql2 = "UPDATE cafeteria2021.carrito SET cantidad = cantidad+1 WHERE (id_producto =".$_POST["producto"].")";
        $res2 = mysqli_query($conexion,$sql2);

        $respAX["codigo"] = 1;
        $respAX["mensaje"] = "Agregado al carrito.";
    }else{
        //Insert
        $sql2 = "INSERT INTO cafeteria2021.carrito VALUES (".$_POST["usuario"].",".$_POST["producto"].",1);";
        $res2 = mysqli_query($conexion,$sql2);

        $respAX["codigo"] = 1;
        $respAX["mensaje"] = "Agregado al carrito.";
    }

    echo json_encode($respAX);
?>