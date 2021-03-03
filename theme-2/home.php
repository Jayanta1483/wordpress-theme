

<?php get_header(); ?>

<article>
    <?php
    if(have_posts()){
        while(have_posts()){
            the_post();
            get_template_part('template-parts/content', get_post_format());
            ?>
            <hr>
            <?php
        }
    }
    ?>
</article>


<?php get_footer(); ?>