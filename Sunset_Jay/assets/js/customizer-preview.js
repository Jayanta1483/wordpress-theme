$(document).ready(function(){


  /* SHOWING/HIDING SITE NAME AND DESCRIPTION */

  wp.customize('header_textcolor', function(value){
    value.bind(function(newValue){
      if(newValue == 'blank'){
        $('.header-text').children().css('display' , 'none');
      }else{
        $('.header-text').children().css('display' , 'block');
      }
    })
  })


/* SITE NAME & SITE DESCRIPTON CHANGE */

  wp.customize('blogname', function(blogName){
    blogName.bind(function(updatedBlogName){
      $('.header-text h2').html(updatedBlogName);
    })
  })


  wp.customize('blogdescription', function(blogDesc){
    blogDesc.bind(function(updatedBlogDesc){
      $('.header-text h6').html(updatedBlogDesc);
    })
  })


/* HEADER TEXT COLOR */

wp.customize('header_textcolor', function(colorCode){
  colorCode.bind(function(newColorCode){
      let newColor = (newColorCode == '' || newColorCode == 'blank') ? '#000' : newColorCode;
      $('.header-text').children().css('color', newColor);
  })
})















/* SHOWING/HIDING READ MORE BUTTON */

  wp.customize('sunset_read_more_activation', function(readMoreActivationValue){
            readMoreActivationValue.bind(function(updateReadMoreActivationValue){
              if(true == updateReadMoreActivationValue){
                  $('.btn-container').removeClass('d-none');
              }else{
                 $('.btn-container').addClass('d-none');
              }
            })
  })


/* BUTTON BACKGROUND & TEXT COLOR */

  wp.customize('sunset_button_background_color', function(colorCode){
            colorCode.bind(function(updatedColorCode){
              $('.btn-container a.btn-sunset, #load_more, #commentSub').css({
                                          'border-color' : updatedColorCode,
                                          'color'        : updatedColorCode
                                        }).hover(function(){
                               $(this).css({
                              'background-color' : updatedColorCode,
                              'border-color'     : updatedColorCode,
                              'color'            : '#fff'

                              });
              },function(){
                  $(this).css({
                    'background-color' : 'rgba(255, 255, 255, 0)',
                    'color'            : updatedColorCode

                   });
              });
            })
  })

























































})
