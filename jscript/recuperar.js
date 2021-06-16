$(document).ready(function(){
    $("form#formRecuperar").validetta({
        bubblePosition:"bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            e.preventDefault();
            let correo = document.getElementById("correo").value;
            window.location.href = "./recuperar_AX.php?correo="+correo;
        }
    });
});


