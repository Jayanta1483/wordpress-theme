<h1>Sunset Theme Support</h1>
<?php settings_errors();    ?>
<?php
//$picture = esc_attr(get_option('profile_picture'));

?>
<form action="options.php" method="post" class="sunset-general-form">
    <?php settings_fields('sunset-theme-options');  ?>
    <?php do_settings_sections('sunset-theme'); ?>
    <?php submit_button(); ?>
</form>