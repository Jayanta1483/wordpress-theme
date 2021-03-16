<?php get_header(); ?>
<p class="text-center"><i>Tags: </i><?php the_tags('<span class="badge badge-light mr-2 ">', '</span><span class="badge badge-light mr-2 text-white">', '</span>');  ?> || 
<i>Author: </i><?php the_terms($post->ID, 'Writer', '<span class="badge badge-light mr-2 ">', '</span><span class="badge badge-light mr-2 text-white">', '</span>');   ?></p>
<p class="text-center"><small><i>Posted on <?php the_time('F j,Y'); ?> at <?php the_time('g:i a'); ?> || <?php the_terms($post->ID, 'Genre'); ?> || <?php edit_post_link('Edit post');   ?></i></small></p>

<div class="row">
    
        <article>
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/content', 'portfolio');

            ?>
                    <hr>
                <?php
                }   ?>



            <?php   }
            ?>
        </article>
    
    
        <?php get_footer(); ?>
    

</div>