<?php    
/*

@package Sunset

This file is for all generic functions for the theme


 */


 function sunset_get_data_page_num()
 {
     $page_num = (isset($_GET['page']) && !empty($_GET['page'])) ? esc_sql($_GET['page']) : '1';

     echo $_GET['page'];
 }



















?>
