<?php
    $correo = $_POST["correo"];
    $saldo = $_POST["saldo"];

    $respAX_JSON = array();
    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    
    $sqlCheckSaldo = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $resultadoCheckSaldo = mysqli_query($conexion,$sqlCheckSaldo);
    $infUsuario = mysqli_fetch_row($resultadoCheckSaldo);
    
    if(mysqli_num_rows($resultadoCheckSaldo) == 1){
        $nuevoSaldo = $infUsuario[6] + $saldo;
        $sql = "UPDATE `cafeteria2021`.`usuarios` SET saldo = '$nuevoSaldo' WHERE correo = '$correo'";
        $resultado = mysqli_query($conexion,$sql);
        if(mysqli_affected_rows($conexion) == 1){
            $respAX_JSON["codigo"]= 1;
            $respAX_JSON["msj"] = "<h3>Saldo actualizado a ".$nuevoSaldo."</h3>";
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