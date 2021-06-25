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

function sunset_theme_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menus(
        array(
            'primary' => 'Navigation',
            'secondary' => 'Footer Menu'
        )
    );
}

add_action('init', 'sunset_theme_setup');




/*
================================
   BLOG LOOP CUSTOM FUNCTIONS
================================
*/

function sunset_posted_meta()
{
    $last_modified = human_time_diff(get_the_modified_time('U'), current_time('U'));
    $posted = human_time_diff(get_the_time('U'), current_time('U'));
    $output = '';


    if ($last_modified > ($posted + 86400)) {
        $edited = ', Last modified ' . $last_modified . ' ago';
    } else {
        $edited = '';
    }

    $categories = get_the_category();
    if (!empty($categories) && is_array($categories)) {
        $i = 1;
        foreach ($categories as $category) {
            $output .=  ($i > 1) ? ', ' : '';
            $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr('View all posts in%s', $category->name) . '">' . esc_html($category->name) . '</a>';
            $i++;
        }
    }

    return '<span class="posted-on">Posted on <a href="' . esc_url(get_the_permalink()) . '" >' . get_the_date() . '</a>' . $edited . '</span> / <span class="posted-in"> category :' . $output . '</span>';
}


function sunset_posted_footer()
{
    $comments = '';

    if (!have_comments()) {
        $comments = 'No Comments';
    } else {
        if (!get_comments_number() > 1) {
            $comments = get_comments_number() . ' comment';
        } else {
            $comments = get_comments_number() . ' comments';
        }
    }
    $comments = '<a href="' . get_comments_link() . '">' . $comments . ' <span class="sunset-icon sunset-comment"></span></a>';
    return '<div class="post-footer-container"><div class="row"><div class="col-xl col-sm-6">' . get_the_tag_list('<div class="tags-list"><span class="sunset-icon sunset-tag"></span>', ' ', '</div>') . '</div><div class="col-xl col-sm-6 comments-tag">' . $comments . '</div></div></div>';
}

function sunset_get_post_image($num = 1)
{
    $featured_image = [];

    if (has_post_thumbnail() && $num == 1) {

        $featured_image[] = esc_url(get_the_post_thumbnail_url());
    } else {
        $attachments = get_posts(
            array(

                'post_type' => 'attachment',
                'posts_per_page' => $num,
                'post_parent' => get_the_ID()
            )
        );

        if ($attachments) {
            //var_dump($attachments);
            foreach ($attachments as $attachment) {
                //$featured_image[] = wp_get_attachment_image_url($attachment->ID, 'large');
                array_push($featured_image, wp_get_attachment_image_url($attachment->ID, 'large'));
            }
        }
    }

    return $featured_image;
}

function sunset_get_attachment_caption($num)
{   
    $captions = [];
    $attachments = get_posts(
        array(

            'post_type' => 'attachment',
            'posts_per_page' => $num,
            'post_parent' => get_the_ID()
        )
    );

    if ($attachments) {
        //var_dump($attachments);
        foreach ($attachments as $attachment) {
            
            array_push($captions, wp_get_attachment_caption($attachment->ID));
        }
    }

    return $captions;
}

function sunset_get_embedded_media_content($types = array())
{
    $content = apply_filters('the_content', get_the_content());
    // $types = array('audio', 'video', 'iframe');
    $media = get_media_embedded_in_content($content, $types);
    return do_shortcode($media[0]);
}
