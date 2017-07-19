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

// topbar menu
$topbarmenusmall = get_theme_mod('imagazine_topbar_menu_smallscreen', 'collapsed');
$topbarmenularge = get_theme_mod('imagazine_topbar_menu_largescreen', 'center');
$topbarmenutextalign = get_theme_mod('imagazine_topbar_menu_textalign', 'center');

// widgets
$topbartopwidgetspos = get_theme_mod('imagazine_topbar_widgets_position', 'full');
$topbartopwidgetsmaxcol = get_theme_mod('imagazine_topbar_widgets_maxcol', 5);

// sidebars
$topsidebar1pos = get_theme_mod('imagazine_topbar_sidebars_sidebar1pos', 'none' );
$topsidebar1width = get_theme_mod('imagazine_topbar_sidebars_sidebar1width', 30 );
$topsidebar1align = get_theme_mod('imagazine_topbar_sidebars_sidebar1align', 'left' );
$topsidebar1respon = get_theme_mod('imagazine_topbar_sidebars_sidebar1responsive', 'after' );

$topsidebar2pos = get_theme_mod('imagazine_topbar_sidebars_sidebar2pos', 'none' );
$topsidebar2width = get_theme_mod('imagazine_topbar_sidebars_sidebar2width', 30 );
$topsidebar2align = get_theme_mod('imagazine_topbar_sidebars_sidebar2align', 'left' );
$topsidebar2respon = get_theme_mod('imagazine_topbar_sidebars_sidebar2responsive', 'after' );



// use topbar?
if($topbarposition != 'none'){

	echo '<div id="topbarcontainer">';

	// uppermenu
	if ( has_nav_menu( 'uppermenu' ) ) {
		echo '<div id="uppermenu"><nav><div class="innerpadding">';
		wp_nav_menu( array( 'theme_location' => 'uppermenu' ) );
		echo '<div class="clr"></div></div></nav></div>';
	}


	// top widgets
	if( $topbartopwidgetspos == 'full' && function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('topwidgets')){
	echo '<div id="topwidgets" class="widgetcontainer">';
	dynamic_sidebar('topwidgets');
	echo '<div class="clr"></div></div>';
	}
	// top sidebars

	// topsidebar 1
	if( $topsidebar1pos != 'none' && function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('topsidebar-1') ){
	echo '<div id="topsidebar-1" class="sidecolumn width'.$topsidebar1width.' pos-'.$topsidebar1pos.' align-'.$topsidebar1align.'">';
	dynamic_sidebar('topsidebar-1');
	echo '<div class="clr"></div></div>';
	}

	// topsidebar 2
	if( $topsidebar2pos != 'none' && function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('topsidebar-2') ){
	echo '<div id="topsidebar-2" class="sidecolumn width'.$topsidebar2width.' pos-'.$topsidebar2pos.' align-'.$topsidebar2align.'">';
	dynamic_sidebar('topsidebar-2');
	echo '<div class="clr"></div></div>';
	}



	// top main content
	echo '<div id="topmainbar" class="maincolumn large-'.$topbarmenularge.' small-'.$topbarmenusmall.'">';

	// toplogo
	if( $topbarlogo != '' && $topbarlogopos != 'none' ){
	echo '<div id="toplogobox" class="pos-'.$topbarlogopos.'"><a href="'.esc_url( home_url( '/' ) ).'" class="site-logo" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home"><img src="'.$topbarlogo.'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).' - '.get_bloginfo( 'description' ).'"></a></div>';
	}

	// topmenu
	echo '<div id="topmenu" class="pos-'.$topbarmenularge.' align-'.$topbarmenutextalign.'"><nav><div class="innerpadding">';
	if ( has_nav_menu( 'topmenu' ) ) {
		wp_nav_menu( array( 'theme_location' => 'topmenu' ) );
	}else{
		wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) );
	}
	echo '<div class="clr"></div></div></nav></div>';


	echo '<div class="clr"></div></div>';





	echo '<div class="clr"></div></div>';

}// end use topbar

?>
