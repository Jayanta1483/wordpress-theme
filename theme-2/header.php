<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head();  ?>
</head>

<body <?php body_class();   ?>>
    <nav>
        <?php
        wp_nav_menu(
            array(
                'menu' => 'primary',
                'container' => '',
                'theme location' => 'primary',
                'menu class' => ''
            )
        );
        ?>
    </nav>
    <?php
    if (is_home()) {  ?>
        <h1><?php wp_title(false);   ?></h1>
    <?php } else { ?>
        <h1><?php the_title();  ?></h1>
    <?php } ?>