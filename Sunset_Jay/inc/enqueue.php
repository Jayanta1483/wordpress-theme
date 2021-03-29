<?php
/*
@package sunset_jay theme

=================================
    ADMIN ENQUEUE FUNCTIONS
=================================
 */


function sunset_load_admin_scripts($hook){
    if($hook != 'toplevel_page_jay-sunset'){
        return;
    }
    wp_enqueue_style( 'sunset_admin', get_template_directory_uri().'/assets/css/sunset-admin.css', array(), '1.0', 'all' );
}

add_action('admin_enqueue_scripts', 'sunset_load_admin_scripts');
























?>