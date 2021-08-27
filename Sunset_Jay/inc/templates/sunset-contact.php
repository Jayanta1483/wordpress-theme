<h1>Sunset Contact</h1>
<?php settings_errors();    ?>
<p>Use this <strong>shortcode</strong> for contact form : <strong>[sunset_contact_form]</strong></p>
<p></p>
<form action="options.php" method="post" class="sunset-general-form">
    <?php settings_fields('sunset-contact-options');  ?>
    <?php do_settings_sections('sunset-contact'); ?>
    <?php submit_button(); ?>
</form>
