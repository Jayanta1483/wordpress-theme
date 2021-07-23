<?php

/*

@package Sunset Theme
--Single Blog Post for Gallery Post Format

*/

?>

<article id="post-<?php the_ID(  );?>" <?php post_class('sunset-format-gallery-single');?> class="text-center">
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
        <div class="content-container text-justify"><?php the_content(); ?></div>
        
    </div>
        <!-- Image Modal -->
        <div id="imgModal" class="img-modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="modalContent">
            <div id="caption"></div>
        </div>
    <footer class="entry-footer">
      <?php  echo sunset_posted_footer();  ?>
    </footer>
    <hr>
    <pre>




    </pre>
</article>