<?php
    session_start();
    $correo = $_POST["correo"];
    $contrasena = md5($_POST["contrasena"]);

    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    mysqli_query($conexion, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

    $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $resultado = mysqli_query($conexion,$sql);
    $info = mysqli_num_rows($resultado);
    $usuario = mysqli_fetch_row($resultado);
    $respAX = array();
    if($info == 1){
        $respAX["codigo"] = 1;
        $respAX["msj"] = "<h3 class='center-align'>¡Bienvenido! $usuario[1]</h3>";
        $_SESSION["login"] = $correo; 
    }else{
        $respAX["codigo"] = 0;
        $respAX["msj"] = "<h3 class='center-align'>Error. Favor de intentarlo nuevamente</h3>";
    }

    echo json_encode($respAX);
?>