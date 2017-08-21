<?php

// footer behavior width
$footerwidth = get_theme_mod('imagazine_footer_behavior_width', 'margin' );

// columns widget
	// - top / bottom
$footercolumnspos = get_theme_mod('imagazine_footer_columns_position', 'margin' );


// content widget
	// - above / below


// sidebars
$footsidebar1pos = get_theme_mod('imagazine_footer_sidebars_sidebar1pos', 'none' );
$footsidebar1width = get_theme_mod('imagazine_footer_sidebars_sidebar1width', 30 );
$footsidebar1align = get_theme_mod('imagazine_footer_sidebars_sidebar1align', 'left' );
$footsidebar1respon = get_theme_mod('imagazine_footer_sidebars_sidebar1responsive', 'after' );

$footsidebar2pos = get_theme_mod('imagazine_footer_sidebars_sidebar2pos', 'none' );
$footsidebar2width = get_theme_mod('imagazine_footer_sidebars_sidebar2width', 30 );
$footsidebar2align = get_theme_mod('imagazine_footer_sidebars_sidebar2align', 'left' );
$footsidebar2respon = get_theme_mod('imagazine_footer_sidebars_sidebar2responsive', 'after' );



// footer main content

echo '<div id="footercontainer">';

	if( $footerwidth === 'margin'){
		echo '<div class="outermargin">';
	}


	// columns widget top
	if( $footercolumnspos == 'top' && function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('footercolumns') ){
	echo '<div id="footercolumns" class="columnbar colset'.is_sidebar_active('footercolumns').'">';
	dynamic_sidebar('footercolumns');
	echo '<div class="clr"></div></div>';
	}


	// footer sidebar 1
	if( $footsidebar1pos != 'none' && function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('footersidebar-1') ){
	echo '<div id="footersidebar-1" class="sidecolumn width'.$footsidebar1width.' pos-'.$footsidebar1pos.' align-'.$footsidebar1align.'">';
	dynamic_sidebar('footersidebar-1');
	echo '<div class="clr"></div></div>';
	}

	// footer sidebar 2
	if( $footsidebar2pos != 'none' && function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('footersidebar-2') ){
	echo '<div id="footersidebar-2" class="sidecolumn width'.$footsidebar2width.' pos-'.$footsidebar2pos.' align-'.$footsidebar2align.'">';
	dynamic_sidebar('footersidebar-2');
	echo '<div class="clr"></div></div>';
	}


	echo '<div id="footermainbar" class="maincolumn">';

		// menu / content widget// topmenu
		echo '<div id="footermenu"><nav><div class="innerpadding">';
		if ( has_nav_menu( 'footermenu' ) ) {
			wp_nav_menu( array( 'theme_location' => 'footermenu' ) );
		}else{
			wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) );
		}
		echo '<div class="clr"></div></div></nav></div>';

	echo '<div class="clr"></div></div>';


	// columns widget bottom
	if( $footercolumnspos == 'bottom' && function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('footercolumns') ){
	echo '<div id="footercolumns" class="columnbar colset'.is_sidebar_active('footercolumns').'">';
	dynamic_sidebar('footercolumns');
	echo '<div class="clr"></div></div>';
	}

	if( $footerwidth === 'margin'){
		echo '<div class="clr"></div></div>';
	}

echo '<div class="clr"></div></div>';

?>
