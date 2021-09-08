<?php

/*

@package sunset

This file is for the search template of the theme


*/


 ?>
 <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
   <div class="input-group mb-3">
  <input type="search" class="form-control" id="searchField" placeholder="<?php echo esc_attr_x( 'SEARCH ARTICLES', 'placeholder', 'sunset' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
  <div class="input-group-append">
    <button class="btn" type="submit" id="searchBtn"><i class="fas fa-search"></i></button>
  </div>
</div>
 </form>
