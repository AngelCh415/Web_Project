$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.slider').slider();

    $(".fas").mouseover(function(){
        $(this).css("cursor","pointer");
    });

    $(".aumentarSaldo").click(function(){
        let correo = $(this).attr("data-correo");

        $.confirm({
            title: '<h3>Cafetería ESCOM 2021</h3>',
            content: '' +
            '<form action="" class="formSaldo">' +
            '<div class="form-group">' +
            '<label><h5>Ingresa el saldo que quieres agregar</h5></label>' +
            '<input type="text" placeholder="$0.0" class="saldo form-control" required />' +
            '</div>' +
            '</form>',
            buttons: {
                formSubmit: {
                    text: 'Actualizar',
                    btnClass: 'btn-blue',
                    action: function () {
                        var saldo = this.$content.find('.saldo').val();
                        if(!saldo){
                            $.alert('Por favor ingresa un saldo');
                            return false;
                        }
                        $.ajax({
                            url:"./adminSaldoCliente_AX.php",
                            method:"post",
                            data:{correo:correo,saldo:saldo},
                            cache:false,
                            success:function(respAX){
                                let AX = JSON.parse(respAX);
                                let tipo;
                                if(AX.codigo == 1) 
                                    window.location.href = "./adminSaldoCliente.php";
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
                                            window.location.href = "./adminSaldoCliente.php";
                                        }
                                    });
                                }
                            }
                        });
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