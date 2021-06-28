<?php

/*

@package Sunset Theme

-- Link Post Format --

*/

?>

<article id="post-<?php the_ID(  );?>" <?php post_class('sunset-format-link');?>>
    <header class="entry-header text-center mb-5">
        <?php 
        
        $link = sunset_get_link();
        the_title('<h1 class="entry-title"><a href="'.$link.'" target="_blank">', '</a></h1>');
        
        ?>

    </header>
    
   
    <hr>
    <pre>




    </pre>
</article>