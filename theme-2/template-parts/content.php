<header class="page-header">
    <?php the_title(sprintf('<h3><a href="%s">', esc_url(get_permalink())), '</a></h3>');   ?>
    <small>Posted on <?php the_time('F j,Y'); ?> at <?php the_time('g:i a'); ?>, in <?php the_category(); ?></small>
</header>

<div class="row">
    <?php if (has_post_thumbnail()) {  ?>
        <div class="col-xs-12 col-sm-4">
            <img src="<?php the_post_thumbnail_url('thumbnail');  ?>" class="img-thumbnail" alt="">
        </div>
        <div class="col-xs-12 col-sm-8">
            <p><?php the_excerpt(); ?></p>
        </div>
    <?php } else { ?>
        <div class="col-xs-12">
            <p><?php the_excerpt(); ?></p>
        </div>
    <?php } ?>
</div>