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
