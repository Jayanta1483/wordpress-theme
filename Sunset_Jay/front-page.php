<?php
/*
  @package Sunset Theme
*/

get_header(); ?>


<div id="primary" class="content-area">
<div id="main" class="site-main" role="main">
<div class="container" id="sunset-blog-posts-container" data-page='1'>
<?php

if(have_posts()){
    while(have_posts(  )){
        the_post();
        get_template_part( 'template-parts/content', get_post_format(  ) );
    }
}



?>
</div><!-- container -->
<div class="text-center" id="lazy-load-preloader"></div>
</div><!--main-->
</div><!--primary-->



<?php get_footer() ?>