<?php
/*
==========================
   CUSTOM POST TYPES
==========================
*/


$contact = get_option('activate_contact');

if (!empty($contact)) {
    add_action('init', 'sunset_contact_custom_post');
    add_filter('manage_sunset-contact_posts_columns', 'sunset_set_posts_columns');
    add_action('manage_sunset-contact_posts_custom_column', 'sunset_contact_custom_post_column', 10, 2);
}

function sunset_contact_custom_post()
{
    $labels = array(
        'name'              => 'Messages',
        'singular_name'     => 'Message',
        'menu_name'         => 'Messages',
        'name_admin_bar'    => 'Message'
    );

    $args = array(
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'menu_position'     => 26,
        'menu_icon'         => 'dashicons-email-alt',
        'supports'          => array('title', 'editor', 'author')
    );

    register_post_type('sunset-contact', $args);
}

function sunset_set_posts_columns($columns)
{
    $new_columns = array();
    $new_columns['title'] = 'Full Name';
    $new_columns['message'] = 'Message';
    $new_columns['email'] = 'Email';
    $new_columns['date'] = 'Date';
    return $new_columns;
}

function sunset_contact_custom_post_column($column, $post_id)
{
    switch ($column) {
        case 'message':
            echo get_the_excerpt( );
            break;
        case 'email':
            echo 'Email Address';
            break;
    }
}
