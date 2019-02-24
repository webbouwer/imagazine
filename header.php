<?php
$headerdisplay = get_theme_mod('imagazine_header_display_type', 'image');

$headershortcode = get_theme_mod('imagazine_header_display_shortcode', '');

$headertitle = get_theme_mod('imagazine_header_pagetitle', 'no');

$blogtitle = get_theme_mod('blogname', 'No title');

$headerfeaturedimg = get_theme_mod('imagazine_header_featuredimages', 'no');
$headerbgwidth = get_theme_mod('imagazine_header_bgwidth', 'margin');
$headercontentwidth = get_theme_mod('imagazine_header_contentwidth', 'full');
$headerheight = get_theme_mod('imagazine_header_height', 30 ); // percentage
$headerminheight = get_theme_mod('imagazine_header_minheight', 200 ); // min pixels

//headeroverlaycolor1, headeroverlaytransparancy1,headeroverlaycolor2, headeroverlaytransparancy2, headertextcolor, headerlinkcolor, headerhovercolor,
$headeroverlaycolor1 = get_theme_mod('imagazine_header_styling_overlay_color1', '#000000');
$headeroverlaytransparancy1 = get_theme_mod('imagazine_header_styling_overlay_transparancy1', 0.3);
$headeroverlaycolor2 = get_theme_mod('imagazine_header_styling_overlay_color2', '#000000');
$headeroverlaytransparancy2 = get_theme_mod('imagazine_header_styling_overlay_transparancy2', 0.3);
$headertextcolor = get_theme_mod('imagazine_header_styling_overlay_textcolor', '#fefefe');
/*
// link & linkhover in customizer -  headerlinkcolor, headerhovercolor
*/


// content align main column
$headermainalign = get_theme_mod('imagazine_header_maincontentalign', 'center');

// sidebars
$headersidebar1pos = get_theme_mod('imagazine_header_sidebar1pos', 'none' );
$headersidebar1width = get_theme_mod('imagazine_header_sidebar1width', 30 );
$headersidebar1align = get_theme_mod('imagazine_header_sidebar1align', 'left' );
$headersidebar1respon = get_theme_mod('imagazine_header_sidebar1responsive', 'after' );

$headersidebar2pos = get_theme_mod('imagazine_header_sidebar2pos', 'none' );
$headersidebar2width = get_theme_mod('imagazine_header_sidebar2width', 30 );
$headersidebar2align = get_theme_mod('imagazine_header_sidebar2align', 'left' );
$headersidebar2respon = get_theme_mod('imagazine_header_sidebar2responsive', 'after' );


$header_image = get_header_image();



$headerready = 0;

// header shortcode

if(  $headershortcode != '' && ( $headerdisplay == 'image' || ( is_front_page() && $headerdisplay == 'short' ) ) ){

	   // The short code area (slider?)
		if($headerbgwidth == 'full'){
			echo '<div id="headercodebox" class="fullwidth"'.$headerbgstyle.'>';
		}else{
			echo '<div id="headercodebox" class="outermargin"'.$headerbgstyle.'>';
		}

		echo do_shortcode( $headershortcode );

		echo '</div>';


		$headerready = 1;
}





// theme header
if( $headerready != 1 ){

    // header title
    $headmaintitle = '';
    if( ( is_single() || is_page() ) && ( $headerfeaturedimg == 'yes' || $headertitle != 'no' ) ){

        if ( have_posts() ) :
            while( have_posts() ) : the_post();
                //title / date & author?
                $headmaintitle = get_the_title();
                $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); //wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
            endwhile;
        endif;
        wp_reset_query();

        if( $featuredImage[0] && $headerfeaturedimg == 'yes' ){
            $header_image = $featuredImage[0];
        }

    }else if( $headertitle != 'no'  ){
        $headmaintitle = single_cat_title("", false);
        if(!$headmaintitle){
        $headmaintitle = get_bloginfo('name');
        }

    }

	// check page meta overwrite
	if( is_page() ){

		if( isset( $page_header_type ) && $page_header_type != 0 ){
			$headerdisplay = $typearr[ $page_header_type ];
		}
		if( isset( $page_header_display ) && $page_header_display != 0 ){
			$headerfeaturedimg = $displayarr[ $page_header_display ];
		}
		//$headerdisplay = get_theme_mod('imagazine_header_display_type', 'image');
		//$headertitle = get_theme_mod('imagazine_header_pagetitle', 'no');
	}

	if( ! empty( $header_image ) ){

        // headeroverlaycolor1, headeroverlaytransparancy1,headeroverlaycolor2, headeroverlaytransparancy2, headertextcolor,

        $rgbc1 = imagazine_hextorgb( $headeroverlaycolor1, $headeroverlaytransparancy1 );
        $rgbc2 = imagazine_hextorgb( $headeroverlaycolor2, $headeroverlaytransparancy2 );

        if( !$headeroverlaycolor2 || $headeroverlaycolor2 == '' ){
            $rgbc2 = $rgbc1;
        }

        $txtcolor = $headertextcolor;

        //$headerbgstyle = ' style="min-height:'.$headerminheight.'px; background-image:url('.esc_url( $header_image ).');"';
        $headerbgstyle = ' style="min-height:'.$headerminheight.'px;  background:  linear-gradient(
          '.$rgbc1.',
          '.$rgbc2.'
        ), url('.esc_url( $header_image ).'); color:'.$txtcolor.';"';

        $columnbgstyle = '';
        if( $headerdisplay == 'split' ){
            $columnbgstyle = $headerbgstyle;
            $headerbgstyle = '';
        }

        if( $headerdisplay != 'none' ){

            // header area width
            if($headerbgwidth == 'full'){
                echo '<div id="headermedia" class="fullwidth"'.$headerbgstyle.'>';
            }else{
                echo '<div id="headermedia" class="outermargin"'.$headerbgstyle.'>';
            }

            // header content width
            if($headercontentwidth == 'margin' && $headerbgwidth != 'margin'){
                echo '<div class="outermargin">';
            }

            // header content columns
            if( $headerdisplay != 'image' ){

                // headersidebar 1
                if( $headersidebar1pos != 'none' && function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('headersidebar-1') ){
                echo '<div id="headersidebar-1" class="sidecolumn width'.$headersidebar1width.' pos-'.$headersidebar1pos.' align-'.$headersidebar1align.'">';
                dynamic_sidebar('headersidebar-1');
                echo '<div class="clr"></div></div>';
                }

                // headersidebar 2
                if( $headersidebar2pos != 'none' && function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('headersidebar-2') ){
                echo '<div id="headersidebar-2" class="sidecolumn width'.$headersidebar2width.' pos-'.$headersidebar2pos.' align-'.$headersidebar2align.'">';
                dynamic_sidebar('headersidebar-2');
                echo '<div class="clr"></div></div>';
                }

            }

            echo '<div id="headermainbar" class="maincolumn align-'.$headermainalign.'"'.$columnbgstyle.'>';

            echo '<div class="maincolumnbox">';

            if( $headershortcode != '' && $headerdisplay == 'split'){
                  echo do_shortcode( $headershortcode );
            }else{
                // display title
                //if( ( $headertitle != 'no' && $page_title_display == 0 ) || $page_title_display != 1 ){
                if( is_page() && isset($page_title_display) && ( $page_title_display == 1 ) ){
                    $headertitle = 'no';
                }
                if( $headertitle != 'no' ){
                    echo '<h1>'.$headmaintitle.'</h1>';
                }
            }
            // display widgets-header
            if( ( $headerdisplay != 'image' && $headerdisplay != 'title' ) && function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-header') ){
                dynamic_sidebar('widgets-header');
            }
            echo '<div class="clr"></div></div>';
            echo '<div class="clr"></div></div>';
            // end content

            if($headercontentwidth == 'margin' && $headerbgwidth == 'full'){
                echo '<div class="clr"></div></div>';	// close margin
            }

            // end header area
            echo '<div class="clr"></div></div>';
        } // header was used

	} // image was available

} // end theme header
?>
