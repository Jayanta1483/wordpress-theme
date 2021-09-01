<?php

/*


@package sunset


This file is for the template for footer sidebar


*/


if(! is_active_sidebar('sunset_footer_section')){
    return;
}

 ?>
<aside class="footer-widget-area" id="sunset_footer_sidebar">
  <?php dynamic_sidebar('sunset_footer_section'); ?>
</aside>
