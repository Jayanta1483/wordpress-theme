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
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=324226167608332&autoLogAppEvents=1" nonce="uudVBEQ8"></script>
    <header class="container-fluid px-0">
        <div class="row no-gutters">
            <div class="col-xl-12">
                <div class="header-container">
                    <div class="header-content bg-image text-center" style="background-image: url('<?php header_image(); ?>');">
                    </div>
                    <!--header-content-->
                    <div class="header-text">
                        <h2><?php bloginfo('name'); ?></h1>
                            <h6><?php bloginfo('description'); ?>
                        </h2>
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

























                                <!-- <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Link</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dropdown
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                                    </li>
                                </ul>
                                <form class="form-inline my-2 my-lg-0">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                </form> -->
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