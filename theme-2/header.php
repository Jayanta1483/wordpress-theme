<!DOCTYPE html>
<html <?php  language_attributes();  ?>>

<head>
    <meta charset="<?php bloginfo('charset') ; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php  bloginfo('name')?><?php  wp_title('||')?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head();  ?>
</head>

<body>

    <div class="row">
        <div class="col">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="#"><?php echo get_bloginfo('name'); ?></a>
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
                            'menu_class' => 'nav navbar-nav mr-auto',
                            'walker' => new WP_Bootstrap_Navwalker()
                        )
                    );
                    ?>
                    <form class="form-inline my-2 my-lg-0">
                        <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
                        <?php get_search_form();  ?>
                        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
                    </form>
                </div>
            </nav>
            
        </div>
    </div>