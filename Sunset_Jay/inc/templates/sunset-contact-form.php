<h1>Sunset Contact Form</h1>
<?php settings_errors();    ?>
<?php
//$picture = esc_attr(get_option('profile_picture'));

?>
<form action="options.php" method="post" class="sunset-general-form">
    <?php settings_fields('sunset-contact-options');  ?>
    <?php do_settings_sections('sunset-contact'); ?>
    <?php submit_button(); ?>
</form>