

<article class="text-center">
    <?php if (has_post_thumbnail()) {  ?>
        
            <img src="<?php the_post_thumbnail_url('thumbnail');  ?>" class="img-thumbnail" alt="">
    
    <?php } ?>
    <?php the_title(sprintf('<h3><a href="%s">', esc_url(get_permalink())), '</a></h3>');   ?>
    <small><?php the_category(); ?><?php the_time('F j,Y'); ?> at <?php the_time('g:i a'); ?></small>
</article>