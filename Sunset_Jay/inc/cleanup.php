<?php
/*
@package Sunset
*/

/* This removes version from generator meta tag */
function remove_wp_generator_version(){
    return "";
}

add_filter('the_generator', 'remove_wp_generator_version');

/*This remove version from all style and scripts */
function remove_wp_version_style_scripts($src){
    if(strpos($src, 'ver='.get_bloginfo( 'version'))){  /*Checking the version is inthe url string or not */
        $src = remove_query_arg('ver', $src);    /*If version is present then removes it */
    }
    return esc_url( $src );
}

add_filter('style_loader_src', 'remove_wp_version_style_scripts');
add_filter('script_loader_src', 'remove_wp_version_style_scripts');

?>