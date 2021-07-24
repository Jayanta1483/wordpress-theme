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

function sunset_post_navigation($args = array())
{
     // Make sure the nav element has an aria-label attribute: fallback to the screen reader text.
     if ( ! empty( $args['screen_reader_text'] ) && empty( $args['aria_label'] ) ) {
        $args['aria_label'] = $args['screen_reader_text'];
    }

    $args = wp_parse_args(
        $args,
        array(
            'prev_text'          => '%title',
            'next_text'          => '%title',
            'in_same_term'       => false,
            'excluded_terms'     => '',
            'taxonomy'           => 'category',
            'screen_reader_text' => __('Post navigation'),
            'aria_label'         => __('Posts'),
            'class'              => 'post-navigation',
        )
    );

    $navigation = '';
 
    $previous = get_previous_post_link(
        '<div class="nav-previous sunset-nav-prev">%link</div>',
        $args['prev_text'],
        $args['in_same_term'],
        $args['excluded_terms'],
        $args['taxonomy']
    );
 
    $next = get_next_post_link(
        '<div class="nav-next sunset-nav-next">%link</div>',
        $args['next_text'],
        $args['in_same_term'],
        $args['excluded_terms'],
        $args['taxonomy']
    );
 
    // Only add markup if there's somewhere to navigate to.
    if ( $previous || $next ) {
        $navigation = _navigation_markup( $previous . $next, $args['class'], $args['screen_reader_text'], $args['aria_label'] );
    }
 
    return $navigation;
}
