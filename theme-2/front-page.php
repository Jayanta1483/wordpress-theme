<?php get_header(); ?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php
        $category_id = array('include' => '8, 24, 19');
        $categories = get_categories($category_id);
        $count = 0;
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
                    $last_blog->the_post(); ?>

                    <div class="carousel-item <?php echo ($count == 0) ? 'active' : '';  ?>">
                        <img src="<?php the_post_thumbnail_url('full'); ?>" class="d-block w-100" height="350" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?php the_title();  ?></h5>
                        </div>
                    </div>

        <?php $count++;
                }
            }

            wp_reset_postdata();
        }
        ?>
        <!-- <div class="carousel-item active">
            <img src="" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="" class="d-block w-100" alt="...">
        </div> -->
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

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
        $category_id = array('include' => '8, 24, 19');
        $categories = get_categories($category_id);

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