$(document).ready(function(){
    $("input#archivo").on("change",function(){ //poner atención a lo que suceda en el input archivo, cuando sufra un cambio activa la función
        let archivo = $("input#archivo"); //recuperamos la referencia a ese archivo
        
        if(archivo[0].files.length > 0){ 
        }else{
            alert("No hay archivo seleccionado");
        }
    });


    $("form#formRegistroCredito").submit(function(e){
        e.preventDefault();
        var formData = new FormData($("form#formRegistroCredito")[0]); //con jquery tengo acceso al elemento pero accedo al primer índice para realmente tener acceso a él
        $.ajax({
            url:"registroCredito_AX.php",
            method:"post",
            data:formData, //con esto uso js puro
            cache:false,
            contentType:false, //Importante colocar siempre que se pretenda enviar un archivo al servidor
            processData:false, //Importante colocar siempre que se pretenda enviar un archivo al servidor
            success:function(respAX){
                let AX = JSON.parse(respAX);
                let tipo;
                if(AX.codigo == 1) tipo = "green"; else tipo = "red";
                $.alert({
                    title:"<h3>Cafetería ESCOM 2021</h3>",
                    content:AX.msj,
                    type:tipo,
                    icon:"fas fa-info-circle fa-2x",
                    boxWidth: "50%",
                    useBootstrap: false,
                    onDestroy:function(){
                    if(AX.codigo == 1)
                        window.location.href = "./login.html";
                    }
                });
            }
        });
    });
});