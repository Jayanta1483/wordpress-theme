<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head();  ?>
</head>

<body <?php body_class();   ?> 
<div class="container">
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

            <header style="background-image: url('<?php echo (has_header_image()) ? header_image() : "";  ?>');">
                <?php
                if (is_home()) {  ?>
                    <h1><?php wp_title(false);   ?></h1>
                <?php } else { ?>
                    <h1><?php the_title();  ?></h1>
                <?php } ?>
            </header>
        </div>
    </div>