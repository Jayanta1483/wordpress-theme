$(document).ready(function () {

  $('#btn-toogle').click(function () {
    $('#nav').toggleClass("nav-bg-trans nav-bg-dark");
  })


  let canBeLoaded = true;
  const bottomOffset = 1200;

  $(window).scroll(function () {

    if ($(document).scrollTop() > ($(document).height() - bottomOffset) && canBeLoaded) {

      let url = sunset_load_more_params.ajaxurl;
      let pageNum = $('#sunset-blog-posts-container').data('page');
      let newPage = pageNum + 1;
      $('#sunset-blog-posts-container').data('page', newPage);

      let data = {
        page: newPage,
        action: 'sunset_load_more'
      }

      $.ajax({
        method: 'post',
        url: url,
        data: data,
        error: function (response) {
          console.log(response);
          canBeLoaded = false;
        },
        beforeSend: function (xhr) {
          canBeLoaded = false;
          $('#lazy-load-preloader').css('background-image', 'url("/th-wp/wp-content/themes/Sunset_jay/assets/img/preloader.gif")');
        },
        success: function (response) {

          $('#sunset-blog-posts-container').append(response);
          canBeLoaded = true;

          if (response == '') {
            $('#lazy-load-preloader').css('display', 'none');
          }
        }
      })
    }
  })

})