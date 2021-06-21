<?php
    session_start();

    if(isset($_SESSION["login"])){
    
    $sesion = $_SESSION["login"];
    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    mysqli_set_charset($conexion,"utf8");

    $sqlUsuarioAdmin = "SELECT * FROM usuarios WHERE correo = '$sesion' AND tipo = '0'";
    $resUsuarioAdmin = mysqli_query($conexion,$sqlUsuarioAdmin);
    $infoUsuarioAdmin = mysqli_num_rows($resUsuarioAdmin);
    
    if($infoUsuarioAdmin != 1){
        header("location: ./../index.php");
    }else{
        
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Administrador</title>
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
<script src="./../jscript/index.js"></script>
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
                        <!--<li><a href="">Ver perfil</a></li>
                        <li><a href="">Carrito</a></li>-->
                    </ul>
            </div>
        </nav> <!-- /menu -->
        </div>
        <ul class="sidenav" id="mobile-demo">
            <li><a href="./../pages/logout.php"> Cerrar sesión</a></li>
        </ul> <!-- /menu mobile-->
    </header>


    <main class="valign-wrapper">
        <div class="container">
            <h4 class="black-text center"><i class="fas fa-user"></i> Clientes</h4><br>
            <div class="row">
                <div class="col s12 m6 l6 push-l3 push-m3">
                    <a href="./adminSaldoCliente.php" class="btn brown lighten-1" style="width:100%;"><i></i>Ingresar saldo</a>
                </div>
            </div>
            <br>
            <h4 class="black-text center"><i class="fas fa-list"></i> Inventario y pedidos</h4><br>
            <div class="row">
                <div class="col s12 m6 l6">
                    <a href="./adminManejarInventario.php" class="btn brown lighten-1" style="width:100%;"><i></i> Manejar inventario</a>
                </div>
                <div class="col s12  m6 l6">
                    <a href="./pedidos.php" class="btn brown lighten-1" style="width:100%;"><i></i>Ver pedidos</a>
                </div>
            </div>
            <br>
            <h4 class="black-text center"><i class="fas fa-print"></i> Reportes diarios</h4><br>
            <div class="row">
                <div class="col s12 m6 l6">
                    <a href="./adminGenerarPDF.php" class="btn brown lighten-1" style="width:100%;"><i></i>Ver reporte en PDF</a>
                </div>
                <div class="col s12  m6 l6">
                    <a href="./adminGenerarPDF.php?ver=no" class="btn brown lighten-1 white-text" style="width:100%;"><i></i>Guardar reporte</a>
                </div>
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