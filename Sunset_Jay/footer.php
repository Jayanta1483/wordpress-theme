<?php
/*
This is a template for Footer;

@package sunset_theme

*/



?>
<?php if(! is_404()){ ?>

<footer class="mt-5 container">
<div class="row">
  <div class="col-12 sunset-footer-sidebar">
       <?php get_sidebar('footer'); ?>
  </div>

  <div class="col-12 col-sm-6 sunset-footer-menu">


  <?php
   wp_nav_menu( array(
     'menu'=>'secondary',
     'container'=>false,
     'theme_location'=>'secondary',
     'menu_class'=>'nav',
     'walker'=> new WP_Bootstrap_Navwalker()
   )
   );

   ?>


  </div>
  <div class="col-12 col-sm-6 sunset-copyright">
     <?php sunset_dynamic_copyright(2021); ?>
  </div>
</div>
<hr>
</footer>

<?php
};
wp_footer(); ?>
</body>
</html>
