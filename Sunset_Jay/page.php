<?php
/*
  @package Sunset Theme

  This file is for all the page templates of the theme
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
            get_template_part('template-parts/content', 'contact');
          }


       } ?>

    </div><!-- container -->

  </div>

  <!--main-->
</div>
<!--primary-->
