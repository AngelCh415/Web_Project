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

  
  });