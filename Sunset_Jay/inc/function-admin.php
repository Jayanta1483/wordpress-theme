<?php
/*
@package sunset_jay theme

==================================
          Admin Page
==================================
*/


function sunset_admin_page()
{

  //Generete Sunset Admin Page
  add_menu_page(
    'Sunset theme options',
    'Sunset',
    'manage_options',
    'sunset-sidebar',
    'sunset_theme_create_page',
    'dashicons-admin-generic',
    110
  );

  //Generate Admin Sub-Pages
  add_submenu_page(
    'sunset-sidebar',
    'Sunset Sidebar Options',
    'Sidebar',
    'manage_options',
    'sunset-sidebar',
    'sunset_theme_create_page',
  );

  add_submenu_page(
    'sunset-sidebar',
    'Sunset Theme Options',
    'Theme Options',
    'manage_options',
    'sunset-theme',
    'sunset_theme_support_page',
  );

  add_submenu_page(
    'sunset-sidebar',
    'Sunset Contact Form',
    'Contact Form',
    'manage_options',
    'sunset-contact',
    'sunset_contact_form_page',
  );


  add_submenu_page(
    'sunset-sidebar',
    'Sunset Css options',
    'Custom Css',
    'manage_options',
    'sunset-css',
    'sunset_theme_settings_page',
  );



  //Activate Custom Settings
  add_action('admin_init', 'sunset_custom_settings');
}


add_action('admin_menu', 'sunset_admin_page');

//TEMPLATE SUBMENU FUNCTIONS

function sunset_theme_create_page()
{
  require_once __DIR__ . '/templates/sunset-admin.php';
}

function sunset_theme_settings_page()
{
}

function sunset_theme_support_page()
{
  require_once __DIR__ . '/templates/sunset-theme-support.php';
}

function sunset_contact_form_page()
{
  require_once __DIR__ . '/templates/sunset-contact-form.php';
}

//FUNCTION FOR CUSTOM SETTINGS

function sunset_custom_settings()
{

  // REGESTERING SETTINGS FOR EACH OPTIONS

  /* For Sidebar */

  register_setting('sunset-settings-group', 'profile_picture');
  register_setting('sunset-settings-group', 'first_name');
  register_setting('sunset-settings-group', 'last_name');
  register_setting('sunset-settings-group', 'description');
  register_setting('sunset-settings-group', 'twitter', 'sunset_sanitize_twitter');
  register_setting('sunset-settings-group', 'face_book', 'sunset_sanitize_facebook');

  /* For Theme Support  */

  register_setting('sunset-theme-support', 'post_format');
  register_setting('sunset-theme-support', 'custom_header');
  register_setting('sunset-theme-support', 'custom_background');


  /* For Contact Form */

  register_setting('sunset-contact-options', 'activate_contact');



  //  SETTINGS FOR EACH SECTIONS

  /* For Sidebar */

  add_settings_section('sunset-sidebar-options', 'Sidebar Options', 'sunset_sidebar_options', 'sunset-sidebar');

  /* For Theme Support */

  add_settings_section('sunset-theme-options', 'Theme Options', 'sunset_theme_options', 'sunset-theme');

  /* For Contact Form */

  add_settings_section('sunset-contact-sections', 'Contact Form', 'sunset_contact_section', 'sunset-contact');

  // SETTINGS OF FIELDS FOR EACH OPTIONS

  /* For Sidebar */

  add_settings_field('sidebar-profile', 'Profile Picture', 'sunset_sidebar_profile', 'sunset-sidebar', 'sunset-sidebar-options');
  add_settings_field('sidebar-fname', 'First Name', 'sunset_sidebar_fname', 'sunset-sidebar', 'sunset-sidebar-options');
  add_settings_field('sidebar-lname', 'Last Name', 'sunset_sidebar_lname', 'sunset-sidebar', 'sunset-sidebar-options');
  add_settings_field('sidebar-description', 'Description', 'sunset_sidebar_description', 'sunset-sidebar', 'sunset-sidebar-options');
  add_settings_field('twitter-handler', 'Twitter', 'sunset_sidebar_twitter', 'sunset-sidebar', 'sunset-sidebar-options');
  add_settings_field('facebook-handler', 'Facebook', 'sunset_sidebar_facebook', 'sunset-sidebar', 'sunset-sidebar-options');

  /* For Theme Support */

  add_settings_field('post-formats', 'Post Formats', 'sunset_post_formats', 'sunset-theme', 'sunset-theme-options');
  add_settings_field('custom-header', 'Custom Header', 'sunset_custom_header', 'sunset-theme', 'sunset-theme-options');
  add_settings_field('custom-background', 'Custom Background', 'sunset_custom_background', 'sunset-theme', 'sunset-theme-options');

  /* For Contact Form */

  add_settings_field('activate-form', 'Activate Contact Form', 'sunset_activate_contact', 'sunset-contact', 'sunset-contact-sections');
}




// CALLBACK FUNCTIONS FOR SECTIONS

/*For Sidebar */

function sunset_sidebar_options()
{
  echo "Customize Your Sidebar Information";
}

/*For Theme Support */

function sunset_theme_options()
{
  echo "Activate or Deactivate Specific Theme Options";
}

/*For Contact Form */

function sunset_contact_section()
{
  echo "Activate or Deactivate The Built-in Contact Form";
}

// CALLBACK FUCTIONS FOR EACH FIELDS

/* For Sidebar */

function sunset_sidebar_profile()
{
  $picture = esc_attr(get_option('profile_picture'));
  echo '<input type="button" value="Upload Profile Picture" class="button" id="profileBtn"><input type="hidden" name="profile_picture" value="' . $picture . '" id="profile">
  <input type="button" class="button" value="Remove" id="picture-remove">';
}

function sunset_sidebar_fname()
{
  $firstName = esc_attr(get_option('first_name'));
  echo '<input type="text" name="first_name" value="' . $firstName . '" class="regular-text" placeholder="First Name">';
}

function sunset_sidebar_lname()
{
  $lastName = esc_attr(get_option('last_name'));
  echo '<input type="text" name="last_name" value="' . $lastName . '" class="regular-text" placeholder="Last Name">';
}

function sunset_sidebar_description()
{
  $description = esc_attr(get_option('description'));
  echo '<input type="text" name="description" value="' . $description . '" class="regular-text" placeholder="Description">
  <p><i>write something smart</i></p>';
}

function sunset_sidebar_twitter()
{
  $twitter = esc_attr(get_option('twitter'));
  echo '<input type="text" name="twitter" value="' . $twitter . '" class="regular-text" placeholder="Your Twitter Account">';
}

function sunset_sidebar_facebook()
{
  $fb = esc_attr(get_option('face_book'));
  echo '<input type="text" name="face_book" value="' . $fb . '" class="regular-text" placeholder="Your Facebook Account">';
}

/* For Theme Option */

function sunset_post_formats()
{
  $options = get_option('post_format');
  $formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
  $output = '';

  foreach ($formats as $format) {
    $checked = (!empty($options) && $options[$format] == 1) ? 'checked' : '';
    $output .= '<label><input type="checkbox" id="' . $format . '" value="1" name="post_format[' . $format . ']" ' . $checked . '>' . $format . '</label></br>';
  }

  echo $output;
}

function sunset_custom_header()
{
  $options = esc_attr(get_option('custom_header'));
  $checked = (!empty($options) && $options == 1) ? 'checked' : '';
  echo '<label><input type="checkbox" id="custom_header" value="1" name="custom_header" ' . $checked . '>Activate Custom Header</label></br>';
}

function sunset_custom_background()
{
  $options = esc_attr(get_option('custom_background'));
  $checked = (!empty($options) && $options == 1) ? 'checked' : '';
  echo '<label><input type="checkbox" id="custom_background" value="1" name="custom_background" ' . $checked . '>Activate Custom Background</label></br>';
}


/* For Contact Form */

function sunset_activate_contact()
{
  $options = esc_attr(get_option('activate_contact'));
  $checked = (!empty($options) && $options == 1) ? 'checked' : '';
  echo '<input type="checkbox" id="activate_contact" value="1" name="activate_contact" ' . $checked . '></br>';
}

// FOR SANITIZATION

function sunset_sanitize_twitter($input)
{
  $output = sanitize_text_field($input);
  $output = str_replace('@', '', $output);
  return $output;
}

function sunset_sanitize_facebook($input)
{
  $output = sanitize_text_field($input);
  return $output;
}
