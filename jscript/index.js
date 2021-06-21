$(document).ready(function(){
  $('.sidenav').sidenav();
  $('.slider').slider();
  $("#formContacto").validetta({
    bubblePosition: 'bottom',
    bubbleGapTop: 10,
    bubbleGapLeft: -5,
    onValid:function(){
      event.preventDefault();
      $.alert({
        title:"TWeb 2021-2",
        icon:"fas fa-code",
        theme:"material",
        boxWidth: '30%',
        useBootstrap: false,
        type: "red",
        content:"<p class='center-align blue'>Validaciones OK</p>",
        onDestroy:function(){
          location.reload();
        }
      });
    }
  });
  $(".addCarrito").click(function(){
    let usr=$(this).attr("data-usr");
    let prod=$(this).attr("data-prod");
    $.ajax({
      url: "pages/addCarrito.php",
      method: "post",
      data: {usuario:usr,producto:prod},
      cache: false,
      success:function(respAX){
        let AX = JSON.parse(respAX);
        let tipo;
        if(AX.codigo == 1) tipo = "green"; else tipo = "red";
        $.alert({
          title: 'Aviso',
          content: AX.mensaje,
          type: tipo,
          icon: 'fas fa-info-circle fa-2x',
          boxWidth: '50%',
          useBootstrap: false,
      });
      }
    });
  });
});