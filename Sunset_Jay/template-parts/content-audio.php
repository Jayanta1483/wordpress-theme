<?php

/*

@package Sunset Theme

--Audio Post Format--

*/

?>

<article id="post-<?php the_ID(  );?>" <?php post_class('sunset-format-audio');?> class="text-center">
<?php $featured_image = sunset_get_post_image(); ?>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title"><a href="'.esc_url( get_the_permalink( ) ).'" target="_blank">', '</a></h1>'); ?>

        <div class="entry-meta">
            <?php echo sunset_posted_meta(); ?>
        </div>
    </header>
    <div class="entry-content">



   <?php echo sunset_get_embedded_media_content(array('audio', 'iframe'))   ;?>
   







        <!-- <div class="standard-featured" >
        
           
         <img src="<?php //the_post_thumbnail_url()   ;?>" alt="" class="responsive" style="display: block;">

        </div>
        <div class="entry-excerpt text-justify"><?php// the_excerpt(); ?></div> -->
        
    </div>

    <footer class="entry-footer">
      <?php  echo sunset_posted_footer();  ?>
    </footer>
    <hr>
    
</article>