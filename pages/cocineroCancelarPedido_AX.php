<?php
    $pedido = $_POST["pedido"];
    $producto = $_POST["producto"];

    $respAX_JSON = array();
    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    
    $sqlCheckSaldo = "SELECT * FROM detalle_pedido WHERE id_pedido = '$pedido' AND id_producto = '$producto'";
    $resultadoCheckSaldo = mysqli_query($conexion,$sqlCheckSaldo);
    $infUsuario = mysqli_fetch_row($resultadoCheckSaldo);
    
    if(mysqli_num_rows($resultadoCheckSaldo) == 1){
        $sql = "UPDATE `cafeteria2021`.`detalle_pedido` SET estado = '2' WHERE id_pedido = '$pedido' AND id_producto = '$producto'";
        $resultado = mysqli_query($conexion,$sql);
        if(mysqli_affected_rows($conexion) == 1){
            $respAX_JSON["codigo"]= 1;
            $respAX_JSON["msj"] = "<h3>Logrado</h3>";
        } else{
            $respAX_JSON["codigo"]= 0;
            $respAX_JSON["msj"] = "<h3>Error, favor de intentarlo de nuevo :c </h3>";
        }
    } else{

        $respAX_JSON["codigo"]= 2;
        $respAX_JSON["msj"] = "<h3>Error, favor de intentarlo de nuevo :c </h3>";
    }
    echo json_encode($respAX_JSON);
?>