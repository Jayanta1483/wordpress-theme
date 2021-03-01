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