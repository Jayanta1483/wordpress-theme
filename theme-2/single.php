<?php get_header(); ?>
<div class="row">
    <div class="col-xs-12">
        <article>
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    $format = (get_post_format() == '') ? 'article' : get_post_format();
                    get_template_part('template-parts/content', $format);
            ?>
                    <hr>
            <?php
                }
            }
            ?>
        </article>
    </div>
    <div class="col-xs-12">
        <?php get_footer(); ?>
    </div>

</div>