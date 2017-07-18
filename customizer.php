<?php
// Customizer Imagazine

function imagazine_theme_customizer( $wp_customize ){

	// REMOVE some core theme settings first
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('background_color');
	$wp_customize->remove_panel('colors');




	// add panels
    $wp_customize->add_panel('imagazine_global', array(
        'title'    => __('Global', 'imagazine'),
        'priority' => 10,
    ));

    $wp_customize->add_panel('imagazine_topbar', array(
        'title'    => __('Topbar', 'imagazine'),
        'priority' => 10,
    ));




	// move sections
	$wp_customize->add_section('title_tagline', array(
        'title'    => __('Identity', 'imagazine'),
        'panel'  => 'imagazine_global',
		'priority' => 20,
    ));

	$wp_customize->add_section('header_image', array(
		'title'    => __('Header', 'imagazine'),
    	'panel'  => 'imagazine_global',
		'priority' => 40,
    ));

	$wp_customize->add_section('background_image', array(
        'title'    => __('Background Image', 'imagazine'),
        'panel'  => 'imagazine_global',
		'priority' => 50,
    ));


	// Global sections
	$wp_customize->add_section('imagazine_global_screenmode', array(
        'title'    => __('Screen modes', 'imagazine'),
        'panel'  => 'imagazine_global',
		'priority' => 80,
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
	$wp_customize->add_section('imagazine_topbar_widgets', array(
        'title'    => __('Widgets', 'imagazine'),
        'panel'  => 'imagazine_topbar',
		'priority' => 90,
    ));
	$wp_customize->add_section('imagazine_topbar_sidebars', array(
        'title'    => __('Sidebars', 'imagazine'),
        'panel'  => 'imagazine_topbar',
		'priority' => 120,
    ));





	/* Global */

	// Global - Identity logo image
	$wp_customize->add_setting( 'title_tagline_logoimage', array(
		'sanitize_callback' => 'imagazine_sanitize_default',
	    ));
	 $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'title_tagline_logoimage', array(
        	'label'    => __( 'Logo image', 'imagazine' ),
        	'section'  => 'title_tagline',
        	'settings' => 'title_tagline_logoimage',
			'description' => __( 'Upload or select a logo image to display', 'imagazine' ),
        	'priority' => 30,
   	) ) );




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




	/* Topbar - Behavior */
	$wp_customize->add_setting( 'imagazine_topbar_behavior_position' , array(
		'default' => 'fixed',
		'sanitize_callback' => 'imagazine_sanitize_default',
		'priority' => 20,
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_behavior_position', array(
            'label'          => __( 'Topbar screen positioning', 'imagazine' ),
            'section'        => 'imagazine_topbar_behavior',
            'settings'       => 'imagazine_topbar_behavior_position',
            'type'           => 'select',
 	    	'description'    => __( 'Select topbar screen behavior', 'imagazine' ),
            'choices'        => array(
                'relative'   => __( 'Relative, scroll along', 'imagazine' ),
                'fixed'   => __( 'Fixed, stick to top', 'imagazine' ),
                'scroll'   => __( 'Fixed, visible on first scroll', 'imagazine' ),
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




	/* Topbar - Menu */
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
                'collapsed'   => __( 'Collapsed', 'imagazine' ),
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
                'collapsed'   => __( 'Collapsed', 'imagazine' ),
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
                'full'   => __( 'Topbar Fullwidth', 'imagazine' ),
                'content'   => __( 'Above logo/navigation', 'imagazine' ),
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
	/*
	sidebar1 position left/right
    sidebar1 width
    sidebar1 text-alignment left/right
    sidebar1 responsive position
	*/

	$wp_customize->add_setting( 'imagazine_topbar_sidebars_sidebar1pos' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_sidebars_sidebar1pos', array(
            	'label'          => __( 'Sidebar position', 'imagazine' ),
            	'section'        => 'imagazine_topbar_sidebars',
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
		'default' => '30',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_sidebars_sidebar1width', array(
            	'label'          => __( 'Sidebar width', 'imagazine' ),
            	'section'        => 'imagazine_topbar_sidebars',
            	'settings'       => 'imagazine_topbar_sidebars_sidebar1width',
            	'type'           => 'text',
 	    	'description'    => __( 'Select sidebar width (percentage).', 'imagazine' ),
    	)));

		$wp_customize->add_setting( 'imagazine_topbar_sidebars_sidebar1align' , array(
		'default' => 'left',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_sidebars_sidebar1align', array(
            	'label'          => __( 'Sidebar content alignment', 'imagazine' ),
            	'section'        => 'imagazine_topbar_sidebars',
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
            	'section'        => 'imagazine_topbar_sidebars',
            	'settings'       => 'imagazine_topbar_sidebars_sidebar1responsive',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the sidebar positioning on small screens', 'imagazine' ),
            	'choices'        => array(
                	'before'   => __( 'On top', 'imagazine' ),
                	'after'   => __( 'After logo/navigation', 'imagazine' ),
            		'collapsed'   => __( 'Collapsed', 'imagazine' ),
            		'hide'   => __( 'Hide', 'imagazine' ),
            	)
    	)));



		$wp_customize->add_setting( 'imagazine_topbar_sidebars_sidebar2pos' , array(
		'default' => 'none',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_sidebars_sidebar2pos', array(
            	'label'          => __( 'Second sidebar position', 'imagazine' ),
            	'section'        => 'imagazine_topbar_sidebars',
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
		'default' => '30',
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_sidebars_sidebar2width', array(
            	'label'          => __( 'Second sidebar width', 'imagazine' ),
            	'section'        => 'imagazine_topbar_sidebars',
            	'settings'       => 'imagazine_topbar_sidebars_sidebar2width',
            	'type'           => 'text',
 	    	'description'    => __( 'Select second sidebar width (percentage).', 'imagazine' ),
    	)));

		$wp_customize->add_setting( 'imagazine_topbar_sidebars_sidebar2align' , array(
		'default' => 'left',
		'sanitize_callback' => 'imagazine_sanitize_default',
			'priority' => 50,
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'imagazine_topbar_sidebars_sidebar2align', array(
            	'label'          => __( 'Second sidebar content alignment', 'imagazine' ),
            	'section'        => 'imagazine_topbar_sidebars',
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
            	'section'        => 'imagazine_topbar_sidebars',
            	'settings'       => 'imagazine_topbar_sidebars_sidebar2responsive',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the second sidebar positioning on small screens', 'imagazine' ),
            	'choices'        => array(
                	'before'   => __( 'On top', 'imagazine' ),
                	'after'   => __( 'After logo/navigation and sidebar', 'imagazine' ),
            		'collapsed'   => __( 'Collapsed', 'imagazine' ),
            		'hide'   => __( 'Hide', 'imagazine' ),
            	)
    	)));





}
add_action( 'customize_register', 'imagazine_theme_customizer' );



function imagazine_customize_adaptive(){

	// start output css ?>
	<style>

	/*
	 * SMALL SCREEN DEFAULTS
	 */
	.outermargin
	{
	margin:0px auto;
	width:<?php echo get_theme_mod('imagazine_global_screenmode_smallwidth', 100).'%'; ?>;
	max-width:<?php echo get_theme_mod('imagazine_global_screenmode_smallmargin', 320).'px'; ?> !important;
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

	#topbarcontainer
	{
	min-height:<?php echo get_theme_mod('imagazine_topbar_behavior_minheight', 60).'px'; ?> !important;
	}


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

?>
