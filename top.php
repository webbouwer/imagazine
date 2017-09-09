<?php
// top bar

// logo display
$topbarlogo = get_theme_mod('title_tagline_logoimage', '');
if( get_theme_mod('imagazine_topbar_logo_image', '') != '' ){
$topbarlogo = get_theme_mod('imagazine_topbar_logo_image', '');
}


// use minheight?
// JS: topbar minheight imagazine_topbar_behavior_minheight
// use outermargin?
// JS: $topbarwidth = get_theme_mod('imagazine_topbar_behavior_width', 'full');
// Move top widgets?
// JS: imagazine_topbar_widgets_position (full,content)

// upperbar
$upperbardisplaysmall = get_theme_mod('imagazine_upperbar_behavior_displaysmall', 'none');
$upperbardisplaylarge = get_theme_mod('imagazine_upperbar_behavior_displaylarge', 'fixed');

$upperbarwidth = get_theme_mod('imagazine_upperbar_behavior_width', 'margin');

$uppermenusmallpos = get_theme_mod('imagazine_upperbar_menu_smallscreen', 'none');
$uppermenulargepos = get_theme_mod('imagazine_upperbar_menu_largescreen', 'left');
$uppermenutextalign = get_theme_mod('imagazine_upperbar_menu_textalign', 'left');


$uppersidebarpos = get_theme_mod('imagazine_upperbar_sidebar_pos', 'none');
$uppersidebarwidth = get_theme_mod('imagazine_upperbar_sidebar_widht', 30);
$uppersidebaralign = get_theme_mod('imagazine_upperbar_sidebar_align', 'left');
$uppersidebarrespon = get_theme_mod('imagazine_upperbar_sidebar_responsive', 'after');


// topbar logo
$topbarlogopos = get_theme_mod('imagazine_topbar_logo_position', 'center');

$topbarlargebehavior = get_theme_mod('imagazine_topbar_behavior_largeposition', 'fixed');
$topbarsmallbehavior = get_theme_mod('imagazine_topbar_behavior_smallposition', 'fixed');
$topbarbehaviorwidth =  get_theme_mod('imagazine_topbar_behavior_width', 'margin');
// topbar menu
$topbarmenusmall = get_theme_mod('imagazine_topbar_menu_smallscreen', 'collapsed');
$topbarmenularge = get_theme_mod('imagazine_topbar_menu_largescreen', 'center');
$topbarmenutextalign = get_theme_mod('imagazine_topbar_menu_textalign', 'center');

$topbarsubmenu = get_theme_mod('imagazine_topbar_menu_subs', 'horizontal');

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




/// if page - meta option
if( is_page() ){

	$page_upperbar_small = get_post_meta( get_the_ID() , "page-meta-upperbar-small", true);
	$page_upperbar_large = get_post_meta( get_the_ID() , "page-meta-upperbar-large", true);
	$page_topbar_small = get_post_meta( get_the_ID() , "page-meta-topbar-small", true);
	$page_topbar_large = get_post_meta( get_the_ID() , "page-meta-topbar-large", true);

	$baroptarr = array( 1=>'fixed', 2=>'relative', 3=>'none');


	if( $page_upperbar_small != 0 ){
		// specify page meta settings
		$upperbardisplaysmall = $baroptarr[ $page_upperbar_small ];
	}
	if( $page_upperbar_large != 0 ){
		// specify page meta settings
		$upperbardisplaylarge = $baroptarr[ $page_upperbar_large ];
	}
	if( $page_topbar_small != 0 ){
		// specify page meta settings
		$topbarsmallbehavior = $baroptarr[ $page_topbar_small ];
	}
	if( $page_topbar_large != 0 ){
		// specify page meta settings
		$topbarlargebehavior = $baroptarr[ $page_topbar_large ];
	}
}







// use upperbar?
	if ( ( $upperbardisplaysmall != 'none' || $upperbardisplaylarge != 'none' ) && ( has_nav_menu( 'uppermenu' ) || (  function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('uppersidebar') ) ) ){

		echo '<div id="upperbarcontainer" class="small-'.$upperbardisplaysmall.' large-'.$upperbardisplaylarge.'">';

		if( $upperbarwidth == 'margin'){
			echo '<div class="outermargin">';
		}

		// uppersidebar
		if( $uppersidebarpos != 'none' && function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('uppersidebar')){
		echo '<div id="uppersidebar" class="pos-'.$uppersidebarpos.' align-'.$uppersidebaralign.'">';
		dynamic_sidebar('uppersidebar');
		echo '<div class="clr"></div></div>';
		}

		// uppermenu
		if ( has_nav_menu( 'uppermenu' ) ){
		echo '<div id="uppermenubox"><div id="uppermenu" class="pos-small-'.$uppermenusmallpos.' pos-large-'.$uppermenulargepos.' align-text-'.$uppermenutextalign.'"><nav><div class="innerpadding">';
		wp_nav_menu( array( 'theme_location' => 'uppermenu' ) );
		echo '<div class="clr"></div></div></nav></div></div>';
		}

		if( $upperbarwidth == 'margin'){
			echo '<div class="clr"></div></div>';
		}

		echo '<div class="clr"></div></div>';

	}



// use topbar?
if($topbarlargebehavior != 'none' || $topbarsmallbehavior != 'none'){

	echo '<div id="topbarcontainer" class="small-'.$topbarsmallbehavior.' large-'.$topbarlargebehavior.'">';


	if( $topbarbehaviorwidth === 'margin'){
		echo '<div class="outermargin">';
	}

	// top widgets
	if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('topwidgets')){
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
	echo '<div id="topmenu" class="pos-small-'.$topbarmenusmall.' pos-large-'.$topbarmenularge.' align-text-'.$topbarmenutextalign.' submenu-'.$topbarsubmenu.'"><nav><div class="innerpadding">';
	if ( has_nav_menu( 'topmenu' ) ) {
		wp_nav_menu( array( 'theme_location' => 'topmenu' ) );
	}else{
		wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) );
	}
	echo '<div class="clr"></div></div></nav></div>';

	echo '<div class="clr"></div></div>';





	if( $topbarbehaviorwidth === 'margin'){
		echo '</div>';
	}


	echo '<div class="clr"></div></div>';

}// end use topbar

?>
