<?php
/*
This is Template for Header

@package sunset_jay theme

*/
?>
<!DOCTYPE html>
<html lang=<?php language_attributes();  ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description');  ?>">
    <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
    <title><?php bloginfo('name');
            wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if(! is_404()){ ?>

<div class="sunset-sidebar visibility-hidden">
    <div class="sunset-sidebar-container slide-out">
        <div class="sidebar-close"><span id="sidebar-close">&times;</span></div>
        <div class="sidebar-scroll">
              <?php get_sidebar()   ;?>
        </div>
    </div>
</div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=324226167608332&autoLogAppEvents=1" nonce="uudVBEQ8"></script>
    <header class="container-fluid px-0">
        <div class="row no-gutters">
            <div class="col-xl-12">
                <div class="header-container">
                <span class="sidebar-open">&#x2630;</span>
                    <div class="header-content bg-image text-center" style="background-image: url('<?php header_image(); ?>');">

                    </div>
                    <!--header-content-->
                    <div class="header-text">
                      <?php if(display_header_text()){ ?>
                        <h2><?php bloginfo('name'); ?></h2>
                            <h6><?php bloginfo('description'); ?></h6>
                      <?php } ?>
                    </div>
                    <!--header-text-->
                    <div class="nav-container">
                        <nav class="navbar navbar-expand-lg navbar-dark nav-bg-trans text-center" id="nav">
                            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                            <button class="navbar-toggler" id="btn-toogle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">

                                <?php

                                     wp_nav_menu(
                                         array(
                                             'menu'=>'primary',
                                             'container'=>false,
                                             'theme_location'=>'primary',
                                             'menu_class'=>'navbar-nav',
                                             'walker'=> new WP_Bootstrap_Navwalker()
                                         )
                                         );





                                ?>
                            </div>
                        </nav>
                    </div>
                    <!--nav-container-->
                </div>
                <!--header-container-->
            </div>
            <!--col-xs-12-->
        </div>
        <!--row-->
    </header>
    <!--.container-fluid-->

 <?php } ?>
