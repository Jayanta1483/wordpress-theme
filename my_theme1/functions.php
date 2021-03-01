<?php


/*
======================================
      Theme Support
======================================

*/

function theme1_theme_setup(){
     add_theme_support('title-tag');
     add_theme_support('menus');
     add_theme_support('custom-logo');
     add_theme_support('post-thumbnails');
     register_nav_menus(
         array(
             'primary'=>'Desktop Vertical-left Menu',
              'footer'=>'Footer Menu'
             )
        );
}

add_action('init', 'theme1_theme_setup');






/*
=======================================
   Include Style Sheets & Scripts
=======================================
*/



function theme1_register_styles()
{   
    $version = wp_get_theme()->get('Verson');
    wp_enqueue_style("my_theme1_css", get_template_directory_uri()."/style.css", array("my_theme1_bootstrap"), $version, "all");
    wp_enqueue_style("my_theme1_bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(),"4.4.1", "all");
    wp_enqueue_style("my_theme1_fontawesome", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(),"5.13.0", "all");
}

add_action("wp_enqueue_scripts", "theme1_register_styles");


function theme1_register_scripts()
{   
    wp_enqueue_script("my_theme1_jquery", "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), "all", true);
    wp_enqueue_script("my_theme1_popper", "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), "all", true);
    wp_enqueue_script("my_theme1_bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), "all", true);
    wp_enqueue_script("my_theme1_main", get_template_directory_uri()."/assets/js/main.js", array(), "all", true);
}

add_action("wp_enqueue_scripts", "theme1_register_scripts");


/*
===========================================
    Include Walker Class
===========================================
*/

require get_template_directory()."/class-wp-bootstrap-navwalker.php";


/*

============================================
    Sidebar and Widgets
============================================


*/

function theme1_widget_areas(){
       register_sidebar(
           array(
               'before_title'=>'<h3>',
               'after_title'=>'</h3>',
               'before_widget'=>'',
               'after_widget'=>'',
               'name'=>'Sidebar Area',
               'id'=>'sidebar-1',
               'description'=>'Sidebar Widget Area'
           )
           );
           register_sidebar(
            array(
                'before_title'=>'<h5 style="color:white;">',
                'after_title'=>'</h5>',
                'before_widget'=>'',
                'after_widget'=>'',
                'name'=>'Footer Area',
                'id'=>'footer-1',
                'description'=>'Footer Widget Area'
            )
            );
}

add_action('widgets_init', 'theme1_widget_areas');


?>