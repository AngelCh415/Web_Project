<?php
    session_start();
    $sesion = isset($_SESSION["login"]);

    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    mysqli_set_charset($conexion,"utf8");

    $infUsuario;

    if($sesion==1){
        //Hay sesión de usuario
        $correo = $_SESSION["login"];
        $sqlUsuario = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $resUsuario = mysqli_query($conexion,$sqlUsuario);
        $infUsuario = mysqli_fetch_row($resUsuario);
        
        $tipoUsuario = $infUsuario[4];

        //Cargar lista del carrito de la BD
        $sqlCarrito = "SELECT inventario.nombre,carrito.cantidad,inventario.precio,carrito.id_producto FROM  cafeteria2021.inventario, cafeteria2021.carrito WHERE carrito.id_usuario=$infUsuario[0] AND inventario.id_producto=carrito.id_producto;";
        $resCarrito = mysqli_query($conexion,$sqlCarrito);
        $listaCarrito = "";
        $listaVacia = "";
        $total = 0;
        while($filas=mysqli_fetch_array($resCarrito,2)){
            $listaCarrito .= "<tr>
                <td>$filas[0]</td>
                <td>$filas[1]</td>
                <td>$".$filas[2]*$filas[1]."</td>
                <td><i class='btn brown far fa-trash-alt deleteCarrito' data-usr=$infUsuario[0] data-prod=$filas[3]></i></td>
                </tr>";
            $total += $filas[2]*$filas[1];
        }
        if($total==0)
            $listaVacia = "<h4 style='text-align:center'>El carrito está vacío.</h4>";
    }else{
        //No hay sesión de usuario
        header("location: ./login.html");
    }
?>

<!--*****************
    Inicia HTML
******************-->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Cafetería ESCOM 2021</title>
<meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<link href="./../materialize/css/materialize.min.css" rel="stylesheet">
<link href="./../jscript/plugins/validetta101/validetta.min.css" rel="stylesheet">
<link href="./../jscript/plugins/confirm334/jquery-confirm.min.css" rel="stylesheet">
<link href="./../css/index.css" rel="stylesheet"/>
<script src="./../jscript/jquery-3.6.0.min.js"></script>
<script src="./../materialize/js/materialize.min.js"></script>
<script src="./../jscript/plugins/validetta101/validetta.min.js"></script>
<script src="./../jscript/plugins/validetta101/validettaLang-es-ES.js"></script>
<script src="./../jscript/plugins/confirm334/jquery-confirm.min.js"></script>
<script src="./../jscript/carrito.js"></script>
</head>
<body>
  <header>
    <div class="navbar-fixed">
    <nav class="brown lighten-1">
      <div class="nav-wrapper">
        <a href="./../index.php" class="brand-logo"><img src="./../img/cafeLogo50.png"></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href='<?php if($sesion) echo "./logout.php"; else echo "./login.html";?>'><?php if($sesion) echo "Cerrar sesión"; else echo "Iniciar sesión";?></a></li>
          <li><a href='<?php if($sesion) echo "./config_usuario.html"; else echo "./registro.html";?>'><?php if($sesion) echo "Ver perfil"; else echo "Crear cuenta";?></a></li>
          <li><a href='<?php if($sesion) echo "./carrito.php";?>'><?php if($sesion) echo "Ver carrito";?></a></li>
          <li><a href='<?php if($tipoUsuario == 0) echo "./administrador.php";?>'><?php if($tipoUsuario == 0) echo "Pag. administrador";?></a></li>
          <li><a href='<?php if($tipoUsuario == 0 || $tipoUsuario == 1) echo "./registro.html";?>'><?php if($tipoUsuario == 0 || $tipoUsuario == 1) echo "Ver pedidos";?></a></li>
          <!--<li><a href="">Ver perfil</a></li>
          <li><a href="">Carrito</a></li>-->
        </ul>
      </div>
    </nav> <!-- /menu -->
    </div>
    <ul class="sidenav" id="mobile-demo">
          <li><a href='<?php if($sesion) echo "./pages/logout.php"; else echo "./pages/login.html";?>'><?php if($sesion) echo "Cerrar sesión"; else echo "Iniciar sesión";?></a></li>
          <li><a href='<?php if($sesion) echo "./pages/config_usuario.html"; else echo "./pages/registro.html";?>'><?php if($sesion) echo "Ver perfil"; else echo "Crear cuenta";?></a></li>
          <li><a href='<?php if($sesion) echo "./pages/carrito.php";?>'><?php if($sesion) echo "Ver carrito";?></a></li>
          <li><a href='<?php if($tipoUsuario == 0) echo "./pages/administrador.php";?>'><?php if($tipoUsuario == 0) echo "Pag. administrador";?></a></li>
          <li><a href='<?php if($tipoUsuario == 0 || $tipoUsuario == 1) echo "./pages/registro.html";?>'><?php if($tipoUsuario == 0 || $tipoUsuario == 1) echo "Ver pedidos";?></a></li>
          <!--<li><a href="">Ver perfil</a></li>
          <li><a href="">Carrito</a></li>-->
    </ul> <!-- /menu mobile-->
  </header>
  <main>
    <div class="container">
        <div id="title" class="row">
            <h4>Carrito de <?php echo $infUsuario[1]?></h4>
        </div>
        <div id="list" class="row">
            <table class="striped centered responsive-table">
                <thead>
                    <tr><td>Producto</td><td>Cantidad</td><td>Precio</td><td>Acción</td></tr>
                </thead>
                <tbody>
                    <?php if($total>0) echo $listaCarrito?>
                </tbody>
            </table>
            <?php if($total==0) echo $listaVacia?>
        </div>
        <hr>
        <div class="row">
            <h6>
            <div class="col s6 m8" style="text-align: right">Total a pagar:</div>
            <div clas="col s6 m4" style="text-align: center"><b>$ <?php echo $total?></b></div>
            </h6>
        </div>
        <div class="row">
            <h6>
            <div class="col s6 m8" style="text-align: right">Saldo actual:</div>
            <div clas="col s6 m4" style="text-align: center"><b>$ <?php echo $infUsuario[5]?></b></div>
            </h6>
        </div>
        <div class="row">
            <div class="col m6"></div>
            <?php
                if($total>0)
                    if($total<=$infUsuario[5]){
                        //saldo suficiente, pagar
                        echo "<div class='col s12 m6'><a class='btn green' style='width:100%;'>Pagar</a></div>";
                    }else{
                        //saldo insuficiente, agregar
                        echo "<div class='col s12 m6'><h6 align='center' style='color:red;'>Saldo insuficiente para pagar.</h6></div>";
                    }
            ?>
        </div>
    </div>
  </main>
  <footer class="page-footer brown lighten-1">
    <div class="container">
      <div class="row">
      <div class="col s12 m4 l2"><p></p></div>
        <div class="col s12 m12 l8 center-align">
          <h5 class="white-text">Gracias por su preferencia :)</h5>
          <h8 class="white-text">Visítanos en: </h8><br>
          <h8 class="white-text">Alarii 317, Barrio del Niño, 71250 Villa de Zaachila, Oax.</h8>
        </div>
        
        <div class="col s12 m4 l2"><p></p></div>
    </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      © 2021 Copyright
      <a class="grey-text text-lighten-4 right" href="./index.php">Cafetería ESCOM</a>
      </div>
    </div>
  </footer>  
</body>
</html>