<?php
/*
  
@package Sunset

This page is for handling ajax calls
  
 */

add_action('wp_ajax_nopriv_sunset_load_more', 'sunset_load_more_callback');
add_action('wp_ajax_sunset_load_more', 'sunset_load_more_callback');


function sunset_load_more_callback()
{
    $paged = (!empty($_POST['page'])) ? esc_sql($_POST['page']) : '';

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'ASC',
        'paged' => $paged
    );

    if(!empty($_POST['archive_key']) && !empty($_POST['archive_value'])){
        $archive_name = ($_POST['archive_key'] == 'category') ? 'category_name' : esc_sql($_POST['archive_key']);

        $args[$archive_name] = esc_sql($_POST['archive_value']);
        //$arg['order'] = 'ASC';
    }

    $load_more_qry = new WP_Query($args);

    if ($load_more_qry->have_posts()) { ?>
        <div class="load-more-post-container" data-page='<?php echo $paged   ;?>'>
            <?php
            while ($load_more_qry->have_posts()) {
                $load_more_qry->the_post();
                get_template_part('template-parts/content', get_post_format());
            }

            wp_reset_postdata(); ?>
        </div>
<?php  }

    wp_die();
}
















?>