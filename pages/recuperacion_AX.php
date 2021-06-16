<?php
    session_start();
    $correo = $_POST["correo"];

    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    mysqli_query($conexion, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

    $sql = "SELECT * FROM usuarios WHERE correo = '$correo' ";
    $resultado = mysqli_query($conexion,$sql);
    $info = mysqli_num_rows($resultado);
    $usuario = mysqli_fetch_row($resultado);
    $respAX = array();
    if($info == 1){
        $respAX["codigo"] = 1;
        $to = $correo;
        $subject = "Correo de recuperacion";
        $message = mt_srand(10);
        mail($to, $subject, $message);
    }

    echo json_encode($respAX);
?>