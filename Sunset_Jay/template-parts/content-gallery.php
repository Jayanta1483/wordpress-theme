<?php

/*

@package Sunset Theme
--Gallery Post Format--

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sunset-format-gallery'); ?> class="text-center">
    <header class="entry-header text-center">
        <?php the_title('<h1 class="entry-title"><a href="' . esc_url(get_the_permalink()) . '" target="_blank">', '</a></h1>'); ?>

        <div class="entry-meta">
            <?php echo sunset_posted_meta(); ?>
        </div>
    </header>
    <div class="entry-content">
        <?php $featured_image = sunset_get_post_image(8);   ?>
        <?php //var_dump($featured_image); 
        ?>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $i = 0;
                foreach ($featured_image as $image) { ?>
                    <div class="carousel-item <?php echo ($i == 0) ? 'active' : ''   ;?>
                    ">
                        <div style ="background-image:url('<?php echo $image['url']   ;?>');"
                     class="d-block w-100" alt="..."></div>
                        <!-- <div class="carousel-caption d-none d-md-block"> -->
                            <?php $caption = $image['caption']   ;?>
                            <?php if(!empty($caption)){ ?>
                            <h5 class="caption text-center"><?php echo $caption; ?></h5>
                            <?php } ?>
                        <!-- </div> -->
                    </div>
                <?php  $i++; }   ?>

    
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- <div class="standard-featured" style="background-image: url('');"></div> -->
        <div class="entry-excerpt text-justify"><?php the_excerpt(); ?></div>
        <!-- <div class="btn-container text-center">
            <a href="<?php //the_permalink(); ?>" class="btn btn-sunset" target="_blank"><?php //_e('Read More'); ?></a>
        </div> -->
    </div>

    <footer class="entry-footer">
        <?php echo sunset_posted_footer();  ?>
    </footer>
    <hr>
    <pre>




    </pre>
</article>