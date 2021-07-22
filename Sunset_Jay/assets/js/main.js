$(document).ready(function () {

  $(window).on("unload", function(){
    // let pathName = location.pathname;
    // sessionStorage.setItem(pathName,  $(document).scrollTop());

    location.hash = window.pageYOffset;
   
   })
  window.scrollTo(0, location.hash);
  //  const myPath = "/th-wp/";
  //  let scrollPos = (location.pathname == myPath) ? sessionStorage.getItem(myPath) : '';
  //  $(document).scrollTop(scrollPos);
   
    
 
  $('#btn-toogle').click(function () {
    $('#nav').toggleClass("nav-bg-trans nav-bg-dark");
  })


  let canBeLoaded = true;
  const bottomOffset = 1000;

  $(window).scroll(function () {

    if($(document).scrollTop() > 50 ){
      
      // let scrollPos = sessionStorage.getItem("scrollPos");
      // console.log(scrollPos);
    }

    if ($(document).scrollTop() > ($(document).height() - bottomOffset) && canBeLoaded) {

      let url = sunset_load_more_params.ajaxurl;
      let page = $('.load-more-post-container').last().data('page');

      let newPage = page + 1;
      //$('#sunset-blog-posts-container').data('page', newPage);
      console.log(page, $('.load-more-post-container'))
      let data = {
        page: newPage,
        action: 'sunset_load_more' // IT IS THE ACTION NAME WHICH SHOULD BE REGISTERD IN AJAX-HANDLER PHP PAGE
      }

      $.ajax({
        method: 'post',
        url: url,
        data: data,

        beforeSend: function (xhr) {

          canBeLoaded = false;
          $('#lazy-load-preloader').css('background-image', 'url("/th-wp/wp-content/themes/Sunset_jay/assets/img/preloader.gif")');

        },

        error: function (response) {
          console.log(response);
          canBeLoaded = false;
        },

        success: function (response) {

          if (response != "") {

            $('#sunset-blog-posts-container').append(response);
            $('.load-more-post-container article').addClass('reveal');

            let pageNum = $('.load-more-post-container').last().data('page');
            pageNum.toString();
            history.replaceState(null, null, "/th-wp/page/"+pageNum);
            canBeLoaded = true;

          } else {
            setTimeout(() => {
              $('#lazy-load-preloader').css('background-image', 'url("")').css('width', '100%')
                .append('<h5 id="no-post">Sorry !! No more posts found!!</h5>');
              $('#no-post').fadeOut(1500);

            }, 300);
            canBeLoaded = false;





          }
        }
      })
    }
      

  })


 
  


})