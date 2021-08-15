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







?>