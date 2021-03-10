<?php get_header(); ?>
<header style="background-image: url('<?php echo (has_header_image()) ? header_image() : "";  ?>');">


    <h4 class="text-center"><?php the_title();   ?></h4>

</header>

<article>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', 'page');
    ?>
            <hr>
    <?php
        }
    }
    ?>
</article>


<?php get_footer(); ?>