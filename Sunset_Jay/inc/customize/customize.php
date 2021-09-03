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


  $wp_customize->add_setting('footer_brand_name', array(
            'default'                =>  esc_html__( get_bloginfo('name'), 'sunset'),
            //'capability' => 'edit_theme_options',
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






  $wp_customize->add_panel('customizer_theme_option', array(
           'title'           =>     esc_html__('Theme Options', 'sunset'),
           'description'     =>     esc_html__('Theme Modifications like color scheme, theme texts and layouts preferences can be done here.', 'sunset'),
           'priority'        =>      102
  ));


  $wp_customize->add_section('customizer_theme_option_text', array(
           'title'           =>     esc_html__('Text Option', 'sunset'),
           'priority'        =>     1,
           'panel'           =>     'customizer_theme_option'
  ));

  $wp_customize->add_setting('sunset_post_comm_text', array(
            'type'                   =>  'theme_mod',
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







}

















 ?>
