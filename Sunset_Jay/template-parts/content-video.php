<?php

/*

@package Sunset Theme

--Video Post Format--

*/

?>

<article id="post-<?php the_ID(  );?>" <?php post_class('sunset-format-video');?> class="text-center">

<div class=""><?php echo sunset_get_embedded_media_content(array('video', 'iframe')); ?></div>

    <header class="entry-header text-center">
        <?php the_title('<h1 class="entry-title"><a href="'.esc_url( get_the_permalink( ) ).'">', '</a></h1>'); ?>

        <div class="entry-meta">
            <?php echo sunset_posted_meta(); ?>
        </div>
    </header>
    <div class="entry-content">
   

        <!-- <div class="standard-featured" ></div> -->
        <div class="entry-excerpt text-justify"><?php the_excerpt(); ?></div>
        
    </div>

    <footer class="entry-footer">
      <?php  echo sunset_posted_footer();  ?>
    </footer>
    <hr>
    <pre>




    </pre>
</article>