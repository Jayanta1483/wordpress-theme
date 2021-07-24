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




//<button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>























?>
