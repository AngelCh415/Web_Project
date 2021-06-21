<?php
    $contrasena = md5("cocinero1");
    date_default_timezone_set('America/Mexico_City');
    $fecha_actual = date("Y-m-d",time());

    echo $contrasena;
    echo "<br>".$fecha_actual;
?>