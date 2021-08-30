<?php
/*

@package Sunset

This page is for handling ajax calls

 */


/*
=========================
  POSTS INFINITE SCROLL
=========================
*/

add_action('wp_ajax_nopriv_sunset_load_more', 'sunset_load_more_callback');
add_action('wp_ajax_sunset_load_more', 'sunset_load_more_callback');


function sunset_load_more_callback()
{
    $paged = (!empty($_POST['page'])) ? esc_sql($_POST['page']) : '';

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'ASC',
        'paged' => $paged
    );

    if(!empty($_POST['archive_key']) && !empty($_POST['archive_value'])){
        $archive_name = ($_POST['archive_key'] == 'category') ? 'category_name' : esc_sql($_POST['archive_key']);

        $args[$archive_name] = esc_sql($_POST['archive_value']);
        //$arg['order'] = 'ASC';
    }

    $load_more_qry = new WP_Query($args);

    if ($load_more_qry->have_posts()) { ?>
        <div class="load-more-post-container" data-page='<?php echo $paged   ;?>'>
            <?php
            while ($load_more_qry->have_posts()) {
                $load_more_qry->the_post();
                get_template_part('template-parts/content', get_post_format());
            }

            wp_reset_postdata(); ?>
        </div>
<?php  }

    wp_die();
}




/*
=====================
  COMMENTS DISPLAY
=====================
*/



add_action('wp_ajax_nopriv_sunset_comments', 'sunset_comments_callback');
add_action('wp_ajax_sunset_comments', 'sunset_comments_callback');


function sunset_comments_callback()
{
    $check_ajax = check_ajax_referer('sunset_comment_form-wpnonce', 'sunset_comment_nonce');

    if( ! $check_ajax)
    {
        wp_die();
    }

    $comment = wp_handle_comment_submission( wp_unslash( $_POST ) );
    if ( is_wp_error( $comment ) ) {
        $data = (int) $comment->get_error_data();
        if ( ! empty( $data ) ) {
            wp_die(
                '<p>' . $comment->get_error_message() . '</p>',
                __( 'Comment Submission Failure' ),
                array(
                    'response'  => $data,
                    'back_link' => true,
                )
            );
        } else {
            wp_die('Unknown Error');
        }
    }

    $user            = wp_get_current_user();
    $cookies_consent = ( isset( $_POST['wp-comment-cookies-consent'] ) );

    do_action( 'set_comment_cookies', $comment, $user, $cookies_consent );


    $comment_depth = 1;
	$comment_parent = $comment->comment_parent;
	while( $comment_parent ){
		$comment_depth++;
		$parent_comment = get_comment( $comment_parent );
		$comment_parent = $parent_comment->comment_parent;
	}


    $GLOBALS['comment'] = $comment;
	$GLOBALS['comment_depth'] = $comment_depth;


    ob_start();

    sunset_comments_list_callback($comment, $args=array('max_depth'=> 6), $comment_depth);

    $comment_html = ob_get_clean();
    $output = array();
    $output['id'] = (int)$comment->comment_parent;
    $output['comment_html'] = $comment_html;


    echo json_encode($output);

    wp_die();

}



/*
=====================
  COMMENTS COUNT
=====================
*/



add_action('wp_ajax_nopriv_sunset_comments_count', 'sunset_comments_count_callback');
add_action('wp_ajax_sunset_comments_count', 'sunset_comments_count_callback');

function sunset_comments_count_callback()
{
    $post_id = $_POST['post_id'];
    $sunset_comments_count = get_comments_number($post_id);

    echo $sunset_comments_count;

    wp_die();
}


/*
==================================
  COMMENTS PAGINATION->LOAD MORE
==================================
*/

add_action('wp_ajax_nopriv_comments_load_more', 'sunset_comments_load_more_callback');
add_action('wp_ajax_comments_load_more', 'sunset_comments_load_more_callback');

function sunset_comments_load_more_callback()
{

   $post_id = $_REQUEST['post_id'];


ob_start();

$comments = get_comments(array(
    'post_id' => $post_id,
    'status'  => 'approve'
));

wp_list_comments(
    array(
        'avatar_size' => 60,
        'style'       => 'ol',
        'short_ping'  => true,
        'callback'    => 'sunset_comments_list_callback',
        'reverse_top_level' => false



    ),
    $comments
);



$comments_list = ob_get_clean();

echo $comments_list;
    wp_die();
}




/*
=======================
     POPULARITY
=======================
*/

add_action('wp_ajax_nopriv_sunset_ajax_popular', 'sunset_ajax_popular_callback');
add_action('wp_ajax_sunset_ajax_popular', 'sunset_ajax_popular_callback');


function sunset_ajax_popular_callback()
{
   if(! empty($_REQUEST['stat']) && ! empty($_REQUEST['post']))
   {

	   $status = $_REQUEST['stat'];
	   $post_id = esc_sql($_REQUEST['post']);
	   $meta_value_like = (! empty(get_post_meta($post_id, 'like', true))) ? get_post_meta($post_id, 'like', true) : 0;
	   $meta_value_dislike = (! empty(get_post_meta($post_id, 'dislike', true))) ? get_post_meta($post_id, 'dislike', true) : 0;


	   if($status == 'like')
	   {
           $meta_value_like++;
		   update_post_meta($post_id, 'like', $meta_value_like);
		   $num = get_post_meta($post_id, 'like', true);
		   $response = array('stat'=>'L', 'num'=>$num);

	   }else{
		   $meta_value_dislike++;
		   update_post_meta($post_id, 'dislike', $meta_value_dislike);
		   $num = get_post_meta($post_id, 'dislike', true);
		   $response = array('stat'=>'D', 'num'=>$num);


	   }

	   $meta_pop = ($meta_value_like > $meta_value_dislike) ? ($meta_value_like - $meta_value_dislike) : '';

	   if(! empty($meta_pop))
	   {
		   update_post_meta($post_id, 'meta_pop', $meta_pop);
	   }

	   echo json_encode($response);

	   wp_die();

   }
}



/*
===================
    CONTACT FORM
===================
*/

add_action('wp_ajax_nopriv_sunset_contact_form_submission', 'sunset_contact_form_submission_callback');
add_action('wp_ajax_sunset_contact_form_submission', 'sunset_contact_form_submission_callback');

function sunset_contact_form_submission_callback()
{
  $check_ajax = check_ajax_referer('sunset_contact_form-wpnonce', 'sunset_contact_form');

  if(! $check_ajax){ wp_die(); }

  if(empty($_REQUEST['name'])){

    echo "You are required to provide your name.";

}elseif(empty($_REQUEST['email'])){

   echo "You are required to provide your email.";

}elseif(empty($_REQUEST['message'])){

  echo "You are required to provide some message.";


}else{
  $name = wp_strip_all_tags($_REQUEST['name']);
  $email = wp_strip_all_tags($_REQUEST['email']);
  $message = wp_strip_all_tags($_REQUEST['message']);

  if(! filter_var($email, FILTER_VALIDATE_EMAIL)) {

     echo "Email id is invalid.";
     wp_die();
  }
  $args = array(
    'post_type'   => 'sunset-contact',
    'post_title'  =>  $name,
    'post_status' => 'publish',
    'post_content' => $message,
    'meta_input'  => array('_contact_email_value_key' => $email)
  );
  $post_id = wp_insert_post($args);

  if($post_id != 0){
     $to = EMAIL;
     $subject = 'Sunset Contact Form - '. $name;
     $headers[] = 'From: '.get_bloginfo('name').'<'.$to.'>' ;
     $headers[] = 'Reply-To: '.$name.' <'.$email.'>';
    

    if(wp_mail($to, $subject, $message, $headers)){
      echo 1;
    }

  }

  else{
    echo 'Something went wrong. Please try again!!';
  }
}
  wp_die();
}


























?>
