<?php

/*
*
* @package Sunset
*
*
* This file is for customizer api
*
*
*
*/




add_action( 'customize_register', 'sunset_customizer_register' );


function sunset_customizer_register($wp_customize)
{
  $wp_customize->get_section('static_front_page')->priority = 30;
  $wp_customize->get_section('static_front_page')->title = esc_html__('Home Page Preferences', 'sunset');

  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
  $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
  $wp_customize->get_setting('background_color')->transport = 'postMessage';

  /* CREATING FOOTER SECTION */

  $wp_customize->add_panel('customizer_footer_section', array(
           'title'           =>     esc_html__('Footer Section', 'sunset'),
           'description'     =>     esc_html__('Theme Modifications like color scheme, theme texts and layouts preferences can be done here.', 'sunset'),
           'priority'        =>      105
  ));


  $wp_customize->add_section('footer_section_text', array(
           'title'           =>     esc_html__('Text Option', 'sunset'),
           'priority'        =>     1,
           'panel'           =>     'customizer_footer_section'
  ));

  /* FOR COPYRIGHT TEXT */

  $wp_customize->add_setting('copyright_text', array(
            'default'                =>  __('All rights reserved', 'sunset'),
            'sanitize_callback'      =>  '',
            'transport'              =>  'refresh'
  ));

  $wp_customize->add_control('copyright_text', array(
             'type'             => 'text',
             'priority'         => 1,
             'section'          => 'footer_section_text',
             'label'            => 'Copyright Text',
             'description'      => 'Text put here will be outputted in the footer'
  ));

 /* FOR BRAND NAME IN COPYRIGHT */

  $wp_customize->add_setting('footer_brand_name', array(
            'default'                =>  esc_html__( get_bloginfo('name'), 'sunset'),
            'sanitize_callback'      =>  '',
            'transport'              =>  'refresh'
  ));

  $wp_customize->add_control('footer_brand_name', array(
             'type'             => 'text',
             'priority'         => 5,
             'section'          => 'footer_section_text',
             'label'            => 'Brand Name',
             'description'      => 'Text put here will be outputted in the footer'
  ));



/* CREATING A THEME OPTION SECTION */


  $wp_customize->add_panel('customizer_theme_option', array(
           'title'           =>     esc_html__('Theme Options', 'sunset'),
           'description'     =>     esc_html__('Theme Modifications like color scheme, theme texts and layouts preferences can be done here.', 'sunset'),
           'priority'        =>      102
  ));


  $wp_customize->add_section('customizer_theme_option_text', array(
           'title'           =>     esc_html__('Button Text', 'sunset'),
           'priority'        =>     1,
           'panel'           =>     'customizer_theme_option'
  ));

  $wp_customize->add_section('customizer_theme_button_color', array(
           'title'           =>     esc_html__('Button Color', 'sunset'),
           'priority'        =>     3,
           'panel'           =>     'customizer_theme_option'
  ));

  /* FOR COMMENT POST BUTTON */

  $wp_customize->add_setting('sunset_post_comm_text', array(
            'type'                   =>  'option',
            'default'                =>  __('Post Comments', 'sunset'),
            'sanitize_callback'      =>  '',
            'transport'              =>  'refresh'
  ));

  $wp_customize->add_control('sunset_post_comm_text', array(
             'type'             => 'text',
             'priority'         =>  1,
             'section'          => 'customizer_theme_option_text',
             'label'            => 'Post Comment Button Text',
             'description'      => 'Text put here will be outputted in the post comment button'
  ));


  /* FOR MODIFICATION OF READ MORE BUTTON TEXT */

  $wp_customize->add_setting('sunset_read_more_text', array(
            'type'                   =>  'option',
            'default'                =>  __('Read More', 'sunset'),
            'sanitize_callback'      =>  '',
            'transport'              =>  'refresh'

  ));

  $wp_customize->add_control('sunset_read_more_text', array(
             'type'             => 'text',
             'priority'         =>  2,
             'section'          => 'customizer_theme_option_text',
             'label'            => 'Read More Button Text',
             'description'      => 'Text put here will be outputted in the Read More button',
             'active_callback'  =>  'sunset_read_more_text_callback'
  ));

  /* FOR SHOWING/HIDING READ MORE BUTTON */

  $wp_customize->add_setting('sunset_read_more_activation', array(
            'type'                   =>  'option',
            'default'                =>   true,
            'sanitize_callback'      =>  'sunset_sanitize_checkbox',
            'transport'              =>  'postMessage'
  ));

  $wp_customize->add_control('sunset_read_more_activation', array(
             'type'             => 'checkbox',
             'priority'         =>  3,
             'section'          => 'customizer_theme_option_text',
             'label'            => 'Show Read More button :',
             'description'      => 'Turn off this checkbox to hide Read More buttons',
             'active_callback'  =>  'is_archive'
  ));


  /* FOR BUTTON COLORS */

  $wp_customize->add_setting('sunset_button_background_color', array(
            'type'                   =>  'option',
            'default'                =>   '343a40',
            'sanitize_callback'      =>  'sanitize_hex_color_no_hash',
            'sanitize_js_callback'   =>  'maybe_hash_hex_color',
            'transport'              =>  'postMessage'
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sunset_button_background_color', array(
             'section'          =>  'customizer_theme_button_color',
             'settings'          => 'sunset_button_background_color',
             'label'            =>  esc_html__('Background Color :', 'sunset')
  )));




/* SANITIZE AND ACTIVE CALLBACK FUNCTIONS */

  function sunset_sanitize_checkbox($checked)
  {
    return ((isset($checked) && true == $checked) ? true : false);
  }



  function sunset_read_more_text_callback($control)
  {
    $setting = $control->manager->get_setting('sunset_read_more_activation');

    if( true == $setting->value() && (is_archive() || is_home() || is_front_page())){
      return true;
    }else{
      return false;
    }
  }















}

















 ?>
