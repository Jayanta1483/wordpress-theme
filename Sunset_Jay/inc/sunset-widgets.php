<?php    

/**
 * @package Sunset
 * 
 * This file is for the custom widget class 
 * 
 */
 
 //ob_start();

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
});





/*
==========================
       POPULAR POSTS
==========================
*/


class Sunset_Popular_Posts extends WP_Widget{
	/*
	
	sets up the widget' name etc..
	
	*/
	
  public function __construct()
  {
	  $widgets_op = array(
	       'classname'  => 'sunset-popular-posts',
		   'description' => 'Popular Posts Widget'
	  );
	  
	   parent::__construct('sunset_Popular_Posts', 'Sunset Popular Posts', $widget_ops);
  }
  
  
  
	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		
		$title = (! empty($instance['title'])) ? $instance['title'] : 'Popular Posts';
		$tot = (! empty($instance['tot'])) ? $instance['tot'] : 4;
		
		$output = '<p><label for="'.esc_attr($this->get_field_id('title')).'" >Title:</label></br>';
		$output .= '<input name="'.esc_html($this->get_field_name('title')).'" id="'.esc_attr($this->get_field_id('title')).'" type="text" class="widefat" value="'.esc_html($title).'"></p>';
		$output .='<p><label for="'.esc_attr($this->get_field_id('tot')).'" >Total Number of Posts to Show : </label>';
		$output .= '<input name="'.esc_html($this->get_field_name('tot')).'" id="'.esc_attr($this->get_field_id('tot')).'" type="number" class="tiny-text" value="'.esc_html($tot).'"></p>';
		
		echo $output;
	}
	
	
	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		
		$instance = array();
		
		$instance['title'] = (! empty($new_instance['title'])) ?  esc_html__($new_instance['title']) : '';
		$instance['tot'] = (! empty($new_instance['tot'])) ? absint(esc_html($new_instance['tot'])) : 0;
		
		return $instance;
	}
	
	
	
	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		
		echo $args['before_widget'];
		if(! empty($instance['title'])){
			echo $args['before_title'].$instance['title'].$args['after_title'];
		}
		
		$tot = absint($instance['tot']);
		$post_args = array(
		    'post_type'       =>  'post',
			'posts_per_page'  =>   $tot,
			'meta_key'        =>  'meta_pop',
			'orderby'         =>  'meta_value_num',
			'order'           => 'DESC'
			
		);
		$popular_post = new WP_Query($post_args);
		
		if($popular_post->have_posts()){
			echo '<ul>';
		while($popular_post->have_posts()){
			$popular_post->the_post();
			echo '<li><p><a href="'.esc_url(get_the_permalink()).'" target="_blank">'.esc_html(get_the_title()).'</a>
			      <span class="widget-comments"><i class="fas fa-comment-alt"></i> '.esc_html(get_comments_number()).'</span></p>
				  <p><span class="widget-like"><i class="fas fa-thumbs-up"></i> '.esc_html(get_post_meta(get_the_ID(), 'like', true)).'</span> <span class="widget-dislike" ><i class="fas fa-thumbs-down"></i>'.esc_html(get_post_meta(get_the_ID(), 'dislike', true)).'</span></p></li>';
		}
		echo'</ul>';
		
		wp_reset_postdata();
		
		}
		echo $args['after_widget'];
	}
}

add_action( 'widgets_init', function(){
	register_widget( 'Sunset_Popular_Posts' );
});








































?>
