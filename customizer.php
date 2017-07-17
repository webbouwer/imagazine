<?php
// Customizer Imagazine

function imagazine_theme_customizer( $wp_customize ){

	// REMOVE some core theme settings first
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('background_color');
	$wp_customize->remove_panel('colors');




	// add panels
    $wp_customize->add_panel('imagazine_identity', array(
        'title'    => __('Style & Identity', 'imagazine'),
        'priority' => 10,
    ));




	// move sections
	$wp_customize->add_section('title_tagline', array(
        'title'    => __('Title, Tagline, Logo etc.', 'imagazine'),
        'panel'  => 'imagazine_identity',
		'priority' => 20,
    ));

	$wp_customize->add_section('header_image', array(
		'title'    => __('Header', 'imagazine'),
    	'panel'  => 'imagazine_identity',
		'priority' => 80,
    ));

	$wp_customize->add_section('background_image', array(
        'title'    => __('Background Image', 'imagazine'),
        'panel'  => 'imagazine_identity',
		'priority' => 50,
    ));


	// Identity add sections
	$wp_customize->add_section('imagazine_identity_screenmode', array(
        'title'    => __('Screenwidth', 'imagazine'),
        'panel'  => 'imagazine_identity',
		'priority' => 160,
    ));


	$wp_customize->add_setting( 'imagazine_identity_screenmode_largemin' , array(
		'default' => 1280,
		'sanitize_callback' => 'imagazine_sanitize_default',
    	));
    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'devilsfruit_display_screenwidth_largemax', array(
            	'label'          => __( 'Large screen min width', 'devilsfruit' ),
            	'section'        => 'imagazine_identity_screenmode',
            	'settings'       => 'imagazine_identity_screenmode_largemin',
            	'type'           => 'number',
 	    	'description'    => __( 'Define min. width for large screen mode (px).', 'imagazine' ),
    	)));


}
add_action( 'customize_register', 'imagazine_theme_customizer' );

// default sanitize function
function imagazine_sanitize_default($obj){
    //.. global sanitizer
    return $obj;
}

?>
