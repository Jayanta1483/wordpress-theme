<header class="page-header">
<?php the_title(sprintf('<h3><a href="%s">', esc_url(get_permalink())), '</a></h3>');   ?>
<small>Posted on <?php the_time('F j,Y'); ?> at <?php the_time('g:i a'); ?>, in <?php the_category(); ?></small>
</header>
<div class="img-thumbnail"><img src="<?php the_post_thumbnail_url('thumbnail');  ?>" alt=""></div>
<p><?php the_excerpt(); ?></p>
