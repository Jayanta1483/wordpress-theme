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





add_action('comment_form', 'sunset_comment_form_nonce_callback');

function sunset_comment_form_nonce_callback()
{
  $sunset_comment_nonce = wp_nonce_field('sunset_comment_form-wpnonce', 'sunset_comment_nonce');

  return $sunset_comment_nonce;
}



add_filter('nonce_life', 'sunset_nonce_life_mod');

function sunset_nonce_life_mod()
{
  return 1800;
}




/*
=======================
  SIDEBAR TAGS SIZE
=======================
*/

add_filter('widget_tag_cloud_args', 'sunset_tag_size');

function sunset_tag_size($args)
{
  $args['smallest'] = 10;
  $args['largest'] = 10;

  return $args;
}


/*
=====================
   SMTP SETTINGS
=====================
*/

/* To modify wp core phpmailer class parameters*/
add_action('phpmailer_init', 'sunset_smtp_callback');

function sunset_smtp_callback($phpmailer)
{
  $phpmailer->SMTPDebug = 0;
  $phpmailer->isSMTP();
  $phpmailer->Host       = 'smtp.gmail.com';
  $phpmailer->SMTPAuth   = true;
  $phpmailer->Username   = EMAIL;
  $phpmailer->Password   = PASS;
  $phpmailer->SMTPSecure = 'ssl';
  $phpmailer->Port       = 465;
  $phpmailer->FromName = 'Sunset';
}

/* To replace default 'From' email address*/
function replace_user_mail_from( $from_email ) {
    return 'nemojoy2001@gmail.com';
}
add_filter( 'wp_mail_from', 'replace_user_mail_from' );


/* To Display wp_mail errors */
add_action( 'wp_mail_failed', 'onMailError', 10, 1 );
function onMailError( $wp_error ) {
    echo "<pre>";
    print_r($wp_error);
    echo "</pre>";
}




















?>
