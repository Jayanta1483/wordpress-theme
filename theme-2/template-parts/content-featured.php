

<article class="text-center shadow p-3 mb-5 rounded">
    <?php if (has_post_thumbnail()) {  ?>
        
            <img src="<?php the_post_thumbnail_url('thumbnail');  ?>" class="img-thumbnail" alt="">
    
    <?php } ?>
    <?php the_title(sprintf('<h3><a href="%s">', esc_url(get_permalink())), '</a></h3>');   ?>
    <small><?php the_category(' '); ?></small></br>
    <small>Published on <?php the_time('F j,Y'); ?></small>
</article>