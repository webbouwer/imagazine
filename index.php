<?php
// index.php
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
get_template_part('loop');

/*
 * FOOTERBAR
 */
get_template_part('footer');


echo '<div class="clr"></div></div>'; // end pagecontainer

wp_footer();

echo '</body></html>';
?>
