<?php

/*

@package Sunset

This file is for all the shortcodes


*/

/*
=======================
      TOOLTIPS
=======================
*/

add_shortcode( 'tooltips', 'sunset_tooltip_callback' );

function sunset_tooltip_callback($attrs, $content = null){
    $attrs = shortcode_atts(
        array(
            'placement' => 'top',
            'title' => 'Tooltip'
        ),
        $attrs,
        'tooltips'
    );

    return '<span data-toggle="tooltip" class="sunset-tooltip" data-placement="'.$attrs['placement'].'" title="'.$attrs['title'].'">'.$content.'</span>';
}

add_shortcode( 'popover', 'sunset_popover_callback' );

function sunset_popover_callback($attrs, $content = null){
    $attrs = shortcode_atts(
        array(
            'content' => 'Popover Content',
            'title' => 'Popover Title',
            'placement' => 'top'
        ),
        $attrs,
        'tooltips'
    );

    return '<span data-toggle="popover" data-placement = "'.$attrs['placement'].'" class="sunset-popover"  title="'.$attrs['title'].'" data-content="'.$attrs['content'].'">'.$content.'</span>';
}






/*
=====================
    CONTACT FORM
=====================
*/

add_shortcode('sunset_contact_form', 'sunset_contact_form_callback');

function sunset_contact_form_callback()
{
  ob_start();
  require __DIR__.'/templates/sunset-contact-form.php';
  return ob_get_clean();
}




































?>
