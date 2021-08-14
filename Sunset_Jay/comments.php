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

	<?php
	if ( have_comments() ) :
		;
		?>
		<h2 class="comments-title mb-5"><span id="comment_num"></span>
		
			<?php if ( '1' === $sunset_comment_count ) : ?>
				<?php esc_html_e( ' comment', 'sunset' ); ?>
			<?php else : ?>
				<?php
				esc_html_e( ' comments', 'sunset' );
				?>
			<?php endif; ?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
	
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 60,
					'style'       => 'ol',
					'short_ping'  => true,
					'callback'    => 'sunset_comments_list_callback'
					
					
				)
			);
			?>
		</ol><!--.comment-list-->
	
		<?php
		the_comments_pagination(
			array(
				/* translators: There is a space after page. */
				'before_page_number' => esc_html__( 'Page ', 'sunset' ),
				'mid_size'           => 0,
				'prev_text'          => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					'&laquo;',
					esc_html__( 'Older comments', 'sunset' )
				),
				'next_text'          => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					esc_html__( 'Newer comments', 'sunset' ),
					'&raquo;'
				),
			)
		);
		?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'sunset' ); ?></p>
		<?php endif; ?>
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
