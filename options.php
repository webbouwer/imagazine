<?php // option page





function imagazine_admin_menu () {
    $page_title = 'Imagazine Theme settings Page';
    $menu_title = 'Imagazine';
    $capability = 'edit_posts';
    $menu_slug = 'imagazine_optionpage';
    $function = 'imagazine_theme_settings_page';
    $icon_url = '';
    $position = 110;

    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
}
add_action('admin_menu', 'imagazine_admin_menu');

function imagazine_theme_settings_page(){
?>
    <h1>Imagazine Theme settings</h1>
    <?php settings_errors(); ?>

	<p>This page is for testing</p>
    <form method="post" action="options.php">
        <?php settings_fields("setting-group");?>
        <?php do_settings_sections('imagazine_optionpage')?>
        <?php submit_button();?>
    </form>

<?php
}

/*
add_action('admin_init','ff_custom_setting');
function ff_custom_setting(){
   register_setting('setting-group', 'first_name');
   register_setting('setting-group', 'last_name');
   register_setting('setting-group', 'twitter_field');
   register_setting('setting-group', 'facebook_field');
   add_settings_section('ff_sidebar_options','Sidebar Options', 'ff_sidebar_options', 'awesome_page');
   add_settings_field('sidebar-name','Full Name','sidebar_full_name_func', 'awesome_page','ff_sidebar_options');
   add_settings_field('sidebar-twitter','Twitter','sidebar_twitter_func', 'awesome_page','ff_sidebar_options');
   add_settings_field('sidebar-facebook','Facebook','sidebar_facebook_func', 'awesome_page','ff_sidebar_options');
   }
function ff_sidebar_options(){
   echo 'You sidebar options.';
}
function sidebar_full_name_func(){
   $first_name = esc_attr(get_option( 'first_name' ));
   $last_name = esc_attr(get_option( 'last_name' ));
   echo '<input type="text" name="first_name" value="'.$first_name.'" placeholder="first name">
         <input type="text" name="last_name" value="'.$last_name.'" placeholder="last name">';
 }
function sidebar_twitter_func(){
   $twitter = esc_attr(get_option( 'twitter_field' ));
   echo '<input type="text" name="twitter_field" value="'.$twitter.'" placeholder="Your Twitter id here">';
}
function sidebar_facebook_func(){
   $facebook = esc_attr(get_option( 'facebook_field' ));
   echo '<input type="text" name="facebook_field" value="'.$facebook.'" placeholder="Your Facebook id here ">';
}
*/
?>
