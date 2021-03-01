<?php
/*
====================================
     Enqueue style and scripts
====================================

*/

function theme2_enqueue_scripts()
{   
    $ver = wp_get_theme()->get('Version');
    wp_enqueue_style('custom-style', get_template_directory_uri()."/assets/css/theme2.css", array(), $ver, 'all');
    wp_enqueue_script('my-js', get_template_directory_uri()."/assets/js/main.js", array(), $ver, 'all',true);
}

add_action('wp_enqueue_scripts', 'theme2_enqueue_scripts');

/*
=====================================
          Menu Section
=====================================

*/

function theme2_custom_menu(){
    add_theme_support('menus');
    register_nav_menus(
        array(
            'primary'=>'Desktop Navigation',
            'footer'=>'Footer Menu'
        )
    );
}

add_action('init', 'theme2_custom_menu');

/*
======================================
         Theme Setup
======================================

*/
function theme2_theme_setup(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme2_theme_setup');
?>