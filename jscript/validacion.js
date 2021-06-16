$(document).ready(function(){
    $("form#formRecupear").validetta({
        bubblePosition:"bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            e.preventDefault();
            $.ajax({
                url:"./recuperacion_AX.php",
                method:"post",
                data:$("form#formRecupear").serialize(),
                cache:false,
                success:function(respAX){
                    let AX = JSON.parse(respAX);
                    let tipo;
                    if(AX.codigo == 1) tipo = "green"; else tipo = "red";
                    $.alert({
                        title:"<h3>Correo enviado</h3>",
                        content:AX.msj,
                        type:tipo,
                        icon:"fas fa-info-circle fa-2x",
                        boxWidth: "50%",
                        useBootstrap: false,
                        onDestroy:function(){
                        if(AX.codigo == 1)
                            window.location.href = "./../index.html";
                        }
                    });
                }
            });
        }
    });
});



