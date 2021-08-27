<?php

/*

@package Sunset Theme--Contact Page

*/

?>

<article id="post-<?php the_ID(  );?>" <?php post_class();?> class="text-center">
    <header class="entry-header text-center">
        <?php the_title('<h1 class="entry-title mb-5"><a href="'.esc_url( get_the_permalink( ) ).'" target="_blank">', '</a></h1>'); ?>
    </header>
    <div class="entry-excerpt text-justify">
     <?php the_content(); ?>
    </div>
    </div>
     <hr>
    <pre>




    </pre>
</article>
