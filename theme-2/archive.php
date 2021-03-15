<?php get_header(); ?>
<h1>main archive</h1>
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <article>
            <?php
            if (have_posts()) {  ?>
            <?php 
            the_archive_title('<h2 class="page-title text-center">','</h2>');  
            the_archive_description('<div class="taxonomy-dexcription text-center">', '</div>');
            
            ?>
            <?php    ?>
               <?php while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/content', 'archive');

            ?>
                    <hr>
            <?php
                }
              echo paginate_links();
            //  theme2_pagination();
            }
            ?>
        </article>
        
    </div>
    <div class="col-xs-12 col-sm-4">
        <?php get_footer(); ?>
    </div>

</div>