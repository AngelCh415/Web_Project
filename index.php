<?php
    session_start();
    $sesion = isset($_SESSION["login"]);

    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    mysqli_set_charset($conexion,"utf8");

    $infUsuario;

    if($sesion == 1){
      $correo = $_SESSION["login"];
      $sqlUsuario = "SELECT * FROM usuarios WHERE correo = '$correo'";
      $resUsuario = mysqli_query($conexion,$sqlUsuario);
      $infUsuario = mysqli_fetch_row($resUsuario);
    
      $tipoUsuario = $infUsuario[4];
    } else {
      $tipoUsuario = 2;
    }

    $sqlInventarioCafe = "SELECT * FROM inventario WHERE categoria = 'Café'";
    $resInventarioCafe = mysqli_query($conexion,$sqlInventarioCafe);
    $trInventarioCafe = "";
    while($filas=mysqli_fetch_array($resInventarioCafe,2)){
        $trInventarioCafe .= "<tr><td><img src='./img/$filas[7]/$filas[5].jpg' alt='Imagen $filas[1]' class='circle responsive-img'/></td>
            <td>$filas[1]</td>
            <td>$filas[2]</td>
            <td>$$filas[4]</td>
            <td>";
        if($sesion)
            $trInventarioCafe.="<i class='btn brown fas fa-cart-plus addCarrito' data-usr='$infUsuario[0]' data-prod='$filas[0]'></i>";
        else
            $trInventarioCafe.="<a class='btn brown' href='./pages/login.html'><i class='fas fa-cart-plus'></i></a>";
                
        $trInventarioCafe .="</td>
        </tr>";
    }

    $sqlInventarioBCalientes = "SELECT * FROM inventario WHERE categoria = 'Bebidas Calientes'";
    $resInventarioBCalientes = mysqli_query($conexion,$sqlInventarioBCalientes);
    $trInventarioBCalientes = "";
    while($filas=mysqli_fetch_array($resInventarioBCalientes,2)){
        $trInventarioBCalientes .= "<tr><td><img src='./img/$filas[7]/$filas[5].jpg' alt='Imagen $filas[1]' class='circle responsive-img'/></td>
            <td>$filas[1]</td>
            <td>$filas[2]</td>
            <td>$$filas[4]</td>
            <td>";
        if($sesion)
            $trInventarioBCalientes.="<i class='btn brown fas fa-cart-plus addCarrito' data-usr='$infUsuario[0]' data-prod='$filas[0]'></i>";
        else
            $trInventarioBCalientes.="<a class='btn brown' href='./pages/login.html'><i class='fas fa-cart-plus'></i></a>";
                
        $trInventarioBCalientes .="</td>
        </tr>";
    }

    $sqlInventarioMArtesanales = "SELECT * FROM inventario WHERE categoria = 'Métodos Artesanales'";
    $resInventarioMArtesanales = mysqli_query($conexion,$sqlInventarioMArtesanales);
    $trInventarioMArtesanales = "";
    while($filas=mysqli_fetch_array($resInventarioMArtesanales,2)){
        $trInventarioMArtesanales .= "<tr><td><img src='./img/$filas[7]/$filas[5].jpg' alt='Imagen $filas[1]' class='circle responsive-img'/></td>
            <td>$filas[1]</td>
            <td>$filas[2]</td>
            <td>$$filas[4]</td>
            <td>";
        if($sesion)
            $trInventarioMArtesanales.="<i class='btn brown fas fa-cart-plus addCarrito' data-usr='$infUsuario[0]' data-prod='$filas[0]'></i>";
        else
            $trInventarioMArtesanales.="<a class='btn brown' href='./pages/login.html'><i class='fas fa-cart-plus'></i></a>";
                
        $trInventarioMArtesanales .="</td>
        </tr>";
    }

    $sqlInventarioBFrias = "SELECT * FROM inventario WHERE categoria = 'Bebidas Frías'";
    $resInventarioBFrias = mysqli_query($conexion,$sqlInventarioBFrias);
    $trInventarioBFrias = "";
    while($filas=mysqli_fetch_array($resInventarioBFrias,2)){
        $trInventarioBFrias .= "<tr><td><img src='./img/$filas[7]/$filas[5].jpg' alt='Imagen $filas[1]' class='circle responsive-img'/></td>
            <td>$filas[1]</td>
            <td>$filas[2]</td>
            <td>$$filas[4]</td>
            <td>";
        if($sesion)
            $trInventarioBFrias.="<i class='btn brown fas fa-cart-plus addCarrito' data-usr='$infUsuario[0]' data-prod='$filas[0]'></i>";
        else
            $trInventarioBFrias.="<a class='btn brown' href='./pages/login.html'><i class='fas fa-cart-plus'></i></a>";
                
        $trInventarioBFrias .="</td>
        </tr>";
    }

    $sqlInventarioPostres = "SELECT * FROM inventario WHERE categoria = 'Postres'";
    $resInventarioPostres = mysqli_query($conexion,$sqlInventarioPostres);
    $trInventarioPostres = "";
    while($filas=mysqli_fetch_array($resInventarioPostres,2)){
        $trInventarioPostres .= "<tr><td><img src='./img/$filas[7]/$filas[5].jpg' alt='Imagen $filas[1]' class='circle responsive-img'/></td>
            <td>$filas[1]</td>
            <td>$filas[2]</td>
            <td>$$filas[4]</td>
            <td>";
        if($sesion)
            $trInventarioPostres.="<i class='btn brown fas fa-cart-plus addCarrito' data-usr='$infUsuario[0]' data-prod='$filas[0]'></i>";
        else
            $trInventarioPostres.="<a class='btn brown' href='./pages/login.html'><i class='fas fa-cart-plus'></i></a>";
                
        $trInventarioPostres .="</td>
        </tr>";
    }

    $sqlInventarioPanquesGalletasScones = "SELECT * FROM inventario WHERE categoria = 'Panqués-Galletas-Scones'";
    $resInventarioPanquesGalletasScones = mysqli_query($conexion,$sqlInventarioPanquesGalletasScones);
    $trInventarioPanquesGalletasScones = "";
    while($filas=mysqli_fetch_array($resInventarioPanquesGalletasScones,2)){
        $trInventarioPanquesGalletasScones .= "<tr><td><img src='./img/$filas[7]/$filas[5].jpg' alt='Imagen $filas[1]' class='circle responsive-img'/></td>
            <td>$filas[1]</td>
            <td>$filas[2]</td>
            <td>$$filas[4]</td>
            <td>";
        if($sesion)
            $trInventarioPanquesGalletasScones.="<i class='btn brown fas fa-cart-plus addCarrito' data-usr='$infUsuario[0]' data-prod='$filas[0]'></i>";
        else
            $trInventarioPanquesGalletasScones.="<a class='btn brown' href='./pages/login.html'><i class='fas fa-cart-plus'></i></a>";
                
        $trInventarioPanquesGalletasScones .="</td>
        </tr>";
    }

    $sqlInventarioSandwiches = "SELECT * FROM inventario WHERE categoria = 'Sandwiches'";
    $resInventarioSandwiches = mysqli_query($conexion,$sqlInventarioSandwiches);
    $trInventarioSandwiches = "";
    while($filas=mysqli_fetch_array($resInventarioSandwiches,2)){
        $trInventarioSandwiches .= "<tr><td><img src='./img/$filas[7]/$filas[5].jpg' alt='Imagen $filas[1]' class='circle responsive-img'/></td>
            <td>$filas[1]</td>
            <td>$filas[2]</td>
            <td>$$filas[4]</td>
            <td>";
        if($sesion)
            $trInventarioSandwiches.="<i class='btn brown fas fa-cart-plus addCarrito' data-usr='$infUsuario[0]' data-prod='$filas[0]'></i>";
        else
            $trInventarioSandwiches.="<a class='btn brown' href='./pages/login.html'><i class='fas fa-cart-plus'></i></a>";
                
        $trInventarioSandwiches .="</td>
        </tr>";
    }

    $sqlInventarioCafeGrano = "SELECT * FROM inventario WHERE categoria = 'Café en grano-Para casa'";
    $resInventarioCafeGrano = mysqli_query($conexion,$sqlInventarioCafeGrano);
    $trInventarioCafeGrano = "";
    while($filas=mysqli_fetch_array($resInventarioCafeGrano,2)){
        $trInventarioCafeGrano .= "<tr><td><img src='./img/$filas[7]/$filas[5].jpg' alt='Imagen $filas[1]' class='circle responsive-img'/></td>
            <td>$filas[1]</td>
            <td>$filas[2]</td>
            <td>$$filas[4]</td>
            <td>";
        if($sesion)
            $trInventarioCafeGrano.="<i class='btn brown fas fa-cart-plus addCarrito' data-usr='$infUsuario[0]' data-prod='$filas[0]'></i>";
        else
            $trInventarioCafeGrano.="<a class='btn brown' href='./pages/login.html'><i class='fas fa-cart-plus'></i></a>";
                
        $trInventarioCafeGrano .="</td>
        </tr>";
    }

    $sqlInventarioHamburguesas = "SELECT * FROM inventario WHERE categoria = 'Hamburguesas'";
    $resInventarioHamburguesas = mysqli_query($conexion,$sqlInventarioHamburguesas);
    $trInventarioHamburguesas = "";
    while($filas=mysqli_fetch_array($resInventarioHamburguesas,2)){
        $trInventarioHamburguesas .= "<tr><td><img src='./img/$filas[7]/$filas[5].jpg' alt='Imagen $filas[1]' class='circle responsive-img'/></td>
            <td>$filas[1]</td>
            <td>$filas[2]</td>
            <td>$$filas[4]</td>
            <td>";
        if($sesion)
            $trInventarioHamburguesas.="<i class='btn brown fas fa-cart-plus addCarrito' data-usr='$infUsuario[0]' data-prod='$filas[0]'></i>";
        else
            $trInventarioHamburguesas.="<a class='btn brown' href='./pages/login.html'><i class='fas fa-cart-plus'></i></a>";
                
        $trInventarioHamburguesas .="</td>
        </tr>";
    }
?>

<!--*******************************
          Inicio de HTML
*********************************-->

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
<link href="./materialize/css/materialize.min.css" rel="stylesheet">
<link href="./jscript/plugins/validetta101/validetta.min.css" rel="stylesheet">
<link href="./jscript/plugins/confirm334/jquery-confirm.min.css" rel="stylesheet">
<link href="./css/index.css" rel="stylesheet"/>
<script src="./jscript/jquery-3.6.0.min.js"></script>
<script src="./materialize/js/materialize.min.js"></script>
<script src="./jscript/plugins/validetta101/validetta.min.js"></script>
<script src="./jscript/plugins/validetta101/validettaLang-es-ES.js"></script>
<script src="./jscript/plugins/confirm334/jquery-confirm.min.js"></script>
<script src="./jscript/index.js"></script>
</head>
<body>
  <header>
    <div class="navbar-fixed">
    <nav class="brown lighten-1">
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo"><img src="./img/cafeLogo50.png"></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href='<?php if($sesion) echo "./pages/logout.php"; else echo "./pages/login.html";?>'><?php if($sesion) echo "Cerrar sesión"; else echo "Iniciar sesión";?></a></li>
          <li><a href='<?php if($sesion) echo "./pages/config_usuario.html"; else echo "./pages/registro.html";?>'><?php if($sesion) echo "Ver perfil"; else echo "Crear cuenta";?></a></li>
          <li><a href='<?php if($sesion) echo "./pages/carrito.php";?>'><?php if($sesion) echo "Ver carrito";?></a></li>
          <li><a href='<?php if($tipoUsuario == 0) echo "./pages/administrador.php";?>'><?php if($tipoUsuario == 0) echo "Pag. administrador";?></a></li>
          <li><a href='<?php if($tipoUsuario == 0 || $tipoUsuario == 1) echo "./pages/registro.html";?>'><?php if($tipoUsuario == 0 || $tipoUsuario == 1) echo "Ver pedidos";?></a></li>
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
    <div class="slider">
      <ul class="slides">
        <li>
          <img src="./img/Carrusel/cafeteria.jpg"> <!-- random image -->
          <div class="caption center-align">
            <h3><strong>Bienvenido a cafetería ESCOM</strong></h3>
            <h5 class="light grey-text text-lighten-3">¡Estamos a tu servicio!</h5>
          </div>
        </li>
        <li>
          <img src="./img/Carrusel/cafe.jpg"> <!-- random image -->
          <div class="caption left-align">
            <h2><strong>El mejor café para ti!</strong></h2>
            
          </div>
        </li>
        <li>
          <img src="./img/Carrusel/postres.jpg"> <!-- random image -->
          <div class="caption right-align">
            <h3><strong>Postres!</strong></h3>
            
          </div>
        </li>
        <li>
          <img src="./img/Carrusel/comida.jpg"> <!-- random image -->
          <div class="caption center-align">
            <h3><strong>Deliciosa comida!</strong></h3>
            
          </div>
        </li>
      </ul>
    </div> <!-- /slider -->

    
    <div class="container">
		<div class="productos1">
      <h1 style="text-align:center;">CAFÉ</h1>
      <h1 style="text-align:center;"></h1>
        <table class="centered striped centered responsive-table">
            <thead>
                <tr><th>Imagen</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Opciones</th></tr>
            </thead>
            <tbody>
                <?php echo $trInventarioCafe;?>
            </tbody>
        </table>
      
        <h1 style="text-align:center;">BEBIDAS CALIENTES</h1>
      <h5 style="text-align:center;">BEBIDAS RICAS Y SANAS</h5>
        <table class="centered striped centered responsive-table">
            <thead>
                <tr><th>Imagen</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Opciones</th></tr>
            </thead>
            <tbody>
                <?php echo $trInventarioBCalientes;?>
            </tbody>
        </table>

        <h1 style="text-align:center;">METODOS ARTESANALES</h1>
      <h5 style="text-align:center;">BEBIDAS PREPARADAS CON PRECISIÓN Y CUIDADO DE NUESTROS BARISTAS</h5>
        <table class="centered striped centered responsive-table">
            <thead>
                <tr><th>Imagen</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Opciones</th></tr>
            </thead>
            <tbody>
                <?php echo $trInventarioMArtesanales;?>
            </tbody>
        </table>

        <h1 style="text-align:center;">BEBIDAS FRÍAS</h1>
      <h5 style="text-align:center;"></h5>
        <table class="centered striped centered responsive-table">
            <thead>
                <tr><th>Imagen</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Opciones</th></tr>
            </thead>
            <tbody>
                <?php echo $trInventarioBFrias;?>
            </tbody>
        </table>

        <h1 style="text-align:center;">POSTRES</h1>
      <h5 style="text-align:center;"></h5>
        <table class="centered striped centered responsive-table">
            <thead>
                <tr><th>Imagen</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Opciones</th></tr>
            </thead>
            <tbody>
                <?php echo $trInventarioPostres;?>
            </tbody>
        </table>

        <h1 style="text-align:center;">PANQUÉS / GALLETAS / SCONES</h1>
      <h5 style="text-align:center;"></h5>
        <table class="centered striped centered responsive-table">
            <thead>
                <tr><th>Imagen</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Opciones</th></tr>
            </thead>
            <tbody>
                <?php echo $trInventarioPanquesGalletasScones;?>
            </tbody>
        </table>

        <h1 style="text-align:center;">SANDWICHES</h1>
      <h5 style="text-align:center;"></h5>
        <table class="centered striped centered responsive-table">
            <thead>
                <tr><th>Imagen</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Opciones</th></tr>
            </thead>
            <tbody>
                <?php echo $trInventarioSandwiches;?>
            </tbody>
        </table>

        <h1 style="text-align:center;">CAFÉ EN GRANO / PARA LA CASA</h1>
      <h5 style="text-align:center;"></h5>
        <table class="centered striped centered responsive-table">
            <thead>
                <tr><th>Imagen</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Opciones</th></tr>
            </thead>
            <tbody>
                <?php echo $trInventarioCafeGrano;?>
            </tbody>
        </table>

        <h1 style="text-align:center;">HAMBURGUESAS</h1>
      <h5 style="text-align:center;"></h5>
        <table class="centered striped centered responsive-table">
            <thead>
                <tr><th>Imagen</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Opciones</th></tr>
            </thead>
            <tbody>
                <?php echo $trInventarioHamburguesas;?>
            </tbody>
        </table>

	</div>
	</div>

  <div class="container">
		<div class="productos2">
    <h3 style="text-align:center;">CAFÉ</h3>
      <h1 style="text-align:center;"></h1>
        <table class="centered striped centered responsive-table">
            <thead>
                <tr><th><br><br>Imagen<br><br><br></th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Opciones</th></tr>
            </thead>
            <tbody>
                <?php echo $trInventarioCafe;?>
            </tbody>
        </table>
      
        <h3 style="text-align:center;">BEBIDAS CALIENTES</h3>
      <h5 style="text-align:center;">BEBIDAS RICAS Y SANAS</h5>
        <table class="centered striped centered responsive-table">
            <thead>
                <tr><th><br><br>Imagen<br><br><br></th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Opciones</th></tr>
            </thead>
            <tbody>
                <?php echo $trInventarioBCalientes;?>
            </tbody>
        </table>

        <h3 style="text-align:center;">METODOS ARTESANALES</h3>
      <h5 style="text-align:center;">BEBIDAS PREPARADAS CON PRECISIÓN Y CUIDADO DE NUESTROS BARISTAS</h5>
        <table class="centered striped centered responsive-table">
            <thead>
                <tr><th><br><br>Imagen<br><br><br></th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Opciones</th></tr>
            </thead>
            <tbody>
                <?php echo $trInventarioMArtesanales;?>
            </tbody>
        </table>

        <h3 style="text-align:center;">BEBIDAS FRÍAS</h3>
      <h5 style="text-align:center;"></h5>
        <table class="centered striped centered responsive-table">
            <thead>
                <tr><th><br><br>Imagen<br><br><br></th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Opciones</th></tr>
            </thead>
            <tbody>
                <?php echo $trInventarioBFrias;?>
            </tbody>
        </table>

        <h3 style="text-align:center;">POSTRES</h3>
      <h5 style="text-align:center;"></h5>
        <table class="centered striped centered responsive-table">
            <thead>
                <tr><th><br><br>Imagen<br><br><br></th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Opciones</th></tr>
            </thead>
            <tbody>
                <?php echo $trInventarioPostres;?>
            </tbody>
        </table>

        <h3 style="text-align:center;">PANQUÉS / GALLETAS / SCONES</h3>
      <h5 style="text-align:center;"></h5>
        <table class="centered striped centered responsive-table">
            <thead>
                <tr><th><br><br>Imagen<br><br><br></th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Opciones</th></tr>
            </thead>
            <tbody>
                <?php echo $trInventarioPanquesGalletasScones;?>
            </tbody>
        </table>

        <h3 style="text-align:center;">SANDWICHES</h3>
      <h5 style="text-align:center;"></h5>
        <table class="centered striped centered responsive-table">
            <thead>
                <tr><th><br><br>Imagen<br><br><br></th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Opciones</th></tr>
            </thead>
            <tbody>
                <?php echo $trInventarioSandwiches;?>
            </tbody>
        </table>

        <h3 style="text-align:center;">CAFÉ EN GRANO / PARA LA CASA</h3>
      <h5 style="text-align:center;"></h5>
        <table class="centered striped centered responsive-table">
            <thead>
                <tr><th><br><br>Imagen<br><br><br></th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Opciones</th></tr>
            </thead>
            <tbody>
                <?php echo $trInventarioCafeGrano;?>
            </tbody>
        </table>

        <h3 style="text-align:center;">HAMBURGUESAS</h3>
      <h5 style="text-align:center;"></h5>
        <table class="centered striped centered responsive-table">
            <thead>
                <tr><th><br><br>Imagen<br><br><br></th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Opciones</th></tr>
            </thead>
            <tbody>
                <?php echo $trInventarioHamburguesas;?>
            </tbody>
        </table>
        
	</div>
	</div>
  </div> <!-- /container-->
  </main>


  <footer class="page-footer brown lighten-1">
    <div class="container">
      <div class="row">
      <div class="col s12 m4 l2"><p></p></div>
        <div class="col s12 m12 l8 center-align">
          <h5 class="white-text">Gracias por su preferencia :)</h5>
          <h8 class="white-text">Visítanos en: </h8><br>
          <h8 class="white-text">Alarii 317, Barrio del Niño, 71250 Villa de Zaachila, Oax.</h8>
          <!--
            <p class="grey-text text-lighten-4">Dinos en qué podemos ayudarte</p>
          <div class="row">
            <form id="formContacto" autocomplete="off">
              <div class="input-field">
                <i class="fas fa-user prefix"></i>
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" data-validetta="required" data-vd-message-required="Falta tu nombre">
              </div>
              <div class="input-field">
                <i class="fas fa-envelope prefix"></i>
                <label for="correo">Correo</label>
                <input type="text" id="correo" data-validetta="required,email">
              </div>
              <div class="input-field">
                <i class="fas fa-pen prefix"></i>
                <label for="comentario">Comentario</label>
                <textarea id="comentario" class="materialize-textarea" data-validetta="required"></textarea>
              </div>
              <br>
              <button type="submit" class="btn brown" style="width: 100%;">Enviar</button>
            </form>
          </div>
          -->
        </div>
        
        <div class="col s12 m4 l2"><p></p></div>
        <!--
		<div class="col l4 offset-l2 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="https://www.escom.ipn.mx">ESCOM</a></li>
            <li><a class="grey-text text-lighten-3" href="https://www.ipn.mx">IPN</a></li>
          </ul>
        </div>
		-->
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