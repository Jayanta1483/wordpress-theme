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
    if(!is_admin() && is_home() && $query->is_main_query(  )){
        $query->set('orderby', 'date');
        $query->set('order', 'ASC');
    }
}

function themeslug_query_vars( $qvars ) {
  $qvars[] = 'paged';
  return $qvars;
}
add_filter( 'query_vars', 'themeslug_query_vars' );

?>