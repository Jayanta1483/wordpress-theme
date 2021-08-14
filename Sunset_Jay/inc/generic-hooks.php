<?php
/*
@package Sunset

This file contains all generic hooks & functions for the theme

*/

/*
======================
  REORDER BLOG POSTS
======================
*/


add_action( 'pre_get_posts', 'sunset_reorder_posts' );

function sunset_reorder_posts($query)
{  
  
    if(!is_admin() && (is_home() || is_archive(  ) || is_single(  )) && $query->is_main_query(  )){
        $query->set('orderby', 'date');
        $query->set('order', 'ASC');
    }
}

add_filter( "term_links-post_tag", 'sunset_term_link_modyfication_callback', 10, 1 );

function sunset_term_link_modyfication_callback($links)
{
  
  return str_replace('rel="tag"', 'target="_blank" rel="tag"', $links);
  
}

add_filter( 'sunset_post_nav_class', 'sunset_post_nav_class_handler' );

function sunset_post_nav_class_handler($class)
{
  $class .= ' sunset-post-navigation';

  return $class;
}




function ajaxify_comments_jaya($comment_ID, $comment_status) {
  global $post;
  if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
  //If AJAX Request Then
  switch ($comment_status) {
  case '0':
  //notify moderator of unapproved comment
  wp_notify_moderator($comment_ID);
  case '1': //Approved comment
  echo "success";
  $commentdata = &get_comment($comment_ID, ARRAY_A);
  //print_r( $commentdata);
  $permaurl = get_permalink( $post->ID );
  
  $url = str_replace('http://', '/', $permaurl);
  
  if($commentdata['comment_parent'] == 0){
  $output = '<li class="comment byuser comment-author-admin bypostauthor odd alt thread-odd thread-alt depth-1" id="comment-' . $commentdata['comment_ID'] . '">
  <div id="div-comment-' . $commentdata['comment_ID'] . '" class="comment-body">
  <div class="comment-author vcard">'.
  get_avatar($commentdata['comment_author_email'])
  .'<cite class="fn">' . $commentdata['comment_author'] . '</cite> <span class="says">says:</span>
  </div>
  
  <div class="comment-meta commentmetadata"><a href="http://localhost/WordPress_Code/?p=1#comment-'. $commentdata['comment_ID'] .'">' .
  get_comment_date( 'F j, Y \a\t g:i a', $commentdata['comment_ID']) .'</a>&nbsp;&nbsp;';
  if ( is_user_logged_in() ){
  $output .= '<a class="comment-edit-link" href="'. home_url() .'/wp-admin/comment.php?action=editcomment&amp;c='. $commentdata['comment_ID'] .'">
  (Edit)</a>';
  }
  $output .= '</div>
  <p>' . $commentdata['comment_content'] . '</p>
  <div class="reply">
  <a class="comment-reply-link" href="'. $url . '&amp;replytocom='. $commentdata['comment_ID'] .'#respond"
  onclick="return addComment.moveForm(&quot;div-comment-'. $commentdata['comment_ID'] .'&quot;, &quot;'. $commentdata['comment_ID'] . '&quot;, &quot;respond&quot;, &quot;1&quot;)">Reply</a>
  </div>
  </div>
  </li>' ;
  
  // echo $output;
  
  }
  else{
  
  $output = '<ol class="children"> <li class="comment byuser comment-author-admin bypostauthor even depth-2″ id="comment-' . $commentdata['comment_ID'] . '">
  <div id="div-comment-' . $commentdata['comment_ID'] . '" class="comment-body">
  <div class="comment-author vcard">'.
  get_avatar($commentdata['comment_author_email'])
  .'<cite class="fn">' . $commentdata['comment_author'] . '</cite> <span class="says">says:</span> </div>
  
  <div class="comment-meta commentmetadata"><a href="http://localhost/WordPress_Code/?p=1#comment-'. $commentdata['comment_ID'] .'">' .
  get_comment_date( 'F j, Y \a\t g:i a', $commentdata['comment_ID']) .'</a>&nbsp;&nbsp;';
  if ( is_user_logged_in() ){
  $output .= '<a class="comment-edit-link" href="'. home_url() .'/wp-admin/comment.php?action=editcomment&amp;c='. $commentdata['comment_ID'] .'">
  (Edit)</a>';
  }
  
  $output .= '</div>
  <p>' . $commentdata['comment_content'] . '</p>
  <div class="reply">
  <a class="comment-reply-link" href="'. $url .'&amp;replytocom='. $commentdata['comment_ID'] .'#respond"
  onclick="return addComment.moveForm(&quot;div-comment-'. $commentdata['comment_ID'] .'&quot;, &quot;'. $commentdata['comment_ID'] . '&quot;, &quot;respond&quot;, &quot;1&quot;)">Reply</a>
  </div>
  </div>
  </li></ol>' ;
  
  echo $output;
  }
  
  $post = &get_post($commentdata['comment_post_ID']);
  wp_notify_postauthor($comment_ID, $commentdata['comment_type']);
  break;
  default:
  echo "error";
  }
  exit;
  }
  }
  
  // add_action('comment_post', 'ajaxify_comments_jaya', 25, 2);

?>