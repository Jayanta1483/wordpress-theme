<h1>Sunset Custom CSS</h1>
<?php settings_errors();    ?>
<?php
//$picture = esc_attr(get_option('profile_picture'));

?>
<form action="options.php" method="post" class="sunset-general-form">
    <?php settings_fields('sunset-custom-css');  ?>
    <?php do_settings_sections('sunset-css'); ?>
    <?php submit_button(); ?>
</form>