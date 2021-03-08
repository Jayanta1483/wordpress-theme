<?php get_header(); ?>
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <article>
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/content', 'search');
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