
<?php get_header(); ?>
<header style="background-image: url('<?php echo (has_header_image()) ? header_image() : "";  ?>');">


    <h4 class="text-center"><?php the_title();   ?></h4>

</header>
<div class="row">
    <div class="col-xs-12 col-sm-8">
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
    </div>
    <div class="col-xs-12 col-sm-4">
        <?php get_footer(); ?>
    </div>

</div>


<?php get_footer(); ?>