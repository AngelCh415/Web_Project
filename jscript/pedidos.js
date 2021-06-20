$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.slider').slider();

    $(".fas").mouseover(function(){
        $(this).css("cursor","pointer");
    });

    $(".cancelarPedido").click(function(){
        let pedido = $(this).attr("data-pedido");
        let producto = $(this).attr("data-producto");
        $.confirm({
            title: '<h3>Cafetería ESCOM 2021</h3>',
            content: '¿Seguro que quieres cancelar el pedido?',
            buttons: {
                Sí: function () {
                    $.ajax({
                        url:"./cocineroCancelarPedido_AX.php",
                        method:"post",
                        data:{pedido:pedido,producto:producto},
                        cache:false,
                        success:function(respAX){
                            let AX = JSON.parse(respAX);
                            let tipo;
                            if(AX.codigo == 1) 
                                window.location.href = "./pedidos.php";
                            else{
                                tipo = "red";
                                $.alert({
                                    title:"<h3>Cafetería ESCOM 2021</h3>",
                                    content:AX.msj,
                                    type:tipo,
                                    icon:"fas fa-info-circle fa-2x",
                                    boxWidth: "50%",
                                    useBootstrap: false,
                                    onDestroy:function(){
                                    if(AX.codigo == 2)
                                        window.location.href = "./saldoCliente.php";
                                    }
                                });
                            }
                        }
                    });
                },
                No: function () {
                    $.alert('Canceled!');
                }
            }
        });
    });

    $(".completarPedido").click(function(){
        let pedido = $(this).attr("data-pedido");
        let producto = $(this).attr("data-producto");
        $.ajax({
            url:"./cocineroCompletarPedido_AX.php",
            method:"post",
            data:{pedido:pedido,producto:producto},
            cache:false,
            success:function(respAX){
                let AX = JSON.parse(respAX);
                let tipo;
                if(AX.codigo == 1) 
                    window.location.href = "./pedidos.php";
                else{
                    tipo = "red";
                    $.alert({
                        title:"<h3>Cafetería ESCOM 2021</h3>",
                        content:AX.msj,
                        type:tipo,
                        icon:"fas fa-info-circle fa-2x",
                        boxWidth: "50%",
                        useBootstrap: false,
                        onDestroy:function(){
                        }
                    });
                }
            }
        });
    });
});