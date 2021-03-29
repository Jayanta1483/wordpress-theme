<h1>Sunset Theme Options</h1>
<?php settings_errors();    ?>
<?php
$firstName = esc_attr(get_option('first_name'));
$lastName = esc_attr(get_option('last_name'));
$full_name = $firstName . ' ' . $lastName;
$description = esc_attr(get_option('description'));
?>
<div class="preview-wrapper"><p style="text-align: center;"><i>Preview</i></p>
<div class="sunset-sidebar-preview">
    <div class="sunset-sidebar">
        <h1 class="sunset-username"><?php echo $full_name; ?></h1>
        <h2 class="sunset-description"><?php echo $description; ?></h2>
        <div class="icons-wrapper">

        </div>
    </div>
</div>
</div>
<form action="options.php" method="post" class="sunset-general-form">
    <?php settings_fields('sunset-settings-group');  ?>
    <?php do_settings_sections('jay-sunset'); ?>
    <?php submit_button(); ?>
</form>