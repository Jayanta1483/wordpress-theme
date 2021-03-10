<?php 


get_header(); 

?>


<article class="content px-3 py-5 p-md-5 error-404 not-found">
<h2 class="text-center" style="color: red;">Requested Page Not Found!!</h2>
</article>
<div class="row">
<div class="col-sm-4">
<?php   the_widget('WP_Widget_Recent_Posts');    ?>
</div>
<div class="col-sm-4 ">
<?php  the_widget('WP_Widget_Categories', array('title'=>'Most used Categories', 'count'=> 1 ,'dropdown'=> 0));     ?>
</div>
<div class="col-sm-4 ">
<?php   the_widget('WP_Widget_Archives', 'dropdown=1');    ?>
</div>
</div>
<footer class="mx-4 my-3">
<?php wp_footer();   ?>
<p class="text-center">Jayanta Sarkar <?php echo comicpress_jayanta_copyright(); ?></p>
</div>
</footer>
</body>
</html>
