<?php
// custom meta boxes
// https://www.sitepoint.com/adding-custom-meta-boxes-to-wordpress/

/* grid page metabox */
function add_theme_grid_meta()
{
    global $post;
    if(!empty($post))
    {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if($pageTemplate == 'grid.php')
        {
           add_meta_box(
                 'gridpage_meta', // $id
                 'Grid settings', // $title
                 'display_theme_grid_settings', // $callback
                 'page', // $page
                 'normal', // $context
                 'high'); // $priority
        }
    }
}
add_action('add_meta_boxes', 'add_theme_grid_meta');

function display_theme_grid_settings( $post ){

    $values = get_post_custom( $post->ID );
    $selected = isset( $values['theme_grid_category_selectbox'] ) ? esc_attr( $values['theme_grid_category_selectbox'][0] ) : '';
    $catarr = get_categories_select(); // customizer function

    $grid_ppp = isset( $values['theme_grid_ppp'] ) ? $values['theme_grid_ppp'][0] : 12;

    $grid_authortime = isset( $values['theme_grid_authortime'] ) ? $values['theme_grid_authortime'][0] : 'both';
    $option_grid_authortime = array( 0 =>'Default ('.get_theme_mod('imagazine_content_listdisplay_authortime', 'both').')', 1 => 'none', 2 => 'both', 3 => 'date', 4 => 'author');

    $grid_timeformat = isset( $values['theme_grid_timeformat'] ) ? $values['theme_grid_timeformat'][0] : 'date';
    $option_grid_timeformat = array( 0 =>'Default ('.get_theme_mod('imagazine_content_listdisplay_timeformat', 'date').')', 1 => 'date', 2 => 'full', 3 => 'ago');

    $grid_thumb = isset( $values['theme_grid_thumb'] ) ? $values['theme_grid_thumb'][0] : 'top';
    $option_grid_thumb = array( 0 =>'Default ('.get_theme_mod('imagazine_content_listdisplay_thumb', 'top').')', 1 => 'top', 2 => 'title', 3 => 'cover', 4 => 'none');

    $grid_excerpt = isset( $values['theme_grid_excerpt'] ) ? $values['theme_grid_excerpt'][0] : 'hide';
    $option_grid_excerpt = array( 0 =>'Default ('.get_theme_mod('imagazine_content_listdisplay_excerpt', 'show').')', 1 => 'show', 2 => 'hide');


    $grid_readmorebutton = isset( $values['theme_grid_readmorebutton'] ) ? $values['theme_grid_readmorebutton'][0] : 'hide';
    $option_grid_readmorebutton = array( 0 =>'Default ('.get_theme_mod('imagazine_content_listdisplay_readmorebutton', 'hide').')', 1 => 'left', 2 => 'center', 3 => 'right', 4 => 'hide');


    function create_option_selectbox( $option, $selectlist ){
            foreach( $selectlist as $key => $value){
                if($key == get_post_meta($object->ID, "theme_'.$option.'", true))
                {
                    echo '<option value="'.$key.'" selected>'.$value.'</option>';
                }else{
                    echo '<option value="'.$key.'">'.$value.'</option>';
                }
            }
    }

    ?>
    <p>
        <label for="theme_grid_category_selectbox">Post grid category</label>
        <select name="theme_grid_category_selectbox" id="theme_grid_category_selectbox">
        <?php foreach($catarr as $slg => $nm){
        echo '<option value="'.$slg.'" '.selected( $selected, $slg ).'>'.$nm.'</option>';
        }
        ?>
        <option value="uncategorized" <?php selected( $selected, 'uncategorized' ); ?>><?php echo __('Uncategorized', 'imagazine'); ?></option>
        </select>
    </p>

    <p>
            <label for="theme_grid_ppp">Posts per page</label>
            <input name="theme_grid_ppp" value="<?php echo $grid_ppp; ?>" size="4" />
    </p>


    <p>
            <label for="theme_grid_authortime">Date/time & Author</label>

        <select id="theme_grid_authortime" name="theme_grid_authortime">
                <?php
                    foreach($option_grid_authortime as $key => $value)
                    {
                        if($key == get_post_meta($object->ID, "theme_grid_authortime", true))
                        {
                            echo '<option value="'.$key.'" selected>'.$value.'</option>';
                        }else{
                            echo '<option value="'.$key.'">'.$value.'</option>';
                        }
                    }
                ?>
            </select>
    </p>

    <p>
            <label for="theme_grid_timeformat">Date/time format</label>
            <select id="theme_grid_timeformat" name="theme_grid_timeformat">
                <?php
                    foreach($option_grid_timeformat as $key => $value)
                    {
                        if($key == get_post_meta($object->ID, "theme_grid_timeformat", true))
                        {
                            echo '<option value="'.$key.'" selected>'.$value.'</option>';
                        }else{
                            echo '<option value="'.$key.'">'.$value.'</option>';
                        }
                    }
                ?>
            </select>
    </p>
    <p>
            <label for="theme_grid_thumb">Featured image display format</label>
            <select id="theme_grid_thumb" name="theme_grid_thumb">
                <?php
                    foreach($option_grid_thumb as $key => $value)
                    {
                        if($key == get_post_meta($object->ID, "theme_grid_thumb", true))
                        {
                            echo '<option value="'.$key.'" selected>'.$value.'</option>';
                        }else{
                            echo '<option value="'.$key.'">'.$value.'</option>';
                        }
                    }
                ?>
            </select>
    </p>
    <p>
            <label for="theme_grid_excerpt">Display excerpt</label>
            <select id="theme_grid_excerpt" name="theme_grid_excerpt">
                <?php
                    foreach($option_grid_excerpt as $key => $value)
                    {
                        if($key == get_post_meta($object->ID, "theme_grid_excerpt", true))
                        {
                            echo '<option value="'.$key.'" selected>'.$value.'</option>';
                        }else{
                            echo '<option value="'.$key.'">'.$value.'</option>';
                        }
                    }
                ?>
            </select>
    </p>
    <p>
            <label for="theme_grid_readmorebutton">Display readmore</label>
            <select id="theme_grid_readmorebutton" name="theme_grid_readmorebutton">
                <?php
                    foreach($option_grid_readmorebutton as $key => $value)
                    {
                        if($key == get_post_meta($object->ID, "theme_grid_readmorebutton", true))
                        {
                            echo '<option value="'.$key.'" selected>'.$value.'</option>';
                        }else{
                            echo '<option value="'.$key.'">'.$value.'</option>';
                        }
                    }
                ?>
            </select>
    </p>



    <?php
}


function save_theme_grid_settings( $post_id )
{
    if( isset( $_POST['theme_grid_category_selectbox'] ) )
        update_post_meta( $post_id, 'theme_grid_category_selectbox', esc_attr( $_POST['theme_grid_category_selectbox'] ) );

    if( isset( $_POST['theme_grid_ppp'] ) )
        update_post_meta( $post_id, 'theme_grid_ppp', esc_attr( $_POST['theme_grid_ppp'] ) );
    if( isset( $_POST['theme_grid_authortime'] ) )
        update_post_meta( $post_id, 'theme_grid_authortime', esc_attr( $_POST['theme_grid_authortime'] ) );
    if( isset( $_POST['theme_grid_timeformat'] ) )
        update_post_meta( $post_id, 'theme_grid_timeformat', esc_attr( $_POST['theme_grid_timeformat'] ) );
    if( isset( $_POST['theme_grid_thumb'] ) )
        update_post_meta( $post_id, 'theme_grid_thumb', esc_attr( $_POST['theme_grid_thumb'] ) );
    if( isset( $_POST['theme_grid_excerpt'] ) )
        update_post_meta( $post_id, 'theme_grid_excerpt', esc_attr( $_POST['theme_grid_excerpt'] ) );
    if( isset( $_POST['theme_grid_readmorebutton'] ) )
        update_post_meta( $post_id, 'theme_grid_readmorebutton', esc_attr( $_POST['theme_grid_readmorebutton'] ) );

}
add_action( 'save_post', 'save_theme_grid_settings' );






/* page global metabox */
function imagazine_page_meta_box($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");


	$option_upperbar_smalldisplay = array(0=>'Default setting ('.get_theme_mod('imagazine_upperbar_behavior_displaysmall','relative').')', 1=>'fixed', 2=>'relative', 3=>'none');

	$option_upperbar_largedisplay = array(0=>'Default setting ('.get_theme_mod('imagazine_upperbar_behavior_displaylarge','fixed').')', 1=>'fixed', 2=>'relative', 3=>'none');

	$option_topbar_smalldisplay = array(0=>'Default setting ('.get_theme_mod('imagazine_topbar_behavior_smallposition','relative').')', 1=>'fixed', 2=>'relative', 3=>'none');

	$option_topbar_largedisplay = array(0=>'Default setting ('.get_theme_mod('imagazine_topbar_behavior_largeposition', 'fixed').')', 1=>'fixed', 2=>'relative', 3=>'none');



	$option_header_type = array(0=>'Default type ('.get_theme_mod('imagazine_header_display_type').')', 1=>'Image only', 2=>'Image with overlay widget column(s)', 3=>'Image in maincolumn besides optional column(s)', 4 => 'No header');

	$option_header_image = array(0=>'Default setting (featured images:'.get_theme_mod('imagazine_header_featuredimages').')', 1=>'Default header image', 2=>'Page featured image');

	$option_title_display = array(0=>'Default setting ('.get_theme_mod('imagazine_header_pagetitle', 'maintext').')', 1=>'Not in header, only on maintext', 2=>'Title in header and on maintext', 3=>'In header only');


	$option_contenttop_widgets_display = array( 0 =>'Default ('.get_theme_mod('imagazine_content_pagedisplay_contenttop', 'show').')', 1 => 'show', 2 => 'hide');

	$option_maincontent_display = array( 0 =>'show', 1 => 'hide');

	$option_contentbottom_widgets_display = array( 0 =>'Default ('.get_theme_mod('imagazine_content_pagedisplay_contentbottom', 'show').')', 1 => 'show', 2 => 'hide');


	$option_sidebar1_display = array(0=>'Default setting ('.get_theme_mod('imagazine_content_sidebars_sidebar1pos', 'right').')', 1=>'right', 2=>'left', 3=>'none' );

	$option_sidebar2_display = array(0=>'Default setting ('.get_theme_mod('imagazine_content_sidebars_sidebar2pos', 'right').')', 1=>'right', 2=>'left', 3=>'none');


	?>

	<b>Upperbar</b><br />
		<label for="page-meta-upperbar-small">Small screen</label>
		<br />
            <select name="page-meta-upperbar-small">
                <?php
                    foreach($option_upperbar_smalldisplay as $key => $value)
                    {
                        if($key == get_post_meta($object->ID, "page-meta-upperbar-small", true))
                        {
                            ?>
                            <option value='<?php echo $key; ?>' selected><?php echo $value; ?></option>
                            <?php
                        }
                        else
                        {
                            ?>
                            <option value='<?php echo $key; ?>'><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
		<br />

		<label for="page-meta-upperbar-large">Large screen</label>
		<br />
            <select name="page-meta-upperbar-large">
                <?php
                    foreach($option_upperbar_largedisplay as $key => $value)
                    {
                        if($key == get_post_meta($object->ID, "page-meta-upperbar-large", true))
                        {
                            ?>
                            <option value='<?php echo $key; ?>' selected><?php echo $value; ?></option>
                            <?php
                        }
                        else
                        {
                            ?>
                            <option value='<?php echo $key; ?>'><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
		<br />


	<b>Topbar Display</b><br />
		<label for="page-meta-topbar-small">Small screen</label>
		<br />
            <select name="page-meta-topbar-small">
                <?php
                    foreach($option_topbar_smalldisplay as $key => $value)
                    {
                        if($key == get_post_meta($object->ID, "page-meta-topbar-small", true))
                        {
                            ?>
                            <option value='<?php echo $key; ?>' selected><?php echo $value; ?></option>
                            <?php
                        }
                        else
                        {
                            ?>
                            <option value='<?php echo $key; ?>'><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
		<br />

		<label for="page-meta-topbar-large">Large screen</label>
		<br />
            <select name="page-meta-topbar-large">
                <?php
                    foreach($option_topbar_largedisplay as $key => $value)
                    {
                        if($key == get_post_meta($object->ID, "page-meta-topbar-large", true))
                        {
                            ?>
                            <option value='<?php echo $key; ?>' selected><?php echo $value; ?></option>
                            <?php
                        }
                        else
                        {
                            ?>
                            <option value='<?php echo $key; ?>'><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
		<br />


<b>Header display</b><br />

<label for="page-meta-header-type">Type</label>
		<br />
            <select name="page-meta-header-type">
                <?php
                    foreach($option_header_type as $key => $value)
                    {
                        if($key == get_post_meta($object->ID, "page-meta-header-type", true))
                        {
                            ?>
                            <option value='<?php echo $key; ?>' selected><?php echo $value; ?></option>
                            <?php
                        }
                        else
                        {
                            ?>
                            <option value='<?php echo $key; ?>'><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
		<br />

	<label for="page-meta-header-display">Image</label>
		<br />
            <select name="page-meta-header-display">
                <?php
                    foreach($option_header_image as $key => $value)
                    {
                        if($key == get_post_meta($object->ID, "page-meta-header-display", true))
                        {
                            ?>
                            <option value='<?php echo $key; ?>' selected><?php echo $value; ?></option>
                            <?php
                        }
                        else
                        {
                            ?>
                            <option value='<?php echo $key; ?>'><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
		<br />


<b>Content display</b><br />

		<label for="page-meta-contenttop-display">Content top widgets display</label>
		<br />
            <select name="page-meta-contenttop-display">
                <?php
                    foreach($option_contenttop_widgets_display as $key => $value)
                    {
                        if($key == get_post_meta($object->ID, "page-meta-contenttop-display", true))
                        {
                            ?>
                            <option value='<?php echo $key; ?>' selected><?php echo $value; ?></option>
                            <?php
                        }
                        else
                        {
                            ?>
                            <option value='<?php echo $key; ?>'><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
		<br />

		<label for="page-meta-maincontent-display">Maincontent display</label>
		<br />
            <select name="page-meta-maincontent-display">
                <?php
                    foreach($option_maincontent_display as $key => $value)
                    {
                        if($key == get_post_meta($object->ID, "page-meta-maincontent-display", true))
                        {
                            ?>
                            <option value='<?php echo $key; ?>' selected><?php echo $value; ?></option>
                            <?php
                        }
                        else
                        {
                            ?>
                            <option value='<?php echo $key; ?>'><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
		<br />


		<label for="page-meta-contentbottom-display">Content bottom widgets display</label>
		<br />
            <select name="page-meta-contentbottom-display">
                <?php
                    foreach($option_contentbottom_widgets_display as $key => $value)
                    {
                        if($key == get_post_meta($object->ID, "page-meta-contentbottom-display", true))
                        {
                            ?>
                            <option value='<?php echo $key; ?>' selected><?php echo $value; ?></option>
                            <?php
                        }
                        else
                        {
                            ?>
                            <option value='<?php echo $key; ?>'><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
		<br />




		<label for="page-meta-title-display">Page title</label>
		<br />
            <select name="page-meta-title-display">
                <?php
                    foreach($option_title_display as $key => $value)
                    {
                        if($key == get_post_meta($object->ID, "page-meta-title-display", true))
                        {
                            ?>
                            <option value='<?php echo $key; ?>' selected><?php echo $value; ?></option>
                            <?php
                        }
                        else
                        {
                            ?>
                            <option value='<?php echo $key; ?>'><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
		<br />







		<label for="page-meta-sidebar1-display">Sidebar 1</label>
		<br />
            <select name="page-meta-sidebar1-display">
                <?php
                    foreach($option_sidebar1_display as $key => $value)
                    {
                        if($key == get_post_meta($object->ID, "page-meta-sidebar1-display", true))
                        {
                            ?>
                            <option value='<?php echo $key; ?>' selected><?php echo $value; ?></option>
                            <?php
                        }
                        else
                        {
                            ?>
                            <option value='<?php echo $key; ?>'><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
		<br />

		<label for="page-meta-sidebar2-display">Sidebar 2</label>
		<br />
            <select name="page-meta-sidebar2-display">
                <?php
                    foreach($option_sidebar2_display as $key => $value)
                    {
                        if($key == get_post_meta($object->ID, "page-meta-sidebar2-display", true))
                        {
                            ?>
                            <option value='<?php echo $key; ?>' selected><?php echo $value; ?></option>
                            <?php
                        }
                        else
                        {
                            ?>
                            <option value='<?php echo $key; ?>'><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
		<br />
<?php

}

function add_page_meta_box()
{
    add_meta_box("page-meta-box", "Page Elements", "imagazine_page_meta_box", "page", "side", "high", null);
}

add_action("add_meta_boxes", "add_page_meta_box");






function save_page_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;
/*
    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;
*/
    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    $page_meta_upperbar_small = "";
    $page_meta_upperbar_large = "";
    $page_meta_topbar_small = "";
    $page_meta_topbar_large = "";
    $page_meta_header_type = "";
    $page_meta_header_display = "";

	$page_meta_contenttop_display = "";
	$page_meta_maincontent_display = "";
    $page_meta_title_display = "";
	$page_meta_contentbottom_display = "";

    $page_meta_sidebar1_display = "";
    $page_meta_sidebar2_display = "";


	if(isset($_POST["page-meta-upperbar-small"]))
    {
        $page_meta_upperbar_small = $_POST["page-meta-upperbar-small"];
    }
    update_post_meta($post_id, "page-meta-upperbar-small", $page_meta_upperbar_small);

	if(isset($_POST["page-meta-upperbar-large"]))
    {
        $page_meta_upperbar_large = $_POST["page-meta-upperbar-large"];
    }
    update_post_meta($post_id, "page-meta-upperbar-large", $page_meta_upperbar_large);

	if(isset($_POST["page-meta-topbar-small"]))
    {
        $page_meta_topbar_small = $_POST["page-meta-topbar-small"];
    }
    update_post_meta($post_id, "page-meta-topbar-small", $page_meta_topbar_small);

	if(isset($_POST["page-meta-topbar-large"]))
    {
        $page_meta_topbar_large = $_POST["page-meta-topbar-large"];
    }
    update_post_meta($post_id, "page-meta-topbar-large", $page_meta_topbar_large);



    if(isset($_POST["page-meta-header-type"]))
    {
        $page_meta_header_type = $_POST["page-meta-header-type"];
    }
    update_post_meta($post_id, "page-meta-header-type", $page_meta_header_type);

    if(isset($_POST["page-meta-header-display"]))
    {
        $page_meta_header_display = $_POST["page-meta-header-display"];
    }
    update_post_meta($post_id, "page-meta-header-display", $page_meta_header_display);


	if(isset($_POST["page-meta-contenttop-display"]))
    {
        $page_meta_contenttop_display = $_POST["page-meta-contenttop-display"];
    }
    update_post_meta($post_id, "page-meta-contenttop-display", $page_meta_contenttop_display);


    if(isset($_POST["page-meta-maincontent-display"]))
    {
        $page_meta_maincontent_display = $_POST["page-meta-maincontent-display"];
    }
    update_post_meta($post_id, "page-meta-maincontent-display", $page_meta_maincontent_display);


    if(isset($_POST["page-meta-title-display"]))
    {
        $page_meta_title_display = $_POST["page-meta-title-display"];
    }
    update_post_meta($post_id, "page-meta-title-display", $page_meta_title_display);

	if(isset($_POST["page-meta-contentbottom-display"]))
    {
        $page_meta_contentbottom_display = $_POST["page-meta-contentbottom-display"];
    }
    update_post_meta($post_id, "page-meta-contentbottom-display", $page_meta_contentbottom_display);




	if(isset($_POST["page-meta-sidebar1-display"]))
    {
        $page_meta_sidebar1_display = $_POST["page-meta-sidebar1-display"];
    }
    update_post_meta($post_id, "page-meta-sidebar1-display", $page_meta_sidebar1_display);

	if(isset($_POST["page-meta-sidebar2-display"]))
    {
        $page_meta_sidebar2_display = $_POST["page-meta-sidebar2-display"];
    }
    update_post_meta($post_id, "page-meta-sidebar2-display", $page_meta_sidebar2_display);

}

add_action("save_post", "save_page_meta_box", 10, 3);



















/* Example page custom meta box


function custom_meta_box_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <label for="meta-box-text">Text</label>
            <input name="meta-box-text" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-text", true); ?>">

            <br>

            <label for="meta-box-dropdown">Dropdown</label>
            <select name="meta-box-dropdown">
                <?php
                    $option_values = array(1, 2, 3);

                    foreach($option_values as $key => $value)
                    {
                        if($value == get_post_meta($object->ID, "meta-box-dropdown", true))
                        {
                            ?>
                                <option selected><?php echo $value; ?></option>
                            <?php
                        }
                        else
                        {
                            ?>
                                <option><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>

            <br>

            <label for="meta-box-checkbox">Check Box</label>
            <?php
                $checkbox_value = get_post_meta($object->ID, "meta-box-checkbox", true);

                if($checkbox_value == "")
                {
                    ?>
                        <input name="meta-box-checkbox" type="checkbox" value="true">
                    <?php
                }
                else if($checkbox_value == "true")
                {
                    ?>
                        <input name="meta-box-checkbox" type="checkbox" value="true" checked>
                    <?php
                }
            ?>
        </div>
    <?php
}




function add_custom_meta_box()
{
    add_meta_box("demo-meta-box", "Custom Meta Box", "custom_meta_box_markup", "page", "side", "high", null);
}

add_action("add_meta_boxes", "add_custom_meta_box");


function save_custom_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "post";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_text_value = "";
    $meta_box_dropdown_value = "";
    $meta_box_checkbox_value = "";

    if(isset($_POST["meta-box-text"]))
    {
        $meta_box_text_value = $_POST["meta-box-text"];
    }
    update_post_meta($post_id, "meta-box-text", $meta_box_text_value);

    if(isset($_POST["meta-box-dropdown"]))
    {
        $meta_box_dropdown_value = $_POST["meta-box-dropdown"];
    }
    update_post_meta($post_id, "meta-box-dropdown", $meta_box_dropdown_value);

    if(isset($_POST["meta-box-checkbox"]))
    {
        $meta_box_checkbox_value = $_POST["meta-box-checkbox"];
    }
    update_post_meta($post_id, "meta-box-checkbox", $meta_box_checkbox_value);
}

add_action("save_post", "save_custom_meta_box", 10, 3);

*/
?>
