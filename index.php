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
echo '><div id="pagecontainer">';

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
