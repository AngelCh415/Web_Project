$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.slider').slider();

    $(".fas").mouseover(function(){
        $(this).css("cursor","pointer");
    });

    $(".aumentarInventario").click(function(){
        let correo = $(this).attr("data-correo");
        $.confirm({
            title: '<h3>Cafetería ESCOM 2021</h3>',
            content: '' +
            '<form action="" class="formInventario">' +
            '<div class="form-group">' +
            '<label><h5>Ingresa el número de productos a agregar</h5></label>' +
            '<input type="text" placeholder="0" class="inventario form-control" required />' +
            '</div>' +
            '</form>',
            buttons: {
                formSubmit: {
                    text: 'Agregar',
                    btnClass: 'btn-blue',
                    action: function () {
                        var saldo = this.$content.find('.saldo').val();
                        if(!saldo){
                            $.alert('Por favor ingresa un numero');
                            return false;
                        }
                        $.confirm({ //preguntamos al usuario si realmente quiere eliminar
                            title: '<h3>Cafetería ESCOM 2021</h3>',
                            content: '¿Estás seguro de cargar el saldo?',
                            buttons: {
                                Si: function () {//si lo confirma vamos a esta función, el Si es el texto que pondrá en el botón
                                    $.ajax({
                                        url:"./saldoCliente_AX.php",
                                        method:"post",
                                        data:{correo:correo,saldo:saldo},
                                        cache:false,
                                        success:function(respAX){
                                            let AX = JSON.parse(respAX);
                                            let tipo;
                                            if(AX.codigo == 1) 
                                                window.location.href = "./saldoCliente.php";
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
                                No: function () {//si no pues no hacemos nada
                                },
                            }
                        });
                        //$.alert('Se agregarán $' + saldo +' pesos');
                        //window.location.href = "./correoSaldoCliente.php?correo="+correo+",saldo="+saldo;
                    }
                },
                cancelar: function () {
                    //close
                },
            },
            onContentReady: function () {
                // bind to events
                var jc = this;
                this.$content.find('form').on('submit', function (e) {
                    // if the user submits the form by pressing enter in the field.
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                });
            }
        });
    });
});