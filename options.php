<?php // option page

// https://code.tutsplus.com/tutorials/create-a-settings-page-for-your-wordpress-theme--wp-20091

// https://www.webdesignerdepot.com/2012/02/creating-a-custom-wordpress-theme-options-page/

// https://gist.github.com/DavidWells/4653358


function theme_option_page() {
?>
<div class="wrap">
<h1>Imagazine Theme Options</h1>
<form method="post" action="options.php">
<?php
// display all sections for theme-options page
settings_fields("imagazine_optionpage_grp");
do_settings_sections("imagazine_optionpage");
submit_button();
?>
</form>
</div>
<?php
}
function theme_section_description(){
echo '<p>Theme Global Settings</p>';
}

function options_callback(){
//$options = get_option( 'first_field_option' );
//echo '<p><input name="first_field_option" id="first_field_option" type="checkbox" value="1" class="code" ' . checked( 1, $options, false ) . ' /> Check for enabling custom help text.</p>';

$tracking_code_bodytop = '';
if( get_option( 'tracking_code_bodytop' ) != '' && get_option( 'tracking_code_bodytop' ) != 1 ){
	$tracking_code_bodytop = get_option( 'tracking_code_bodytop' );
}
echo '<p><textarea name="tracking_code_bodytop" id="tracking_code_bodytop" rows="7" cols="50" type="textarea">'.$tracking_code_bodytop.'</textarea></p>';

}

// note: admin-init hook to create settings section with title “New Theme Options Section”.
function imagazine_theme_settings(){
//add_option('first_field_option',1);// add theme option to database
//add_settings_section( 'first_section', 'New Theme Options Section','theme_section_description','imagazine_optionpage');

//note: add settings field with callback display_test_twitter_element.
//add_settings_field('first_field_option','Test Settings Field','options_callback','imagazine_optionpage','first_section');//add settings field to the “first_section”
//register_setting( 'imagazine_optionpage_grp', 'first_field_option');

add_option( 'tracking_code_bodytop', '');// add theme option to database
add_settings_section( 'global_section', 'Global Settings','theme_section_description','imagazine_optionpage');

add_settings_field('tracking_code_bodytop', 'Tracking code (body top)', 'options_callback', 'imagazine_optionpage', 'global_section');
register_setting( 'imagazine_optionpage_grp', 'tracking_code_bodytop');

}
add_action('admin_init','imagazine_theme_settings');

function imagazine_admin_menu () {
    $page_title = 'Imagazine Theme Options';
    $menu_title = 'Imagazine';
    $capability = 'edit_posts';
    $menu_slug = 'imagazine_optionpage';
    $function = 'theme_option_page';
    $icon_url = '';
    $position = 110;

    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
}
add_action('admin_menu', 'imagazine_admin_menu');


?>
