<?php

/*

@package Sunset Theme

-- Image Post Format --

*/

?>

<article id="post-<?php the_ID(  );?>" <?php post_class('sunset-format-image');?> class="text-center">
<?php   $featured_image = sunset_get_post_image();  ?>

    <header class="entry-header text-center" style="background-image: url('<?php echo $featured_image[0]; ?>');">
        <?php the_title('<h1 class="entry-title"><a href="'.esc_url( get_the_permalink( ) ).'">', '</a></h1>'); ?>

        <div class="entry-meta">
            <?php echo sunset_posted_meta(); ?>
        </div>
        <div class="entry-excerpt text-center"><?php the_excerpt(); ?></div>
    </header>

    <footer class="entry-footer">
      <?php  echo sunset_posted_footer();  ?>
    </footer>
    <hr>
</article>