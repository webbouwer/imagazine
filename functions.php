<?php
// Functions setup

require get_template_directory() . '/options.php'; // options functions
require get_template_directory() . '/customizer.php'; // customizer functions




	/*
	 * Register Theme Support
	 */
	function imagazine_setup_theme_global() {
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'big-thumb', 320, 9999 );
		add_image_size( 'medium', 480, 9999 );
		add_image_size( 'normal', 960, 9999 );
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-header' );
		add_theme_support( 'custom-background' );
	}
	add_action( 'after_setup_theme', 'imagazine_setup_theme_global' );





	/*
	 * Register menu's
	 */
	function imagazine_setup_register_menus() {
		register_nav_menus(
			array(
			'uppermenu' => __( 'Upper menu' , 'imagazine' ),
			'topmenu' => __( 'Top menu' , 'imagazine' ),
			'sidemenu' => __( 'Side menu' , 'imagazine' ),
			'footermenu' => __( 'Footer menu' , 'imagazine' )
			)
		);
	}
	add_action( 'init', 'imagazine_setup_register_menus' );





	/*
	 * Return of the Links Manager
	 */
	add_filter( 'pre_option_link_manager_enabled', '__return_true' );





	/*
	 * Editor style WP THEME STANDARD
	 */
	function imagazine_editor_styles() {
		add_editor_style( 'style.css' );
		//add_editor_style( get_theme_mod('onepiece_identity_stylelayout_stylesheet', 'default.css') );
	}
	add_action( 'admin_init', 'imagazine_editor_styles' );


	/* JQuery init */
	function imagazine_frontend_jquery() {
		wp_enqueue_script('jquery');
	}
	add_action( 'init', 'imagazine_frontend_jquery' );

	/* Proper way to enqueue scripts and styles */
	function imagazine_theme_scripts() {
		wp_enqueue_style( 'basic-stylesheet', get_stylesheet_uri() );
		//wp_enqueue_script( 'theme-responsive', get_template_directory_uri()
		// . '/assets/responsive.js', array(), '1.0.0', true );
	}
	add_action( 'wp_enqueue_scripts', 'imagazine_theme_scripts' );


	/* Widgets */
	function imagazine_setup_widgets_init() {
		if (function_exists('register_sidebar')) {


			// the upperbar sidebar
			register_sidebar(array(
				'name' => 'Uppersidebar',
				'id'   => 'uppersidebar',
				'description'   => 'This is for top widget(s) above on top of the topbar.',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '<div class="clr"></div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			));

			// the top widgets
			register_sidebar(array(
				'name' => 'Top widgets',
				'id'   => 'topwidgets',
				'description'   => 'This is for top widget(s) above on top of the topbar.',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '<div class="clr"></div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			));


			// the topbar sidebar widget column
			register_sidebar(array(
				'name' => 'Top sidebar 1',
				'id'   => 'topsidebar-1',
				'description'   => 'This is the top sidebar 1 adding a widget column in the top navigation bar.',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '<div class="clr"></div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			));
			// the topbar sidebar widget column
			register_sidebar(array(
				'name' => 'Top sidebar 2',
				'id'   => 'topsidebar-2',
				'description'   => 'This is the second top sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '<div class="clr"></div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			));



			// the header sidebar widget
			register_sidebar(array(
				'name' => 'Header sidebar 1',
				'id'   => 'headersidebar-1',
				'description'   => 'This is the header sidebar 1 adding a widget column in the header bar.',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '<div class="clr"></div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			));
			// the header sidebar widget
			register_sidebar(array(
				'name' => 'Header sidebar 2',
				'id'   => 'headersidebar-2',
				'description'   => 'This is the header sidebar 2 adding a widget column in the header bar.',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '<div class="clr"></div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			));


			// the header columns widget
			register_sidebar(array(
				'name' => 'Header Column Widgets',
				'id'   => 'headercolumns',
				'description'   => 'Header widgetized columns',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '<div class="clr"></div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			));



			// the default wordpress header widget
			register_sidebar(array(
				'name' => 'Header content (Widgets Default)',
				'id'   => 'widgets-header',
				'description'   => 'This is a standard wordpress widgetized area.',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '<div class="clr"></div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			));

			// the columns below content
			register_sidebar(array(
				'name' => 'Content top widgets',
				'id'   => 'contenttopwidgets',
				'description'   => 'Before maincontent widgetized area ',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '<div class="clr"></div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			));

			// the columns after the main content
			register_sidebar(array(
				'name' => 'Content bottom widgets',
				'id'   => 'contentbottomwidgets',
				'description'   => 'After main content widgetized area',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '<div class="clr"></div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			));

			// the content sidebar widget
			register_sidebar(array(
				'name' => 'Content sidebar 1 (Widgets Default)',
				'id'   => 'sidebar',
				'description'   => 'This is a standard wordpress sidebar widgetized area.',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '<div class="clr"></div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			));

			// the content sidebar 2 widget
			register_sidebar(array(
				'name' => 'Content sidebar 2 (Second Widget column)',
				'id'   => 'sidebar-2',
				'description'   => 'This is a second main content sidebar widgetized area.',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '<div class="clr"></div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			));


			// the footer  columns
			register_sidebar(array(
				'name' => 'Footer Column Widgets',
				'id'   => 'footercolumns',
				'description'   => 'Footer widgetized columns',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '<div class="clr"></div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			));

			// the footer content
			register_sidebar(array(
				'name' => 'Footer Content Widgets',
				'id'   => 'footercontent',
				'description'   => 'Footer widgetized content',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '<div class="clr"></div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			));

			// the footer sidebar widget column
			register_sidebar(array(
				'name' => 'Footer sidebar 1',
				'id'   => 'footersidebar-1',
				'description'   => 'This is the footer sidebar adding a widget column in the footer bar.',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '<div class="clr"></div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			));

			// the footer sidebar widget column
			register_sidebar(array(
				'name' => 'Footer sidebar 2',
				'id'   => 'footersidebar-2',
				'description'   => 'This is the footer sidebar adding a widget column in the footer bar.',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '<div class="clr"></div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			));




		}
	}
	add_action( 'widgets_init', 'imagazine_setup_widgets_init' );

	/*
	 * Check active widgets
	 */
	function is_sidebar_active( $sidebar_id ){
		$the_sidebars = wp_get_sidebars_widgets();
		if( !isset( $the_sidebars[$sidebar_id] ) )
			return false;
		else
			return count( $the_sidebars[$sidebar_id] );
	}





	/*
	 * Register global variables (options/customizer)
	 */
	$wp_global_data = array(); // special var $wp_global_data
	$wp_global_data['customizer'] = json_encode(get_theme_mods());







/*
	 * WP CUSTOM VARS LOCATED
	 * Javascript with customizer variables
	 * see assets/customizer_topbar.js, assets/global.js
	 */

	// http://wordpress.stackexchange.com/questions/57386/how-do-i-force-wp-enqueue-scripts-to-load-at-the-end-of-head
	function imagazine_global_js() {

		// Register the script first.
		wp_register_script( 'custom_global_js', get_template_directory_uri().'/assets/global.js', 99, '1.0', false);
		//wp_register_script( 'custom_topbar_js', get_template_directory_uri().'/assets/customizer_topbar.js', 99, '1.0', false);

		// Get the global data list.
		global $wp_global_data;

		// Localize the global data list for the script
		wp_localize_script( 'custom_global_js', 'site_data', $wp_global_data );
		//wp_localize_script( 'custom_topbar_js', 'site_data', $wp_global_data );

		// localize the script with specific data.
		//$color_array = array( 'color1' => get_theme_mod('color1'), 'color2' => '#000099' );
		//wp_localize_script( 'custom_global_js', 'object_name', $color_array );

		// The script can be enqueued now or later.
		wp_enqueue_script( 'custom_global_js');
		//wp_enqueue_script( 'custom_topbar_js');



	}

	add_action('wp_enqueue_scripts', 'imagazine_global_js');

	/*
	function imagazine_customizer_init_js() {
	}
	if ( is_customize_preview() ) {
	add_action('customize_preview_init', 'imagazine_customizer_init_js');
	}else{
	}
	*/





/**
 * Keep category select list in hiearchy
 * source http://wordpress.stackexchange.com/questions/61922/add-post-screen-keep-category-structure
 */
function imagazine_wp_terms_checklist_args( $args, $post_id ) {

   $args[ 'checked_ontop' ] = false;

   return $args;

}
add_filter( 'wp_terms_checklist_args', 'imagazine_wp_terms_checklist_args', 1, 2 );




/*
*/

?>
