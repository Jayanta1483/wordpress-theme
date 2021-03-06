<?php
/*
====================================
     Enqueue style and scripts
====================================

*/

function theme2_enqueue_scripts()
{
    $ver = wp_get_theme()->get('Version');
    //css
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(), '4.3.1', 'all');
    wp_enqueue_style('custom-style', get_template_directory_uri() . "/assets/css/theme2.css", array(), $ver, 'all');


    //js
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . "/assets/js/bootstrap.min.js", array(), '4.3.1', 'all', true);
    wp_enqueue_script('my-js', get_template_directory_uri() . "/assets/js/main.js", array(), $ver, 'all', true);
}

add_action('wp_enqueue_scripts', 'theme2_enqueue_scripts');




/*
=====================================
          Menu Section
=====================================

*/

function theme2_custom_menu()
{
    add_theme_support('menus');
    register_nav_menus(
        array(
            'primary' => 'Desktop Navigation',
            'footer' => 'Footer Menu'
        )
    );
}

add_action('init', 'theme2_custom_menu');


//require get_template_directory() . "/inc/class-wp-bootstrap-navwalker.php";
require __DIR__ . "/inc/nav-walker.php";

/*
======================================
         Theme Setup
======================================

*/
function theme2_theme_setup()
{
    //add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-background');
    add_theme_support('custom-header');
    add_theme_support('post-formats', array('aside', 'image', 'video'));
    add_theme_support('html5', array('search-form'));
}
add_action('after_setup_theme', 'theme2_theme_setup');



/*
=========================================
 Sidebar and Widgets
=========================================
*/

function theme2_widget()
{
    register_sidebar(
        array(
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area',
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => '</h2>',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>'
            

        )
    );
}

add_action('widgets_init','theme2_widget' );


/*
==============================
    For Excerpt
==============================
*/
function add_excerpt($more){
    global $post;
    return '...<a href="'.get_permalink($post->ID).'" target="__blank">Read More &raquo;</a>';
}

add_filter('excerpt_more', 'add_excerpt');

/*
===================================
         Copyrights
===================================
*/

function comicpress_jayanta_copyright() {
    global $wpdb;
    $copyright_dates = $wpdb->get_results("
    SELECT
    YEAR(min(post_date_gmt)) AS firstdate,
    YEAR(max(post_date_gmt)) AS lastdate
    FROM
    $wpdb->posts
    WHERE
    post_status = 'publish'
    ");
    $output = '';
    if($copyright_dates) {
    $copyright = "&copy; " . $copyright_dates[0]->firstdate;
    if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
    $copyright .= '-' . $copyright_dates[0]->lastdate;
    }
    $output = $copyright;
    }
    return $output;
    }


    /*
    =====================================
           Adding Short Code
    =====================================
    */

    function theme2_carousel()
{
    $output = '';
    $output .= '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">';
        
        $category_id = array('include' => '8, 24, 19');
        $categories = get_categories($category_id);
        $count = 0;
        $carousel = '';
        foreach ($categories as $category) {
            $arg = array(
                'cat' => $category->term_id,
                'post_type' => 'post',
                'posts_per_page' => 1, 
                'category__not_in' => 1

            );

            $last_blog = new WP_Query($arg);

            if ($last_blog->have_posts()) {
                while ($last_blog->have_posts()) {
                    $last_blog->the_post(); 

                  $active =   ($count == 0) ? 'active' : '';
                 $carousel .=  '<div class="carousel-item"'.$active.' ">';
                 $carousel .= '<img src="'. the_post_thumbnail_url('full').'" class="d-block w-100" height="350" alt="...">';
                  $carousel .=   '</div>';

          $count++;}
            }

            wp_reset_postdata();


        }
        $output .= $carousel;
        $output .= '</div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>';

        return $output;
}

//add_shortcode('carousel', 'theme2_carousel');


/*
==========================================
         Pagination
==========================================
*/





/*
============================================
        Removing Version
============================================
*/

function theme2_remove_version()
{
    return "";
}

add_filter('the_generator', 'theme2_remove_version');

/*
==============================================
    Custom Post Type
==============================================
*/

function theme2_custom_posts()
{
    $labels = array(
        'name'=>'Portfolio',
        'singular_name'=>'Portfolio',
        'add_new'=>'Add New Projects',
        'add_new_item'=>'Add New Items',
        'new_item'=>'New Project',
        'edit_item'=>'Edit Project',
        'view_item'=>'View Project',
        'all_items'=>'All Projects',
        'search_items'=>'Search Projects',
        'parent_item_colon'=>'Parent Projects:',
        'not_found'=>'No Projects Found.',
        'not_found_in_trash'=>'No Projects Found in Trash.'

    );

    $args = array(
        'labels'=>$labels,
        'description'=>'My Portfolio of Projects',
        'public'=>true,
        'publicly_queryable'=>true,
        'quary_var'=>true,
        'rewrite'=> true,
        'capability_type'=>'post',
        'has_archive'=>true,
        'hierarchical'=>false,
        'menu_position'=> 5,
        'supports'=> array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revision'
        ),
        //'taxonomies'=>array('category', 'post_tag'),
        'exclude_from_search' => false,
        'show_in_rest'=> true,
        'menu_icon'=>'dashicons-id'

    );

    register_post_type('portfolio', $args);


    $labels1 = array(
        'name'=>'Books',
        'singular_name'=>'Book',
        'add_new'=>'Add New Book',
        'add_new_item'=>'Add New Items',
        'new_item'=>'New Book',
        'edit_item'=>'Edit Book',
        'view_item'=>'View Books',
        'all_items'=>'All Books',
        'search_items'=>'Search Books',
        'parent_item_colon'=>'Parent Books:',
        'not_found'=>'No Books Found.',
        'not_found_in_trash'=>'No Books Found in Trash.'

    );

    $args1 = array(
        'labels'=>$labels1,
        'description'=>'My Books',
        'public'=>true,
        'publicly_queryable'=>true,
        'quary_var'=>true,
        'rewrite'=> true,
        'capability_type'=>'post',
        'has_archive'=>true,
        'hierarchical'=>false,
        'menu_position'=> 5,
        'supports'=> array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revision'
        ),
        //'taxonomies'=>array('category', 'post_tag'),
        'exclude_from_search' => false,
        'show_in_rest'=> true,
        'menu_icon'=>'dashicons-book-alt'

    );

    register_post_type('books', $args1);
}

add_action('init', 'theme2_custom_posts');




/*
===============================================
               Custom Taxonomy
===============================================
*/

function theme2_custom_taxonomy()
{
    // add new taxonomy hierchical
$labels1 = array(
    'name'=> 'Genres',
    'singular_name'=>'Genre',
    'search_items'      => 'Search Genres' ,
    'all_items'         =>  'All Genres' ,
    'parent_item'       =>  'Parent Genre' ,
    'parent_item_colon' =>  'Parent Genre:' ,
    'edit_item'         =>  'Edit Genre' ,
    'update_item'       =>  'Update Genre' ,
    'add_new_item'      =>  'Add New Genre' ,
    'new_item_name'     =>  'New Genre Name' ,
    'menu_name'         =>  'Genre',
);

$args1 = array(
    'hierarchical'      => true,
    'labels'            => $labels1,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'genre' ),
    'show_in_rest'      => true,
);

    // add new taxonomy NOT hierchical

$labels2 = array(
    'name'                       =>  'Writers',
    'singular_name'              =>  'Writer',
    'search_items'               =>  'Search Writer',
    'popular_items'              =>  'Popular Writer',
    'all_items'                  =>  'All Writer',
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  =>  'Edit Writer',
    'update_item'                =>  'Update Writer',
    'add_new_item'               =>  'Add New Writer',
    'new_item_name'              =>  'New Writer Name',
    'separate_items_with_commas' =>  'Separate writers with commas',
    'add_or_remove_items'        =>  'Add or remove writers',
    'choose_from_most_used'      =>  'Choose from the most used writers',
    'not_found'                  =>  'No writers found.',
    'menu_name'                  =>  'Writer',
);

$args2 = array(
    'hierarchical'          => false,
    'labels'                => $labels2,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'writer' ),
    'show_in_rest'          => true,
);

    register_taxonomy('Genre', array('books'), $args1);
    register_taxonomy('Writer', array('books'), $args2);
}

add_action('init', 'theme2_custom_taxonomy');



/*
=========================================================
Single Template for Multiple Custom Posts and Taxonomies
=========================================================
*/


add_filter( 'template_include', function( $template ) {
    // your custom post types
    $my_types = array( 'portfolio', 'books' );
    $taxo = array('Genre', 'Writer');

    // is the current request for an archive page of one of your post types?
    if ( is_post_type_archive(  $my_types ) ){
        // if it is return the common archive template
        return get_template_directory() . '/archive-cpt.php';
    } else 
    // is the current request for a single page of one of your post types?
    if ( is_singular( $my_types ) ){
        // if it is return the common single template
        return get_template_directory() . '/single-cpt.php';
    } else
    if(is_tax($taxo)){
        return get_template_directory() . '/taxonomy-cpt.php';
    }
    else {
        // if not a match, return the $template that was passed in
        return $template;
    }
});