<?php

/*

@package Sunset Theme

-- Aside Post Format --

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sunset-format-aside'); ?>>
    <div class="row content">
        <div class="col-md-4 feature-column">
            <div class="aside-featured">
                <?php
                if (has_post_thumbnail()) {  ?>

                    <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="responsive" style="display: block;">

                <?php  }
                ?>
        </div>
        
    </div>
    <div class="col content-column">
        <header class="entry-header">


            <div class="entry-meta">
                <?php 
                $meta =  sunset_posted_meta(); 
                // $meta = substr_replace($meta, '', strpos($meta, '/'));
                // echo strpos($meta, '/');
                echo $meta;
                ?>
            </div>
        </header>
        <div class="entry-content">

            <div class="entry-excerpt text-justify"><?php the_content(); ?></div>

        </div>
       

    </div>
    </div>
     <div class="row footer-row">
        <div class="col  p-0 offset-md-4">
            <footer class="entry-footer">
            <?php echo sunset_posted_footer();  ?>
            </footer>
        </div>
    </div> 

    <hr>
   
</article>