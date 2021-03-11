<!-- <h2>Ultimate Fallback index.php</h2> -->
<?php get_header(); ?>
<header style="background-image: url('<?php echo (has_header_image()) ? header_image() : "";  ?>');">
                
                    <h1><?php wp_title(false);   ?></h1>
                
            </header>
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <article>
        <div class="row text-center">
            <?php
            if (have_posts()) {
                $i = 0;
                while (have_posts()) {
                    the_post();
                    if($i==0){$column = 12;}
                    elseif($i>0 && $i<=2){$column = 6;}
                    else{$column = 4;}  ?>
                    <div class="col-xs-<?php  echo $column; ?>">
                   <?php  get_template_part('template-parts/content', 'blogs'); ?>
                    </div>
            
                    <hr>
            <?php
               $i++; }
            //   echo paginate_links();
            //  theme2_pagination();
            }
            ?>
            </div>
        </article>
        
    </div>
    <div class="col-xs-12 col-sm-4">
        <?php get_footer(); ?>
    </div>

</div>