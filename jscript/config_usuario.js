$(document).ready(function(){
    $(".cambiarEMail").click(function(){
        $("#email").removeAttr("disabled");
        $("#btnUpdate").removeAttr("disabled");
    });

    $(".cambiarPhone").click(function(){
        $("#phone").removeAttr("disabled");
        $("#btnUpdatePhone").removeAttr("disabled");
    });

    $("form#formMail").validetta({
        onValid:function(){
            event.preventDefault();
            $.ajax({
                url:"./config_usuario_AX.php",
                method:"post",
                data:$("form#formMail").serialize(),
                cache:false,
                success:function(respAX){
                    if(respAX=="Error, ese correo ya está registrado."){
                        $.alert({
                            title: 'Aviso',
                            content: respAX,
                            icon: 'fas fa-info-circle fa-2x',
                            boxWidth: '50%',
                            useBootstrap: false,
                        });
                    }else{
                        $.alert({
                            title: 'Aviso',
                            content: respAX,
                            icon: 'fas fa-info-circle fa-2x',
                            boxWidth: '50%',
                            useBootstrap: false,
                            onDestroy: function(){
                                window.location.href="./logout.php";
                            },
                        });
                    }                    
                }
            });
        }
    });
    $("form#formPhone").validetta({
        onValid:function(){
            event.preventDefault();
            $.ajax({
                url:"./config_phone_AX.php",
                method:"post",
                data:$("form#formPhone").serialize(),
                cache:false,
                success:function(respAX){
                    $.alert({
                        title: 'Aviso',
                        content: respAX,
                        icon: 'fas fa-info-circle fa-2x',
                        boxWidth: '50%',
                        useBootstrap: false,
                        onDestroy: function(){
                            window.location.href="./config_usuario.php";
                        },
                    });
                }
            });
        }
    });
    $(".cambiarContrasena").click(function(){
        let usr=$(this).attr("data-usr");
        $.ajax({
            url: "./setSessionPwd_AX.php",
            method: "post",
            data: {usuario:usr},
            cache: false,
            success:function(respAX){
                window.location.href="./crearNuevaContrasena.html";
            }
        });
    });
});