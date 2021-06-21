<?php
    $pedido = $_POST["pedido"];
    $producto = $_POST["producto"];

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require "./../phpmailer/src/Exception.php";
    require "./../phpmailer/src/PHPMailer.php";
    require "./../phpmailer/src/SMTP.php";

    $respAX_JSON = array();
    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    
    $sqlCheckPedido = "SELECT * FROM detalle_pedido WHERE id_pedido = '$pedido' AND id_producto = '$producto'";
    $resultadoCheckPedido = mysqli_query($conexion,$sqlCheckPedido);
    $infPedido = mysqli_fetch_row($resultadoCheckPedido);
    $cantidad = $infPedido[2];
    $usuario = $infPedido[3];

    $sqlCheckInv = "SELECT * FROM inventario WHERE id_producto = '$producto'";
    $resultadoCheckInv = mysqli_query($conexion,$sqlCheckInv);
    $infInv = mysqli_fetch_row($resultadoCheckInv);
    $nuevoInv = $infInv[3] - $infPedido[2];

    if($nuevoInv >= 0){
        if(mysqli_num_rows($resultadoCheckPedido) == 1){
            $sql = "UPDATE `cafeteria2021`.`detalle_pedido` SET estado = '1' WHERE id_pedido = '$pedido' AND id_producto = '$producto'";
            $resultado = mysqli_query($conexion,$sql);
            if(mysqli_affected_rows($conexion) == 1){

                $sqlInv = "UPDATE `cafeteria2021`.`inventario` SET existencia = '$nuevoInv' WHERE id_producto = '$producto'";
                $resultadoInv = mysqli_query($conexion,$sqlInv);

                $sqlCheckUsuario = "SELECT * FROM usuarios WHERE id_usuario = '$usuario'";
                $resultadoCheckUsuario = mysqli_query($conexion,$sqlCheckUsuario);
                $infUsuario = mysqli_fetch_row($resultadoCheckUsuario);
                
                $html = "<h2>Anuncio de pedido completado</h2><p>Hola $infUsuario[1], se ha completado y enviado tu pedido de $cantidad unidades de $infInv[1] y en breve llegará a tus manos</p><br><p>Gracias por tu preferencia</p><br>Atte. Administración.";

                /* envio del correo */
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->SMTPDebug = SMTP::DEBUG_OFF;
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->SMTPAuth = true;
                $mail->Username = "maildelproyectocafe@gmail.com";
                $mail->Password = "patitasGrises34";
                $mail->setFrom('maildelproyectocafe@gmail.com', 'Cafeteria ESCOM 2021');
                $mail->addAddress($infUsuario[2], $infUsuario[1]);
            
                //Set the subject line
                $mail->Subject = 'Pedido completado - Cafeteria ESCOM 2021';
                $mail->msgHTML("$html");
            
                //Replace the plain text body with one created manually
                $mail->AltBody = 'Pedido completado, pronto te llegará';
                if (!$mail->send()) {
                    echo 'No se pudo enviar el correo, favor de intentar de nuevo';
                } else {
                    $respAX_JSON["codigo"]= 1;
                    $respAX_JSON["msj"] = "<h3>Logrado</h3>";
                }
            } else{
                $respAX_JSON["codigo"]= 0;
                $respAX_JSON["msj"] = "<h3>Error, favor de intentarlo de nuevo :c </h3>";
            }
        } else{

            $respAX_JSON["codigo"]= 2;
            $respAX_JSON["msj"] = "<h3>Error, favor de intentarlo de nuevo :c </h3>";
        }
    } else{
        $respAX_JSON["codigo"]= 2;
        $respAX_JSON["msj"] = "<h3>No hay suficiente material para armar este pedido</h3>";
    }
    echo json_encode($respAX_JSON);
?>