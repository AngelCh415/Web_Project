<?php
    $nombre = $_POST["nombre"];
    $numInventario = $_POST["numInventario"];

    $respAX_JSON = array();
    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    
    $sqlCheckSaldo = "SELECT * FROM inventario WHERE id_producto = '$nombre'";
    $resultadoCheckSaldo = mysqli_query($conexion,$sqlCheckSaldo);
    $infUsuario = mysqli_fetch_row($resultadoCheckSaldo);
    
    if(mysqli_num_rows($resultadoCheckSaldo) == 1){
        $nuevoSaldo = $infUsuario[3] + $numInventario;
        $sql = "UPDATE `cafeteria2021`.`inventario` SET existencia = '$nuevoSaldo' WHERE id_producto = '$nombre'";
        $resultado = mysqli_query($conexion,$sql);
        if(mysqli_affected_rows($conexion) == 1){
            $respAX_JSON["codigo"]= 1;
            $respAX_JSON["msj"] = "<h3>Inventario actualizado a ".$nuevoSaldo."</h3>";
        } else{
            $respAX_JSON["codigo"]= 0;
            $respAX_JSON["msj"] = "<h3>Error, no se agregó a la base de datos favor de intentarlo de nuevo :c </h3>";
        }
    } else{

        $respAX_JSON["codigo"]= 2;
        $respAX_JSON["msj"] = "<h3>Error, no existe el producto en la BD favor de intentarlo de nuevo :c </h3>";
    }
    echo json_encode($respAX_JSON);
?>