<?php
/*
==========================
   THEME SUPPORT OPTIONS
==========================
*/
$options = get_option('post_format');
$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
$output = array();


foreach ($formats as $format) {
    $output[] = (!empty($options) && $options[$format] == 1) ? $format : '';
}

if (!empty($options)) {
    add_theme_support('post-formats',  $output);
}



$header = esc_attr(get_option('custom_header'));
$background = esc_attr(get_option('custom_background'));


if (!empty($header)) {
    add_theme_support('custom-header');
}

if (!empty($background)) {
    add_theme_support('custom-background');
}

function sunset_theme_setup(){
    add_theme_support( 'menus' );
    register_nav_menus( 
        array(
            'primary'=> 'Navigation',
            'secondary'=> 'Footer Menu'
        )
        );
}

add_action('init', 'sunset_theme_setup');