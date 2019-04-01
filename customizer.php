<?php
// Customizer Imagazine
// todo ..
// https://www.gavick.com/blog/using-javascript-theme-customization-screen

function imagazine_theme_customizer( $wp_customize ){

	// REMOVE some core theme settings first
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('background_color');
	$wp_customize->remove_panel('colors');


	$imagazine_themename = get_option( 'stylesheet' );
   	$imagazine_themename = preg_replace("/\W/", "_", strtolower( $imagazine_themename ) );


	// add panels
    $wp_customize->add_panel('imagazine_global', array(
        'title'    => __('Global', 'imagazine'),
        'priority' => 10,
    ));

    $wp_customize->add_panel('imagazine_upperbar', array(
        'title'    => __('Upperbar', 'imagazine'),
        'priority' => 40,
    ));

    $wp_customize->add_panel('imagazine_topbar', array(
        'title'    => __('Topbar', 'imagazine'),
        'priority' => 50,
    ));

    $wp_customize->add_panel('imagazine_header', array(
        'title'    => __('Header', 'imagazine'),
        'priority' => 60,
    ));


    $wp_customize->add_panel('imagazine_content', array(
        'title'    => __('Content', 'imagazine'),
        'priority' => 70,
    ));

    $wp_customize->add_panel('imagazine_footer', array(
        'title'    => __('Footer', 'imagazine'),
        'priority' => 80,
    ));




	// move sections
	$wp_customize->add_section('title_tagline', array(
        'title'    => __('Identity', 'imagazine'),
        'panel'  => 'imagazine_global',
		'priority' => 20,
    ));
	$wp_customize->add_section('static_front_page', array(
        'title'    => __('Frontpage Type', 'imagazine'),
        'panel'  => 'imagazine_global',
		'priority' => 30,
    ));

	$wp_customize->add_section('header_image', array(
		'title'    => __('Header image', 'imagazine'),
    	'panel'  => 'imagazine_header',
		'priority' => 40,
    ));

	$wp_customize->add_section('background_image', array(
        'title'    => __('Background Image', 'imagazine'),
        'panel'  => 'imagazine_global',
		'priority' => 20,
    ));


	// Global custom sections

	$wp_customize->add_section('imagazine_global_styles', array(
        'title'    => __('Styling', 'imagazine'),
        'panel'  => 'imagazine_global',
		'priority' => 20,
    ));



	$wp_customize->add_section('imagazine_global_share', array(
        'title'    => __('Share settings', 'imagazine'),
        'panel'  => 'imagazine_global',
		'priority' => 20,
    ));



	$wp_customize->add_section('imagazine_global_screenmode', array(
        'title'    => __('Screen modes', 'imagazine'),
        'panel'  => 'imagazine_global',
		'priority' => 120,
    ));





	// header sections
	$wp_customize->add_section('imagazine_header_settings', array(
        'title'    => __('Header settings', 'imagazine'),
        'panel'  => 'imagazine_header',
		'priority' => 80,
    ));

	$wp_customize->add_section('imagazine_header_styling', array(
        'title'    => __('Header styling', 'imagazine'),
        'panel'  => 'imagazine_header',
		'priority' => 80,
    ));
	$wp_customize->add_section('imagazine_header_sidebar1', array(
        'title'    => __('Header sidebar 1', 'imagazine'),
        'panel'  => 'imagazine_header',
		'priority' => 80,
    ));
	$wp_customize->add_section('imagazine_header_sidebar2', array(
        'title'    => __('Header sidebar 2', 'imagazine'),
        'panel'  => 'imagazine_header',
		'priority' => 80,
    ));


	// upperbar
	$wp_customize->add_section('imagazine_upperbar_behavior', array(
        'title'    => __('Behavior', 'imagazine'),
        'panel'  => 'imagazine_upperbar',
		'priority' => 120,
    ));

	$wp_customize->add_section('imagazine_upperbar_menu', array(
        'title'    => __('Menu', 'imagazine'),
        'panel'  => 'imagazine_upperbar',
		'priority' => 120,
    ));

	$wp_customize->add_section('imagazine_upperbar_styling', array(
        'title'    => __('Styling', 'imagazine'),
        'panel'  => 'imagazine_upperbar',
		'priority' => 20,
    ));
	$wp_customize->add_section('imagazine_upperbar_sidebar', array(
        'title'    => __('Sidebar', 'imagazine'),
        'panel'  => 'imagazine_upperbar',
		'priority' => 120,
    ));



	// Topbar sections
	$wp_customize->add_section('imagazine_topbar_behavior', array(
        'title'    => __('Behavior', 'imagazine'),
        'panel'  => 'imagazine_topbar',
		'priority' => 20,
    ));

	$wp_customize->add_section('imagazine_topbar_logo', array(
        'title'    => __('Logo', 'imagazine'),
        'panel'  => 'imagazine_topbar',
		'priority' => 50,
    ));
	$wp_customize->add_section('imagazine_topbar_menu', array(
        'title'    => __('Menu', 'imagazine'),
        'panel'  => 'imagazine_topbar',
		'priority' => 90,
    ));
	$wp_customize->add_section('imagazine_topbar_styling', array(
        'title'    => __('Styling', 'imagazine'),
        'panel'  => 'imagazine_topbar',
		'priority' => 20,
    ));
	$wp_customize->add_section('imagazine_topbar_widgets', array(
        'title'    => __('Widgets', 'imagazine'),
        'panel'  => 'imagazine_topbar',
		'priority' => 100,
    ));
	$wp_customize->add_section('imagazine_topbar_sidebar1', array(
        'title'    => __('Sidebar 1', 'imagazine'),
        'panel'  => 'imagazine_topbar',
		'priority' => 120,
    ));

	$wp_customize->add_section('imagazine_topbar_sidebar2', array(
        'title'    => __('Sidebar 2', 'imagazine'),
        'panel'  => 'imagazine_topbar',
		'priority' => 120,
    ));

	// content types settings
	$wp_customize->add_section('imagazine_content_blogpagedisplay', array(
        'title'    => __('Blog page', 'imagazine'),
        'panel'  => 'imagazine_content',
		'priority' => 70,
    ));
	$wp_customize->add_section('imagazine_content_listdisplay', array(
        'title'    => __('Post lists', 'imagazine'),
        'panel'  => 'imagazine_content',
		'priority' => 80,
    ));

	$wp_customize->add_section('imagazine_content_postdisplay', array(
        'title'    => __('Posts', 'imagazine'),
        'panel'  => 'imagazine_content',
		'priority' => 90,
    ));

	$wp_customize->add_section('imagazine_content_pagedisplay', array(
        'title'    => __('Pages', 'imagazine'),
        'panel'  => 'imagazine_content',
		'priority' => 100,
    ));
	// main content sidebar 1
	$wp_customize->add_section('imagazine_content_sidebar1', array(
        'title'    => __('Sidebar 1', 'imagazine'),
        'panel'  => 'imagazine_content',
		'priority' => 120,
    ));

	// main content sidebar 2
	$wp_customize->add_section('imagazine_content_sidebar2', array(
        'title'    => __('Sidebar 2', 'imagazine'),
        'panel'  => 'imagazine_content',
		'priority' => 120,
    ));

	// sub content
	$wp_customize->add_section('imagazine_content_subcontent', array(
        'title'    => __('Subcontent', 'imagazine'),
        'panel'  => 'imagazine_content',
		'priority' => 120,
    ));



	// Footer
	$wp_customize->add_section('imagazine_footer_behavior', array(
        'title'    => __('Behavior', 'imagazine'),
        'panel'  => 'imagazine_footer',
		'priority' => 120,
    ));

	$wp_customize->add_section('imagazine_footer_columns', array(
        'title'    => __('Column widgets', 'imagazine'),
        'panel'  => 'imagazine_footer',
		'priority' => 120,
    ));


	$wp_customize->add_section('imagazine_footer_menu', array(
        'title'    => __('Menu ', 'imagazine'),
        'panel'  => 'imagazine_footer',
		'priority' => 120,
    ));

	$wp_customize->add_section('imagazine_footer_styling', array(
        'title'    => __('Styling', 'imagazine'),
        'panel'  => 'imagazine_footer',
		'priority' => 120,
    ));



	$wp_customize->add_section('imagazine_footer_sidebar1', array(
        'title'    => __('Sidebar 1', 'imagazine'),
        'panel'  => 'imagazine_footer',
		'priority' => 120,
    ));

	$wp_customize->add_section('imagazine_footer_sidebar2', array(
        'title'    => __('Sidebar 2', 'imagazine'),
        'panel'  => 'imagazine_footer',
		'priority' => 120,
    ));





	/* Global */

	// Global - Identity

    $wp_customize->add_setting( 'imagazine_globalshare_siteauthor_name' , array(
		'default' => '',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 20,
    	));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_globalshare_siteauthor_name', array(
            	'label'          => __( 'Site author name' , 'imagazine' ),
            	'section'        => 'title_tagline',
            	'type'           => 'text',
 	    		'description'    => __( 'Site author name', 'imagazine' ),
    )));


    $wp_customize->add_setting( 'imagazine_globalshare_copyrighttext' , array(
		'default' => '© '. date("Y") .'',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 20,
    	));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_globalshare_copyrighttext', array(
            	'label'          => __( 'Copyright text' , 'imagazine' ),
            	'section'        => 'title_tagline',
            	'type'           => 'text',
 	    		'description'    => __( 'Copyright text line', 'imagazine' ),
    )));


    /* Global color styling

    background-color
    text color

    text | padding:10px 2px 5px 2px;
    text | margin:10px 2px 5px 2px;
	select | text-transform:uppercase;
	range | font-size:1em;
	range | letter-spacing:0.04em;


    header title
    text color
    select | alignment
    range | font-size:1em;
	range | letter-spacing:0.04em;
	select | text-transform:lowercase;
    text | padding:10px 2px 5px 2px;
    select | font-type

    h1 ..
    h2 ..
    h3 ..

    date and author text ..

    list cover title ..
    widget titles ..

    etc.
    */


    /* Font Styling */
	$wp_customize->add_setting( 'imagazine_global_styles_mainfont' , array(
		'default' => 'Lato|Martel',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 20,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_global_styles_mainfont', array(
            	'label'          => __( 'Font style family (google fonts)' , 'imagazine' ),
            	'section'        => 'imagazine_global_styles',
            	'type'           => 'text',
 	    		'description'    => __( 'Copy the google font syntax ( fontname | fontname | ..) here', 'imagazine' ),
    )));
	$wp_customize->add_setting( 'imagazine_global_styles_subsetfont' , array(
		'default' => 'latin,latin-ext',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 20,
    	));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_global_styles_subsetfont', array(
            	'label'          => __( 'Font style subset (google fonts)' , 'imagazine' ),
            	'section'        => 'imagazine_global_styles',
            	'type'           => 'text',
 	    		'description'    => __( 'Copy the google font syntax ( fontname | fontname | ..) here', 'imagazine' ),
    )));




	/* Global - Share	*/

	$wp_customize->add_setting( 'imagazine_globalshare_defaultimage', array(
		'sanitize_callback' => 'imagazine_sanitize_default',
        'priority' => 30,
	 ));
	 $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'imagazine_globalshare_defaultimage', array(
        	'label'    => __( 'Default image', 'imagazine' ),
        	'section'  => 'imagazine_global_share',
        	'settings' => 'imagazine_globalshare_defaultimage',
			'description' => __( 'Upload or select an image to share as default site cover/thumb', 'imagazine' ),
   	) ) );

	$wp_customize->add_setting( 'imagazine_globalshare_defaulttext' , array(
		'default' => '',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 20,
    	));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_globalshare_defaulttext', array(
            	'label'          => __( 'Default Description' , 'imagazine' ),
            	'section'        => 'imagazine_global_share',
            	'type'           => 'textarea',
 	    		'description'    => __( 'Text to share as default description', 'imagazine' ),
    )));




	/* Global - Sreen modes */
	/*
    small screen outermargin
    medium screen switch
    medium screen outermargin
    large screen switch
    large screen outermargin
	*/
		$wp_customize->add_setting( 'imagazine_global_screenmode_smallwidth' , array(
		'default' => 100,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_global_screenmode_smallwidth', array(
            	'label'          => __( 'Small screen width', 'imagazine' ),
            	'section'        => 'imagazine_global_screenmode',
            	'settings'       => 'imagazine_global_screenmode_smallwidth',
            	'type'           => 'number',
 	    	'description'    => __( 'Define content width for small screen mode (%).', 'imagazine' ),
    	)));

		$wp_customize->add_setting( 'imagazine_global_screenmode_smallmargin' , array(
		'default' => 320,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_global_screenmode_smallmargin', array(
            	'label'          => __( 'Small screen outermargin', 'imagazine' ),
            	'section'        => 'imagazine_global_screenmode',
            	'settings'       => 'imagazine_global_screenmode_smallmargin',
            	'type'           => 'number',
 	    	'description'    => __( 'Define outermargin for small screen mode (px).', 'imagazine' ),
    	)));

		$wp_customize->add_setting( 'imagazine_global_screenmode_mediummin' , array(
		'default' => 580,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_global_screenmode_mediummin', array(
            	'label'          => __( 'Medium screen min width', 'imagazine' ),
            	'section'        => 'imagazine_global_screenmode',
            	'settings'       => 'imagazine_global_screenmode_mediummin',
            	'type'           => 'number',
 	    	'description'    => __( 'Define min. width for medium screen mode (px).', 'imagazine' ),
    	)));


		$wp_customize->add_setting( 'imagazine_global_screenmode_mediumwidth' , array(
		'default' => 94,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_global_screenmode_mediumwidth', array(
            	'label'          => __( 'Medium screen width', 'imagazine' ),
            	'section'        => 'imagazine_global_screenmode',
            	'settings'       => 'imagazine_global_screenmode_mediumwidth',
            	'type'           => 'number',
 	    	'description'    => __( 'Define content width for medium screen mode (%).', 'imagazine' ),
    	)));

		$wp_customize->add_setting( 'imagazine_global_screenmode_mediummargin' , array(
		'default' => 960,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_global_screenmode_mediummargin', array(
            	'label'          => __( 'Medium screen outermargin', 'imagazine' ),
            	'section'        => 'imagazine_global_screenmode',
            	'settings'       => 'imagazine_global_screenmode_mediummargin',
            	'type'           => 'number',
 	    	'description'    => __( 'Define outermargin for medium screen mode (px).', 'imagazine' ),
    	)));


		$wp_customize->add_setting( 'imagazine_global_screenmode_largemin' , array(
		'default' => 1150,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_global_screenmode_largemin', array(
            	'label'          => __( 'Large screen min width', 'imagazine' ),
            	'section'        => 'imagazine_global_screenmode',
            	'settings'       => 'imagazine_global_screenmode_largemin',
            	'type'           => 'number',
 	    	'description'    => __( 'Define min. width for large screen mode (px).', 'imagazine' ),
    	)));
		$wp_customize->add_setting( 'imagazine_global_screenmode_largewidth' , array(
		'default' => 96,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_global_screenmode_largewidth', array(
            	'label'          => __( 'Large screen width', 'imagazine' ),
            	'section'        => 'imagazine_global_screenmode',
            	'settings'       => 'imagazine_global_screenmode_largewidth',
            	'type'           => 'number',
 	    	'description'    => __( 'Define content width for large screen mode (%).', 'imagazine' ),
    	)));

		$wp_customize->add_setting( 'imagazine_global_screenmode_largemargin' , array(
		'default' => 1280,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_global_screenmode_largemargin', array(
            	'label'          => __( 'Large screen outermargin', 'imagazine' ),
            	'section'        => 'imagazine_global_screenmode',
            	'settings'       => 'imagazine_global_screenmode_largemargin',
            	'type'           => 'number',
 	    	'description'    => __( 'Define outermargin for Large screen mode (px).', 'imagazine' ),
    	)));

		$wp_customize->add_setting( 'imagazine_global_screenmode_pagewidth' , array(
		'default' => 96,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_global_screenmode_pagewidth', array(
            	'label'          => __( 'Page width', 'imagazine' ),
            	'section'        => 'imagazine_global_screenmode',
            	'settings'       => 'imagazine_global_screenmode_pagewidth',
            	'type'           => 'number',
 	    	'description'    => __( 'Define page constant width for all content(%).', 'imagazine' ),
    	)));
		$wp_customize->add_setting( 'imagazine_global_screenmode_pagemaxwidth' , array(
		'default' => 1480,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_global_screenmode_pagemaxwidth', array(
            	'label'          => __( 'Page max width', 'imagazine' ),
            	'section'        => 'imagazine_global_screenmode',
            	'settings'       => 'imagazine_global_screenmode_pagemaxwidth',
            	'type'           => 'number',
 	    	'description'    => __( 'Define max full width for all page content(px).', 'imagazine' ),
    	)));






	/* Upperbar - behavior */
	$wp_customize->add_setting( 'imagazine_upperbar_behavior_displaysmall' , array(
		'default' => 'fixed',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 20,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_upperbar_behavior_displaysmall', array(
            'label'          => __( 'Upperbar small screen display', 'imagazine' ),
            'section'        => 'imagazine_upperbar_behavior',
            'settings'       => 'imagazine_upperbar_behavior_displaysmall',
            'type'           => 'select',
 	    	'description'    => __( 'Select small screen display', 'imagazine' ),
            'choices'        => array(
                'fixed'   => __( 'Fixed on top', 'imagazine' ),
                'relative'   => __( 'Scroll with page', 'imagazine' ),
                'none'   => __( 'Do not display', 'imagazine' ),
            )
    )));
	$wp_customize->add_setting( 'imagazine_upperbar_behavior_displaylarge' , array(
		'default' => 'fixed',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 20,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_upperbar_behavior_displaylarge', array(
            'label'          => __( 'Upperbar large screen display', 'imagazine' ),
            'section'        => 'imagazine_upperbar_behavior',
            'settings'       => 'imagazine_upperbar_behavior_displaylarge',
            'type'           => 'select',
 	    	'description'    => __( 'Select large screen display', 'imagazine' ),
            'choices'        => array(
                'fixed'   => __( 'Fixed on top', 'imagazine' ),
                'relative'   => __( 'Scroll with page', 'imagazine' ),
                'none'   => __( 'Do not display', 'imagazine' ),
            )
    )));


	$wp_customize->add_setting( 'imagazine_upperbar_behavior_width' , array(
		'default' => 'full',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 30,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_upperbar_behavior_width', array(
            'label'          => __( 'Upperbar max width', 'imagazine' ),
            'section'        => 'imagazine_upperbar_behavior',
            'settings'       => 'imagazine_upperbar_behavior_width',
            'type'           => 'select',
 	    	'description'    => __( 'Select upperbar max width', 'imagazine' ),
            'choices'        => array(
                'full'   => __( 'Full screen width', 'imagazine' ),
                'margin'   => __( 'Page margin width ( global > screen modes )', 'imagazine' ),
            )
    )));

	/* Upperbar - Menu */

    // font size.


	$wp_customize->add_setting( 'imagazine_upperbar_menu_smallscreen' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 40,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_upperbar_menu_smallscreen', array(
            'label'          => __( 'Small screen navigation', 'imagazine' ),
            'section'        => 'imagazine_upperbar_menu',
            'settings'       => 'imagazine_upperbar_menu_smallscreen',
            'type'           => 'select',
 	    	'description'    => __( 'Select small screen menu display', 'imagazine' ),
            'choices'        => array(
                'open'   => __( 'Open', 'imagazine' ),
                //'collapsed'   => __( 'Collapsed (!in development)', 'imagazine' ),
                'none'   => __( 'No display', 'imagazine' ),
            )
    )));

	$wp_customize->add_setting( 'imagazine_upperbar_menu_largescreen' , array(
		'default' => 'center',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 60,
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_upperbar_menu_largescreen', array(
            'label'          => __( 'Large screen navigation', 'imagazine' ),
            'section'        => 'imagazine_upperbar_menu',
            'settings'       => 'imagazine_upperbar_menu_largescreen',
            'type'           => 'select',
 	    	'description'    => __( 'Select medium/large screen menu display', 'imagazine' ),
            'choices'        => array(
                'left'   => __( 'left', 'imagazine' ),
                'center'   => __( 'center', 'imagazine' ),
                'right'   => __( 'right', 'imagazine' ),
                //'collapsed'   => __( 'Collapsed (!in development)', 'imagazine' ),
                'none'   => __( 'No display', 'imagazine' ),
            )
    )));

	$wp_customize->add_setting( 'imagazine_upperbar_menu_textalign' , array(
		'default' => 'center',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 60,
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_upperbar_menu_textalign', array(
            'label'          => __( 'Navigation text alignment', 'imagazine' ),
            'section'        => 'imagazine_upperbar_menu',
            'settings'       => 'imagazine_upperbar_menu_textalign',
            'type'           => 'select',
 	    	'description'    => __( 'Align upperbar navigation menu text', 'imagazine' ),
            'choices'        => array(
                'left'   => __( 'left', 'imagazine' ),
                'center'   => __( 'center', 'imagazine' ),
                'right'   => __( 'right', 'imagazine' ),
            )
    )));


    /* upperbar
    menu links

    text | padding:10px 2px 5px 2px;
	select | text-transform:uppercase;
	texxt font-size:1em;
	letter-spacing:0.04em;
    background-color
    color
	text-decoration:none;

    menu links hover::

    background-color
    color
	text-decoration:none;

    custom style:
    textarea
    */



        $wp_customize->add_setting( 'imagazine_upperbar_styling_bgcolor' , array(
            'default' => 0.3,
            'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagazine_upperbar_styling_bgcolor', array(
                'label'      => __( 'Background color', 'imagazine' ),
                'section'    => 'imagazine_upperbar_styling',
                'settings'   => 'imagazine_upperbar_styling_bgcolor',
        )));


        $wp_customize->add_setting( 'imagazine_upperbar_styling_bgtransparancy' , array(
		'default' => 0.3,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_upperbar_styling_bgtransparancy', array(
            	'label'          => __( 'Background transparancy', 'imagazine' ),
            	'section'        => 'imagazine_upperbar_styling',
            	'settings'       => 'imagazine_upperbar_styling_bgtransparancy',
            	/*'type'           => 'number',*/
                'type'              => 'range',
                'input_attrs'       => array(
                    'min'           => 0,
                    'max'           => 1.00,
                    'step'          => 0.01,
                ),
 	    		'description'    => __( 'Set transparancy (0.01 - 1.00)', 'imagazine' ),
    	)));

        $wp_customize->add_setting( 'imagazine_upperbar_styling_textcolor' , array(
		  'default' => '#fefefe',
		  'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagazine_upperbar_styling_textcolor', array(
                'label'      => __( 'Text color', 'imagazine' ),
                'section'    => 'imagazine_upperbar_styling',
                'settings'   => 'imagazine_upperbar_styling_textcolor',
        )));

       $wp_customize->add_setting( 'imagazine_upperbar_styling_linkcolor' , array(
		  'default' => '#ffffff',
		  'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagazine_upperbar_styling_linkcolor', array(
                'label'      => __( 'Link color', 'imagazine' ),
                'section'    => 'imagazine_upperbar_styling',
                'settings'   => 'imagazine_upperbar_styling_linkcolor',
        )));

        $wp_customize->add_setting( 'imagazine_upperbar_styling_hovercolor' , array(
		  'default' => '#cecece',
		  'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagazine_upperbar_styling_hovercolor', array(
                'label'      => __( 'Link hover color', 'imagazine' ),
                'section'    => 'imagazine_upperbar_styling',
                'settings'   => 'imagazine_upperbar_styling_hovercolor',
        )));






	/* Upperbar - Uppersidebar */
	$wp_customize->add_setting( 'imagazine_upperbar_sidebar_pos' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_upperbar_sidebar_pos', array(
            	'label'          => __( 'Sidebar position', 'imagazine' ),
            	'section'        => 'imagazine_upperbar_sidebar',
            	'settings'       => 'imagazine_upperbar_sidebar_pos',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the upper sidebar position.', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'none', 'imagazine' ),
                	'left'   => __( 'left', 'imagazine' ),
            		'right'   => __( 'right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_upperbar_sidebar_width' , array(
		'default' => 30,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_upperbar_sidebar_width', array(
            	'label'          => __( 'Sidebar width', 'imagazine' ),
            	'section'        => 'imagazine_upperbar_sidebar',
            	'settings'       => 'imagazine_upperbar_sidebar_width',
            	'type'           => 'number',
 	    		'description'    => __( 'Select sidebar width (percentage).', 'imagazine' ),
    	)));


		$wp_customize->add_setting( 'imagazine_upperbar_sidebar_align' , array(
		'default' => 'left',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_upperbar_sidebar_align', array(
            	'label'          => __( 'Sidebar content alignment', 'imagazine' ),
            	'section'        => 'imagazine_upperbar_sidebar',
            	'settings'       => 'imagazine_upperbar_sidebar_align',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the upper sidebar content alignment', 'imagazine' ),
            	'choices'        => array(
                	'center'   => __( 'Center', 'imagazine' ),
                	'left'   => __( 'Left', 'imagazine' ),
            		'right'   => __( 'Right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_upperbar_sidebar_responsive' , array(
		'default' => 'after',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_upperbar_sidebar_responsive', array(
            	'label'          => __( 'Sidebar responsive position', 'imagazine' ),
            	'section'        => 'imagazine_upperbar_sidebar',
            	'settings'       => 'imagazine_upperbar_sidebar_responsive',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the sidebar positioning on small screens', 'imagazine' ),
            	'choices'        => array(
                	'before'   => __( 'On top', 'imagazine' ),
                	'after'   => __( 'After logo/navigation', 'imagazine' ),
            		'collapsed'   => __( 'Collapsed (!in development)', 'imagazine' ),
            		'hide'   => __( 'Hide', 'imagazine' ),
            	)
    	)));







	/* Topbar - Behavior */
	$wp_customize->add_setting( 'imagazine_topbar_behavior_smallposition' , array(
		'default' => 'fixed',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 30,
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_behavior_smallposition', array(
            'label'          => __( 'Topbar small screen positioning', 'imagazine' ),
            'section'        => 'imagazine_topbar_behavior',
            'settings'       => 'imagazine_topbar_behavior_smallposition',
            'type'           => 'select',
 	    	'description'    => __( 'Select smallscreen topbar screen behavior', 'imagazine' ),
            'choices'        => array(
                'relative'   => __( 'Relative, scroll along', 'imagazine' ),
                'fixed'   => __( 'Fixed, stick to top', 'imagazine' ),
                //'scroll'   => __( 'Fixed, visible on first scroll', 'imagazine' ),
                'none'   => __( 'Do not use a topbar', 'imagazine' ),
            )
    )));

	$wp_customize->add_setting( 'imagazine_topbar_behavior_largeposition' , array(
		'default' => 'fixed',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 20,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_behavior_largeposition', array(
            'label'          => __( 'Topbar large screen positioning', 'imagazine' ),
            'section'        => 'imagazine_topbar_behavior',
            'settings'       => 'imagazine_topbar_behavior_largeposition',
            'type'           => 'select',
 	    	'description'    => __( 'Select topbar large screen behavior', 'imagazine' ),
            'choices'        => array(
                'relative'   => __( 'Relative, scroll along', 'imagazine' ),
                'fixed'   => __( 'Fixed, stick to top', 'imagazine' ),
                'overflow'   => __( 'Fixed overflow header, stick to top', 'imagazine' ),
                'none'   => __( 'Do not use a topbar', 'imagazine' ),
            )
    )));

	$wp_customize->add_setting( 'imagazine_topbar_behavior_minheight' , array(
		'default' => 60,
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 80,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_behavior_minheight', array(
            'label'          => __( 'Topbar min height', 'imagazine' ),
            'section'        => 'imagazine_topbar_behavior',
            'settings'       => 'imagazine_topbar_behavior_minheight',
            'type'           => 'number',
 	    	'description'    => __( 'Select minimal height (pixels)', 'imagazine' ),
    )));

	$wp_customize->add_setting( 'imagazine_topbar_behavior_maxheight' , array(
		'default' => 160,
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 90,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_behavior_maxheight', array(
            'label'          => __( 'Topbar max height', 'imagazine' ),
            'section'        => 'imagazine_topbar_behavior',
            'settings'       => 'imagazine_topbar_behavior_maxheight',
            'type'           => 'number',
 	    	'description'    => __( 'Select max height (pixels)', 'imagazine' ),
    )));

	$wp_customize->add_setting( 'imagazine_topbar_behavior_scroll' , array(
		'default' => 'mini',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 20,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_behavior_scroll', array(
            'label'          => __( 'Topbar sticky height', 'imagazine' ),
            'section'        => 'imagazine_topbar_behavior',
            'settings'       => 'imagazine_topbar_behavior_scroll',
            'type'           => 'select',
 	    	'description'    => __( 'Select topbar height resizing on sticky position', 'imagazine' ),
            'choices'        => array(
                'none'   => __( 'No effect', 'imagazine' ),
                'mini'   => __( 'Minimal height', 'imagazine' ),
            )
    )));


	$wp_customize->add_setting( 'imagazine_topbar_behavior_anispeed' , array(
		'default' => 200,
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 20,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_behavior_anispeed', array(
            'label'          => __( 'Topbar animation speed', 'imagazine' ),
            'section'        => 'imagazine_topbar_behavior',
            'settings'       => 'imagazine_topbar_behavior_anispeed',
            'type'           => 'number',
 	    	'description'    => __( 'Select speed for scaling animation (ms)', 'imagazine' ),
    )));

	$wp_customize->add_setting( 'imagazine_topbar_behavior_width' , array(
		'default' => 'full',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 20,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_behavior_width', array(
            'label'          => __( 'Topbar positioning', 'imagazine' ),
            'section'        => 'imagazine_topbar_behavior',
            'settings'       => 'imagazine_topbar_behavior_width',
            'type'           => 'select',
 	    	'description'    => __( 'Select topbar max width', 'imagazine' ),
            'choices'        => array(
                'full'   => __( 'Full screen width', 'imagazine' ),
                'margin'   => __( 'Page margin width', 'imagazine' ),
            )
    )));

	/* Topbar - Logo */
	$wp_customize->add_setting( 'imagazine_topbar_logo_image', array(
		'sanitize_callback' => 'imagazine_sanitize_default',
        'priority' => 30,
	    ));
	 $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'imagazine_topbar_logo_image', array(
        	'label'    => __( 'Logo image', 'imagazine' ),
        	'section'  => 'imagazine_topbar_logo',
        	'settings' => 'imagazine_topbar_logo_image',
			'description' => __( 'Upload or select a logo image to replace the default logo image in the topbar', 'imagazine' ),
   	) ) );

	$wp_customize->add_setting( 'imagazine_topbar_logo_position' , array(
		'default' => 'left',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 60,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_logo_position', array(
            'label'          => __( 'Logo image position', 'imagazine' ),
            'section'        => 'imagazine_topbar_logo',
            'settings'       => 'imagazine_topbar_logo_position',
            'type'           => 'select',
 	    	'description'    => __( 'Select logo positioning', 'imagazine' ),
            'choices'        => array(
                'left'   => __( 'left side', 'imagazine' ),
                'right'   => __( 'right side', 'imagazine' ),
                'middle'   => __( 'centered in topmenu', 'imagazine' ),
                'above'   => __( 'centered above topmenu', 'imagazine' ),
                'none'   => __( 'Do not use a logo', 'imagazine' ),
            )
    )));
	$wp_customize->add_setting( 'imagazine_topbar_logo_minwidth' , array(
		'default' => 60,
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 80,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_logo_minwidth', array(
            'label'          => __( 'Logo image min width', 'imagazine' ),
            'section'        => 'imagazine_topbar_logo',
            'settings'       => 'imagazine_topbar_logo_minwidth',
            'type'           => 'number',
 	    	'description'    => __( 'Select min width (pixels)', 'imagazine' ),
    )));
	$wp_customize->add_setting( 'imagazine_topbar_logo_maxwidth' , array(
		'default' => 120,
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 90,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_logo_maxwidth', array(
            'label'          => __( 'Logo image max width', 'imagazine' ),
            'section'        => 'imagazine_topbar_logo',
            'settings'       => 'imagazine_topbar_logo_maxwidth',
            'type'           => 'number',
 	    	'description'    => __( 'Select max width (pixels)', 'imagazine' ),
    )));

    /* Menu links

    menu links
    margin | padding:10px 2px 5px 2px;
    text | padding:10px 2px 5px 2px;
	select | text-transform:uppercase;
	range | font-size:1em;
	range | letter-spacing:0.04em;
    background-color
    color
	text-decoration:none;

    menu links hover::

    background-color
    color
	text-decoration:none;

    custom style:
    textarea
    */

	/* Topbar - Menu  */

	$wp_customize->add_setting( 'imagazine_topbar_menu_smallscreen' , array(
		'default' => 'collapsed',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 30,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_menu_smallscreen', array(
            'label'          => __( 'Small screen navigation', 'imagazine' ),
            'section'        => 'imagazine_topbar_menu',
            'settings'       => 'imagazine_topbar_menu_smallscreen',
            'type'           => 'select',
 	    	'description'    => __( 'Select small screen menu display', 'imagazine' ),
            'choices'        => array(
                'open'   => __( 'Open', 'imagazine' ),
                'collapsed'   => __( 'Collapsed (!in development)', 'imagazine' ),
                'none'   => __( 'No display', 'imagazine' ),
            )
    )));
	$wp_customize->add_setting( 'imagazine_topbar_menu_largescreen' , array(
		'default' => 'center',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 60,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_menu_largescreen', array(
            'label'          => __( 'Medium/large screen navigation', 'imagazine' ),
            'section'        => 'imagazine_topbar_menu',
            'settings'       => 'imagazine_topbar_menu_largescreen',
            'type'           => 'select',
 	    	'description'    => __( 'Select medium/large screen menu display', 'imagazine' ),
            'choices'        => array(
                'left'   => __( 'left', 'imagazine' ),
                'center'   => __( 'center', 'imagazine' ),
                'right'   => __( 'right', 'imagazine' ),
                'collapsed'   => __( 'Collapsed (!in development)', 'imagazine' ),
                'none'   => __( 'No display', 'imagazine' ),
            )
    )));
	$wp_customize->add_setting( 'imagazine_topbar_menu_textalign' , array(
		'default' => 'center',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 60,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_menu_textalign', array(
            'label'          => __( 'Navigation text alignment', 'imagazine' ),
            'section'        => 'imagazine_topbar_menu',
            'settings'       => 'imagazine_topbar_menu_textalign',
            'type'           => 'select',
 	    	'description'    => __( 'Align navigation menu text', 'imagazine' ),
            'choices'        => array(
                'left'   => __( 'left', 'imagazine' ),
                'center'   => __( 'center', 'imagazine' ),
                'right'   => __( 'right', 'imagazine' ),
            )
    )));

	$wp_customize->add_setting( 'imagazine_topbar_menu_subs' , array(
			'default' => 'vertical',
			'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 60,
		));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_menu_subs', array(
				'label'          => __( 'Submenu behavior', 'imagazine' ),
				'section'        => 'imagazine_topbar_menu',
				'settings'       => 'imagazine_topbar_menu_subs',
				'type'           => 'select',
				'description'    => __( 'Navigation submenu behavior', 'imagazine' ),
				'choices'        => array(
					'none'   => __( 'Do not use submenu\'s here', 'imagazine' ),
					'horizontal'   => __( 'Horizontal submenu', 'imagazine' ),
					'vertical'   => __( 'Vertical submenu', 'imagazine' ),
				)
		)));


    /* topbar styling */
    $wp_customize->add_setting( 'imagazine_topbar_styling_bgcolor' , array(
            'default' => 0.3,
            'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagazine_topbar_styling_bgcolor', array(
                'label'      => __( 'Background color', 'imagazine' ),
                'section'    => 'imagazine_topbar_styling',
                'settings'   => 'imagazine_topbar_styling_bgcolor',
        )));


        $wp_customize->add_setting( 'imagazine_topbar_styling_bgtransparancy' , array(
		'default' => 0.3,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_styling_bgtransparancy', array(
            	'label'          => __( 'Background transparancy', 'imagazine' ),
            	'section'        => 'imagazine_topbar_styling',
            	'settings'       => 'imagazine_topbar_styling_bgtransparancy',
            	'type'              => 'range',
                'input_attrs'       => array(
                    'min'           => 0,
                    'max'           => 1.00,
                    'step'          => 0.01,
                ),
 	    		'description'    => __( 'Set transparancy (0.01 - 1.00)', 'imagazine' ),
    	)));

        $wp_customize->add_setting( 'imagazine_topbar_styling_textcolor' , array(
		  'default' => '#fefefe',
		  'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagazine_topbar_styling_textcolor', array(
                'label'      => __( 'Text color', 'imagazine' ),
                'section'    => 'imagazine_topbar_styling',
                'settings'   => 'imagazine_topbar_styling_textcolor',
        )));

       $wp_customize->add_setting( 'imagazine_topbar_styling_linkcolor' , array(
		  'default' => '#ffffff',
		  'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagazine_topbar_styling_linkcolor', array(
                'label'      => __( 'Link color', 'imagazine' ),
                'section'    => 'imagazine_topbar_styling',
                'settings'   => 'imagazine_topbar_styling_linkcolor',
        )));

        $wp_customize->add_setting( 'imagazine_topbar_styling_hovercolor' , array(
		  'default' => '#cecece',
		  'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagazine_topbar_styling_hovercolor', array(
                'label'      => __( 'Link hover color', 'imagazine' ),
                'section'    => 'imagazine_topbar_styling',
                'settings'   => 'imagazine_topbar_styling_hovercolor',
        )));




	/* Topbar - Top Widgets */
	$wp_customize->add_setting( 'imagazine_topbar_widgets_position' , array(
		'default' => 'full',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 60,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_widgets_position', array(
            'label'          => __( 'Top widgets position', 'imagazine' ),
            'section'        => 'imagazine_topbar_widgets',
            'settings'       => 'imagazine_topbar_widgets_position',
            'type'           => 'select',
 	    	'description'    => __( 'Position top widgets', 'imagazine' ),
            'choices'        => array(
                'top'   => __( 'Topbar Top Fullwidth (below upperbar)', 'imagazine' ),
                'above'   => __( 'Above logo/navigation', 'imagazine' ),
                'below'   => __( 'Below logo/navigation', 'imagazine' ),
                'bottom'   => __( 'Topbar bottom Fullwidth', 'imagazine' ),
            )
    )));
	$wp_customize->add_setting( 'imagazine_topbar_widgets_maxcol' , array(
		'default' => 5,
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 90,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_widgets_maxcol', array(
            'label'          => __( 'Max columns', 'imagazine' ),
            'section'        => 'imagazine_topbar_widgets',
            'settings'       => 'imagazine_topbar_widgets_maxcol',
            'type'           => 'number',
 	    	'description'    => __( 'Select max amount of widget columns', 'imagazine' ),
    )));



	/* Topbar - Sidebars */


		$wp_customize->add_setting( 'imagazine_topbar_sidebars_sidebar1pos' , array(
		'default' => 'right',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_sidebars_sidebar1pos', array(
            	'label'          => __( 'Sidebar position', 'imagazine' ),
            	'section'        => 'imagazine_topbar_sidebar1',
            	'settings'       => 'imagazine_topbar_sidebars_sidebar1pos',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the default top sidebar position.', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'none', 'imagazine' ),
                	'left'   => __( 'left', 'imagazine' ),
            		'right'   => __( 'right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_topbar_sidebars_sidebar1width' , array(
		'default' => 30,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_sidebars_sidebar1width', array(
            	'label'          => __( 'Sidebar width', 'imagazine' ),
            	'section'        => 'imagazine_topbar_sidebar1',
            	'settings'       => 'imagazine_topbar_sidebars_sidebar1width',
            	'type'           => 'number',
 	    		'description'    => __( 'Select sidebar width (percentage).', 'imagazine' ),
    	)));


		$wp_customize->add_setting( 'imagazine_topbar_sidebars_sidebar1align' , array(
		'default' => 'left',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_sidebars_sidebar1align', array(
            	'label'          => __( 'Sidebar content alignment', 'imagazine' ),
            	'section'        => 'imagazine_topbar_sidebar1',
            	'settings'       => 'imagazine_topbar_sidebars_sidebar1align',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the top sidebar content alignment', 'imagazine' ),
            	'choices'        => array(
                	'center'   => __( 'Center', 'imagazine' ),
                	'left'   => __( 'Left', 'imagazine' ),
            		'right'   => __( 'Right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_topbar_sidebars_sidebar1responsive' , array(
		'default' => 'after',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_sidebars_sidebar1responsive', array(
            	'label'          => __( 'Sidebar responsive position', 'imagazine' ),
            	'section'        => 'imagazine_topbar_sidebar1',
            	'settings'       => 'imagazine_topbar_sidebars_sidebar1responsive',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the sidebar positioning on small screens', 'imagazine' ),
            	'choices'        => array(
                	'before'   => __( 'On top', 'imagazine' ),
                	'after'   => __( 'After logo/navigation', 'imagazine' ),
            		'collapsed'   => __( 'Collapsed (!in development)', 'imagazine' ),
            		'hide'   => __( 'Hide', 'imagazine' ),
            	)
    	)));



		$wp_customize->add_setting( 'imagazine_topbar_sidebars_sidebar2pos' , array(
		'default' => 'right',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_sidebars_sidebar2pos', array(
            	'label'          => __( 'Second sidebar position', 'imagazine' ),
            	'section'        => 'imagazine_topbar_sidebar2',
            	'settings'       => 'imagazine_topbar_sidebars_sidebar2pos',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the second sidebar position.', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'none', 'imagazine' ),
                	'left'   => __( 'left', 'imagazine' ),
            		'right'   => __( 'right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_topbar_sidebars_sidebar2width' , array(
		'default' => 30,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_sidebars_sidebar2width', array(
            	'label'          => __( 'Second sidebar width', 'imagazine' ),
            	'section'        => 'imagazine_topbar_sidebar2',
            	'settings'       => 'imagazine_topbar_sidebars_sidebar2width',
            	'type'           => 'number',
 	    	'description'    => __( 'Select second sidebar width (percentage).', 'imagazine' ),
    	)));

		$wp_customize->add_setting( 'imagazine_topbar_sidebars_sidebar2align' , array(
		'default' => 'left',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_sidebars_sidebar2align', array(
            	'label'          => __( 'Second sidebar content alignment', 'imagazine' ),
            	'section'        => 'imagazine_topbar_sidebar2',
            	'settings'       => 'imagazine_topbar_sidebars_sidebar2align',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the second sidebar content alignment', 'imagazine' ),
            	'choices'        => array(
                	'center'   => __( 'Center', 'imagazine' ),
                	'left'   => __( 'Left', 'imagazine' ),
            		'right'   => __( 'Right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_topbar_sidebars_sidebar2responsive' , array(
		'default' => 'after',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_sidebars_sidebar2responsive', array(
            	'label'          => __( 'Second sidebar responsive position', 'imagazine' ),
            	'section'        => 'imagazine_topbar_sidebar2',
            	'settings'       => 'imagazine_topbar_sidebars_sidebar2responsive',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the second sidebar positioning on small screens', 'imagazine' ),
            	'choices'        => array(
                	'before'   => __( 'On top', 'imagazine' ),
                	'after'   => __( 'After logo/navigation and sidebar', 'imagazine' ),
            		'collapsed'   => __( 'Collapsed (!in development)', 'imagazine' ),
            		'hide'   => __( 'Hide', 'imagazine' ),
            	)
    	)));



		/* Header */
		$wp_customize->add_setting( 'imagazine_header_display_type' , array(
		'default' => 'image',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 20,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_display_type', array(
            	'label'          => __( 'Header type', 'imagazine' ),
            	'section'        => 'imagazine_header_settings',
            	'settings'       => 'imagazine_header_display_type',
            	'type'           => 'select',
 	    		'description'    => __( 'Header default display type.', 'imagazine' ),
            	'choices'        => array(
                	'image'   => __( 'Image or slider shortcode', 'imagazine' ),
                	'short'   => __( 'Frontpage shortcode, default image', 'imagazine' ),
            		'overlay'   => __( 'Image with overlay widget column(s)', 'imagazine' ),
            		'split'   => __( 'Image in maincolumn besides optional column(s)', 'imagazine' ),
                	'none'   => __( 'No header', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_header_display_shortcode' , array(
		'default' => '',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 20,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_display_shortcode', array(
            	'label'          => __( 'Header shortcode' , 'imagazine' ),
            	'section'        => 'imagazine_header_settings',
            	'type'           => 'text',
 	    		'description'    => __( 'Copy a shortcode here for replacing the theme header with your fav header plugin.', 'imagazine' ),
    	)));


		$wp_customize->add_setting( 'imagazine_header_pagetitle' , array(
		'default' => 'no',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 24,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_pagetitle', array(
            	'label'          => __( 'Page title ', 'imagazine' ),
            	'section'        => 'imagazine_header_settings',
            	'settings'       => 'imagazine_header_pagetitle',
            	'type'           => 'select',
 	    		'description'    => __( 'Use page/post/category title in the header maincolumn.', 'imagazine' ),
            	'choices'        => array(
                	'no'   => __( 'Not in header, only on maintext', 'imagazine' ),
                	'yes'   => __( 'Display page/post title in header (maincolumn) and in on maintext', 'imagazine' ),
                	'head'   => __( 'Display page/post title in header only (make sure header image and/or featured images in header are set!)', 'imagazine' ),
            	)
    	)));


		// Header-Image featured image
	    $wp_customize->add_setting( 'imagazine_header_featuredimages' , array(
		'default' => 'no',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 30,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_featuredimages', array(
            	'label'          => __( 'Featured images in header', 'imagazine' ),
            	'section'        => 'imagazine_header_settings',
            	'settings'       => 'imagazine_header_featuredimages',
            	'type'           => 'radio',
 	    		'description'    => __( 'Select to use featured images in the header. This option overwrites previous selection.', 'imagazine' ),
            	'choices'        => array(
                	'yes'   => __( 'Yes', 'imagazine' ),
                	'no'   => __( 'No', 'imagazine' ),
            	)
    	)));



	   	// Header image/bg width
		$wp_customize->add_setting( 'imagazine_header_bgwidth' , array(
			'default' => 'full',
			'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
		));
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_bgwidth', array(
				'label'          => __( 'Header area/bg width', 'imagazine' ),
				'section'        => 'imagazine_header_settings',
				'settings'       => 'imagazine_header_bgwidth',
				'type'           => 'select',
				'description'    => __( 'Select header image area/bg width', 'imagazine' ),
				'choices'        => array(
					'margin'   => __( 'Outer margin', 'imagazine' ),
					'full'   => __( 'full screen', 'imagazine' ),
				)
		)));


		// Header content width
		$wp_customize->add_setting( 'imagazine_header_contentwidth' , array(
			'default' => 'full',
			'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 60,
		));
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_contentwidth', array(
				'label'          => __( 'Header content/inner area width', 'imagazine' ),
				'section'        => 'imagazine_header_settings',
				'settings'       => 'imagazine_header_contentwidth',
				'type'           => 'select',
				'description'    => __( 'Select header inner content width', 'imagazine' ),
				'choices'        => array(
					'margin'   => __( 'Outer margin', 'imagazine' ),
					'full'   => __( 'full header width', 'imagazine' ),
				)
		)));



		$wp_customize->add_setting( 'imagazine_header_height' , array(
		'default' => 30,
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 70,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_height', array(
            	'label'          => __( 'Header height', 'imagazine' ),
            	'section'        => 'imagazine_header_settings',
            	'settings'       => 'imagazine_header_height',
            	'type'           => 'number',
 	    		'description'    => __( 'Set header height in percentage of window.', 'imagazine' ),
    	)));



		$wp_customize->add_setting( 'imagazine_header_minheight' , array(
		'default' => 200,
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 80,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_minheight', array(
            	'label'          => __( 'Header min height', 'imagazine' ),
            	'section'        => 'imagazine_header_settings',
            	'settings'       => 'imagazine_header_minheight',
            	'type'           => 'number',
 	    		'description'    => __( 'Input header minimal height in pixels.', 'imagazine' ),
    	)));



		$wp_customize->add_setting( 'imagazine_header_maincontentalign' , array(
		'default' => 'center',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 90,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_maincontentalign', array(
            	'label'          => __( 'Header content align', 'imagazine' ),
            	'section'        => 'imagazine_header_settings',
            	'settings'       => 'imagazine_header_maincontentalign',
            	'type'           => 'select',
 	    		'description'    => __( 'Alignment for the header maincolumn (title/header-widgets).', 'imagazine' ),
            	'choices'        => array(
                	'left'   => __( 'Left', 'imagazine' ),
                	'center'   => __( 'Center', 'imagazine' ),
                	'right'   => __( 'Right', 'imagazine' ),
            	)
    	)));


        // header (overlay) styling
        // headeroverlaycolor1, headeroverlaycolor2, headeroverlaytransparancy, headertextcolor, headerlinkcolor, headerhovercolor
        $wp_customize->add_setting( 'imagazine_header_styling_overlay_color1' , array(
		  'default' => '#000000',
		  'sanitize_callback' => 'imagazine_sanitize_default',
    	));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagazine_header_styling_overlay_color1', array(
                'label'      => __( 'Header overlay color 1', 'imagazine' ),
                'section'    => 'imagazine_header_styling',
                'settings'   => 'imagazine_header_styling_overlay_color1',
        )));
        $wp_customize->add_setting( 'imagazine_header_styling_overlay_transparancy1' , array(
		'default' => 0.3,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_styling_overlay_transparancy1', array(
            	'label'          => __( 'Overlay transparancy (color 1)', 'imagazine' ),
            	'section'        => 'imagazine_header_styling',
            	'settings'       => 'imagazine_header_styling_overlay_transparancy1',
            	'type'              => 'range',
                'input_attrs'       => array(
                    'min'           => 0,
                    'max'           => 1.00,
                    'step'          => 0.01,
                ),
 	    		'description'    => __( 'Set transparancy (0.01 - 1.00)', 'imagazine' ),
    	)));

        $wp_customize->add_setting( 'imagazine_header_styling_overlay_color2' , array(
		  'default' => '#000000',
		  'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagazine_header_styling_overlay_color2', array(
                'label'      => __( 'Overlay color 2 (color 2 makes gradient)', 'imagazine' ),
                'section'    => 'imagazine_header_styling',
                'settings'   => 'imagazine_header_styling_overlay_color2',
        )));


        $wp_customize->add_setting( 'imagazine_header_styling_overlay_transparancy2' , array(
		'default' => 0.3,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_styling_overlay_transparancy2', array(
            	'label'          => __( 'Overlay transparancy (color 2)', 'imagazine' ),
            	'section'        => 'imagazine_header_styling',
            	'settings'       => 'imagazine_header_styling_overlay_transparancy2',
            	'type'              => 'range',
                'input_attrs'       => array(
                    'min'           => 0,
                    'max'           => 1.00,
                    'step'          => 0.01,
                ),
 	    		'description'    => __( 'Set transparancy (0.01 - 1.00)', 'imagazine' ),
    	)));

        $wp_customize->add_setting( 'imagazine_header_styling_overlay_textcolor' , array(
		  'default' => '#fefefe',
		  'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagazine_header_styling_overlay_textcolor', array(
                'label'      => __( 'Overlay text color', 'imagazine' ),
                'section'    => 'imagazine_header_styling',
                'settings'   => 'imagazine_header_styling_overlay_textcolor',
        )));

       $wp_customize->add_setting( 'imagazine_header_styling_overlay_linkcolor' , array(
		  'default' => '#ffffff',
		  'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagazine_header_styling_overlay_linkcolor', array(
                'label'      => __( 'Overlay link color', 'imagazine' ),
                'section'    => 'imagazine_header_styling',
                'settings'   => 'imagazine_header_styling_overlay_linkcolor',
        )));

        $wp_customize->add_setting( 'imagazine_header_styling_overlay_hovercolor' , array(
		  'default' => '#cecece',
		  'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagazine_header_styling_overlay_hovercolor', array(
                'label'      => __( 'Overlay link hover color', 'imagazine' ),
                'section'    => 'imagazine_header_styling',
                'settings'   => 'imagazine_header_styling_overlay_hovercolor',
        )));



		// headercolumns / sidebars
		$wp_customize->add_setting( 'imagazine_header_sidebar1pos' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_sidebar1pos', array(
            	'label'          => __( 'Sidebar position', 'imagazine' ),
            	'section'        => 'imagazine_header_sidebar1',
            	'settings'       => 'imagazine_header_sidebar1pos',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the default top sidebar position.', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'none', 'imagazine' ),
                	'left'   => __( 'left', 'imagazine' ),
            		'right'   => __( 'right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_header_sidebar1width' , array(
		'default' => 30,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_sidebar1width', array(
            	'label'          => __( 'Sidebar width', 'imagazine' ),
            	'section'        => 'imagazine_header_sidebar1',
            	'settings'       => 'imagazine_header_sidebar1width',
            	'type'           => 'number',
 	    		'description'    => __( 'Select sidebar width (percentage).', 'imagazine' ),
    	)));


		$wp_customize->add_setting( 'imagazine_header_sidebar1align' , array(
		'default' => 'left',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_sidebar1align', array(
            	'label'          => __( 'Sidebar content alignment', 'imagazine' ),
            	'section'        => 'imagazine_header_sidebar1',
            	'settings'       => 'imagazine_header_sidebar1align',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the top sidebar content alignment', 'imagazine' ),
            	'choices'        => array(
                	'center'   => __( 'Center', 'imagazine' ),
                	'left'   => __( 'Left', 'imagazine' ),
            		'right'   => __( 'Right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_header_sidebar1responsive' , array(
		'default' => 'after',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_sidebar1responsive', array(
            	'label'          => __( 'Sidebar responsive position', 'imagazine' ),
            	'section'        => 'imagazine_header_sidebar1',
            	'settings'       => 'imagazine_header_sidebar1responsive',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the sidebar positioning on small screens', 'imagazine' ),
            	'choices'        => array(
                	'before'   => __( 'On top', 'imagazine' ),
                	'after'   => __( 'After logo/navigation', 'imagazine' ),
            		'collapsed'   => __( 'Collapsed (!in development)', 'imagazine' ),
            		'hide'   => __( 'Hide', 'imagazine' ),
            	)
    	)));



		$wp_customize->add_setting( 'imagazine_header_sidebar2pos' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_sidebar2pos', array(
            	'label'          => __( 'Second sidebar position', 'imagazine' ),
            	'section'        => 'imagazine_header_sidebar2',
            	'settings'       => 'imagazine_header_sidebar2pos',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the second sidebar position.', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'none', 'imagazine' ),
                	'left'   => __( 'left', 'imagazine' ),
            		'right'   => __( 'right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_header_sidebar2width' , array(
		'default' => 30,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_sidebar2width', array(
            	'label'          => __( 'Second sidebar width', 'imagazine' ),
            	'section'        => 'imagazine_header_sidebar2',
            	'settings'       => 'imagazine_header_sidebar2width',
            	'type'           => 'number',
 	    	'description'    => __( 'Select second sidebar width (percentage).', 'imagazine' ),
    	)));

		$wp_customize->add_setting( 'imagazine_header_sidebar2align' , array(
		'default' => 'left',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_sidebar2align', array(
            	'label'          => __( 'Second sidebar content alignment', 'imagazine' ),
            	'section'        => 'imagazine_header_sidebar2',
            	'settings'       => 'imagazine_header_sidebar2align',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the second sidebar content alignment', 'imagazine' ),
            	'choices'        => array(
                	'center'   => __( 'Center', 'imagazine' ),
                	'left'   => __( 'Left', 'imagazine' ),
            		'right'   => __( 'Right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_header_sidebar2responsive' , array(
		'default' => 'after',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_header_sidebar2responsive', array(
            	'label'          => __( 'Second sidebar responsive position', 'imagazine' ),
            	'section'        => 'imagazine_header_sidebar2',
            	'settings'       => 'imagazine_header_sidebar2responsive',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the second sidebar positioning on small screens', 'imagazine' ),
            	'choices'        => array(
                	'before'   => __( 'On top', 'imagazine' ),
                	'after'   => __( 'After logo/navigation and sidebar', 'imagazine' ),
            		'collapsed'   => __( 'Collapsed (!in development)', 'imagazine' ),
            		'hide'   => __( 'Hide', 'imagazine' ),
            	)
    	)));






		/* main content widget settings */

    // frontpage
        $wp_customize->add_setting( 'imagazine_content_blogpagedisplay_contenttop' , array(
		'default' => 'hide',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_blogpagedisplay_contenttop', array(
            	'label'          => __( 'Show top widgets', 'imagazine' ),
            	'section'        => 'imagazine_content_blogpagedisplay',
            	'settings'       => 'imagazine_content_blogpagedisplay_contenttop',
            	'type'           => 'select',
 	    	'description'    => __( 'Blog page content top widgets by default', 'imagazine' ),
            	'choices'        => array(
                	'hide'   => __( 'No display on blog page', 'imagazine' ),
                	'show'   => __( 'Show top widgets on blog page', 'imagazine' ),
            	)
    	)));


    // CONTENT - LIST - EXCLUDE CATEGORIES  Add multi select
		// source used: http://themefoundation.com/customizer-multiple-category-control/
		// .. http://jayj.dk/multiple-select-lists-theme-customizer/
		$wp_customize->add_setting( 'imagazine_blogpage_exclude_categories'  , array(
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control(
			new imagazine_multiselect_exclude_categories(
				$wp_customize,
				'imagazine_blogpage_exclude_categories',
				array(
					'label' => __( 'Exclude Categories', 'imagazine' ),
 	    			'description'    => __( 'Select post categories to be excluded from the main loop (post overview)', 'imagazine' ),
					'section' => 'imagazine_content_blogpagedisplay',
					'settings' => 'imagazine_blogpage_exclude_categories'
				)
			)
		);


        $wp_customize->add_setting( 'imagazine_content_blogpagedisplay_listtype' , array(
		'default' => 'basic',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_blogpagedisplay_listtype', array(
            	'label'          => __( 'Blog page type', 'imagazine' ),
            	'section'        => 'imagazine_content_blogpagedisplay',
            	'settings'       => 'imagazine_content_blogpagedisplay_listtype',
            	'type'           => 'select',
 	    	'description'    => __( 'Blogpage list type', 'imagazine' ),
            	'choices'        => array(
                	'basic'   => __( 'List posts below each other', 'imagazine' ),
                	'columns'   => __( 'Display posts in grid', 'imagazine' ),
                	//'grid'   => __( 'Display posts in a responsive grid', 'imagazine' ),
            	)
    	)));



    $wp_customize->add_setting( 'imagazine_content_blogpagedisplay_authortime' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_blogpagedisplay_authortime', array(
            	'label'          => __( 'Date/time & Author', 'imagazine' ),
            	'section'        => 'imagazine_content_blogpagedisplay',
            	'settings'       => 'imagazine_content_blogpagedisplay_authortime',
            	'type'           => 'select',
 	    	'description'    => __( 'Display date/time & author name in lists', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'No display', 'imagazine' ),
                	'both'   => __( 'Display both', 'imagazine' ),
                	'date'   => __( 'Display date only', 'imagazine' ),
                	'author'   => __( 'Display author name only', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_content_blogpagedisplay_timeformat' , array(
		'default' => 'date',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_blogpagedisplay_timeformat', array(
            	'label'          => __( 'Date/time format', 'imagazine' ),
            	'section'        => 'imagazine_content_blogpagedisplay',
            	'settings'       => 'imagazine_content_blogpagedisplay_timeformat',
            	'type'           => 'select',
 	    	'description'    => __( 'Time display format in lists', 'imagazine' ),
            	'choices'        => array(
                	'date'   => __( 'Date only', 'imagazine' ),
                	'full'   => __( 'Date & Time', 'imagazine' ),
                	'ago'   => __( 'Display as time-ago', 'imagazine' ),
            	)
    	)));

        $wp_customize->add_setting( 'imagazine_content_blogpagedisplay_thumb' , array(
		'default' => 'top',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_blogpagedisplay_thumb', array(
            	'label'          => __( 'Display featured image', 'imagazine' ),
            	'section'        => 'imagazine_content_blogpagedisplay',
            	'settings'       => 'imagazine_content_blogpagedisplay_thumb',
            	'type'           => 'select',
 	    	'description'    => __( 'Featured image display format', 'imagazine' ),
            	'choices'        => array(
                	'top'   => __( 'Above title', 'imagazine' ),
                	'title'   => __( 'Below title', 'imagazine' ),
                	'cover'   => __( 'Cover title inside', 'imagazine' ),
                	'none'   => __( 'Do not show', 'imagazine' ),
            	)
    	)));

        $wp_customize->add_setting( 'imagazine_content_blogpagedisplay_excerpt' , array(
		  'default' => 'show',
		  'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_blogpagedisplay_excerpt', array(
            	'label'          => __( 'Display excerpt', 'imagazine' ),
            	'section'        => 'imagazine_content_blogpagedisplay',
            	'settings'       => 'imagazine_content_blogpagedisplay_excerpt',
            	'type'           => 'select',
 	    	'description'    => __( 'Display excerpt(intro) text', 'imagazine' ),
            	'choices'        => array(
                	'show'   => __( 'Show excerpt text', 'imagazine' ),
                	'hide'   => __( 'Do not show text', 'imagazine' ),
            	)
    	)));

        $wp_customize->add_setting( 'imagazine_content_blogpagedisplay_readmorebutton' , array(
		  'default' => 'right',
		  'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_blogpagedisplay_readmorebutton', array(
            	'label'          => __( 'Display readmore', 'imagazine' ),
            	'section'        => 'imagazine_content_blogpagedisplay',
            	'settings'       => 'imagazine_content_blogpagedisplay_readmorebutton',
            	'type'           => 'select',
 	    	'description'    => __( 'Display readmore button', 'imagazine' ),
            	'choices'        => array(
                	'left'   => __( 'on the left', 'imagazine' ),
                	'center'   => __( 'centered', 'imagazine' ),
                	'right'   => __( 'on the right', 'imagazine' ),
                	'hide'   => __( 'do not show', 'imagazine' ),
            	)
    	)));
	$wp_customize->add_setting( 'imagazine_content_blogpagedisplay_contentbottom' , array(
		'default' => 'hide',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_blogpagedisplay_contentbottom', array(
            	'label'          => __( 'Show bottom widgets', 'imagazine' ),
            	'section'        => 'imagazine_content_blogpagedisplay',
            	'settings'       => 'imagazine_content_blogpagedisplay_contentbottom',
            	'type'           => 'select',
 	    	'description'    => __( 'Content bottom widgets by default', 'imagazine' ),
            	'choices'        => array(
                	'hide'   => __( 'No display on post lists', 'imagazine' ),
                	'show'   => __( 'Show bottom widgets', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_content_blogpagedisplay_sidebar1_pos' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_blogpagedisplay_sidebar1_pos', array(
            	'label'          => __( 'Sidebar 1 display', 'imagazine' ),
            	'section'        => 'imagazine_content_blogpagedisplay',
            	'settings'       => 'imagazine_content_blogpagedisplay_sidebar1_pos',
            	'type'           => 'select',
 	    		'description'    => __( 'Select sidebar 1 display in list view (default overwrite).', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'none', 'imagazine' ),
                	'left'   => __( 'left', 'imagazine' ),
            		'right'   => __( 'right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_content_blogpagedisplay_sidebar2_pos' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_blogpagedisplay_sidebar2_pos', array(
            	'label'          => __( 'Sidebar 2 display', 'imagazine' ),
            	'section'        => 'imagazine_content_blogpagedisplay',
            	'settings'       => 'imagazine_content_blogpagedisplay_sidebar2_pos',
            	'type'           => 'select',
 	    		'description'    => __( 'Select sidebar 2 display in list view (default overwrite).', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'none', 'imagazine' ),
                	'left'   => __( 'left', 'imagazine' ),
            		'right'   => __( 'right', 'imagazine' ),
            	)
    	)));








        /* post (taxonomy) lists */
		$wp_customize->add_setting( 'imagazine_content_listdisplay_contenttop' , array(
		'default' => 'hide',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_listdisplay_contenttop', array(
            	'label'          => __( 'Show top widgets', 'imagazine' ),
            	'section'        => 'imagazine_content_listdisplay',
            	'settings'       => 'imagazine_content_listdisplay_contenttop',
            	'type'           => 'select',
 	    	'description'    => __( 'Content top widgets by default', 'imagazine' ),
            	'choices'        => array(
                	'hide'   => __( 'No display on post list page', 'imagazine' ),
                	'show'   => __( 'Show top widgets', 'imagazine' ),
            	)
    	)));


        $wp_customize->add_setting( 'imagazine_content_listdisplay_listtype' , array(
		'default' => 'basic',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_listdisplay_listtype', array(
            	'label'          => __( 'List page type', 'imagazine' ),
            	'section'        => 'imagazine_content_listdisplay',
            	'settings'       => 'imagazine_content_listdisplay_listtype',
            	'type'           => 'select',
 	    	'description'    => __( 'list type display', 'imagazine' ),
            	'choices'        => array(
                	'basic'   => __( 'List posts below each other', 'imagazine' ),
                	'columns'   => __( 'Display posts in grid', 'imagazine' ),
                	//'grid'   => __( 'Display posts in a responsive grid', 'imagazine' ),
            	)
    	)));


		$wp_customize->add_setting( 'imagazine_content_listdisplay_authortime' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_listdisplay_authortime', array(
            	'label'          => __( 'Date/time & Author', 'imagazine' ),
            	'section'        => 'imagazine_content_listdisplay',
            	'settings'       => 'imagazine_content_listdisplay_authortime',
            	'type'           => 'select',
 	    	'description'    => __( 'Display date/time & author name in lists', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'No display', 'imagazine' ),
                	'both'   => __( 'Display both', 'imagazine' ),
                	'date'   => __( 'Display date only', 'imagazine' ),
                	'author'   => __( 'Display author name only', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_content_listdisplay_timeformat' , array(
		'default' => 'date',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_listdisplay_timeformat', array(
            	'label'          => __( 'Date/time format', 'imagazine' ),
            	'section'        => 'imagazine_content_listdisplay',
            	'settings'       => 'imagazine_content_listdisplay_timeformat',
            	'type'           => 'select',
 	    	'description'    => __( 'Time display format in lists', 'imagazine' ),
            	'choices'        => array(
                	'date'   => __( 'Date only', 'imagazine' ),
                	'full'   => __( 'Date & Time', 'imagazine' ),
                	'ago'   => __( 'Display as time-ago', 'imagazine' ),
            	)
    	)));


        $wp_customize->add_setting( 'imagazine_content_listdisplay_thumb' , array(
		'default' => 'top',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_listdisplay_thumb', array(
            	'label'          => __( 'Display featured image', 'imagazine' ),
            	'section'        => 'imagazine_content_listdisplay',
            	'settings'       => 'imagazine_content_listdisplay_thumb',
            	'type'           => 'select',
 	    	'description'    => __( 'Featured image display format', 'imagazine' ),
            	'choices'        => array(
                	'top'   => __( 'Above title', 'imagazine' ),
                	'title'   => __( 'Below title', 'imagazine' ),
                	'cover'   => __( 'Cover title inside', 'imagazine' ),
                	'none'   => __( 'Do not show', 'imagazine' ),
            	)
    	)));

        $wp_customize->add_setting( 'imagazine_content_listdisplay_excerpt' , array(
		  'default' => 'show',
		  'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_listdisplay_excerpt', array(
            	'label'          => __( 'Display excerpt', 'imagazine' ),
            	'section'        => 'imagazine_content_listdisplay',
            	'settings'       => 'imagazine_content_listdisplay_excerpt',
            	'type'           => 'select',
 	    	'description'    => __( 'Display excerpt(intro) text', 'imagazine' ),
            	'choices'        => array(
                	'show'   => __( 'Show excerpt text', 'imagazine' ),
                	'hide'   => __( 'Do not show text', 'imagazine' ),
            	)
    	)));

        $wp_customize->add_setting( 'imagazine_content_listdisplay_readmorebutton' , array(
		  'default' => 'right',
		  'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_listdisplay_readmorebutton', array(
            	'label'          => __( 'Display readmore', 'imagazine' ),
            	'section'        => 'imagazine_content_listdisplay',
            	'settings'       => 'imagazine_content_listdisplay_readmorebutton',
            	'type'           => 'select',
 	    	'description'    => __( 'Display readmore button', 'imagazine' ),
            	'choices'        => array(
                	'left'   => __( 'on the left', 'imagazine' ),
                	'center'   => __( 'centered', 'imagazine' ),
                	'right'   => __( 'on the right', 'imagazine' ),
                	'hide'   => __( 'do not show', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_content_listdisplay_contentbottom' , array(
		'default' => 'hide',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_listdisplay_contentbottom', array(
            	'label'          => __( 'Show bottom widgets', 'imagazine' ),
            	'section'        => 'imagazine_content_listdisplay',
            	'settings'       => 'imagazine_content_listdisplay_contentbottom',
            	'type'           => 'select',
 	    	'description'    => __( 'Content bottom widgets by default', 'imagazine' ),
            	'choices'        => array(
                	'hide'   => __( 'No display on post lists', 'imagazine' ),
                	'show'   => __( 'Show bottom widgets', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_content_listdisplay_sidebar1_pos' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_listdisplay_sidebar1_pos', array(
            	'label'          => __( 'Sidebar 1 display', 'imagazine' ),
            	'section'        => 'imagazine_content_listdisplay',
            	'settings'       => 'imagazine_content_listdisplay_sidebar1_pos',
            	'type'           => 'select',
 	    		'description'    => __( 'Select sidebar 1 display in list view (default overwrite).', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'none', 'imagazine' ),
                	'left'   => __( 'left', 'imagazine' ),
            		'right'   => __( 'right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_content_listdisplay_sidebar2_pos' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_listdisplay_sidebar2_pos', array(
            	'label'          => __( 'Sidebar 2 display', 'imagazine' ),
            	'section'        => 'imagazine_content_listdisplay',
            	'settings'       => 'imagazine_content_listdisplay_sidebar2_pos',
            	'type'           => 'select',
 	    		'description'    => __( 'Select sidebar 2 display in list view (default overwrite).', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'none', 'imagazine' ),
                	'left'   => __( 'left', 'imagazine' ),
            		'right'   => __( 'right', 'imagazine' ),
            	)
    	)));






        /* single posts */

		$wp_customize->add_setting( 'imagazine_content_postdisplay_contenttop' , array(
		'default' => 'hide',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_postdisplay_contenttop', array(
            	'label'          => __( 'Show top widgets', 'imagazine' ),
            	'section'        => 'imagazine_content_postdisplay',
            	'settings'       => 'imagazine_content_postdisplay_contenttop',
            	'type'           => 'select',
 	    	'description'    => __( 'Content top widgets by default', 'imagazine' ),
            	'choices'        => array(
                	'hide'   => __( 'No display with single post', 'imagazine' ),
                	'show'   => __( 'Show top widgets', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_content_postdisplay_authortime' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_postdisplay_authortime', array(
            	'label'          => __( 'Date/time & Author', 'imagazine' ),
            	'section'        => 'imagazine_content_postdisplay',
            	'settings'       => 'imagazine_content_postdisplay_authortime',
            	'type'           => 'select',
 	    	'description'    => __( 'Single Post date/time & author name display', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'No display', 'imagazine' ),
                	'both'   => __( 'Display both', 'imagazine' ),
                	'date'   => __( 'Display date only', 'imagazine' ),
                	'author'   => __( 'Display author name only', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_content_postdisplay_timeformat' , array(
		'default' => 'date',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_postdisplay_timeformat', array(
            	'label'          => __( 'Date/time format', 'imagazine' ),
            	'section'        => 'imagazine_content_postdisplay',
            	'settings'       => 'imagazine_content_postdisplay_timeformat',
            	'type'           => 'select',
 	    	'description'    => __( 'Single Post Time display format', 'imagazine' ),
            	'choices'        => array(
                	'date'   => __( 'Date only', 'imagazine' ),
                	'full'   => __( 'Date & Time', 'imagazine' ),
                	'ago'   => __( 'Display as time-ago', 'imagazine' ),
            	)
    	)));


		$wp_customize->add_setting( 'imagazine_content_postdisplay_imageposition' , array(
		'default' => 'top',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_postdisplay_imageposition', array(
            	'label'          => __( 'Default image position', 'imagazine' ),
            	'section'        => 'imagazine_content_postdisplay',
            	'settings'       => 'imagazine_content_postdisplay_imageposition',
            	'type'           => 'select',
 	    	'description'    => __( 'Where to position the post featured image', 'imagazine' ),
            	'choices'        => array(
                	'top'   => __( 'On top', 'imagazine' ),
                	'left'   => __( 'Inline on the left', 'imagazine' ),
                	'right'   => __( 'Inline on the right', 'imagazine' ),
                	'none'   => __( 'Do not show', 'imagazine' ),
            	)
    	)));


		$wp_customize->add_setting( 'imagazine_content_postdisplay_contentbottom' , array(
		'default' => 'show',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_postdisplay_contentbottom', array(
            	'label'          => __( 'Show bottom widgets', 'imagazine' ),
            	'section'        => 'imagazine_content_postdisplay',
            	'settings'       => 'imagazine_content_postdisplay_contentbottom',
            	'type'           => 'select',
 	    	'description'    => __( 'Content bottom widgets by default', 'imagazine' ),
            	'choices'        => array(
                	'hide'   => __( 'No display with single post', 'imagazine' ),
                	'show'   => __( 'Show bottom widgets', 'imagazine' ),
            	)
    	)));


		$wp_customize->add_setting( 'imagazine_content_postdisplay_sidebar1_pos' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_postdisplay_sidebar1_pos', array(
            	'label'          => __( 'Sidebar 1 display', 'imagazine' ),
            	'section'        => 'imagazine_content_postdisplay',
            	'settings'       => 'imagazine_content_postdisplay_sidebar1_pos',
            	'type'           => 'select',
 	    		'description'    => __( 'Select sidebar 1 display in single post view (default overwrite).', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'none', 'imagazine' ),
                	'left'   => __( 'left', 'imagazine' ),
            		'right'   => __( 'right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_content_postdisplay_sidebar2_pos' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_postdisplay_sidebar2_pos', array(
            	'label'          => __( 'Sidebar 2 display', 'imagazine' ),
            	'section'        => 'imagazine_content_postdisplay',
            	'settings'       => 'imagazine_content_postdisplay_sidebar2_pos',
            	'type'           => 'select',
 	    		'description'    => __( 'Select sidebar 2 display in single post view (default overwrite).', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'none', 'imagazine' ),
                	'left'   => __( 'left', 'imagazine' ),
            		'right'   => __( 'right', 'imagazine' ),
            	)
    	)));






		$wp_customize->add_setting( 'imagazine_content_pagedisplay_contenttop' , array(
		'default' => 'show',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_pagedisplay_contenttop', array(
            	'label'          => __( 'Show top widgets', 'imagazine' ),
            	'section'        => 'imagazine_content_pagedisplay',
            	'settings'       => 'imagazine_content_pagedisplay_contenttop',
            	'type'           => 'select',
 	    	'description'    => __( 'Content top widgets by default', 'imagazine' ),
            	'choices'        => array(
                	'hide'   => __( 'No display (select for each page)', 'imagazine' ),
                	'show'   => __( 'Show top widgets', 'imagazine' ),
            	)
    	)));



		$wp_customize->add_setting( 'imagazine_content_pagedisplay_authortime' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_pagedisplay_authortime', array(
            	'label'          => __( 'Date/time & Author', 'imagazine' ),
            	'section'        => 'imagazine_content_pagedisplay',
            	'settings'       => 'imagazine_content_pagedisplay_authortime',
            	'type'           => 'select',
 	    	'description'    => __( 'Page date/time & author name display', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'No display', 'imagazine' ),
                	'both'   => __( 'Display both', 'imagazine' ),
                	'date'   => __( 'Display date only', 'imagazine' ),
                	'author'   => __( 'Display author name only', 'imagazine' ),
            	)
    	)));





		$wp_customize->add_setting( 'imagazine_content_pagedisplay_timeformat' , array(
		'default' => 'date',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_pagedisplay_timeformat', array(
            	'label'          => __( 'Date/time format', 'imagazine' ),
            	'section'        => 'imagazine_content_pagedisplay',
            	'settings'       => 'imagazine_content_pagedisplay_timeformat',
            	'type'           => 'select',
 	    	'description'    => __( 'Time display format in pages', 'imagazine' ),
            	'choices'        => array(
                	'date'   => __( 'Date only', 'imagazine' ),
                	'full'   => __( 'Date & Time', 'imagazine' ),
                	'ago'   => __( 'Display as time-ago', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_content_pagedisplay_imageposition' , array(
		'default' => 'top',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_pagedisplay_imageposition', array(
            	'label'          => __( 'Default image position', 'imagazine' ),
            	'section'        => 'imagazine_content_pagedisplay',
            	'settings'       => 'imagazine_content_pagedisplay_imageposition',
            	'type'           => 'select',
 	    	'description'    => __( 'Where to position the page featured image', 'imagazine' ),
            	'choices'        => array(
                	'top'   => __( 'On top', 'imagazine' ),
                	'left'   => __( 'Inline on the left', 'imagazine' ),
                	'right'   => __( 'Inline on the right', 'imagazine' ),
                	'none'   => __( 'Do not show', 'imagazine' ),
            	)
    	)));



		$wp_customize->add_setting( 'imagazine_content_pagedisplay_contentbottom' , array(
		'default' => 'show',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_pagedisplay_contentbottom', array(
            	'label'          => __( 'Show bottom widgets', 'imagazine' ),
            	'section'        => 'imagazine_content_pagedisplay',
            	'settings'       => 'imagazine_content_pagedisplay_contentbottom',
            	'type'           => 'select',
 	    	'description'    => __( 'Content bottom widgets by default', 'imagazine' ),
            	'choices'        => array(
                	'hide'   => __( 'No display (select for each page)', 'imagazine' ),
                	'show'   => __( 'Show bottom widgets', 'imagazine' ),
            	)
    	)));



		/* Main content - Sidebars */
		$wp_customize->add_setting( 'imagazine_content_sidebars_sidebar1pos' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_sidebars_sidebar1pos', array(
            	'label'          => __( 'Sidebar 1 display', 'imagazine' ),
            	'section'        => 'imagazine_content_sidebar1',
            	'settings'       => 'imagazine_content_sidebars_sidebar1pos',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the default content sidebar position.', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'none', 'imagazine' ),
                	'left'   => __( 'left', 'imagazine' ),
            		'right'   => __( 'right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_content_sidebars_sidebar1width' , array(
		'default' => 30,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_sidebars_sidebar1width', array(
            	'label'          => __( 'Sidebar 1 width', 'imagazine' ),
            	'section'        => 'imagazine_content_sidebar1',
            	'settings'       => 'imagazine_content_sidebars_sidebar1width',
            	'type'           => 'number',
 	    		'description'    => __( 'Select sidebar width (percentage).', 'imagazine' ),
    	)));

		$wp_customize->add_setting( 'imagazine_content_sidebars_sidebar1align' , array(
		'default' => 'left',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_sidebars_sidebar1align', array(
            	'label'          => __( 'Sidebar 1 alignment', 'imagazine' ),
            	'section'        => 'imagazine_content_sidebar1',
            	'settings'       => 'imagazine_content_sidebars_sidebar1align',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the sidebar content alignment', 'imagazine' ),
            	'choices'        => array(
                	'center'   => __( 'Center', 'imagazine' ),
                	'left'   => __( 'Left', 'imagazine' ),
            		'right'   => __( 'Right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_content_sidebars_sidebar1responsive' , array(
		'default' => 'after',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_sidebars_sidebar1responsive', array(
            	'label'          => __( 'Sidebar 1 responsive position', 'imagazine' ),
            	'section'        => 'imagazine_content_sidebar1',
            	'settings'       => 'imagazine_content_sidebars_sidebar1responsive',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the content sidebar positioning on small screens', 'imagazine' ),
            	'choices'        => array(
                	'before'   => __( 'On top of content', 'imagazine' ),
                	'after'   => __( 'After main content', 'imagazine' ),
            		'collapsed'   => __( 'Collapsed (!in development)', 'imagazine' ),
            		'hide'   => __( 'Hide', 'imagazine' ),
            	)
    	)));



		$wp_customize->add_setting( 'imagazine_content_sidebars_sidebar2pos' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_sidebars_sidebar2pos', array(
            	'label'          => __( 'Sidebar 2 display', 'imagazine' ),
            	'section'        => 'imagazine_content_sidebar2',
            	'settings'       => 'imagazine_content_sidebars_sidebar2pos',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the second content sidebar position.', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'none', 'imagazine' ),
                	'left'   => __( 'left', 'imagazine' ),
            		'right'   => __( 'right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_content_sidebars_sidebar2width' , array(
		'default' => 30,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_sidebars_sidebar2width', array(
            	'label'          => __( 'Sidebar 2 width', 'imagazine' ),
            	'section'        => 'imagazine_content_sidebar2',
            	'settings'       => 'imagazine_content_sidebars_sidebar2width',
            	'type'           => 'number',
 	    	'description'    => __( 'Select second content sidebar width (percentage).', 'imagazine' ),
    	)));

		$wp_customize->add_setting( 'imagazine_content_sidebars_sidebar2align' , array(
		'default' => 'left',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_sidebars_sidebar2align', array(
            	'label'          => __( 'Sidebar 2 content alignment', 'imagazine' ),
            	'section'        => 'imagazine_content_sidebar2',
            	'settings'       => 'imagazine_content_sidebars_sidebar2align',
            	'type'           => 'select',
 	    		'description'    => __( 'Select Sidebar 2 content alignment', 'imagazine' ),
            	'choices'        => array(
                	'center'   => __( 'Center', 'imagazine' ),
                	'left'   => __( 'Left', 'imagazine' ),
            		'right'   => __( 'Right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_content_sidebars_sidebar2responsive' , array(
		'default' => 'after',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_sidebars_sidebar2responsive', array(
            	'label'          => __( 'Sidebar 2 responsive position', 'imagazine' ),
            	'section'        => 'imagazine_content_sidebar2',
            	'settings'       => 'imagazine_content_sidebars_sidebar2responsive',
            	'type'           => 'select',
 	    		'description'    => __( 'Select Sidebar 2  positioning on small screens', 'imagazine' ),
            	'choices'        => array(
                	'before'   => __( 'On top', 'imagazine' ),
                	'after'   => __( 'After main content', 'imagazine' ),
            		'collapsed'   => __( 'Collapsed (!in development)', 'imagazine' ),
            		'hide'   => __( 'Hide', 'imagazine' ),
            	)
    	)));


		$wp_customize->add_setting( 'imagazine_content_subcontent_shortcode' , array(
		'default' => '',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 20,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_content_subcontent_shortcode', array(
            	'label'          => __( 'Subcontent shortcode' , 'imagazine' ),
            	'section'        => 'imagazine_content_subcontent',
				'settings'       => 'imagazine_content_subcontent_shortcode',
            	'type'           => 'text',
 	    		'description'    => __( 'Copy a shortcode here to use subcontent with your shortcode plugin.', 'imagazine' ),
    	)));






		/* Footer content  */
		$wp_customize->add_setting( 'imagazine_footer_behavior_width' , array(
			'default' => 'margin',
			'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 20,
		));
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_footer_behavior_width', array(
				'label'          => __( 'Footer width', 'imagazine' ),
				'section'        => 'imagazine_footer_behavior',
				'settings'       => 'imagazine_footer_behavior_width',
				'type'           => 'select',
				'description'    => __( 'Select footer content width', 'imagazine' ),
				'choices'        => array(
					'margin'   => __( 'Margin width', 'imagazine' ),
					'full'   => __( 'Full screen width', 'imagazine' ),
				)
		)));

		$wp_customize->add_setting( 'imagazine_footer_menu_textalign' , array(
			'default' => 'center',
			'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 60,
		));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_footer_menu_textalign', array(
				'label'          => __( 'Menu text alignment', 'imagazine' ),
				'section'        => 'imagazine_footer_menu',
				'settings'       => 'imagazine_footer_menu_textalign',
				'type'           => 'select',
				'description'    => __( 'Align footer navigation menu text', 'imagazine' ),
				'choices'        => array(
					'left'   => __( 'left', 'imagazine' ),
					'center'   => __( 'center', 'imagazine' ),
					'right'   => __( 'right', 'imagazine' ),
				)
		)));


		$wp_customize->add_setting( 'imagazine_footer_menu_layout' , array(
			'default' => 'horizontal',
			'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 60,
		));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_footer_menu_layout', array(
				'label'          => __( 'Menu positioning', 'imagazine' ),
				'section'        => 'imagazine_footer_menu',
				'settings'       => 'imagazine_footer_menu_layout',
				'type'           => 'select',
				'description'    => __( 'Navigation menu layout', 'imagazine' ),
				'choices'        => array(
					'horizontal'   => __( 'Horizontal', 'imagazine' ),
					'vertical'   => __( 'Vertical', 'imagazine' ),
				)
		)));

		$wp_customize->add_setting( 'imagazine_footer_menu_subs' , array(
			'default' => 'vertical',
			'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 60,
		));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_footer_menu_subs', array(
				'label'          => __( 'Submenu behavior', 'imagazine' ),
				'section'        => 'imagazine_footer_menu',
				'settings'       => 'imagazine_footer_menu_subs',
				'type'           => 'select',
				'description'    => __( 'Navigation submenu behavior', 'imagazine' ),
				'choices'        => array(
					'none'   => __( 'Do not use submenu\'s here', 'imagazine' ),
					'horizontal'   => __( 'Horizontal submenu', 'imagazine' ),
					'vertical'   => __( 'Vertical submenu', 'imagazine' ),
				)
		)));


        /* Footer colors */

        $wp_customize->add_setting( 'imagazine_footer_styling_bgcolor' , array(
            'default' => 0.3,
            'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagazine_footer_styling_bgcolor', array(
                'label'      => __( 'Background color', 'imagazine' ),
                'section'    => 'imagazine_footer_styling',
                'settings'   => 'imagazine_footer_styling_bgcolor',
        )));


        $wp_customize->add_setting( 'imagazine_footer_styling_bgtransparancy' , array(
		'default' => 0.3,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_footer_styling_bgtransparancy', array(
            	'label'          => __( 'Background transparancy', 'imagazine' ),
            	'section'        => 'imagazine_footer_styling',
            	'settings'       => 'imagazine_footer_styling_bgtransparancy',
            	'type'              => 'range',
                'input_attrs'       => array(
                    'min'           => 0,
                    'max'           => 1.00,
                    'step'          => 0.01,
                ),
 	    		'description'    => __( 'Set transparancy (0.01 - 1.00)', 'imagazine' ),
    	)));

        $wp_customize->add_setting( 'imagazine_footer_styling_textcolor' , array(
		  'default' => '#fefefe',
		  'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagazine_footer_styling_textcolor', array(
                'label'      => __( 'Text color', 'imagazine' ),
                'section'    => 'imagazine_footer_styling',
                'settings'   => 'imagazine_footer_styling_textcolor',
        )));

       $wp_customize->add_setting( 'imagazine_footer_styling_linkcolor' , array(
		  'default' => '#ffffff',
		  'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagazine_footer_styling_linkcolor', array(
                'label'      => __( 'Link color', 'imagazine' ),
                'section'    => 'imagazine_footer_styling',
                'settings'   => 'imagazine_footer_styling_linkcolor',
        )));

        $wp_customize->add_setting( 'imagazine_footer_styling_hovercolor' , array(
		  'default' => '#cecece',
		  'sanitize_callback' => 'imagazine_sanitize_default',
    	));

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagazine_footer_styling_hovercolor', array(
                'label'      => __( 'Link hover color', 'imagazine' ),
                'section'    => 'imagazine_footer_styling',
                'settings'   => 'imagazine_footer_styling_hovercolor',
        )));





		$wp_customize->add_setting( 'imagazine_footer_columns_position' , array(
			'default' => 'top',
			'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 30,
		));
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_footer_columns_position', array(
				'label'          => __( 'Footer width', 'imagazine' ),
				'section'        => 'imagazine_footer_columns',
				'settings'       => 'imagazine_footer_columns_position',
				'type'           => 'select',
				'description'    => __( 'Select footer columns position', 'imagazine' ),
				'choices'        => array(
					'none'   => __( 'No column widgets', 'imagazine' ),
					'top'   => __( 'Place column widgets on top of footer', 'imagazine' ),
					'bottom'   => __( 'Place column widgets at the bottom of footer', 'imagazine' ),
				)
		)));


		$wp_customize->add_setting( 'imagazine_footer_sidebars_sidebar1pos' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_footer_sidebars_sidebar1pos', array(
            	'label'          => __( 'Sidebar position', 'imagazine' ),
            	'section'        => 'imagazine_footer_sidebar1',
            	'settings'       => 'imagazine_footer_sidebars_sidebar1pos',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the default content sidebar position.', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'none', 'imagazine' ),
                	'left'   => __( 'left', 'imagazine' ),
            		'right'   => __( 'right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_footer_sidebars_sidebar1width' , array(
		'default' => 30,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_footer_sidebars_sidebar1width', array(
            	'label'          => __( 'Sidebar width', 'imagazine' ),
            	'section'        => 'imagazine_footer_sidebar1',
            	'settings'       => 'imagazine_footer_sidebars_sidebar1width',
            	'type'           => 'number',
 	    		'description'    => __( 'Select sidebar width (percentage).', 'imagazine' ),
    	)));


		$wp_customize->add_setting( 'imagazine_footer_sidebars_sidebar1align' , array(
		'default' => 'left',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_footer_sidebars_sidebar1align', array(
            	'label'          => __( 'Sidebar content alignment', 'imagazine' ),
            	'section'        => 'imagazine_footer_sidebar1',
            	'settings'       => 'imagazine_footer_sidebars_sidebar1align',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the sidebar content alignment', 'imagazine' ),
            	'choices'        => array(
                	'center'   => __( 'Center', 'imagazine' ),
                	'left'   => __( 'Left', 'imagazine' ),
            		'right'   => __( 'Right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_footer_sidebars_sidebar1responsive' , array(
		'default' => 'after',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_footer_sidebars_sidebar1responsive', array(
            	'label'          => __( 'Sidebar responsive position', 'imagazine' ),
            	'section'        => 'imagazine_footer_sidebar1',
            	'settings'       => 'imagazine_footer_sidebars_sidebar1responsive',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the content sidebar positioning on small screens', 'imagazine' ),
            	'choices'        => array(
                	'before'   => __( 'On top', 'imagazine' ),
                	'after'   => __( 'After logo/navigation', 'imagazine' ),
            		'collapsed'   => __( 'Collapsed (!in development)', 'imagazine' ),
            		'hide'   => __( 'Hide', 'imagazine' ),
            	)
    	)));



		$wp_customize->add_setting( 'imagazine_footer_sidebars_sidebar2pos' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_footer_sidebars_sidebar2pos', array(
            	'label'          => __( 'Second content sidebar position', 'imagazine' ),
            	'section'        => 'imagazine_footer_sidebar2',
            	'settings'       => 'imagazine_footer_sidebars_sidebar2pos',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the second content sidebar position.', 'imagazine' ),
            	'choices'        => array(
                	'none'   => __( 'none', 'imagazine' ),
                	'left'   => __( 'left', 'imagazine' ),
            		'right'   => __( 'right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_footer_sidebars_sidebar2width' , array(
		'default' => 30,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_footer_sidebars_sidebar2width', array(
            	'label'          => __( 'Second content sidebar width', 'imagazine' ),
            	'section'        => 'imagazine_footer_sidebar2',
            	'settings'       => 'imagazine_footer_sidebars_sidebar2width',
            	'type'           => 'number',
 	    	'description'    => __( 'Select second content sidebar width (percentage).', 'imagazine' ),
    	)));

		$wp_customize->add_setting( 'imagazine_footer_sidebars_sidebar2align' , array(
		'default' => 'left',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_footer_sidebars_sidebar2align', array(
            	'label'          => __( 'Second sidebar content alignment', 'imagazine' ),
            	'section'        => 'imagazine_footer_sidebar2',
            	'settings'       => 'imagazine_footer_sidebars_sidebar2align',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the second sidebar content alignment', 'imagazine' ),
            	'choices'        => array(
                	'center'   => __( 'Center', 'imagazine' ),
                	'left'   => __( 'Left', 'imagazine' ),
            		'right'   => __( 'Right', 'imagazine' ),
            	)
    	)));

		$wp_customize->add_setting( 'imagazine_footer_sidebars_sidebar2responsive' , array(
		'default' => 'after',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_footer_sidebars_sidebar2responsive', array(
            	'label'          => __( 'Second sidebar responsive position', 'imagazine' ),
            	'section'        => 'imagazine_footer_sidebar2',
            	'settings'       => 'imagazine_footer_sidebars_sidebar2responsive',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the second content sidebar positioning on small screens', 'imagazine' ),
            	'choices'        => array(
                	'before'   => __( 'On top', 'imagazine' ),
                	'after'   => __( 'After logo/navigation and sidebar', 'imagazine' ),
            		'collapsed'   => __( 'Collapsed (!in development)', 'imagazine' ),
            		'hide'   => __( 'Hide', 'imagazine' ),
            	)
    	)));




	/* Extra css (experiment preset css)
		// Custom CSS setting
	   class imagazine_Custom_CSS_Control extends WP_Customize_Control {

		  public $type = 'custom_css';
		  public function render_content() {
		  ?>
			 <label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			 </label>
		  <?php
		  }

	   }
	   $wp_customize->add_section('imagazine_custom_css_setting', array(
		  'priority' => 190,
		  'title' => __('Theme CSS', 'imagazine'),
		  //'panel' => 'imagazine_global'
	   ));

	   $wp_customize->add_setting($imagazine_themename.'[imagazine_custom_css]', array(
		  'default' => '',
		  'type' => 'option',
		  'capability' => 'edit_theme_options',
		  'sanitize_callback' => 'imagazine_sanitize_default',
	   ));

	   $wp_customize->add_control(new imagazine_Custom_CSS_Control($wp_customize, $imagazine_themename.'[imagazine_custom_css]', array(
		  'label' => __('Theme main css styles. These styles are customized for specific design functions, do not edit unless your webdesigner approves and adding Extra Css does not work.', 'imagazine'),
		  'section' => 'imagazine_custom_css_setting',
		  'settings' => $imagazine_themename.'[imagazine_custom_css]'
	   )));

		*/


}
add_action( 'customize_register', 'imagazine_theme_customizer' );



function imagazine_customize_adaptive(){

	// start output css
    ?>
	<style>
	/* Fonts */
	<?php
    $fontstring = '';
	$fontarray = explode('|', get_theme_mod("imagazine_global_styles_mainfont", "Lato|Martel" ) );

	if( is_array($fontarray) ){
        $fontname = $fontarray[0];
        $fontfiles = scandir( TEMPLATEPATH .'/assets/fonts/'.$fontname.'/' );
        if( in_array( $fontname.'.ttf',  $fontfiles )  && in_array( $fontname.'.ttf',  $fontfiles ) ){
          // print_r($fontfiles);
            $ttf = get_template_directory_uri().'/assets/fonts/'.$fontname.'/'.$fontname.'.ttf';
            $eot = get_template_directory_uri().'/assets/fonts/'.$fontname.'/'.$fontname.'.eot';
            echo '
                @font-face {
                font-family: "'.$fontname.'";
                src: url("'.$eot.'"); /* FOR IEs */
                src: local("'.$fontname.'"), url("'.$ttf.'") format("truetype"); /* for other web browsers */
                }
            ';
            $fontstring = 'font-family: "'.$fontname.'", '.get_theme_mod("imagazine_global_styles_subsetfont", "Sans").';';

        }else{
            // use as a google font (todo: check excistance)
           $fontstring = 'font-family: "'.$fontname.'", '.get_theme_mod("imagazine_global_styles_subsetfont", "latin,latin-ext").';';
        }
    }
    if( $fontstring == '' ){
        $fontstring =  'font-family: "'.get_theme_mod("imagazine_global_styles_mainfont", "Lato" ).'", '.get_theme_mod("imagazine_global_styles_subsetfont", "latin,latin-ext").';';
    }
    ?>

	body
	{
        <?php echo $fontstring; ?>
        /*line-height:1.4em; */
    }




    /* text */

    /* links & buttons */
    a
    {
        color:#121212;
    }
    h1 a, h2 a, h3 a, h4 a
    {
        color:#232323;
        text-decoration:none;
    }


    /* upperbar space */
    #upperbarcontainer .outermargin
    {
        padding-top:16px;
        padding-bottom:16px
    }

    /* custom topmenu */
    #menu-sitemenu .menu-image-textwrap img
    {
    }
    #menu-sitemenu a
    {
    }
    #menu-sitemenu a span,
    .menu-image-title
    {
    }

    #topmenu a span,
    .menu-image-title
    {
    }
    #topmenu a:hover span,
    #topmenu .current-menu-item span{
    }


    /* upperbar space */
    #upperbarcontainer .outermargin
    {
        padding-top:16px;
        padding-bottom:16px
    }
    /* outer content space */
    #maincontentcontainer .outermargin
    {
        padding-top:16px;
        padding-bottom:16px
    }

    /* innercontent space */
    .post a.postlist-coverimage
    {
        display:block;
        width:100%;
    }
    .post a.postlist-coverimage div.coverbox
    {
        display:block;
        width:100%;
        min-height:200px;
        background-position:center;
        background-size: cover;
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }
    /*.post a.postlist-coverimage img
    {
        width:100%;
        height:auto;
    }*/
    .page .maintitlebar,
    .post .listitemtitlebar
    {
        padding-top:8px;
        padding-bottom:0px;
    }
    .page #maincontent  .innerpadding,
    #maincontent .post .innerpadding
    {
        padding-top:8px;
        padding-bottom:16px
    }

    /* widget space */
    .widget .widget-titlebox
    {
        padding-top:8px;
        padding-bottom:8px;
    }
    .widget .widget-contentbox
    {
        padding-top:0px;
        padding-bottom:8px;
    }

    /* subcontent space */
    #subcontentcontainer
    {
        padding-top:16px;
        padding-bottom:16px
    }

    /* footer space */
    #footercontainer .outermargin
    {
        padding-top:16px;
        padding-bottom:16px
    }




    /* main content column space */
    .largescreen .sidecolumn.pos-right #sidemenubox,
    .largescreen .sidecolumn.pos-right .widget
    {
        margin-left:32px;
    }
    .largescreen .sidecolumn.pos-left #sidemenubox,
    .largescreen .sidecolumn.pos-left .widget
    {
        margin-right:32px;
    }

    .mediumscreen .sidecolumn.pos-right #sidemenubox,
    .mediumscreen .sidecolumn.pos-right .widget
    {
        margin-left:16px;
    }
    .mediumscreen .sidecolumn.pos-left #sidemenubox,
    .mediumscreen .sidecolumn.pos-left .widget
    {
        margin-right:16px;
    }




    /* Grid columns basic */


    #maincontent.blog-columns .contentwrapper
    {
    display: flex;
    flex-wrap: wrap;
    height: 100%;
    }
     .largescreen #maincontent.blog-columns .contentwrapper .post
    {
        flex: 0 0 calc(33.33% - 1em);
        margin-left:1.5em;
        margin-bottom:1.5em;
    }
     .largescreen #maincontent.blog-columns .contentwrapper .post:nth-child(3n+1)
    {
        margin-left:0px;
    }

    .mediumscreen #maincontent.blog-columns .contentwrapper .post
        {
            flex: 0 0 calc(50% - 0.75em);
            margin-left:0px;
            margin-bottom:1.5em !important;

        }
     .mediumscreen #maincontent.blog-columns .contentwrapper .post:nth-child(2n-2)
        {
            margin-left:1.5em !important;
        }

    .smallscreen #maincontent.blog-columns .contentwrapper .post,
    .smallscreen #maincontent.blog-columns .contentwrapper .post:nth-child(2n-3)
        {
            flex: 0 0 100%;
            margin-left:0 !important;
        }








	/*
	 * ALL SCREENS
	 */
	.pagemargin
	{
	position:relative;
	margin:0px auto;
	width:<?php echo get_theme_mod('imagazine_global_screenmode_pagewidth', '100' ).'%'; ?>;
	<?php if( get_theme_mod('imagazine_global_screenmode_pagemaxwidth', '1480' ) > 0 ){ ?>
	max-width:<?php echo get_theme_mod('imagazine_global_screenmode_pagemaxwidth', '1480' ).'px'; ?>;
	<?php } ?>
	}


    #maincontent .post .innerpadding a.readmore
    {
        display:block;
        padding-top:8px;
        padding-bottom:8px;
    }
    #maincontent .post .innerpadding a.readmore.align-right
    {
    float:right;
    }
    #maincontent .post .innerpadding a.readmore.align-center
    {
    width:auto;
    margin:0px auto;
    }
	/*
	 * SMALL SCREEN DEFAULTS
	 */
	.outermargin
	{
	position:relative;
	margin:0px auto;
	width:<?php echo get_theme_mod('imagazine_global_screenmode_smallwidth', 100).'%'; ?>;
	max-width:<?php echo get_theme_mod('imagazine_global_screenmode_smallmargin', 320).'px'; ?> !important;
	}

	.align-left,
	.align-text-left ul.menu li
	{
	text-align:left;
	}
	.align-right,
	.align-text-right ul.menu li
	{
	text-align:right;
	}
	.align-center,
	.align-text-right ul.menu li
	{
	text-align:center;
	}

    /*
     * upperbar and topbar
     */
    #upperbarcontainer{
        position: relative;
        width:100%;
    }
    #upperbarcontainer.sticky
    {
        position: fixed;
        z-index:299;
    }

    /* upperbar colors */
    <?php
        $bgc = get_theme_mod('imagazine_upperbar_styling_bgcolor', '#000000');
        $bgt = get_theme_mod('imagazine_upperbar_styling_bgtransparancy', 0.3);
        $bgcolor = imagazine_hextorgb( $bgc, $bgt );
    ?>
    #upperbarcontainer
    {
        background-color: <?php echo $bgcolor; ?>;
        color: <?php echo get_theme_mod('imagazine_upperbar_styling_textcolor', '#fefefe'); ?>;
    }
    #upperbarcontainer a
    {
        color:<?php echo get_theme_mod('imagazine_upperbar_styling_linkcolor', '#efefef'); ?>;
    }
    #upperbarcontainer a:hover
    {
        color:<?php echo get_theme_mod('imagazine_upperbar_styling_hovercolor', '#676767'); ?>;
    }

    /* top */
    #topbarcontainer
    {
        <?php if( get_theme_mod('imagazine_topbar_behavior_largeposition', 'fixed') == 'overflow' ){ ?>
        /* fixed overflow  */
        position: absolute;
        <?php }else{ ?>
        position: relative;
        <?php } ?>
        width:100%;
        z-index:99;
    }

    #topbarcontainer.sticky
    {
        position: fixed;
        left:0px;
        z-index:298;
    }

    /* topbar content */
	#topmainbar, #topsidebar-1, #topsidebar-2
	{
	position: relative;
	display: block;
	}

	#toplogobox .site-logo img
	{
	min-width:<?php echo get_theme_mod('imagazine_topbar_logo_minwidth', 60).'px'; ?> !important;
	max-width:<?php echo get_theme_mod('imagazine_topbar_logo_maxwidth', 120).'px'; ?> !important;
	height:auto !important;
	}


    /* topbar colors */
    <?php
        $topbgc = get_theme_mod('imagazine_topbar_styling_bgcolor', '#000000');
        $topbgt = get_theme_mod('imagazine_topbar_styling_bgtransparancy', 0.3);
        $topbgcolor = imagazine_hextorgb( $topbgc, $topbgt );

        $topmenubgc = get_theme_mod('imagazine_topbar_styling_bgcolor', '#000000');
        $topmenubgt = get_theme_mod('imagazine_topbar_styling_bgtransparancy', 0.3);
        $topmenubgcolor = imagazine_hextorgb( $topmenubgc, $topmenubgt );
    ?>
    #topbarcontainer
    {
        background-color: <?php echo $topbgcolor; ?>;
        color: <?php echo get_theme_mod('imagazine_topbar_styling_textcolor', '#fefefe'); ?>;
    }
    #topbarcontainer a
    {
        color:<?php echo get_theme_mod('imagazine_topbar_styling_linkcolor', '#efefef'); ?>;
    }
    #topbarcontainer a:hover
    {
        color:<?php echo get_theme_mod('imagazine_topbar_styling_hovercolor', '#676767'); ?>;
    }




     /*
     * topmemu / body.menu_layer_active #topmenulayer
     */

    #topmenulayer
    {
        background-color: <?php echo $topbgcolor; ?>;
        color: <?php echo get_theme_mod('imagazine_topbar_styling_textcolor', '#fefefe'); ?>;
    }
    #topmenulayer .overflow a
    {
        color:<?php echo get_theme_mod('imagazine_topbar_styling_linkcolor', '#efefef'); ?>;
    }
    #topmenulayer .overflow a:hover
    {
        color:<?php echo get_theme_mod('imagazine_topbar_styling_hovercolor', '#676767'); ?>;
    }



    #topmainbar
    {
    }
    #topmenu ul.menu {
    white-space:nowrap;
    overflow:hidden;
    }

    body.menu_layer_active
    {
    background-color: aqua;
    overflow:hidden;
    }
    #topmenulayer
    {
      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
        /* set height 0 to hide nonactive*/
      height:0px;
      overflow-y: hidden;
    }
    body.menu_layer_active #topmenulayer
    {
        position:fixed;
        top:0px;
        width:100%;
        height:100%;
        -webkit-transition: all linear <?php echo get_theme_mod('imagazine_topbar_behavior_anispeed', 200 ) / 1000; ?>s;
        transition: all linear <?php echo get_theme_mod('imagazine_topbar_behavior_anispeed', 200 ) / 1000; ?>s;
        background-color: <?php echo $topmenubgcolor; ?>;
        overflow-y: auto;
        z-index:998;

        text-align: center;

    }
    body.menu_layer_active #topmenulayer ul.overflow
    {
        z-index:999;
    }
    body.menu_layer_active #topmenulayer ul.overflow li
    {
        max-width:60%;
        margin:0px auto;
    }










	#headermedia,
	#headermainbar
	{
	background-position:center;
	background-size:cover;
	}

    /* header colors */
    #headermedia a,
	#headermainbar a
	{
        color: <?php echo get_theme_mod('imagazine_header_styling_overlay_linkcolor', '#ffffff'); ?>;
	}
    #headermedia a:hover,
	#headermainbar a:hover
	{
        color: <?php echo get_theme_mod('imagazine_header_styling_overlay_hovercolor', '#cecece'); ?>;
	}


    /* footer colors */
    <?php
        $topbgc = get_theme_mod('imagazine_footer_styling_bgcolor', '#000000');
        $topbgt = get_theme_mod('imagazine_footer_styling_bgtransparancy', 0.3);
        $topbgcolor = imagazine_hextorgb( $topbgc, $topbgt );
    ?>
    #footercontainer
    {
        background-color: <?php echo $topbgcolor; ?>;
        color: <?php echo get_theme_mod('imagazine_footer_styling_textcolor', '#fefefe'); ?>;
    }
    #footercontainer a
    {
        color:<?php echo get_theme_mod('imagazine_footer_styling_linkcolor', '#efefef'); ?>;
    }
    #footercontainer a:hover
    {
        color:<?php echo get_theme_mod('imagazine_footer_styling_hovercolor', '#676767'); ?>;
    }



	/*
	 * MEDIUM SCREEN
	 */
	@media screen and (min-width: <?php echo get_theme_mod('imagazine_global_screenmode_mediummin', 580).'px'; ?>) {

	.outermargin
	{
	width:<?php echo get_theme_mod('imagazine_global_screenmode_mediumwidth', 94).'%'; ?>;
	max-width:<?php echo get_theme_mod('imagazine_global_screenmode_mediummargin', 960).'px'; ?> !important;
	}
	.columnbar .widget
	{
	}
	.colset1 .widget
	{
		float:left;
		width:100%;
	}
	.colset2 .widget
	{
		float:left;
		width:50%;
	}
	.colset3 .widget
	{
		float:left;
		width:33.33%;
	}
	.colset4 .widget
	{
		float:left;
		width:25%;
	}
	.colset5 .widget
	{
		float:left;
		width:20%;
	}
	.colset6 .widget
	{
		float:left;
		width:15%;
	}

	#topmainbar
	{
	min-height:<?php echo get_theme_mod('imagazine_topbar_behavior_minheight', 48).'px'; ?> !important;
	}


	.align-center,
	.align-text-center ul.menu li
	{
	text-align: center;
	}


	.pos-left,
	.pos-large-left
	{
	float:left;
	}
	.pos-right
	{
	float:right;
	}

	.pos-large-left,
	.align-left,
	.align-text-left ul.menu li
	{
	text-align: left;
	}
	.pos-large-right,
	.align-right,
	.align-text-right ul.menu li
	{
	text-align: right;
	}
	.pos-above,
	.pos-center,
	.pos-large-above,
	.pos-large-center
	{
	float:none;
	text-align: center;
	}


	/* Header */
		/* height set in global.js */
	#headermedia,
	#headermedia > .outermargin
	{

		display: block;
		-webkit-transform-style: preserve-3d;
		-moz-transform-style: preserve-3d;
		transform-style: preserve-3d;
		overflow: visible;
	}

	#headermedia .maincolumnbox,
	#headermedia .sidecolumn
	{
	  position: relative;
	  top: 50%;
	  transform: translateY(-50%);
	}

	/* maincontent */
	#maincontent, #sidebar, #sidebar-2
	{
	position: relative;
	display: block;
	}

	/* footer */
	<?php
	if( get_theme_mod('imagazine_footer_menu_layout', 'hor') == 'hor'){
	?>
	#footermenu ul.menu li
	{
	display:inline;
	}
	<?php
	}
	?>


	}






	/*
	 * LARGE SCREEN
	 */
	@media screen and (min-width: <?php echo get_theme_mod('imagazine_global_screenmode_largemin', 1150).'px'; ?>) {

	.outermargin
	{
	width:<?php echo get_theme_mod('imagazine_global_screenmode_largewidth', 96).'%'; ?>;
	max-width:<?php echo get_theme_mod('imagazine_global_screenmode_largemargin', 1280).'px'; ?> !important;
	}




	}

	</style>

	<?php // end output css
}
add_action( 'wp_head' , 'imagazine_customize_adaptive' );


// default sanitize function
function imagazine_sanitize_default($obj){
    //.. global sanitizer
    return $obj;
}

/** Extensions for customizer options
 * - multiselect categories
 */
function imagazine_load_customize_controls() {
    require_once( get_template_directory() . '/assets/customizer_extend.php' );
}
add_action( 'customize_register', 'imagazine_load_customize_controls', 0 );

?>
