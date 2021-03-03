<?php
/*

Template Name: no-heading



*/
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head();  ?>
</head>

<body <?php body_class();   ?>>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="#"><?php echo get_bloginfo('name');?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'primary',
                                'container' => false,
                                'theme_location' => 'primary',
                                'menu_class' => 'nav navbar-nav navbar-right',
                                'walker'=> new WP_Bootstrap_Navwalker()
                            )
                        );
                        ?>

                </div>
            </nav>
   <h3>Following are My Projects</h3>
<article>
    <?php
    if(have_posts()){
        while(have_posts()){
            the_post();
            get_template_part('template-parts/content','page');
            ?>
            <hr>
            <?php
        }
    }
    ?>
</article>


<?php get_footer(); ?>