<?php
    session_start();

    $conexion = mysqli_connect("localhost","root","","cafeteria2021");
    mysqli_set_charset($conexion,"utf8");

    $correoAdmin = $_SESSION["login"];
    
    date_default_timezone_set('America/Mexico_City');
    $hoy = date("F j, Y, g-i a");

    $sqlAdmin = "SELECT * FROM usuarios WHERE correo = '$correoAdmin'";
    $resAdmin = mysqli_query($conexion, $sqlAdmin);
    $infAdmin = mysqli_fetch_row($resAdmin);
    
    //Prepar mi 'página HTML' que se convertirá a PDF, considerando las limitaciones en cuanto soporte de etiquetas HTML y propiedades CSS que ofrece la clase mPDF
    $html = '
    <style>
    .resaltar{
        color:#ffecb3;
        font-family:"Verdana";
        font-weight: bold;
    }
    h1,h2{
        color:#795548  ;
        text-align: center;
        font-family:"Verdana";
        font-weight: bold;
    }
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }  
    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }     
    tr:nth-child(even) {
        background-color: #dddddd;
    }
    </style>
    <h1><a name="top"></a>Reporte Diario - Cafetería ESCOM</h1>
    <br><br>
    <h2>Reporte de inventario</h2>
    <h4>Este es el estado actual del inventario</h4>
    <table>
    <tr>
        <th>Producto</th><th>Existencia</th><th>Precio</th>
    </tr>';

    $sqlInv = "SELECT * FROM inventario";
    $resInv = mysqli_query($conexion, $sqlInv);
    while($filas = mysqli_fetch_array($resInv, MYSQLI_BOTH )){ 
        $html .= '<tr>
            <td>'.$filas[1].'</td>
            <td>'.$filas[3].' unidades</td>
            <td>$'.$filas[4].'</td>
        </tr>';
    }
    $html .= '</table>
    <br><p style="color: blue;">Recuerda que puedes editar el inventario siguiendo este QR</p>';
    $html .= "<barcode code='http://localhost/Web_semestre/web_Project/pages/adminManejarInventario.php' type='QR' class='barcode' size='1.5' error='M' />";



    require_once('./../vendor/autoload.php');
    $mpdf = new \Mpdf\Mpdf();
    $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']); //L para horizontal, P para vertical
    $mpdf->SetWatermarkText("Cafetería ESCOM"); //marca de agua
    $mpdf->showWatermarkText = true;

    $mpdf->WriteHTML($html);
    $mpdf->output(); //para solo mostrar el pdf
    //$mpdf->Output("./pdfs/$boleta.pdf","F"); //Si necesitamos que el archivo se guarde en una ubicación especifica
    //header("location:./administracion.php"); //En complemento a la línea anterior, en cuanto se genere y guarde el archivo, direccionar de manera automática a nuestro usuario a otra página
    exit;
?>