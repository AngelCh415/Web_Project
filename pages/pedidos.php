<?php
    session_start();

    if(isset($_SESSION["login"])){
    
    $sesion = $_SESSION["login"];
    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    mysqli_set_charset($conexion,"utf8");

    $sqlUsuarioAdmin = "SELECT * FROM usuarios WHERE correo = '$sesion' AND (tipo = '1' OR tipo = '0')";
    $resUsuarioAdmin = mysqli_query($conexion,$sqlUsuarioAdmin);
    $infoUsuarioAdmin = mysqli_num_rows($resUsuarioAdmin);
    
    if($infoUsuarioAdmin != 1){
        header("location: ./../index.php");
    }else{
        $sqlAlumnos = "SELECT * FROM detalle_pedido WHERE estado = '0'";
        $resAlumnos = mysqli_query($conexion, $sqlAlumnos); 
        
        $trAlumnos = "";
        while($filas = mysqli_fetch_array($resAlumnos, MYSQLI_BOTH)){ 
            $sqlPro = "SELECT * FROM inventario WHERE id_producto = '$filas[1]'";
            $resPro = mysqli_query($conexion, $sqlPro); 
            $row = mysqli_fetch_array($resPro, MYSQLI_BOTH);

            $trAlumnos .= "<tr>
                <td>$filas[0]</td>
                <td>$row[1]</td>
                <td>$filas[2]</td>
                <td><i class='fas fa-window-close fa-2x red-text text-darken-3 cancelarPedido' data-pedido='$filas[0]' data-producto='$filas[1]'></i></td>
                <td><i class='fas fa-check-square fa-2x green-text text-darken-3 completarPedido' data-pedido='$filas[0]' data-producto='$filas[1]'></i></td>
            </tr>";
        }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Administrador - Clientes</title>
<meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="./../materialize/css/materialize.min.css" rel="stylesheet">
<link href="./../jscript/plugins/validetta101/validetta.min.css" rel="stylesheet">
<link href="./../jscript/plugins/confirm334/jquery-confirm.min.css" rel="stylesheet">
<link href="./../css/general.css" rel="stylesheet"> <!---Para dar forma a materializa, especialemente en el footer -->
<link href="./../css/index.css" rel="stylesheet">
<script src="./../jscript/jquery-3.6.0.min.js"></script>
<script src="./../materialize/js/materialize.min.js"></script>
<script src="./../jscript/plugins/validetta101/validetta.min.js"></script>
<script src="./../jscript/plugins/validetta101/validettaLang-es-ES.js"></script>
<script src="./../jscript/plugins/confirm334/jquery-confirm.min.js"></script>
<script src="./../jscript/pedidos.js"></script>

</head>

<body>
    <header>
        <div class="navbar-fixed">
        <nav class="brown lighten-1">
            <div class="nav-wrapper">
                <a href="./../index.php" class="brand-logo"><img src="./../img/cafeLogo50.png"></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="./../pages/logout.php"> Cerrar sesión</a></li>
                        <li><a href="./../pages/administrador.php"> Ir a menú</a></li>
                    </ul>
            </div>
        </nav> <!-- /menu -->
        </div>
        <ul class="sidenav" id="mobile-demo">
            <li><a href="./../pages/logout.php"> Cerrar sesión</a></li>
            <li><a href="./../pages/administrador.php"> Volver a menú administrador</a></li>
        </ul> <!-- /menu mobile-->
    </header>


    <main>
        <div class="container">
            <div class="row">
            <h3 style="text-align:center;">Pedidos</h3>
                <!-- clase de materialize-->
                <table class="centered striped responsive-table">
                    <thead>
                        <!--- los encabezados de la tabla--->
                        <tr><th>Pedido No.</th><th>Productos</th><th>Cantidad</th><th>Cancelar</th><th>Completado</th></tr>
                    </thead>
                    <tbody>
                        <?php echo $trAlumnos; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>


    <footer class="page-footer brown lighten-1">
        <div class="container">
        <div class="row">
        </div>
        <div class="footer-copyright">
        <div class="container">
        © 2021 Copyright
        <a class="grey-text text-lighten-4 right" href="./../index.php">Cafetería ESCOM</a>
        </div>
        </div>
    </footer>
</body>
</html>

<?php
    }
    }else{
        header("location: ./../index.php");
    }
?>