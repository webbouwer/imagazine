<?php

echo '<meta http-equiv="Content-Type" content="text/html; charset='.get_bloginfo( 'charset' ).'" />';

echo '<link rel="canonical" href="'.home_url(add_query_arg(array(),$wp->request)).'">'
	.'<link rel="pingback" href="'.get_bloginfo( 'pingback_url' ).'" />'
	.'<link rel="shortcut icon" href="images/favicon.ico" />'
	// tell devices wich screen size to use by default
	.'<meta name="viewport" content="initial-scale=1.0, width=device-width" />'
	.'<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';

/**
 * share meta info
 * todo:  should get content featured image (header)
 * linkedin - https://www.linkedin.com/help/linkedin/answer/46687

	.'<meta property="og:title" content="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'"/>'
	.'<meta property="og:image" content="'.get_theme_mod( 'onepiece_identity_featured_image' ).'"/>'
	.'<meta property="og:description" content="'.$site_description.'"/>'
	.'<meta property="og:url" content="'.esc_url( home_url( '/' ) ).'" />'

	.'<!--[if lt IE 9]><script src="'.esc_url( get_template_directory_uri() ).'/assets/html5.js"></script>'
	.'<script src="'.esc_url( get_template_directory_uri() ).'/assets/cssmediaqueries.js"></script>'
	.'<![endif]-->';
 */

if ( is_singular() ) wp_enqueue_script( "comment-reply" );

wp_head(); // http://codex.wordpress.org/Function_Reference/wp_head

if ( ! isset( $content_width ) ) $content_width = 360; // mobile first


?>
