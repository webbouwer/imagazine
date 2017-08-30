<?php
// custom meta boxes
// https://www.sitepoint.com/adding-custom-meta-boxes-to-wordpress/

function imagazine_page_meta_box($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");


	$option_upperbar_smalldisplay = array(0=>'Default setting ('.get_theme_mod('imagazine_upperbar_behavior_displaysmall').')', 1=>'fixed', 2=>'relative', 3=>'none');

	$option_upperbar_largedisplay = array(0=>'Default setting ('.get_theme_mod('imagazine_upperbar_behavior_displaylarge').')', 1=>'fixed', 2=>'relative', 3=>'none');

	$option_topbar_smalldisplay = array(0=>'Default setting ('.get_theme_mod('imagazine_topbar_behavior_smallposition').')', 1=>'fixed', 2=>'relative', 3=>'none');

	$option_topbar_largedisplay = array(0=>'Default setting ('.get_theme_mod('imagazine_topbar_behavior_largeposition').')', 1=>'fixed', 2=>'relative', 3=>'none');



	$option_header_type = array(0=>'Default type ('.get_theme_mod('imagazine_header_display_type').')', 1=>'Image only', 2=>'Image with overlay widget column(s)', 3=>'Image in maincolumn besides optional column(s)', 4 => 'No header');

	$option_header_image = array(0=>'Default setting (featured images:'.get_theme_mod('imagazine_header_featuredimages').')', 1=>'Default header image', 2=>'Page featured image');

	$option_title_display = array(0=>'Default setting ('.get_theme_mod('imagazine_header_pagetitle').')', 1=>'Not in header, only on maintext', 2=>'Title in header and on maintext', 3=>'In header only');



	$option_contenttop_widgets_display = array( 0 =>'show', 1 => 'hide');

	$option_maincontent_display = array( 0 =>'show', 1 => 'hide');

	$option_contentbottom_widgets_display = array( 0 =>'show', 1 => 'hide');


	$option_sidebar1_display = array(0=>'Default setting ('.get_theme_mod('imagazine_content_sidebars_sidebar1pos').')', 1=>'right', 2=>'left', 3=>'none' );

	$option_sidebar2_display = array(0=>'Default setting ('.get_theme_mod('imagazine_content_sidebars_sidebar2pos').')', 1=>'right', 2=>'left', 3=>'none');


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
