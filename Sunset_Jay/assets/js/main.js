$(document).ready(function () {

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

  $(function () {
    $('[data-toggle="popover"]').popover()
  })

  $(window).on("unload", ()=>location.hash = window.pageYOffset );
  window.scrollTo(0, location.hash);
  
  let archive = location.pathname;
  archive = archive.split('/');
  console.log(archive);
 
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
      console.log(newPage)
      //$('#sunset-blog-posts-container').data('page', newPage);
      console.log(archive)
      let data = {
        page: newPage,
        action: 'sunset_load_more', // IT IS THE ACTION NAME WHICH SHOULD BE REGISTERD IN AJAX-HANDLER PHP PAGE
        archive_key : archive[2],
        archive_value : archive[3]
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

            //let pageNum = $('.load-more-post-container').last().data('page');
            // pageNum.toString();
            // history.replaceState(null, null, "/th-wp/page/"+pageNum);
            canBeLoaded = true;
			console.log(typeof response)

          } else {
            setTimeout(() => {
              $('#lazy-load-preloader').css('background-image', 'url("")').css('width', '100%')
                .append('<h5 id="no-post">Sorry !! No more posts found!!</h5>');
              $('#no-post').addClass('alert alert-danger').attr('role', 'alert').fadeOut(1500);
              console.log(typeof response)

            }, 300);
            canBeLoaded = false;





          }
        }
      })
    }
      

  })


  // FOR GALLERY IMAGE MODAL

  let images = $('.blocks-gallery-item img');
  let span = $('.close');

  images.each(function(index, element){
      $(this).click(function(){
        console.log(element)
        $('#modalContent').addClass('appear');
        $('#imgModal').css('display', 'block');
        $('#modalContent').attr('src', $(this).attr('src'));
      })
  })

 span.each(function(i){
   $(this).click(function(){
    $('#imgModal').css('display', 'none');
   })
 })
  


})