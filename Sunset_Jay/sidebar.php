<?php    


/*

@package Sunset

This file is for the sidebar template of the theme




 */


if(! is_active_sidebar('sunset_sidebar')){
    return;
}

?>

<aside id="secondary" class="widget-area">
    <?php dynamic_sidebar('sunset_sidebar')   ;?>
    
</aside>


<?php





















?>
