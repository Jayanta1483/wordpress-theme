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


<?php get_footer(); ?>