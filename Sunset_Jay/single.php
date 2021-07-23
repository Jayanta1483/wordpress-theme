<?php
/*
  @package Sunset Theme

  This is the template for all single page for blogs
*/

get_header(); ?>


<div id="primary" class="content-area">
  <div id="main" class="site-main" role="main">
    <div class="container" >
     
      <?php

      if (have_posts()) { ?>
        
          <?php
          while (have_posts()) {
            the_post();
            get_template_part('template-parts/single-post', get_post_format());
          }  
           
          the_post_navigation(  );

          if(comments_open(  )){
            comments_template(  );
          }
        
       } ?>
      
    </div><!-- container -->
    
  </div>
  
  <!--main-->
</div>
<!--primary-->



<?php get_footer() ?>