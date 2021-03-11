<?php if (has_post_thumbnail()) {  ?>

    <div class="img-thumbnail"><?php the_post_thumbnail('thumbnail');  ?></div>


<?php } ?>

<header class="page-header">
    <?php the_title(sprintf('<h3><a href="%s" target="__blank">', esc_url(get_permalink())), '</a></h3>');   ?>
    <small><?php the_category(' '); ?></small>
</header>