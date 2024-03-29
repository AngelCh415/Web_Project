$(document).ready(function(){
    $("form#formLogin").validetta({
        bubblePosition:"bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            e.preventDefault();
            $.ajax({
                url:"./login_AX.php",
                method:"post",
                data:$("form#formLogin").serialize(),
                cache:false,
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
                            window.location.href = "./../index.php";
                        }
                    });
                }
            });
        }
    });
});