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