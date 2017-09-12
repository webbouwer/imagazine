<?php

// options

$headerfeaturedimg = get_theme_mod('imagazine_header_featuredimages', 'no');
$headertitle = get_theme_mod('imagazine_header_pagetitle', 'no');


// sidebars
$sidebar1pos = get_theme_mod('imagazine_content_sidebars_sidebar1pos', 'none' );
$sidebar1width = get_theme_mod('imagazine_content_sidebars_sidebar1width', 30 );
$sidebar1align = get_theme_mod('imagazine_content_sidebars_sidebar1align', 'left' );
$sidebar1respon = get_theme_mod('imagazine_content_sidebars_sidebar1responsive', 'after' );

$sidebar2pos = get_theme_mod('imagazine_content_sidebars_sidebar2pos', 'none' );
$sidebar2width = get_theme_mod('imagazine_content_sidebars_sidebar2width', 30 );
$sidebar2align = get_theme_mod('imagazine_content_sidebars_sidebar2align', 'left' );
$sidebar2respon = get_theme_mod('imagazine_content_sidebars_sidebar2responsive', 'after' );


/* post/page/list global settings */
$list_topwidgets_display = get_theme_mod('imagazine_global_listdisplay_contenttop', 'hide');
$list_authortime_display = get_theme_mod('imagazine_global_listdisplay_authortime', 'both');
$list_timeformat_display = get_theme_mod('imagazine_global_listdisplay_timeformat', 'date');
$list_bottomwidgets_display = get_theme_mod('imagazine_global_listdisplay_contentbottom', 'hide');
$list_sidebar1_display = get_theme_mod('imagazine_global_listdisplay_sidebar1_pos','none');
$list_sidebar2_display = get_theme_mod('imagazine_global_listdisplay_sidebar2_pos','none');

$post_topwidgets_display = get_theme_mod('imagazine_global_postdisplay_contenttop', 'hide');
$post_authortime_display = get_theme_mod('imagazine_global_postdisplay_authortime', 'both');
$post_timeformat_display = get_theme_mod('imagazine_global_postdisplay_timeformat', 'date');
$post_bottomwidgets_display = get_theme_mod('imagazine_global_postdisplay_contentbottom', 'hide');
$post_sidebar1_display = get_theme_mod('imagazine_global_postdisplay_sidebar1_pos','none');
$post_sidebar2_display = get_theme_mod('imagazine_global_postdisplay_sidebar2_pos','none');

$page_topwidgets_display = get_theme_mod('imagazine_global_pagedisplay_contenttop', 'hide');
$page_authortime_display = get_theme_mod('imagazine_global_pagedisplay_authortime', 'both');
$page_timeformat_display = get_theme_mod('imagazine_global_pagedisplay_timeformat', 'date');
$page_bottomwidgets_display = get_theme_mod('imagazine_global_pagedisplay_contentbottom', 'hide');


$post_categories_display = 'hide';
$post_tags_display = 'hide';




// overwrite page meta sidebar settings
if( is_page() ){

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
}


echo '<div id="maincontentcontainer">';

	echo '<div class="outermargin">';



	/* maincontent sidebar 1 */
	if( is_single() ){
		$sidebar1pos = $post_sidebar1_display;
		$sidebar2pos = $post_sidebar2_display;
	}
	if( !is_single() && !is_page() ){
		$sidebar1pos = $list_sidebar1_display;
		$sidebar2pos = $list_sidebar2_display;
	}

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









/* basic loop */

echo '<div id="maincontent">';

$page_contenttop_display = get_post_meta( get_the_ID() , "page-meta-contenttop-display", true);
$dsparr = array( 1 => 'show', 2 => 'hide');
if( $page_contenttop_display != 0 ){
$page_topwidgets_display = $dsparr[$page_contenttop_display];
}

if( !( is_page() && $page_topwidgets_display == 'hide' )
   && !( is_single() && get_theme_mod('imagazine_global_postdisplay_contenttop', 'hide') == 'hide' )
  	&& !( is_category() && get_theme_mod('imagazine_global_listdisplay_contenttop', 'hide') == 'hide' ) ){

// maincontent top widgets
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('contenttopwidgets') ){
	echo '<div id="contenttopwidgets" class="contenttop">';
	dynamic_sidebar('contenttopwidgets');
	echo '<div class="clr"></div></div>';
}

}



// search
if( is_search() ){ // search results
echo '<div class="searchheader">'.__('Resultaten voor ', 'imagazine' ).'<strong>'.wp_specialchars($s).'</strong></div>';
}




// get post(s)
if ( have_posts() ) :
while( have_posts() ) : the_post();


if ( !is_single() && !is_page() ) {

// post in a list (category/search/archieve etc.)
?>
<div id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>

<?php

if ( has_post_thumbnail() ) {
echo '<a href="'.get_the_permalink().'" title="'.get_the_title().'" >';
the_post_thumbnail('big-thumb');
echo '</a>';
}


echo '<div class="listitemtitlebar">';


echo '<h2><a href="'.get_the_permalink().'">';
if( is_search() ){ echo search_title_highlight(); }else{ echo get_the_title(); }
echo '</a></h2>';


echo '<div class="metabox">';


if( $list_authortime_display == 'both' || $list_authortime_display == 'date'){

	/* set date display */
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



echo '<div class="innerpadding">';
if( is_search() ) {
echo search_excerpt_highlight();
}else{
echo apply_filters('the_excerpt', get_the_excerpt());
}

echo ' <a href="'.get_the_permalink().'">'.__('Lees meer', 'imagazine' ).'</a>';

echo '</div>';

echo '<div class="clr"></div></div>'; // end page(post) container









}else if(is_single()){

// single post
?>
<div id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
<?php
echo '<article>';

if ( has_post_thumbnail() && $headerfeaturedimg != 'yes') {
the_post_thumbnail('medium');
}


echo '<div class="maintitlebar">';

if($headertitle != 'head'){
echo '<h1><a href="'.get_the_permalink().'">'.get_the_title().'</a></h1>';
}



echo '<div class="metabox">';

if( $post_authortime_display == 'both' || $post_authortime_display == 'date'){

	/* set date display */
	if( $post_timeformat_display == 'date' ){
		echo '<span class="post-date date-time">'.get_the_date().'</span> ';
	}elseif( $post_timeformat_display == 'full' ){
		echo '<span class="post-date date-time">'.get_the_date().' '.__('om','imagazine').' '.get_the_time().'</span> ';
	}else{
		echo '<span class="post-date time-ago">';
		wp_time_ago(get_the_time( 'U' ));
		echo '</span>';
	}
}

if( $post_authortime_display == 'both' || $post_authortime_display == 'author'){
/* set author display */
echo ' <span class="post-author">'.__('door','imagazine').' '.get_the_author().'</span> ';
}



echo '<div class="clr"></div></div>';

echo '<div class="clr"></div></div>';


echo '<div class="optionmenu">';

if ( is_super_admin() ) {
edit_post_link( __( 'Edit' , 'imagazine' ), '<span class="edit-link">', '</span>' );
}

/* add voice button if available */
imagazine_add_responsive_voice_button();

echo '<div class="clr"></div></div>';


echo '<div class="innerpadding">';
echo apply_filters('the_content', get_the_content());
echo '</div>';

echo '</article>';

// post categories
if($post_categories_display != 'hide'){
the_category(', ');
}

// post tags
if($post_tags_display != 'hide'){
the_tags('Tags: ',' ');
}

// prev / next posts
previous_post_link('%link', __('vorige', 'imagazine' ).': %title', TRUE);
next_post_link('%link', __('volgende', 'imagazine' ).': %title', TRUE);

// post comments
if ( comments_open() || get_comments_number() ) {
comments_template(); // WP THEME STANDARD: comments_template( $file, $separate_comments );
}

echo '<div class="clr"></div></div>'; // end page(post) container







}else if( is_page() ){
// page
$page_title_display = get_post_meta( get_the_ID() , "page-meta-title-display", true);
$page_maincontent_display = get_post_meta( get_the_ID() , "page-meta-maincontent-display", true);


if( $page_maincontent_display != 1 ){
?>

<div id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
<?php

echo '<article>';
if ( has_post_thumbnail() && $headerfeaturedimg != 'yes' ) {
the_post_thumbnail('medium');
}



echo '<div class="maintitlebar">';

if( ( $headertitle != 'head' && $page_title_display == 0 ) || ( $headertitle != 'head' && $page_title_display != 3 ) || $page_title_display == 1 ){
echo '<h1><a href="'.get_the_permalink().'">'.get_the_title().'</a></h1>';
}


echo '<div class="metabox">';
if( $page_authortime_display == 'both' || $page_authortime_display == 'date'){

	/* set date display */
	if( $page_timeformat_display == 'date' ){
		echo '<span class="post-date date-time">'.get_the_date().'</span> ';
	}elseif( $page_timeformat_display == 'full' ){
		echo '<span class="post-date date-time">'.get_the_date().' '.__('om','imagazine').' '.get_the_time().'</span> ';
	}else{
		echo '<span class="post-date time-ago">';
		wp_time_ago(get_the_time( 'U' ));
		echo '</span>';
	}
}

if( $page_authortime_display == 'both' || $page_authortime_display == 'author'){
/* set author display */
echo ' <span class="post-author">'.__('door','imagazine').' '.get_the_author().'</span> ';
}


echo '<div class="clr"></div></div>';

echo '<div class="clr"></div></div>';


echo '<div class="optionmenu">';

if ( is_super_admin() ) {
edit_post_link( __( 'Edit' , 'imagazine' ), '<span class="edit-link">', '</span>' );
}

/* add voice button if available */
imagazine_add_responsive_voice_button();

echo '<div class="clr"></div></div>';


echo '<div class="innerpadding">';
echo apply_filters('the_content', get_the_content());
echo '</div>';

echo '</article>';

$defaults = array(
		'before'           => '<div>' . __( 'Pagina\'s:'  , 'imagazine' ),
		'after'            => '</div>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'volgende page'  , 'imagazine' ),
		'previouspagelink' => __( 'vorige page'  , 'imagazine' ),
		'pagelink'         => '%',
		'echo'             => 1
);
wp_link_pages( $defaults );


echo '<div class="clr"></div></div>'; // end page(post) container

} // end if page meta content

} // end page in loop








endwhile;
endif;






// pagination
if ( !is_single() ) {

global $wp_query;
$big = 999999999; // need an unlikely integer
echo paginate_links( array(
'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
'format' => '?paged=%#%',
'current' => max( 1, get_query_var('paged') ),
'total' => $wp_query->max_num_pages
));

}



$page_contentbottom_display = get_post_meta( get_the_ID() , "page-meta-contentbottom-display", true);
$dsparr = array( 1 => 'show', 2 => 'hide');
if( $page_contenttop_display != 0 ){
	$page_bottomwidgets_display = $dsparr[$page_contentbottom_display];
}

if( !( is_page() && $page_bottomwidgets_display == 'hide' )
   && !( is_single() && get_theme_mod('imagazine_global_postdisplay_contentbottom', 'hide') == 'hide' )
   && !( !is_single() && !is_page() && get_theme_mod('imagazine_global_listdisplay_contentbottom', 'hide') == 'hide' )
  	 ){

// maincontent bottom widgets
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('contentbottomwidgets') ){
	echo '<div class="clr"></div><div id="contentbottomwidgets" class="contentbottom">';
	dynamic_sidebar('contentbottomwidgets');
	echo '<div class="clr"></div></div>';
}

}

echo '<div class="clr"></div></div>'; // end maincontent


echo '<div class="clr"></div></div>'; // end margin


echo '<div class="clr"></div></div>'; // end maincontent container
?>
