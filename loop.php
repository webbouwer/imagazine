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

?>

<div id="maincontentcontainer">
<?php

	/* maincontent sidebar 1 */
	if( $sidebar1pos != 'none' && function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('sidebar') ){
	echo '<div id="sidebar" class="sidecolumn width'.$sidebar1width.' pos-'.$sidebar1pos.' align-'.$sidebar1align.'">';
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



// maincontent top widgets
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('contenttopwidgets') ){
	echo '<div id="contenttopwidgets" class="contenttop">';
	dynamic_sidebar('contenttopwidgets');
	echo '<div class="clr"></div></div>';
}




// search
if( is_search() ){ // search results
echo '<div class="searchheader">'.__('Resultaten voor ', 'imagazine' ).'<strong>'.wp_specialchars($s).'</strong></div>';
}

// get post(s)
if ( have_posts() ) :
while( have_posts() ) : the_post();


if ( !is_single() && !is_page() ) {

// post in a list
?>



<div id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
<?php
echo '<h2><a href="'.get_the_permalink().'">';
if( is_search() ){ echo search_title_highlight(); }else{ echo get_the_title(); }
echo '</a></h2>';
if ( has_post_thumbnail() ) {
echo '<a href="'.get_the_permalink().'" title="'.get_the_title().'" >';
the_post_thumbnail('big-thumb');
echo '</a>';
}
/*
if( get_theme_mod('imagazine_settings_content_authordisplay', 'list') == 'list' || get_theme_mod('imagazine_settings_content_authordisplay', 'list') == 'all' ){
imagazine_display_author();
}
if( get_theme_mod('imagazine_settings_content_datedisplay', 'list') == 'list' || get_theme_mod('imagazine_settings_content_datedisplay', 'list') == 'all' ){
imagazine_display_date();
}*/
if ( is_super_admin() ) {
edit_post_link( __( 'Bewerk' , 'imagazine' ), '<span class="edit-link">', '</span>' );
}





echo '<div class="innerpadding">';
//if( is_search() ) {
//echo search_excerpt_highlight();
//}else{
echo apply_filters('the_excerpt', get_the_excerpt());
//}

echo '<a href="'.get_the_permalink().'">'.__('Lees meer', 'imagazine' ).'</a>';

echo '</div>';

echo '</div>'; // end post container





}else if(is_single()){

// single post
?>



<div id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
<?php
echo '<article>';

if ( has_post_thumbnail() && $headerfeaturedimg != 'yes') {
the_post_thumbnail('medium');
}

if($headertitle != 'head'){
echo '<h1><a href="'.get_the_permalink().'">'.get_the_title().'</a></h1>';
}
/*
if( get_theme_mod('imagazine_settings_content_authordisplay', 'list') == 'single' || get_theme_mod('imagazine_settings_content_authordisplay', 'list') == 'list' || get_theme_mod('imagazine_settings_content_authordisplay', 'list') == 'all' ){
imagazine_display_author();
}
if( get_theme_mod('imagazine_settings_content_datedisplay', 'list') == 'single' || get_theme_mod('imagazine_settings_content_datedisplay', 'list') == 'list' || get_theme_mod('imagazine_settings_content_datedisplay', 'list') == 'all' ){
imagazine_display_date();
}
if ( is_super_admin() ) {
edit_post_link( __( 'Edit' , 'imagazine' ), '<span class="edit-link">', '</span>' );
}
*/
echo '<div class="innerpadding">';
echo apply_filters('the_content', get_the_content());
echo '</div>';

echo '</article>';

// post categories
the_category(', ');
the_tags('Tags: ',' ');

// prev / next posts
previous_post_link('%link', __('vorige', 'imagazine' ).': %title', TRUE);
next_post_link('%link', __('volgende', 'imagazine' ).': %title', TRUE);

echo '</div>'; // end post container



// post comments
if ( comments_open() || get_comments_number() ) {
comments_template(); // WP THEME STANDARD: comments_template( $file, $separate_comments );
}



}else if( is_page() ){

?>




<div id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
<?php

echo '<article>';
if ( has_post_thumbnail() && $headerfeaturedimg != 'yes' ) {
the_post_thumbnail('medium');
}


if($headertitle != 'head'){
echo '<h1><a href="'.get_the_permalink().'">'.get_the_title().'</a></h1>';
}
/*
if( get_theme_mod('imagazine_settings_content_authordisplay', 'list') == 'page' || get_theme_mod('imagazine_settings_content_authordisplay', 'list') == 'all' ){
imagazine_display_author();
}
if( get_theme_mod('imagazine_settings_content_datedisplay', 'list') == 'page' || get_theme_mod('imagazine_settings_content_datedisplay', 'list') == 'all' ){
imagazine_display_date();
}
*/
if ( is_super_admin() ) {
edit_post_link( __( 'Edit' , 'imagazine' ), '<span class="edit-link">', '</span>' );
}

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

}
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


echo '<div class="clr"></div></div>'; // end page(post) container




// maincontent bottom widgets
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('contentbottomwidgets') ){
	echo '<div class="clr"></div><div id="contentbottomwidgets" class="contentbottom">';
	dynamic_sidebar('contentbottomwidgets');
	echo '<div class="clr"></div></div>';
}


?>



<div class="clr"></div></div> <!-- end maincontent container -->
