<?php get_header(); ?>
<p class="text-center"><?php  the_tags('<span class="badge badge-light mr-2 ">','</span><span class="badge badge-light mr-2 text-white">' ,'</span>');  ?></p>
<p class="text-center"><small>Posted on <?php the_time('F j,Y'); ?> at <?php the_time('g:i a'); ?>, in <?php the_category(' '); ?></small></p>
<p class="text-center"><small><?php  edit_post_link();   ?></small></p>
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