<?php
/*
@package sunset_jay theme

=================================
    ADMIN ENQUEUE FUNCTIONS
=================================
 */


function sunset_load_admin_scripts($hook){
    if($hook != 'toplevel_page_sunset-sidebar'){ return; }
    wp_enqueue_style( 'sunset_admin', get_template_directory_uri().'/assets/css/sunset-admin.css', array(), '1.0', 'all' );

    wp_enqueue_media( );

    wp_enqueue_script( 'sunset_admin_script', get_template_directory_uri().'/assets/js/sunset-admin.js', array('jquery'), '1.0', true );
}

add_action('admin_enqueue_scripts', 'sunset_load_admin_scripts');



/*
====================================
   ENQUEUE FUNCTIONS FOR FRONTEND
====================================

*/

function sunset_theme_frontend_scripts(){
    wp_enqueue_style( 'sunset_bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '4.6', 'all' );
    wp_enqueue_style( 'sunset_theme', get_template_directory_uri().'/assets/css/sunset.css', array(), '1.0', 'all' );

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri(  ).'/assets/js/jquery.js', false, '3.6.0', true );

    wp_enqueue_script( 'jquery' );



    wp_enqueue_script( 'sunset_script_main', get_template_directory_uri().'/assets/js/main.js', array('jquery'), '4.6', true );
    wp_enqueue_script( 'sunset_script', get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js', array('jquery'), '4.6', true );
    wp_enqueue_script('sunset_icons', "https://kit.fontawesome.com/46b79071a9.js", array()  );


    wp_localize_script( 'sunset_script_main', 'sunset_ajax_params', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )

     ) );


}


add_action( 'wp_enqueue_scripts', 'sunset_theme_frontend_scripts' );


/*
===========================================
   ENQUEUE FUNCTIONS FOR CUSTOMIZER API
===========================================

*/


function sunset_customizer_controls_scripts_enqueue()
{
  wp_enqueue_script('sunset_customizer_js', get_template_directory_uri() . '/assets/js/customizer.js', array(), '', true);
}

add_action('customize_controls_enqueue_scripts', 'sunset_customizer_controls_scripts_enqueue');



function sunset_customizer_preview_scripts_enqueue()
{
  wp_enqueue_script('sunset_customizer_preview_js', get_template_directory_uri() . '/assets/js/customizer-preview.js', array('jquery', 'customize-preview'), '', true);
}

add_action('customize_preview_init', 'sunset_customizer_preview_scripts_enqueue');









?>
