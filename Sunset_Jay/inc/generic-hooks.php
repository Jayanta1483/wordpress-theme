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
  
    if(!is_admin() && (is_home() || is_archive(  )) && $query->is_main_query(  )){
        $query->set('orderby', 'date');
        $query->set('order', 'ASC');
    }
}

add_filter( "term_links-post_tag", 'sunset_term_link_modyfication_callback', 10, 1 );

function sunset_term_link_modyfication_callback($links)
{
  
  return str_replace('rel="tag"', 'target="_blank" rel="tag"', $links);
  
}

?>