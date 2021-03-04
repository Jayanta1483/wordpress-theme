<?php get_header(); ?>

<article style="background: <?php echo background_color();?>;">
    <?php
    if(have_posts()){
        while(have_posts()){
            the_post();
            the_content();
        }
    }
    ?>
</article>
<h3 class="text-center">My Latest Posts</h1>
<div class="row mx-3 my-4">
<div class="col-xs-12 col-sm-6">
<?php
$arg = array(
    'post_type'=>'post',
    'posts_per_page'=>1,
    'cat'=>8
);

$last_blog = new WP_Query($arg);

    if($last_blog->have_posts()){
        while($last_blog->have_posts()){
            $last_blog->the_post();
            get_template_part('template-parts/content', get_post_format());
        }
    }
    
    wp_reset_postdata();

?>

</div>
<div class="col-xs-12 col-sm-6">
<?php
$arg = array(
    'post_type'=>'post',
    'posts_per_page'=>1,
    'offset'=>1
);

$last_blog = new WP_Query($arg);

    if($last_blog->have_posts()){
        while($last_blog->have_posts()){
            $last_blog->the_post();
            get_template_part('template-parts/content', get_post_format());
        }
    }
    
    wp_reset_postdata();

?>

</div>
</div>


<?php get_footer(); ?>