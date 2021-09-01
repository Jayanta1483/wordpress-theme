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

  $wp_customize->add_panel('customizer_theme_options', array(
           'title'           =>     esc_html__('Theme Options', 'sunset'),
           'description'     =>     esc_html__('Theme Modifications like color scheme, theme texts and layouts preferences can be done here.', 'sunset'),
           'priority'        =>      102
  ));


  $wp_customize->add_section('theme_option_text', array(
           'title'           =>     esc_html__('Text Option', 'sunset'),
           'priority'        =>     1,
           'panel'           =>     'customizer_theme_options'
  ));
}

















 ?>
