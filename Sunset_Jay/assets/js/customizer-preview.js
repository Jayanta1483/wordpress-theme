$(document).ready(function(){
  wp.customize('sunset_read_more_activation', function(readMoreActivationValue){
            readMoreActivationValue.bind(function(updateReadMoreActivationValue){
              if(true == updateReadMoreActivationValue){
                  $('.btn-container').removeClass('d-none');
              }else{
                 $('.btn-container').addClass('d-none');
              }
            })
  })

})
