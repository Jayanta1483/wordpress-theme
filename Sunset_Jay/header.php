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
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
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