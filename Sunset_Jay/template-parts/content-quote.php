<?php

/*

@package Sunset Theme

-- Quote Post Format --

*/

?>

<article id="post-<?php the_ID(  );?>" <?php post_class('sunset-format-quote');?>>
    <header class="entry-header text-center">
        <a href="<?php esc_url(the_permalink())   ;?>" target="_blank">
    <?php 
    the_content(  );
    
    echo "<h5>~ ".get_the_title(  )." ~</h5>";
        //the_title('<h1 class="entry-title"><a href="'.esc_url( get_the_permalink( ) ).'">', '</a></h1>'); 
    ?>
      </a>  
    </header>
    <!-- <div class="entry-content">
        
    </div> -->

    <footer class="entry-footer">
      <?php  echo sunset_posted_footer();  ?>
    </footer>
    <hr>
    <pre>




    </pre>
</article>