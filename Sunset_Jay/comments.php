<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @package Sunset
 * 
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$sunset_comment_count = get_comments_number();
?>

<div id="comments" class="comments-area default-max-width <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>" data-postid="<?php the_ID()   ;?>">

	

		<ol class="comment-list">
		</ol><!--.comment-list-->
	
		<?php
		$cpage = get_query_var('cpage');
         if($sunset_comment_count > 0) {
		 ?>
	       <div class="text-center" id="commentLoadMore" ><input type="button" class="btn btn-outline-dark" id="load_more" data-post="<?php echo the_ID()   ;?>" value="<?php esc_html_e('View Comments', 'sunset'); ?>" ></input></div>
		<?php  }

		
		?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'sunset' ); ?></p>
		<?php endif; ?>
	
  <div class="sunset-comment-form">
	<?php
	comment_form(
		array(
			'logged_in_as'       => null,
			'class_container'    => 'sunset-comment-respond',
			'title_reply'        => esc_html__( 'Leave a comment', 'sunset' ),
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title text-center">',
			'title_reply_after'  => '</h2>',
			'class_submit'       => 'btn btn-outline-dark btn-lg',
			'id_submit'          => 'commentSub',
			'cancel_reply_before' => '<p class="cancel-reply-link-text">',
			'cancel_reply_link'  => '',
			'cancel_reply_after' => '</p>',
		)
	);
	?>
</div><!-- .sunset-comment-form -->
</div><!-- #comments -->
