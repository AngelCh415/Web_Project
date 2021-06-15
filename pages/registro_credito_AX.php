<?php
    $archivo = $_FILES["archivo"];

    //$_FILES["archivo"]["name"];

    //hasta que no se hagan las validaciones php no sube el archivo, los sube de forma temporal a un directorio y los renombra
    $dirUploads = "./files/"; //ruta donde se pondrán los datos
    $archUpload = $dirUploads.$archivo["name"]; //le vuelvo a cambiar el nombre y accedo a él


    //con upload_max_filesize podemos modificar el tamaño máximo
    $respAX_JSON = array();
    if(move_uploaded_file($archivo["tmp_name"],$archUpload)){ //pasa de donde estaba de forma temporal a donde sí queremos que esté
        $respAX_JSON["codigo"]= 1;
        $respAX_JSON["msj"] = "<h3>Se ha agregado el saldo, en breve se verá reflejado</h3>";
    }else{
        $respAX_JSON["codigo"]= 2;
        $respAX_JSON["msj"] = "<h3>Hubo un error, por favor intente de nuevo</h3>";
    }
    echo json_encode($respAX_JSON);
?>