<?php
/*
====================================
     Enqueue style and scripts
====================================

*/

function theme2_enqueue_scripts()
{   
    $ver = wp_get_theme()->get('Version');
    //css
    wp_enqueue_style('bootstrap-css', get_template_directory_uri()."/assets/css/bootstrap.min.css", array(), '4.3.1', 'all');
    wp_enqueue_style('custom-style', get_template_directory_uri()."/assets/css/theme2.css", array(), $ver, 'all');
    

    //js
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri()."/assets/js/bootstrap.min.js", array(), '4.3.1', 'all',true);
    wp_enqueue_script('my-js', get_template_directory_uri()."/assets/js/main.js", array(), $ver, 'all',true);
    
}

add_action('wp_enqueue_scripts', 'theme2_enqueue_scripts');




/*
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


require get_template_directory()."/inc/class-wp-bootstrap-navwalker.php";

/*
======================================
         Theme Setup
======================================

*/
function theme2_theme_setup(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-background');
    add_theme_support('custom-header');
    add_theme_support('post-formats',array('aside','image','video'));
   	

}
add_action('after_setup_theme', 'theme2_theme_setup');

?>