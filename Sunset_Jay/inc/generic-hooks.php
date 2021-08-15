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

































?>