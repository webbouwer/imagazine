<?php
// top bar

// logo display
$topbarlogo = get_theme_mod('title_tagline_logoimage', '');
if( get_theme_mod('imagazine_topbar_logo_image', '') != '' ){
$topbarlogo = get_theme_mod('imagazine_topbar_logo_image', '');
}

// topbar screen positioning (relative,fixed,scroll,none)
$topbarposition = get_theme_mod('imagazine_topbar_behavior_position', 'center');

// use minheight?
// JS: topbar minheight imagazine_topbar_behavior_minheight
// use outermargin?
// JS: $topbarwidth = get_theme_mod('imagazine_topbar_behavior_width', 'full');
// Move top widgets?
// JS: imagazine_topbar_widgets_position (full,content)


// topbar logo
$topbarlogopos = get_theme_mod('imagazine_topbar_logo_position', 'center');




// element and outermargin


// use topbar?
if($topbarposition != 'none'){

	echo '<div id="topbarcontainer">';

	// top widgets

	echo '<div id="topmainbar" class="maincolumn">';

	// toplogo
	if( $topbarlogo != '' && $topbarlogopos != 'none' ){
	echo '<div id="toplogobox" class="'.$topbarlogopos.'"><a href="'.esc_url( home_url( '/' ) ).'" class="site-logo" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home"><img src="'.$topbarlogo.'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).' - '.get_bloginfo( 'description' ).'"></a></div>';
	}

	// topmenu
	echo '<div id="topmenu"><nav><div class="innerpadding">';
	if ( has_nav_menu( 'topmenu' ) ) {
		wp_nav_menu( array( 'theme_location' => 'topmenu' ) );
	}else{
		wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) );
	}
	echo '<div class="clr"></div></div></nav></div>';


	echo '<div class="clr"></div></div>';





	echo '</div>';

}// end use topbar

?>
