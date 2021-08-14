<?php
/*

@package Sunset

This file is for all generic functions for the theme


 */


function sunset_get_data_page_num()
{
    $page_num = (isset($_GET['page']) && !empty($_GET['page'])) ? esc_sql($_GET['page']) : '1';

    echo $_GET['page'];
}


/*
========================
   POST NAVIGATION
========================
 */

function sunset_post_navigation()
{
    

    $navigation = '<nav class="navigation post-navigation sunset-post-navigation mt-5 mb-5" role="navigation" aria-label="'.$args["aria_label"].'">
                      <div class="nav-links row">';
 
    $previous = get_previous_post_link(
        '<div class="nav-previous sunset-post-prev"><< %link</div>', '%title');
 
    $next = get_next_post_link(
        '<div class="nav-next sunset-post-next">%link >></div>', '%title');
   
    $navigation .= '<div class="col col-lg-6" >'.$previous.'</div>';
    $navigation .= '<div class="col col-lg-6 text-right" >'.$next.'</div>';
   $navigation .= '</div></nav>';
 
    return $navigation;
}


/*
==========================
  SOCIAL MEDIA SHAREING
==========================
*/

function sunset_social_media_sharing()
{
    $output = '<div class="social-media-container text-center">
       Share this with:
          <ul class="social-media-share">
          <li   data-href="https://www.facebook.com/jayanta.sarkar.10" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2Fjayanta.sarkar.10&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook"></i></a></li>
          <li><a href="#" ><i class="fab fa-twitter"></i></a></li>
          <li><a href="#" ><i class="fab fa-instagram"></i></a></li>
        </ul>
        </div>';

    return $output;
}








/*
==============================
  WP_COMMENTS_LIST CALLBACK
==============================
*/

function sunset_comments_list_callback($comment, $args=array('max_depth'=> 6), $depth){ ?>
  
  
   <li id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '', $comment ); ?>>
          <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
             <footer class="comment-meta">
                <div class="comment-author vcard">
                   <?php echo get_avatar( $comment, $args['avatar_size'] = 60 ); ?>
                   <?php printf( __( '%s <span class="says">says:</span>' ), sprintf( '<b class="fn">%s</b>', get_comment_author_link( $comment ) ) ); ?>
                </div><!-- .comment-author -->
 
                <div class="comment-metadata">
                   <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                      <time datetime="<?php comment_time( 'c' ); ?>">
                         <?php
                            /* translators: 1: comment date, 2: comment time */
                            printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() );
                         ?>
                      </time>
                   </a>
                   <?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
                </div><!-- .comment-metadata -->
 
                <?php if ( '0' == $comment->comment_approved ) : ?>
                <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
                <?php endif; ?>
             </footer><!-- .comment-meta -->
 
             <div class="comment-content">
                <?php comment_text(); ?>
             </div><!-- .comment-content -->
             <?php
             comment_reply_link( array_merge( $args, array(
                'add_below' => 'div-comment',
                'depth'     => $depth,
                'max_depth' => $args['max_depth'],
                'before'    => '<div class="reply">',
                'after'     => '</div>'
             ) ) );
             ?>
          </article><!-- .comment-body -->
           
          <?php   
}