<?php

/*

@package Sunset Theme
--Single Blog Post for Standard Post Format

*/

?>

<article id="post-<?php the_ID(  );?>" <?php post_class();?> class="text-center">
    <header class="entry-header text-center">
        <?php the_title('<h1 class="entry-title"><a href="'.esc_url( get_the_permalink( ) ).'" target="_blank">', '</a></h1>'); ?>

        <div class="entry-meta">
            <?php echo sunset_posted_meta(); ?>
        </div>
    </header>
    <div class="entry-content">
        <div class="standard-featured" >
        <?php 
        if(has_post_thumbnail( )){  ?>
           
         <img src="<?php the_post_thumbnail_url()   ;?>" alt="" class="responsive" style="display: block;">

      <?php  }
        ?>
        </div>
        <div class="entry-excerpt text-justify"><?php the_content(); ?></div>
        
    </div>

    <footer class="entry-footer">
      <?php  echo sunset_posted_footer();  ?>
    </footer>
    <hr>
    <pre>




    </pre>
</article>