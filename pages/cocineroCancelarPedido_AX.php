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
    
    $sqlCheckSaldo = "SELECT * FROM detalle_pedido WHERE id_pedido = '$pedido' AND id_producto = '$producto'";
    $resultadoCheckSaldo = mysqli_query($conexion,$sqlCheckSaldo);
    $infPedido = mysqli_fetch_row($resultadoCheckSaldo);
    $cantidad = $infPedido[2];
    $usuario = $infPedido[3];
    
    if(mysqli_num_rows($resultadoCheckSaldo) == 1){

        $sqlCheckPrecio = "SELECT * FROM inventario WHERE id_producto = '$producto'";
        $resultadoCheckPrecio = mysqli_query($conexion,$sqlCheckPrecio);
        $infPrecio = mysqli_fetch_row($resultadoCheckPrecio);
        $precio = $infPrecio[4];

        $sqlCheckUsuario = "SELECT * FROM usuarios WHERE id_usuario = '$usuario'";
        $resultadoCheckUsuario = mysqli_query($conexion,$sqlCheckUsuario);
        $infUsuario = mysqli_fetch_row($resultadoCheckUsuario);
        $saldoAnterior = $infUsuario[6];
        $saldoRegresado = $cantidad*$precio;
        $nuevoSaldo = $saldoAnterior + $saldoRegresado;

        $sql = "UPDATE `cafeteria2021`.`detalle_pedido` SET estado = '2' WHERE id_pedido = '$pedido' AND id_producto = '$producto'";
        $sqlSaldo = "UPDATE `cafeteria2021`.`usuarios` SET saldo = '$nuevoSaldo' WHERE id_usuario = '$usuario'";
        $resultado = mysqli_query($conexion,$sql);
        
        if(mysqli_affected_rows($conexion) == 1){

            $resultadoSaldo = mysqli_query($conexion,$sqlSaldo);

            $html = "<h2>Anuncio de cancelación de pedido</h2><p>Hola $infUsuario[1], por desgracia surgió un problema y no se puede realizar tu pedido de $cantidad unidades de $infPrecio[1]</p><p>Pero no te preocupes, se han regresado $$saldoRegresado a tu cuenta y puedes volver a usar ese saldo en cualquier momento.</p><br><p>Gracias por tu comprensión y preferencia</p><br>Atte. Administración.";

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
            $mail->Subject = 'Cancelacion de pedido - Cafeteria ESCOM 2021';
            $mail->msgHTML("$html");
        
            //Replace the plain text body with one created manually
            $mail->AltBody = 'Cancelacion de pedido, saldo actualizado';
            if (!$mail->send()) {
                echo 'No se pudo enviar el correo, favor de intentar de nuevo';
            } else {
                $respAX_JSON["codigo"]= 1;
                $respAX_JSON["msj"] = "<h3>Logrado $infUsuario[2]</h3>";
            }
        } else{
            $respAX_JSON["codigo"]= 0;
            $respAX_JSON["msj"] = "<h3>Error, favor de intentarlo de nuevo :c </h3>";
        }
    } else{

        $respAX_JSON["codigo"]= 2;
        $respAX_JSON["msj"] = "<h3>Error, favor de intentarlo de nuevo :c </h3>";
    }
    echo json_encode($respAX_JSON);
?>