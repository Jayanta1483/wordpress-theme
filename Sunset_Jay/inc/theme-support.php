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
