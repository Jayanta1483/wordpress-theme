<?php    

/**
 * @package Sunset
 * 
 * This file is for the custom widget class 
 * 
 */

class Sunset_Widget extends WP_Widget {
    
    /* sets up the name of the widget etc. */

    public function __construct()
    {
        $widget_ops = array(
            'classname'   => 'sunset-profile-widget',
            'description' => 'Custom Widget for Profile'
        );

        parent::__construct('sunset_widget', 'Sunset Widget', $widget_ops);
    }

    /* Outputs the options form on admin */

    public function form($instance)
    {
       echo 'There are no options for this widget.
             Click on <a href="http://localhost/th-wp/wp-admin/admin.php?page=sunset-sidebar" target="_blank" >
             this link</a> to edit the options.';
    }

    /* Outputs the content of the widget */

    public function widget($args, $instance)
    {
        $picture = esc_attr(get_option('profile_picture'));
        $firstName = esc_attr(get_option('first_name'));
        $lastName = esc_attr(get_option('last_name'));
        $full_name = $firstName . ' ' . $lastName;
        $description = esc_attr(get_option('description'));

        $facebook = esc_attr(get_option('face_book'));
        $twitter = esc_attr(get_option('twitter'));
        $instagram = esc_attr(get_option('insta_gram'));

        echo $args['before_widget'];
      ?>
        <!-- <div class="preview-wrapper"> -->
            <!-- <p style="text-align: center;"><i>Preview</i></p> -->
            <!-- <div class="sunset-sidebar-preview"> -->
                <div class="text-center">
                    <div class="image-container">
                        <div id="profile-picture-prev" class="profile-picture" style="background-image: url('<?php echo $picture; ?>');"></div>
                    </div>
                    <h1 class="sunset-username"><?php echo $full_name; ?></h1>
                    <h2 class="sunset-description"><?php echo $description; ?></h2>
                    <div class="icons-wrapper">

              <?php

                  wp_nav_menu(array(
                          'menu'  => 'sidebar',
                          'container' =>false,
                          'theme_location' => 'sidebar',
                          'menu_class' => 'social-media'

                  ))



              ?>



                    <!-- <ul class="social-media"> -->
                    <?php 
                    // if(!empty($facebook)){ ?> 
                        <!-- <li><a target="_blank" href="https://www.facebook.com/ --><?php //echo $facebook   ;?><!-- "><i class="fab fa-facebook"></i></a></li> -->
                        <?php //} ?>
                     <!--    <li><a href="#" ><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" ><i class="fab fa-instagram"></i></a></li>
                    </ul>
                    </div> -->
                </div>
            <!-- </div>
        </div> -->

        <?php
        echo $args['after_widget'];
    }
}





add_action('widgets_init', function(){
    register_widget('Sunset_Widget');
})








?>
