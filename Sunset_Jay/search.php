<?php
/**
 * The Search template file
 *
 *
 *
 * @package Sunset
 */
get_header();

global $query_string;

wp_parse_str( $query_string, $search_query );
$search_query['orderby'] = 'date';
$search_query['order'] = 'ASC';
$search_query['posts_per_archive_page'] = 2;
$search = new WP_Query( $search_query );

// echo '<pre>';
// print_r($search_query);
// wp_die();
?>
<div class="content-container">
    <h1 class="page-title"><?php _e( 'Search results for:', 'sunset' ); ?>  <span class="search-query"><?php echo get_search_query(); ?></span></h1>
    <div class="container">
        <div class="row">
            <div class="search-results-container col-12">
            <?php if ( $search->have_posts() ): ?>
                <?php while( $search->have_posts() ): ?>
                    <?php $search->the_post(); ?>
                    <div class="search-result">
                    <?php  get_template_part('template-parts/content', get_post_format()); ?>
                    </div>
                <?php endwhile; ?>
                <?php the_posts_pagination(); ?>
            <?php else: ?>
                <p><?php _e( 'No Search Results found', 'sunset' ); ?></p>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
