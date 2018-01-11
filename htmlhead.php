<?php

echo '<meta http-equiv="Content-Type" content="text/html; charset='.get_bloginfo( 'charset' ).'" />';

echo '<link rel="canonical" href="'.home_url(add_query_arg(array(),$wp->request)).'">'
	.'<link rel="pingback" href="'.get_bloginfo( 'pingback_url' ).'" />'
	.'<link rel="shortcut icon" href="images/favicon.ico" />'
	// tell devices wich screen size to use by default
	.'<meta name="viewport" content="initial-scale=1.0, width=device-width" />'
	.'<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';

	//.'<meta name="mobile-web-app-capable" content="yes">'; //? tell webkit (chrome,safari) to display page fullscreen hiding the addressbar

if ( is_singular() ) wp_enqueue_script( "comment-reply" );

wp_head(); // http://codex.wordpress.org/Function_Reference/wp_head

if ( ! isset( $content_width ) ) $content_width = 360; // mobile first

?>
