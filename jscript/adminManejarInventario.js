$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.slider').slider();

    $(".fas").mouseover(function(){
        $(this).css("cursor","pointer");
    });

    $(".aumentarInventario").click(function(){
        let nombre = $(this).attr("data-nombre");
        $.confirm({
            title: '<h3>Cafetería ESCOM 2021</h3>',
            content: '' +
            '<form action="" class="formInventario">' +
            '<div class="form-group">' +
            '<label><h5>Ingresa el número de materiales a agregar</h5></label>' +
            '<input type="text" placeholder="0" class="inventario form-control" required />' +
            '</div>' +
            '</form>',
            buttons: {
                formSubmit: {
                    text: 'Agregar',
                    btnClass: 'btn-blue',
                    action: function () {
                        var numInventario = this.$content.find('.inventario').val();
                        if(!numInventario){
                            $.alert('Por favor ingresa un numero');
                            return false;
                        }
                        $.ajax({
                            url:"./adminAgregarInventario_AX.php",
                            method:"post",
                            data:{nombre:nombre,numInventario:numInventario},
                            cache:false,
                            success:function(respAX){
                                let AX = JSON.parse(respAX);
                                let tipo;
                                if(AX.codigo == 1) 
                                    window.location.href = "./adminManejarInventario.php";
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

    $(".disminuirInventario").click(function(){
        let nombre = $(this).attr("data-nombre");
        $.confirm({
            title: '<h3>Cafetería ESCOM 2021</h3>',
            content: '' +
            '<form action="" class="formInventario">' +
            '<div class="form-group">' +
            '<label><h5>Ingresa el número de materiales a eliminar</h5></label>' +
            '<input type="text" placeholder="0" class="inventario form-control" required />' +
            '</div>' +
            '</form>',
            buttons: {
                formSubmit: {
                    text: 'Eliminar',
                    btnClass: 'btn-blue',
                    action: function () {
                        var numInventario = this.$content.find('.inventario').val();
                        if(!numInventario){
                            $.alert('Por favor ingresa un numero');
                            return false;
                        }
                        $.ajax({
                            url:"./adminEliminarInventario_AX.php",
                            method:"post",
                            data:{nombre:nombre,numInventario:numInventario},
                            cache:false,
                            success:function(respAX){
                                let AX = JSON.parse(respAX);
                                let tipo;
                                if(AX.codigo == 1) 
                                    window.location.href = "./adminManejarInventario.php";
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