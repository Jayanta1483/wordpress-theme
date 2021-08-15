$(document).ready(function () {

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

  $(function () {
    $('[data-toggle="popover"]').popover()
  })

  // TO SHOW COMMENTS COUNT ON LOAD
$(window).on('load', function(){
  sunsetGetCommentsCount();

})
 
  $(window).on("unload", () => location.hash = window.pageYOffset);
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

  images.each(function (index, element) {
    $(this).click(function () {
      console.log(element)
      $('#modalContent').addClass('appear');
      $('#imgModal').css('display', 'block');
      $('#modalContent').attr('src', $(this).attr('src'));
    })
  })

  span.each(function (i) {
    $(this).click(function () {
      $('#imgModal').css('display', 'none');
    })
  })



  /*
  =============================
    AJAX FOR COMMENT SECTION
  =============================
  */


  function sunsetGetCommentsCount()
  {
    const url = sunset_ajax_params.ajaxurl;
    let postID = $('#comments').data('postid');
    postID = postID.toString();
    let data = {
      action : 'sunset_comments_count',
      post_id : postID
    }

    $.post(url, data, function(response){
      console.log(response)
        let commentsCount = response;
        $('.comments-title #comment_num').html(commentsCount);
      });
  }




  $('#commentSub').click(function(e){
    e.preventDefault();
    
    const url = sunset_ajax_params.ajaxurl;
    let formData = $('#commentform').serialize();
    
    let data = formData+'&action=sunset_comments';
    
    console.log(data)

    $.ajax({
      method : 'post',
      url : url,
      data : data,
      error: function (request, status, error) {
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
            alert(error+' : '+request.responseText);
            break;
        }
      },
      success : function(response){
        console.log(response)
        let res = JSON.parse(response);
        
        if(res.id != 0){
        let id = res.id.toString();
        let eleId = '#comment-'+id;
          console.log(eleId);
          $(eleId).append('<ol class="children" id="children-'+id+'"></ol>');
          $('#children-'+id).append(res.comment_html);
          sunsetGetCommentsCount();
          $('#commentform')[0].reset();
        }else{
          $('.comment-list').append(res.comment_html);
          sunsetGetCommentsCount();
          $('#commentform')[0].reset();
        }
      }
    })

  })



  



  // $('.comment-reply-link').click(function(e){
  //   e.preventDefault();
  //   $('#cancel-comment-reply-link').css('display', 'block');
  // })

  // let commentform = $('#commentform'); // find the comment form
  // commentform.prepend('<div id="comment-status" ></div>'); // add info panel before the form to provide feedback or errors
  // let statusdiv = $('#comment-status'); // define the info panel
  // let list;
  // $('a.comment-reply-link').click(function () {
  //   list = $(this).parent().parent().parent().attr('id');
  // });

  // commentform.submit(function (e) {
  //   // e.preventDefault();
  //   //serialize and store form data in a letiable
  //   let formdata = commentform.serialize();
  //   //Add a status message
  //   statusdiv.html('<p>Processing…</p>');
  //   //Extract action URL from commentform
  //   let formurl = commentform.attr('action');
  //   //Post Form with data

  //   $.ajax({
  //     type: 'post',
  //     url: formurl,
  //     data: formdata,
  //     error: function (XMLHttpRequest, textStatus, errorThrown) {
  //       statusdiv.html('<p class="ajax-error" >You might have left one of the fields blank, or be posting too quickly</p>');
  //     },
  //     success: function (data, textStatus) {
  //       if (data == "success" || textStatus == "success") {
  //         statusdiv.html('<p class="ajax-success" >Thanks for your comment. We appreciate your response.</p>');
  //         console.log(data);

  //         if ($("#commentsbox").has("ol.commentlist").length > 0) {
  //           if (list != null) {
  //             $('div.rounded').prepend(data);
  //           }
  //           else {
  //             $('ol.commentlist').append(data);
  //          }
  //         }
  //         else {
  //           $("#commentsbox").find('div.post-info').prepend('<ol class="commentlist"> </ol>');
  //           $('ol.commentlist').html(data);
  //         }
  //       } else {
  //         statusdiv.html('<p class="ajax-error" >Please wait a while before posting your next comment</p>');
  //         commentform.find('textarea[name=comment]').val('');
  //       }
  //     }
  //   });
  //   return false;
  // });


















})