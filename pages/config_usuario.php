<?php
    session_start();
    $sesion = isset($_SESSION["login"]);

    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    mysqli_set_charset($conexion,"utf8");

    $infoUsuario;

    if($sesion==1){
        //Hay sesion
        $correo = $_SESSION["login"];
        $sqlUsuario = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $resUsuario = mysqli_query($conexion,$sqlUsuario);
        $infUsuario = mysqli_fetch_row($resUsuario);

        $tipoUsuario = $infUsuario[5];
    }else{
        //No hay sesion
        header("location: ./login.html");
    }
?>

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
<script src="./../jscript/index.js"></script>
<script src="./../jscript/config_usuario.js"></script>
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
          <li><a href='<?php if($sesion) echo "./carrito.php";?>'><?php if($sesion) echo "Ver carrito";?></a></li>
          <li><a href='<?php if($tipoUsuario == 0 || $tipoUsuario == 1) echo "./pedidos.php";?>'><?php if($tipoUsuario == 0 || $tipoUsuario == 1) echo "Ver pedidos";?></a></li>
          <!--<li><a href="">Ver perfil</a></li>
          <li><a href="">Carrito</a></li>-->
        </ul>
      </div>
    </nav> <!-- /menu -->
    </div>
    <ul class="sidenav" id="mobile-demo">
          <li><a href='<?php if($sesion) echo "./logout.php"; else echo "./login.html";?>'><?php if($sesion) echo "Cerrar sesión"; else echo "Iniciar sesión";?></a></li>
          <li><a href='<?php if($sesion) echo "./carrito.php";?>'><?php if($sesion) echo "Ver carrito";?></a></li>
          <li><a href='<?php if($tipoUsuario == 0 || $tipoUsuario == 1) echo "./pedidos.php";?>'><?php if($tipoUsuario == 0 || $tipoUsuario == 1) echo "Ver pedidos";?></a></li>
          <!--<li><a href="">Ver perfil</a></li>
          <li><a href="">Carrito</a></li>-->
    </ul> <!-- /menu mobile-->
  </header>
  <main>
      <div class="container">
        <div class="row">
            <h4>Perfil de <?php echo $infUsuario[1]?></h4>
        </div>
        <div class="row">
            <div class="col s12 m4"><h5><i class="far fa-money-bill-alt"></i> Saldo:</h5></div>
            <div class="col s12 m4"><h5>$ <?php echo $infUsuario[6]?></h5></div>
            <div class="col s12 m4"><a href="./registroCredito.html" class="btn brown">Aumentar</a></div>
        </div>
        <div class="row">
            <form id="formMail" name="formMail">
                <div class="col s12 m4"><h5><i class="far fa-envelope"></i> Correo:</h5></div>
                <div class="col s12 m4">
                    <input name="email" id="email" data-validetta="email" value='<?php echo $infUsuario[2]?>' disabled/>
                    <input name="usuario" id="usuario" value='<?php echo $infUsuario[0]?>' hidden/>
                </div>
                <div class="col s12 m4">
                    <a class="btn brown cambiarEMail">Modificar</a> 
                    <button type="submit" name="btnUpdate" id="btnUpdate" class="btn brown updateEMail" disabled>Actualizar</button>
                </div>
            </form>
        </div>
        <div class="row">
            <form id="formPhone" name="formPhone">
                <div class="col s12 m4"><h5><i class="fas fa-phone"></i> Teléfono celular:</h5></div>
                <div class="col s12 m4">
                    <input name="phone" id="phone" data-validetta="number" value='<?php echo $infUsuario[4]?>' disabled/>
                    <input name="usuario" id="usuario" value='<?php echo $infUsuario[0]?>' hidden/>
                </div>
                <div class="col s12 m4">
                    <a class="btn brown cambiarPhone">Modificar</a> 
                    <button type="submit" name="btnUpdatePhone" id="btnUpdatePhone" class="btn brown updatePhone" disabled>Actualizar</button>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col s12 m4"><h5><i class="fas fa-key"></i> Contraseña:</h5></div>
            <div class="col s12 m4"><input type="password" value="sample password" disabled></div>
            <div class="col s12 m4"><a class="btn brown cambiarContrasena" data-usr='<?php echo $infUsuario[0]?>'>Cambiar</a></div>
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