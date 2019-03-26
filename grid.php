<?php
/**
 * Template Name: Grid Page
 * Theme main index file
 */
echo '<!DOCTYPE HTML>';
echo '<html ';
language_attributes();
echo '><head>';

/*
 * HTMLHEAD
 */
get_template_part('htmlhead');

echo '</head><body ';
body_class();
echo '>';

// start tracking code
if( get_option( 'tracking_code_bodytop' ) != '' && get_option( 'tracking_code_bodytop' ) != 1){
echo get_option( 'tracking_code_bodytop' );
} // end tracking codepress_footer_js()

echo '<div id="pagecontainer" class="pagemargin">';

/*
 * TOPBAR
 */
get_template_part('top');

/*
 * HEADER
 */
get_template_part('header');

/*
 * CONTENT
 */

$list_authortime_display = get_theme_mod('imagazine_content_listdisplay_authortime', 'both');
$list_timeformat_display = get_theme_mod('imagazine_content_listdisplay_timeformat', 'date');



if( is_page_template( 'grid.php' ) ){



    $page_topwidgets_display = get_theme_mod('imagazine_content_pagedisplay_contenttop', 'hide');
    $page_featuredimage_display = get_theme_mod('imagazine_content_pagedisplay_imageposition', 'top');
    $page_bottomwidgets_display = get_theme_mod('imagazine_content_pagedisplay_contentbottom', 'hide');

    $sidebar1pos = get_theme_mod('imagazine_content_sidebars_sidebar1pos', 'none' );
    $sidebar1width = get_theme_mod('imagazine_content_sidebars_sidebar1width', 30 );
    $sidebar1align = get_theme_mod('imagazine_content_sidebars_sidebar1align', 'left' );
    $sidebar1respon = get_theme_mod('imagazine_content_sidebars_sidebar1responsive', 'after' );

    $sidebar2pos = get_theme_mod('imagazine_content_sidebars_sidebar2pos', 'none' );
    $sidebar2width = get_theme_mod('imagazine_content_sidebars_sidebar2width', 30 );
    $sidebar2align = get_theme_mod('imagazine_content_sidebars_sidebar2align', 'left' );
    $sidebar2respon = get_theme_mod('imagazine_content_sidebars_sidebar2responsive', 'after' );

    $page_sidebar1_display = get_post_meta( get_the_ID() , "page-meta-sidebar1-display", true);
	$page_sidebar2_display = get_post_meta( get_the_ID() , "page-meta-sidebar2-display", true);

	$posarr = array(1 => 'right', 2 => 'left', 3 => 'none');
	if( $page_sidebar1_display != 0 ){
		// specify page meta settings
		$sidebar1pos = $posarr[ $page_sidebar1_display ];
	}
	if( $page_sidebar2_display != 0 ){
		// specify page meta settings
		$sidebar2pos = $posarr[ $page_sidebar2_display ];
	}







    echo '<div id="maincontentcontainer">';
	echo '<div class="outermargin">';

    if( $sidebar1pos != 'none' &&  ( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('sidebar') || has_nav_menu( 'sidemenu' ) ) ){

        echo '<div id="sidebar" class="sidecolumn width'.$sidebar1width.' pos-'.$sidebar1pos.' align-'.$sidebar1align.'">';
        // sidemenu
        if ( has_nav_menu( 'sidemenu' ) ){
            echo '<div id="sidemenubox"><div id="sidemenu" class="pos-default"><nav><div class="innerpadding">';
            wp_nav_menu( array( 'theme_location' => 'sidemenu' ) );
            echo '<div class="clr"></div></div></nav></div></div>';
        }
        dynamic_sidebar('sidebar');
        echo '<div class="clr"></div></div>';

	}

	// maincontent sidebar 2
	if( $sidebar2pos != 'none' && function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('sidebar-2') ){
        echo '<div id="sidebar-2" class="sidecolumn width'.$sidebar2width.' pos-'.$sidebar2pos.' align-'.$sidebar2align.'">';
        dynamic_sidebar('sidebar-2');
        echo '<div class="clr"></div></div>';
	}


    $page_contenttop_display = get_post_meta( get_the_ID() , "page-meta-contenttop-display", true);
    $dsparr = array( 1 => 'show', 2 => 'hide');


    $values = get_post_custom( get_the_ID() );

    $grid_gallerydefault = isset( $values['theme_grid_category_selectbox'] ) ? $values['theme_grid_category_selectbox'][0] : 'Uncategorized';

    $grid_ppp = isset( $values['theme_grid_ppp'] ) ? $values['theme_grid_ppp'][0] : 12;

    $display_authortime = isset( $values['theme_grid_authortime'] ) ? $values['theme_grid_authortime'][0] : 0;
    $display_timeformat = isset( $values['theme_grid_timeformat'] ) ? $values['theme_grid_timeformat'][0] : 0;
    $display_thumb = isset( $values['theme_grid_thumb'] ) ? $values['theme_grid_thumb'][0] : 0;
    $display_excerpt = isset( $values['theme_grid_excerpt'] ) ? $values['theme_grid_excerpt'][0] : 0;
    $display_readmorebutton = isset( $values['theme_grid_readmorebutton'] ) ? $values['theme_grid_readmorebutton'][0] : 0;

    $option_grid_authortime = array( 0 => get_theme_mod('imagazine_content_listdisplay_authortime', 'both') , 1 => 'none', 2 => 'both', 3 => 'date', 4 => 'author');
    $option_grid_timeformat = array( 0 => get_theme_mod('imagazine_content_listdisplay_timeformat', 'date') , 1 => 'date', 2 => 'full', 3 => 'ago');
    $option_grid_thumb = array( 0 => get_theme_mod('imagazine_content_listdisplay_thumb', 'top'), 1 => 'top', 2 => 'title', 3 => 'cover', 4 => 'none');
    $option_grid_excerpt = array( 0 => get_theme_mod('imagazine_content_listdisplay_excerpt', 'show'), 1 => 'show', 2 => 'hide');
    $option_grid_readmorebutton = array( 0 => get_theme_mod('imagazine_content_listdisplay_readmorebutton', 'hide'), 1 => 'left', 2 => 'center', 3 => 'right', 4 => 'hide');


    $grid_authortime = $option_grid_authortime[$display_authortime];
    $grid_timeformat = $option_grid_timeformat[$display_timeformat];
    $grid_thumb = $option_grid_thumb[$display_thumb];
    $grid_excerpt = $option_grid_excerpt[$display_excerpt];
    $grid_readmorebutton = $option_grid_readmorebutton[$display_readmorebutton];


    if( $page_contenttop_display != 0 ){
    $page_topwidgets_display = $dsparr[$page_contenttop_display];
    }

    if( $page_topwidgets_display != 'hide' ){
        // maincontent top widgets
        if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('contenttopwidgets') ){
            echo '<div id="contenttopwidgets" class="contenttop">';
            dynamic_sidebar('contenttopwidgets');
            echo '<div class="clr"></div></div>';
        }
    }



    echo '<div id="maincontent" class="blog-columns">';

    echo '<div class="contentwrapper">';






    $args = array(
        'category_name' => $grid_gallerydefault,
        'post_type' => 'post',
        'posts_per_page' => $grid_ppp,
        'paged' => $paged,
        'order' => 'DESC',
    );

    $wp_query = new WP_Query($args);
    if ( have_posts() ) :
    while ( have_posts() ) : the_post();



    ?>

    <div id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
    <?php

        if ( has_post_thumbnail() && ( $grid_thumb == "top" || $grid_thumb == "cover" ) ) {

            echo '<a class="postlist-coverimage" href="'.get_the_permalink().'" title="'.get_the_title().'" >';

            $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'big-thumb'); ;
            echo '<div class="coverbox" style="background-image:url('.$featured_img_url.');">';
            if ( $grid_thumb == "cover" ) {
                echo '<h2>';
                if( is_search() ){ echo search_title_highlight(); }else{ echo get_the_title(); }
                echo '</h2>';
            }
            echo '</div>';

            echo '</a>';
        }


        echo '<div class="listitemtitlebar">';

        if ( $grid_thumb != "cover" || ( !has_post_thumbnail() && $grid_thumb == "cover" )  ) {
        echo '<h2><a href="'.get_the_permalink().'">';
        if( is_search() ){ echo search_title_highlight(); }else{ echo get_the_title(); }
        echo '</a></h2>';
        }

        echo '<div class="metabox">';

        if( $grid_authortime == 'both' || $grid_authortime == 'date'){
            /* set date display */
            if( $grid_timeformat == 'date' ){
                echo '<span class="post-date date-time">'.get_the_date().'</span> ';
            }elseif( $grid_timeformat == 'full' ){
                echo '<span class="post-date date-time">'.get_the_date().' '.__('om','imagazine').' '.get_the_time().'</span> ';
            }else{
                echo '<span class="post-date time-ago">';
                wp_time_ago(get_the_time( 'U' ));
                echo '</span>';
            }
        }

        if( $grid_authortime == 'both' || $grid_authortime == 'author'){
        /* set author display */
        echo ' <span class="post-author">'.__('door','imagazine').' '.get_the_author().'</span> ';
        }
        echo '<div class="clr"></div></div>';
        echo '<div class="clr"></div></div>';

        echo '<div class="optionmenu">';

        if ( is_super_admin() ) {
        edit_post_link( __( 'Bewerk' , 'imagazine' ), '<span class="edit-link">', '</span>' );
        }

        echo '<div class="clr"></div></div>';

        if ( has_post_thumbnail() && $grid_thumb == "title" ) {
        echo '<a class="postlist-coverimage" href="'.get_the_permalink().'" title="'.get_the_title().'" >';
            $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'big-thumb'); ;
            echo '<div class="coverbox" style="background-image:url('.$featured_img_url.');"></div>';
        echo '</a>';
        }

        echo '<div class="innerpadding">';
        if ( $grid_excerpt == "show" ) {
            echo apply_filters('the_excerpt', get_the_excerpt());
        }
        if( $grid_readmorebutton != "hide"){
            echo ' <a href="'.get_the_permalink().'" class="readmore align-'.$grid_readmorebutton.'">'.__('Lees meer', 'imagazine' ).'</a>';
        }
        echo '<div class="clr"></div></div>'; // end page(post) container





    /*
    if ( has_post_thumbnail() ) {
    echo '<a class="postlist-coverimage" href="'.get_the_permalink().'" title="'.get_the_title().'" >';
    //the_post_thumbnail('big-thumb');
        $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'big-thumb'); ;
    echo '<div class="coverbox" style="background-image:url('.$featured_img_url.');"></div>';
    echo '</a>';
    }
    echo '<div class="listitemtitlebar">';
    echo '<h2><a href="'.get_the_permalink().'">';
    if( is_search() ){ echo search_title_highlight(); }else{ echo get_the_title(); }
    echo '</a></h2>';
    echo '<div class="metabox">';
    if( $list_authortime_display == 'both' || $list_authortime_display == 'date'){
        if( $list_timeformat_display == 'date' ){
            echo '<span class="post-date date-time">'.get_the_date().'</span> ';
        }elseif( $list_timeformat_display == 'full' ){
            echo '<span class="post-date date-time">'.get_the_date().' '.__('om','imagazine').' '.get_the_time().'</span> ';
        }else{
            echo '<span class="post-date time-ago">';
            wp_time_ago(get_the_time( 'U' ));
            echo '</span>';
        }
    }
    if( $list_authortime_display == 'both' || $list_authortime_display == 'author'){
    echo ' <span class="post-author">'.__('door','imagazine').' '.get_the_author().'</span> ';
    }
    echo '<div class="clr"></div></div>';
    echo '<div class="clr"></div></div>';
    echo '<div class="optionmenu">';
    if ( is_super_admin() ) {
    edit_post_link( __( 'Bewerk' , 'imagazine' ), '<span class="edit-link">', '</span>' );
    }
    echo '<div class="clr"></div></div>';
    echo '<div class="innerpadding">';
    echo apply_filters('the_excerpt', get_the_excerpt());
    echo ' <a href="'.get_the_permalink().'">'.__('Lees meer', 'imagazine' ).'</a>';
    echo '</div>';

    */

    echo '<div class="clr"></div></div>'; // end page(post) container


    endwhile;
    endif;
    wp_reset_query();


    echo '<div class="clr"></div></div>'; // end content wrapper





    echo '<div class="clr"></div></div>'; // end main container

    echo '<div class="clr"></div></div>'; // end margin

    echo '<div class="clr"></div></div>'; // end maincontent container



}else{

    get_template_part('loop');

}


/*
 * FOOTERBAR
 */
get_template_part('footer');


echo '<div class="clr"></div></div>'; // end pagecontainer

wp_footer();

echo '</body></html>';
?>
