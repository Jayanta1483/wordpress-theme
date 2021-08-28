$(document).ready(function() {

  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })

  $(function() {
    $('[data-toggle="popover"]').popover()
  })

  // TO SHOW COMMENTS COUNT ON LOAD
  $(window).on('load', function() {
    sunsetGetCommentsCount();

  })

  $(window).on("unload", () => location.hash = window.pageYOffset);
  window.scrollTo(0, location.hash);

  let archive = location.pathname;
  archive = archive.split('/');
  console.log(archive);

  $('#btn-toogle').click(function() {
    $('#nav').toggleClass("nav-bg-trans nav-bg-dark");
  })


  let canBeLoaded = true;
  const bottomOffset = 1000;

  $(window).scroll(function() {



    if ($(document).scrollTop() > ($(document).height() - bottomOffset) && canBeLoaded) {

      let url = sunset_ajax_params.ajaxurl;
      let page = $('.load-more-post-container').last().data('page');

      let newPage = page + 1;

      // console.log(archive)
      let data = {
        page: newPage,
        action: 'sunset_load_more', // IT IS THE ACTION NAME WHICH SHOULD BE REGISTERD IN AJAX-HANDLER PHP PAGE
        archive_key: archive[2],
        archive_value: archive[3]
      }

      $.ajax({
        method: 'post',
        url: url,
        data: data,

        beforeSend: function(xhr) {

          canBeLoaded = false;
          $('#lazy-load-preloader').css('background-image', 'url("/th-wp/wp-content/themes/Sunset_jay/assets/img/preloader.gif")');

        },

        error: function(response) {
          console.log(response);
          canBeLoaded = false;
        },

        success: function(response) {

          if (response != "") {

            $('#sunset-blog-posts-container').append(response);
            $('.load-more-post-container article').addClass('reveal');

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

  images.each(function(index, element) {
    $(this).click(function() {
      console.log(element)
      $('#modalContent').addClass('appear');
      $('#imgModal').css('display', 'block');
      $('#modalContent').attr('src', $(this).attr('src'));
    })
  })

  span.each(function(i) {
    $(this).click(function() {
      $('#imgModal').css('display', 'none');
    })
  })



  /*
  =============================
    AJAX FOR COMMENT SECTION
  =============================
  */

  /* FOR COMMENTS COUNT */

  function sunsetGetCommentsCount() {
    const url = sunset_ajax_params.ajaxurl;
    let postID = $('#comments').data('postid');
    //postID = (postID != '') ? postID.toString() : '';
    let data = {
      action: 'sunset_comments_count',
      post_id: postID
    }

    $.post(url, data, function(response) {
      console.log(response)
      let commentsCount = response;
      $('.comments-title #comment_num').html(commentsCount);
    });
  }


  /* FOR COMMENT SUBMIT */

  $('#commentSub').click(function(e) {
    e.preventDefault();

    const url = sunset_ajax_params.ajaxurl;
    let formData = $('#commentform').serialize();

    let data = formData + '&action=sunset_comments';

    console.log(data)

    $.ajax({
      method: 'post',
      url: url,
      data: data,
      error: function(request, status, error) {
        switch (request.status) {
          case 400:
            alert('Server understood the request, but request content was invalid.');
            break;
          case 401:
            alert('Unauthorized access.');
            break;
          case 403:
            alert('Forbidden resource can\'t be accessed.');
            break;
          case 500:
            alert('Internal server error.');
            break;
          case 500:
            alert('Service unavailable.');
            break;

          default:
            alert(error + ' : ' + request.responseText);
            break;
        }
      },
      success: function(response) {
        console.log(response)
        let res = JSON.parse(response);

        if (res.id != 0) {
          let id = res.id.toString();
          let eleId = '#comment-' + id;
          console.log(eleId);
          $(eleId).append('<ol class="children" id="children-' + id + '"></ol>');
          $('#children-' + id).append(res.comment_html);
          sunsetGetCommentsCount();
          $('#commentform')[0].reset();
        } else {
          $('.comment-list').append(res.comment_html);
          sunsetGetCommentsCount();
          $('#commentform')[0].reset();
        }
      }
    })

  })



  /* FOR COMMENT LOAD MORE */

  $('#load_more').click(function() {
    const postID = $(this).data('post');
    const url = sunset_ajax_params.ajaxurl;
    let data = {
      action: 'comments_load_more',
      post_id: postID
    }
    console.log(data)
    $.ajax({
      url: url,
      data: data,
      error: function(xhr, error) {
        console.log(xhr.responseText)
      },
      beforeSend: function() {
        $('#load_more').val('Loading...');
      },
      success: function(response) {
        setTimeout(() => {
          $('.comment-list').html(response);
          $('#load_more').css('display', 'none');
        }, 850);


      }

    });

  })





  /*
  ============
    SIDEBAR
  ============
  */

  $('#sidebar-close').click(function() {
    $('.sunset-sidebar').removeClass('visibility-visible').addClass('visibility-hidden').css('z-index', '-1');
    $('.sunset-sidebar-container').removeClass('slide-in').addClass('slide-out');
    $('body').css('overflowY', 'auto');
    //$('span.sidebar-open').css('z-index', '5');
  })

  $('span.sidebar-open').click(function() {
    // $(this).css('z-index', '1');
    $('.sunset-sidebar').css('z-index', '8').removeClass('visibility-hidden').addClass('visibility-visible');

    $('.sunset-sidebar-container').removeClass('slide-out').addClass('slide-in');
    $('body').css('overflowY', 'hidden');
  })




  /*
  ==================
     POPULARITY
  ==================
  */

  $('#like').click(function() {
    const url = sunset_ajax_params.ajaxurl;
    let stat = $(this).data('status');
    let postID = $(this).data('post');
    data = {
      action: 'sunset_ajax_popular',
      stat: stat,
      post: postID
    };

    $.post(url, data, function(response) {
      let res = JSON.parse(response);
      if (res.stat == 'L') {
        alert('Added to Liked Post');
        $('#like').css('color', 'orange');
        $('#lnum').html(res.num);
      }
    });
  })

  $('#dislike').click(function() {
    const url = sunset_ajax_params.ajaxurl;
    let stat = $(this).data('status');
    let postID = $(this).data('post');
    data = {
      action: 'sunset_ajax_popular',
      stat: stat,
      post: postID
    };

    $.post(url, data, function(response) {
      let res = JSON.parse(response);
      if (res.stat == 'D') {
        alert('Added to Disliked Post');
        $('#dislike').css('color', 'orange');
        $('#dnum').html(res.num);
      }
    });
  })



/*
=========================
  AJAX FOR CONTACT FORM
=========================
*/



$('#contactSub').click(function(e){
  e.preventDefault();

    const contactFormData = $('#contactForm').serialize();
    const url = sunset_ajax_params.ajaxurl;
    const data = contactFormData+'&action=sunset_contact_form_submission';
   console.log(data);
    $.ajax({
      url: url,
      method: 'post',
      data: data,
      error: function(){

      },
      beforeSend: function(xhr){
          $('#contactSub').val('Processing...');
      },
      success: function(response){

        if(response != 1){
          $('#contactSub').val('Submit');
          $('#contactAlertContentWarning').html('<strong>Warning!!</strong> '+response);
          $('#contactFormAlertWarning').fadeIn().toggleClass('slide-down slide-up');

          setTimeout(()=>{
            $('#contactFormAlertWarning').toggleClass('slide-up slide-down').fadeOut('slow');
          }, 2000);
        }else{
          $('#contactForm')[0].reset();
          $('#contactSub').val('Submit');
          $('#contactAlertContentSuccess').html('<strong>Congratulations!!</strong> You have submitted your message Succssfully.');
          $('#contactFormAlertSuccess').fadeIn().toggleClass('slide-down slide-up');

          setTimeout(()=>{
            $('#contactFormAlertSuccess').toggleClass('slide-up slide-down').fadeOut('slow');
          }, 3000);
        }

      }
    });
})


$('#contactFormAlertSuccess button').click(function(){
  $('#contactFormAlertSuccess').toggleClass('slide-up slide-down');
})

$('#contactFormAlertWarning button').click(function(){
  $('#contactFormAlertWarning').toggleClass('slide-up slide-down');
})




})
