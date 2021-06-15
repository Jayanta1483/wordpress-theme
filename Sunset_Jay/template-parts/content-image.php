<?php

/*

@package Sunset Theme

-- Image Post Format --

*/

?>

<article id="post-<?php the_ID(  );?>" <?php post_class('sunset-format-image');?> class="text-center">
<?php if(has_post_thumbnail( )){  ?>
    <header class="entry-header text-center" style="background-image: url('<?php the_post_thumbnail_url()   ;?>');">
        <?php the_title('<h1 class="entry-title"><a href="'.esc_url( get_the_permalink( ) ).'">', '</a></h1>'); ?>

        <div class="entry-meta">
            <?php echo sunset_posted_meta(); ?>
        </div>
        <div class="entry-excerpt text-justify"><?php the_excerpt(); ?></div>
    </header>
    <?php  }
        ?>
    <!-- <div class="entry-content">
        <div class="standard-featured" >
         
        
           
         <img src="" alt="" class="responsive" style="display: block;">

      
        </div>
        
    </div> -->

    <footer class="entry-footer">
      <?php  echo sunset_posted_footer();  ?>
    </footer>
    <hr>
</article>