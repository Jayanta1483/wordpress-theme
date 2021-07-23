<?php
/*
  @package Sunset Theme 

  This is templete for Archive page
*/

get_header(); ?>


<div id="primary" class="content-area">
  <div id="main" class="site-main" role="main">
    <div class="container" id="sunset-blog-posts-container" >
      <div  class="load-more-post-container" data-page = '1' data-archive="">

      <?php
         the_archive_title( '<h1 class="page-title text-center">', '</h1>' );
       if (have_posts()) { ?>
        
           <?php
          while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', get_post_format());
          }  

        
        } ?>
       </div>
    </div><!-- container -->
    
  </div>
  <div class="text-center" id="lazy-load-preloader"></div>
  <!--main-->
</div>
<!--primary-->



<?php get_footer() ?>