<?php get_header(); ?>

<article style="background: <?php echo background_color(); ?>;">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            the_content();
        }
    }
    ?>
</article>

<!-- MY POSTS ON FRONTPAGE -->

<h3 class="text-center">My Latest Posts</h1>
    <div class="row mx-3 my-4">

        <?php
        $categoy_id = array('include'=>'8, 24, 19');
        $categories = get_categories($category_id);

        foreach($categories as $category)
        {
            $arg = array(
                'cat' => $category->term_id,
                'post_type' => 'post',
                'posts_per_page' => 1,
                'category__not_in'=>1
                
            );
    
            $last_blog = new WP_Query($arg);
    
            if ($last_blog->have_posts()) {
                while ($last_blog->have_posts()) {
                    $last_blog->the_post(); ?>
                    <div class="col-xs-12 col-sm-4">
                        <?php get_template_part('template-parts/content', 'featured'); ?>
                    </div>
            <?php  }
            }
    
            wp_reset_postdata();
        }

        

        ?>


    </div>

    <!-- <div class="col-xs-12 col-sm-4">
<?php
// $arg = array(
//     'post_type'=>'post',
//     'posts_per_page'=>1,
//     'offset'=>1
// );

// $last_blog = new WP_Query($arg);

//     if($last_blog->have_posts()){
//         while($last_blog->have_posts()){
//             $last_blog->the_post();
//             get_template_part('template-parts/content', get_post_format());
//         }
//     }

//     wp_reset_postdata();

?>

</div>
</div> -->


    <?php get_footer(); ?>