<?php
    session_start();
    if($_SESSION==null)
        $sesion=false;
    else    
        $sesion=true;

    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    mysqli_set_charset($conexion,"utf8");

    $sqlInventario = "SELECT * FROM inventario";
    $resInventario = mysqli_query($conexion,$sqlInventario);
    $trInventario = "";
    while($filas=mysqli_fetch_array($resInventario,2)){
        $trInventario .= "<tr><td><img src='./img/$filas[7]/$filas[5].jpg' alt='Imagen $filas[1]'/></td>
            <td>
                $filas[1]
            </td>
            <td>
                $filas[2]
            </td>
            <td>
                $$filas[4]
            </td>
            <td>";
        if($sesion)
            $trInventario.="<i class='fas fa-cart-plus addCarrito'></i>";
        else
            $trInventario.="<a src='./pages/login.html'><i class='fas fa-cart-plus'></i></a>";
                
        $trInventario .="</td>
        </tr>";
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
<link href="./materialize/css/materialize.min.css" rel="stylesheet">
<link href="./jscript/plugins/validetta101/validetta.min.css" rel="stylesheet">
<link href="./jscript/plugins/confirm334/jquery-confirm.min.css" rel="stylesheet">
<style>
  .justificado{
    text-align: justify;
  }

  .pieImg{
    font-size: smaller;
  }

  .input-field label {
    color: #FFF;
  }

  .titAzul{
    color: #006699;
  }

  body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }
</style>
<script src="./jscript/jquery-3.6.0.min.js"></script>
<script src="./materialize/js/materialize.min.js"></script>
<script src="./jscript/plugins/validetta101/validetta.min.js"></script>
<script src="./jscript/plugins/validetta101/validettaLang-es-ES.js"></script>
<script src="./jscript/plugins/confirm334/jquery-confirm.min.js"></script>
<script>
  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.slider').slider();
    $("#formContacto").validetta({
      bubblePosition: 'bottom',
      bubbleGapTop: 10,
      bubbleGapLeft: -5,
      onValid:function(){
        event.preventDefault();
        $.alert({
          title:"TWeb 2021-2",
          icon:"fas fa-code",
          theme:"material",
          boxWidth: '30%',
          useBootstrap: false,
          type: "red",
          content:"<p class='center-align blue'>Validaciones OK</p>",
          onDestroy:function(){
            location.reload();
          }
        });
      }
    });

  
  });
</script>
</head>
<body>
  <header>
    <div class="navbar-fixed">
    <nav class="brown lighten-1">
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo"><img src="./img/cafeLogo50.png">      &emsp;Cafetería ESCOM</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href='<?php if($sesion) echo "./pages/logout.php"; else echo "./pages/login.html";?>'><?php if($sesion) echo "Cerrar sesión"; else echo "Iniciar sesión";?></a></li>
          <li><a href="./pages/registro.html">Crear cuenta</a></li>
          <li><a href="">Ver perfil</a></li>
          <li><a href="">Carrito</a></li>
        </ul>
      </div>
    </nav> <!-- /menu -->
    </div>
    <ul class="sidenav" id="mobile-demo">
		<li><a href="./pages/login.html">Iniciar sesión</a></li>
		<li><a href="./pages/registro.html">Crear cuenta</a></li>
		<li><a href="">Ver perfil</a></li>
		<li><a href="">Carrito</a></li>
    </ul> <!-- /menu mobile-->
  </header>


  <main>
    <div class="slider">
      <ul class="slides">
        <li>
          <img src="./img/Carrusel/Arroz-3-leches.jpg"> <!-- random image -->
          <div class="caption center-align">
            <h3>Postres!</h3>
            <h5 class="light grey-text text-lighten-3">Arroz con leche</h5>
          </div>
        </li>
        <li>
          <img src="./img/Carrusel/chai-masala.jpg"> <!-- random image -->
          <div class="caption left-align">
            <h3>Bebidas frías!</h3>
            <h5 class="light grey-text text-lighten-3">Chai masala</h5>
          </div>
        </li>
        <li>
          <img src="./img/Carrusel/ciabatta-queso-cabra.jpg"> <!-- random image -->
          <div class="caption right-align">
            <h3>Aperitivos!</h3>
            <h5 class="light grey-text text-lighten-3">Ciabatta</h5>
          </div>
        </li>
        <li>
          <img src="./img/Carrusel/hamburguesa-bbq.jpg"> <!-- random image -->
          <div class="caption center-align">
            <h3>Comida!</h3>
            <h5 class="light grey-text text-lighten-3">Hamburguesa</h5>
          </div>
        </li>
      </ul>
    </div> <!-- /slider -->

    <div class="container">
		<div class="productos">
        <table class="centered striped highlight responsive-table">
                    <thead>
                        <tr><th>Imagen</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th></th></tr>
                    </thead>
                    <tbody>
                        <?php echo $trInventario;?>
                    </tbody>
                </table>
		</div>
	</div>
    </div> <!-- /container-->
  </main>


  <footer class="page-footer brown lighten-1">
    <div class="container">
      <!--<div class="row">-->
        <div class="col l6 s12 center-align">
          <h5 class="white-text">Contacto</h5>
          <p class="grey-text text-lighten-4">Envianos tus comentarios y/o sugerencias</p>
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
        </div>
        <!--
		<div class="col l4 offset-l2 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="https://www.escom.ipn.mx">ESCOM</a></li>
            <li><a class="grey-text text-lighten-3" href="https://www.ipn.mx">IPN</a></li>
          </ul>
        </div>
		-->
      <!--</div>-->
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