<?php
        session_start();

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
    
        require "./../phpmailer/src/Exception.php";
        require "./../phpmailer/src/PHPMailer.php";
        require "./../phpmailer/src/SMTP.php";
    
        /* ********************************** */
        //Puedo conectarme a la BD y hacer las operaciones necesarias, de tal manera que puedo recuperar información particular e incluirla en el PDF
        $correo = $_REQUEST["correo"];
        $conexion = mysqli_connect("localhost","root","","cafeteria2021");
        mysqli_set_charset($conexion,"utf8");
        $sqlCheckCorreo = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $resUsuario = mysqli_query($conexion, $sqlCheckCorreo);
        $infUsuario = mysqli_fetch_row($resUsuario);

        $_SESSION["recuperacionContrasena"] = $correo; 
        
        /* ********************************** */
    
        //Create a new PHPMailer instance
        $mail = new PHPMailer();

        if(mysqli_num_rows($resUsuario) == 1){
            //Tell PHPMailer to use SMTP
        $mail->isSMTP();
    
        //Enable SMTP debugging
        //SMTP::DEBUG_OFF = off (for production use)
        //SMTP::DEBUG_CLIENT = client messages
        //SMTP::DEBUG_SERVER = client and server messages
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->SMTPDebug = SMTP::DEBUG_OFF;

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        //Use `$mail->Host = gethostbyname('smtp.gmail.com');`
        //if your network does not support SMTP over IPv6,
        //though this may cause issues with TLS
    
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
    
        //Set the encryption mechanism to use - STARTTLS or SMTPS
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
    
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "maildelproyectocafe@gmail.com";
    
        //Password to use for SMTP authentication
        $mail->Password = "patitasGrises34";
    
        //Set who the message is to be sent from
        $mail->setFrom('maildelproyectocafe@gmail.com', 'Cafeteria ESCOM 2021');
    
        //Set an alternative reply-to address
        //$mail->addReplyTo('replyto@example.com', 'First Last');
    
        //Set who the message is to be sent to
        $mail->addAddress($infUsuario[2], $infUsuario[1]);
    
        //Set the subject line
        $mail->Subject = 'Recuperación de contraseña - Cafetería ESCOM 2021';

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML("<h3>Cafetería ESCOM 2021.</h3><p>Hola $infUsuario[1].<br><br>Ingresa al siguiente link para recuperar tu contraseña.<br><br><a href='http://localhost/Web_semestre/Web_Project/pages/crearNuevaContrasena.html'>Nueva contraseña</a><br>Atte. Administración.</p>");
    
        //Replace the plain text body with one created manually
        $mail->AltBody = 'Cafetería ESCOM 2021. Recupere su contraseña.';
    
        //Attach an image file
        //$mail->addAttachment("./pdfs/$infAlumno[0].pdf");
    
        //send the message, check for errors
        if (!$mail->send()) {
            echo 'No se pudo enviar el correo, favor de intentar de nuevo';
        } else {
            echo 'El enlace ha sido enviado a tu correo, puedes cerrar esta pestaña.';
            //Section 2: IMAP
            //Uncomment these to save your message in the 'Sent Mail' folder.
            #if (save_mail($mail)) {
            #    echo "Message saved!";
            #}
        }
        } else{
            echo "<br>Correo no válido, favor de intentar de nuevo <br><a href='http://localhost/Web_semestre/Web_Project/pages/recuperar.html'>Recuperar contraseña</a>";
        }

        
?>