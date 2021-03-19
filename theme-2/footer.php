<footer class="mx-4 my-3">
<div id="sidebar" class="widgets-area"><?php dynamic_sidebar('Sidebar Area');  ?></div>
<?php wp_footer();   ?>
<p class="text-center">Jayanta Sarkar <?php echo comicpress_jayanta_copyright(); ?></p>
</div>
<script>
jQuery(document).ready(function(){
    jQuery(window).scroll(function(){
        if(jQuery(document).scrollTop() > 50){
            jQuery('nav').addClass('shadow');
            jQuery('#cont').removeClass('my-4');
            jQuery('.nav').css('visibility', 'hidden')
        }else{
            jQuery('#cont').addClass('my-4');
            jQuery('.nav').css('visibility', 'visible')
        }
    })
})
</script>
</footer>
</body>
</html>