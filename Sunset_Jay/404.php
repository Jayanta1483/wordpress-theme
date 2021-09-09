<?php
/*

@package Sunset

This file is for the 404 error page


*/

get_header();

 ?>

 <div id="container_404" class="container">

     <div class="page-wrapper row">
       <div class="col-7 col-sm-12">
         <h3 class="page-background text-center">404</h3>
       </div>

       <div class="col-5 col-sm-12">
         <h3 class="header-404 text-uppercase"><?php esc_html_e(get_theme_mod('sunset_page_not_found_main', 'we are sorry page not found!'), 'sunset'); ?></h3>
      </div>
      <div class="col-12">
        <p class="description-404 text-uppercase"><?php esc_html_e(get_theme_mod('sunset_page_not_found_sub', 'THE PAGE YOU ARE LOOKING FOR MIGHT HAVE BEEN REMOVED OR HAD ITS NAME CHANGED OR IS TEMPORARILY UNAVAILABLE.'), 'sunset'); ?></p>

          <a href="<?php echo get_home_url(); ?>" class="home-btn-link" id="homeBtnLink"><?php esc_html_e(get_theme_mod('sunset_page_not_found_button_text', 'back to homepage'), 'sunset'); ?></a>

        <div class="search-container mt-5 text-center">
          <?php get_search_form(); ?>
        </div>
      </div>
     </div><!-- .page-wrapper -->
 </div><!-- #container_404 -->






<?php get_footer(); ?>
