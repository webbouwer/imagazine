<?php
/* Custom Dashboard Widget */
add_action( 'wp_dashboard_setup', 'imagazine_dashboard_widget' );

function imagazine_dashboard_widget() {
    add_meta_box( 'imagazine_dashboard_widgetbox', 'Imagazine @ Github', 'imagazine_dashboard_widget_content', 'dashboard', 'side', 'high' );
}

function imagazine_dashboard_widget_content() {
    // widget content goes here

	//https://api.github.com/users/oddsized
	//$gitdata = wp_remote_get('https://api.github.com/users/oddsized');
	//$gitprofile_data = wp_remote_retrieve_body( $gitdata );
	//$gitprofile = json_decode( $gitprofile_data );
	//echo '<a href="'.$gitprofile->html_url.'" target="_blank"><img src="'.$gitprofile->avatar_url.'" style="display:inline-block;vertical-align:text-top;" border="0" width="24" height="auto" />'.$gitprofile->login.' @ github</a>';

	//https://api.github.com/repos/Oddsized/imagazine/events
	$gitdata = wp_remote_get('https://api.github.com/repos/Oddsized/imagazine/events');
	$gitevent_data = wp_remote_retrieve_body( $gitdata );
	$events = json_decode( $gitevent_data );

	if(count($events) > 0){
	echo '<ul>';
	foreach(array_slice($events, 0, 5) as $event){
		if($event->payload->commits[0]->message != ''){
		echo '<li><b>'.$event->payload->commits[0]->message.'</b><br />';
		echo '<small>'.$event->type.' '.$event->created_at.' by <a href="https://github.com/'.$event->actor->login.'" target="_blank">'.$event->payload->commits[0]->author->name.'</a></small></li>';
		}
	}
	echo '</ul>';
	}
}





/* Recent posts Widget */
class imagazine_postlist_widget extends WP_Widget {


	function __construct() {
		parent::__construct(
			'imagazine_postlist_widget', // Base ID
			__('Imagazine Postlist Widget', 'imagazine'), // Widget name and description in UI
			array( 'description' => __( 'iImagazine Widget Post Listing with options', 'imagazine' ), )
		);
	}


	// Creating widget front-end
	public function widget( $args, $instance ) {


		$itemcount = 3;
		$itemorder = 'DESC';
		$excerptlength = 0;
		$dsp_image = 'center';
		$dsp_date = 0;
		$dsp_author = 0;
		$dsp_tags = 0;
		$currentid = get_queried_object_id();


		if(isset($instance['itemcount']) && $instance['itemcount'] !='' )
			$itemcount = $instance['itemcount'];

		if(isset($instance['itemorder']) && $instance['itemorder'] !='' )
			$itemorder = $instance['itemorder'];

		if(isset($instance['excerptlength']) && $instance['excerptlength'] != 0 )
			$excerptlength = $instance['excerptlength'];

		if(isset($instance['dsp_image']) && $instance['dsp_image'] !='' )
			$dsp_image = $instance['dsp_image'];

		if(isset($instance['dsp_date']) && $instance['dsp_date'] !='' )
			$dsp_date = $instance['dsp_date'];

		if(isset($instance['dsp_author']) && $instance['dsp_author'] !='' )
			$dsp_author = $instance['dsp_author'];

		if(isset($instance['dsp_tags']) && $instance['dsp_tags'] !='' )
			$dsp_tags = $instance['dsp_tags'];


		$title = apply_filters( 'widget_title', $instance['title'] );



		// before and after widget arguments are defined by themes
		echo $args['before_widget'];

		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];


			// Category related posts
			$catsrel = "";
			//$posttags = get_the_tags();
			$postcats = get_the_category();
			if ($postcats) {
			foreach($postcats as $tag) {
				$catsrel .= ',' . $tag->name;
			}
			}
			$catsrel = substr($catsrel, 1); // remove first comma

			// Tag related posts
			$tagsrel = "";
			$posttags = get_the_tags();
			if ($posttags) {
			foreach($posttags as $tag) {
				$tagsrel .= ',' . $tag->name;
			}
			}
			$tagsrel = substr($tagsrel, 1); // remove first comma


		// list the post accoording to settings category/related
		if($instance['post_category'] == '' ||
		   (is_category() && ( $instance['post_category'] == 'PostRelCat' || $instance['post_category'] == 'PostRelTag' || $instance['post_category'] == 'PostRelCatTag' ) )  ){

			// latest of all or any '' category
			query_posts('post_status=publish&post_not_in='.$currentid.'&order='.$itemorder.'&posts_per_page='.$itemcount);

		}elseif($instance['post_category'] == 'PostRelCat' && $catsrel != ""){

			// posts with same categories
			query_posts('category_name=' .$catsrel . '&post_status=publish&post_not_in='.$currentid.'&order='.$itemorder.'&posts_per_page='.$itemcount);

		}elseif($instance['post_category'] == 'PostRelTag' && $tagsrel != ""){

			// posts with same tags
			query_posts('tag=' .$tagsrel . '&post_status=publish&post_not_in='.$currentid.'&order='.$itemorder.'&posts_per_page='.$itemcount);

		}elseif($instance['post_category'] == 'PostRelCatTag'){

			// or both tags and cats : cat=6&tag=a1
			query_posts('category_name=' .$catsrel . '&tag=' .$tagsrel . '&post_status=publish&post_not_in='.$currentid.'&order='.$itemorder.'&posts_per_page='.$itemcount);

		}else{

			// latest from specific category
			query_posts('category_name='.$instance['post_category'].'&post_status=publish&post_not_in='.$currentid.'&order='.$itemorder.'&posts_per_page='.$itemcount);

		}

		// if no results throw global query
		if ( ! have_posts() ){
			query_posts('post_status=publish&post_not_in='.$currentid.'&order='.$itemorder.'&posts_per_page='.$itemcount);
		}


		// list posts
		if (have_posts()) :

		echo '<ul>';

		while (have_posts()) : the_post();

		if($currentid!= get_the_ID()){ // double check if item is current active page/post id

		// define title link
		$title_link = '<a class="rel-item" data-id="'.get_the_ID().'" href="'.get_the_permalink().'" target="_self" title="'.get_the_title().'">';


		//start output
		echo '<li>'. $title_link;

		echo '<div class="post-titlebox"><h4>'. get_the_title() .'</h4>';


		if($dsp_date == 1 ){
		echo '<span class="post-date time-ago">'.wp_time_ago(get_the_time( 'U' )).' </span>';
		}

		if($dsp_date == 2 ){
		echo '<span class="post-date">'.get_the_date().' </span>';
		}

		if($dsp_date == 3 ){
		echo '<span class="post-date date-time">'.get_the_date().' - '.get_the_time().'</span>';
		}

		if($dsp_author != 0 ){
		echo '<span class="post-author">'.get_the_author().' </span>';
		}
		echo '</div>';

		echo '<div class="item-excerpt">'; //.$title_link;

		if ( has_post_thumbnail() && $dsp_image != 'none' ) {
			$align = 'align-'.$dsp_image;
			echo get_the_post_thumbnail( get_the_ID(), 'big-thumb', array( 'class' => $align )); //the_post_thumbnail('big-thumb');
    	}

		// Post intro content
			// preg_replace('/(?i)<a([^>]+)>(.+?)<\/a>/','', get_the_excerpt() );
		if( $excerptlength != 0 ){

		echo '<p>';
		the_excerpt_length( $excerptlength, false );
		echo '</p>';

		}

		echo '</div><div class="clr"></div>';

		echo '</a>';

		if( isset( $instance[ 'dsp_tags' ] )  && $dsp_tags != 0 ){
			echo '<div class="post-tags">';
    		the_tags('Tagged with: ',' '); // the_tags(', ');  //
			echo '</div>';
		}

			echo '</li>';
		}

		endwhile;

		echo '</ul>';

		endif;

		wp_reset_query();

		echo $args['after_widget'];
	}



	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
		}else{
		$title = __( 'New title', 'Posts listed' );
		}


		/*
	 	 * Widget admin form
		 */

		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php __( 'Title:', 'imagazine' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<?php


		if ( isset( $instance[ 'post_category' ] ) ) {
		$post_category = $instance[ 'post_category' ];
		}else{
		$post_category = '';
		}

		$catarr = get_categories_select(); // functions.php
		?>
		<p><label for="<?php echo $this->get_field_id( 'post_category' ); ?>">Posts category or related:</label>
		<select name="<?php echo $this->get_field_name( 'post_category' ); ?>" id="<?php echo $this->get_field_id( 'post_category' ); ?>">
		<?php
		foreach($catarr as $slg => $nm){
			echo '<option value="'.$slg.'" '.selected( $post_category, $slg ).'>- '.$nm.'</option>';
		}
		?>
		<option value="PostRelCatTag" <?php selected( $post_category, 'PostRelCatTag' ); ?>>Related by cats &amp; tags</option>
		<option value="PostRelCat" <?php selected( $post_category, 'PostRelCat' ); ?>>Related by category</option>
		<option value="PostRelTag" <?php selected( $post_category, 'PostRelTag' ); ?>>Related by tags</option>
		<option value="" <?php selected( $post_category, '' ); ?>>Any (Recents) Posts</option>
		</select>
		</p>

		<?php
		$value = '';
		if ( isset( $instance[ 'itemcount' ] ) ) {
			$value = 'value="'.$instance[ 'itemcount' ].'" ';
		}
		?>
		<p><label for="<?php echo $this->get_field_id( 'itemcount' ); ?>">Amount of items:</label>
		<input type="text" size="3" <?php echo $value; ?>name="<?php echo $this->get_field_name( 'itemcount' ); ?>" id="<?php echo $this->get_field_id( 'itemcount' ); ?>" />
		</p>

		<?php
		$itemorder = 'DESC';
		if ( isset( $instance[ 'itemorder' ] ) ) {
		$itemorder = $instance[ 'itemorder' ];
		}
		?>
		<p><label for="<?php echo $this->get_field_id( 'itemorder' ); ?>">List order:</label>
		<select name="<?php echo $this->get_field_name( 'itemorder' ); ?>" id="<?php echo $this->get_field_id( 'itemorder' ); ?>">
		<option value="DESC" <?php selected( $itemorder, 'DESC' ); ?>>Recent</option>
		<option value="ASC" <?php selected( $itemorder, 'ASC' ); ?>>Oldest first</option>
		</select>
		</p>


		<?php
		$value = '';
		if ( isset( $instance[ 'excerptlength' ] ) ) {
			$value = 'value="'.$instance[ 'excerptlength' ].'" ';
		}
		?>
		<p><label for="<?php echo $this->get_field_id( 'excerptlength' ); ?>">Amount of text in words:</label>
		<input type="text" size="3" <?php echo $value; ?>name="<?php echo $this->get_field_name( 'excerptlength' ); ?>" id="<?php echo $this->get_field_id( 'excerptlength' ); ?>" />
		<small>0 or empty = no text display</small></p>




		<?php
		$dsp_image = '';
		if ( isset( $instance[ 'dsp_image' ] ) ) {
		$dsp_image = $instance[ 'dsp_image' ];
		}

		?>
		<p><label for="<?php echo $this->get_field_id( 'dsp_image' ); ?>">Featured image:</label>
		<select name="<?php echo $this->get_field_name( 'dsp_image' ); ?>" id="<?php echo $this->get_field_id( 'dsp_image' ); ?>">
		<option value="none" <?php selected( $dsp_image, 'none' ); ?>>None</option>
		<option value="center" <?php selected( $dsp_image, 'center' ); ?>>Center</option>
		<option value="left" <?php selected( $dsp_image, 'left' ); ?>>Left</option>
		<option value="right" <?php selected( $dsp_image, 'right' ); ?>>Right</option>
		</select>
		</p>

		<?php
		$dsp_date = 0;
		if ( isset( $instance[ 'dsp_date' ] ) ) {
		$dsp_date = $instance[ 'dsp_date' ];
		}

		?>
		<p><label for="<?php echo $this->get_field_id( 'dsp_date' ); ?>">Show Post Time:</label>
		<select name="<?php echo $this->get_field_name( 'dsp_date' ); ?>" id="<?php echo $this->get_field_id( 'dsp_date' ); ?>">
		<option value="0" <?php selected( $dsp_date, 0 ); ?>>Hide</option>
		<option value="1" <?php selected( $dsp_date, '1' ); ?>>Show Time Ago</option>
		<option value="2" <?php selected( $dsp_date, '2' ); ?>>Show Date</option>
		<option value="3" <?php selected( $dsp_date, '3' ); ?>>Show Date and Time</option>
		</select>
		</p>

		<?php
		$dsp_author = 0;
		if ( isset( $instance[ 'dsp_author' ] ) ) {
		$dsp_author = $instance[ 'dsp_author' ];
		}

		?>
		<p><label for="<?php echo $this->get_field_id( 'dsp_author' ); ?>">Show author:</label>
		<select name="<?php echo $this->get_field_name( 'dsp_author' ); ?>" id="<?php echo $this->get_field_id( 'dsp_author' ); ?>">
		<option value="0" <?php selected( $dsp_author, '0' ); ?>>Hide</option>
		<option value="1" <?php selected( $dsp_author, '1' ); ?>>Show</option>
		</select>
		</p>

		<?php
		$dsp_tags = 0;
		if ( isset( $instance[ 'dsp_tags' ] ) ) {
		$dsp_tags = $instance[ 'dsp_tags' ];
		}

		?>
		<p><label for="<?php echo $this->get_field_id( 'dsp_tags' ); ?>">Show tags:</label>
		<select name="<?php echo $this->get_field_name( 'dsp_tags' ); ?>" id="<?php echo $this->get_field_id( 'dsp_tags' ); ?>">
		<option value="0" <?php selected( $dsp_tags, '0' ); ?>>Hide</option>
		<option value="1" <?php selected( $dsp_tags, '1' ); ?>>Show</option>
		</select>
		</p>
		<?php
		/*
		<h4>Product options</h4>
		<?php
		$dsp_label = 0;
		if ( isset( $instance[ 'dsp_label' ] ) ) {
		$dsp_label = $instance[ 'dsp_label' ];
		}
		?>
		<p><label for="<?php echo $this->get_field_id( 'dsp_label' ); ?>">Show label:</label>
		<select name="<?php echo $this->get_field_name( 'dsp_label' ); ?>" id="<?php echo $this->get_field_id( 'dsp_label' ); ?>">
		<option value="0" <?php selected( $dsp_label, '0' ); ?>>Hide</option>
		<option value="1" <?php selected( $dsp_label, '1' ); ?>>Show</option>
		</select>
		</p>

		<?php
		$dsp_size = 0;
		if ( isset( $instance[ 'dsp_size' ] ) ) {
		$dsp_size = $instance[ 'dsp_size' ];
		}
		?>
		<p><label for="<?php echo $this->get_field_id( 'dsp_size' ); ?>">Show size:</label>
		<select name="<?php echo $this->get_field_name( 'dsp_size' ); ?>" id="<?php echo $this->get_field_id( 'dsp_size' ); ?>">
		<option value="0" <?php selected( $dsp_size, '0' ); ?>>Hide</option>
		<option value="1" <?php selected( $dsp_size, '1' ); ?>>Show</option>
		</select>
		</p>

		<?php
		$dsp_price = 0;
		if ( isset( $instance[ 'dsp_price' ] ) ) {
		$dsp_price = $instance[ 'dsp_price' ];
		}

		?>
		<p><label for="<?php echo $this->get_field_id( 'dsp_price' ); ?>">Show price (incl. discount):</label>
		<select name="<?php echo $this->get_field_name( 'dsp_price' ); ?>" id="<?php echo $this->get_field_id( 'dsp_price' ); ?>">
		<option value="0" <?php selected( $dsp_price, '0' ); ?>>Hide</option>
		<option value="1" <?php selected( $dsp_price, '1' ); ?>>Show</option>
		</select>
		</p>

		<?php
		$dsp_packweight = 0;
		if ( isset( $instance[ 'dsp_packweight' ] ) ) {
		$dsp_packweight = $instance[ 'dsp_packweight' ];
		}

		?>
		<p><label for="<?php echo $this->get_field_id( 'dsp_packweight' ); ?>">Show package weight and size:</label>
		<select name="<?php echo $this->get_field_name( 'dsp_packweight' ); ?>" id="<?php echo $this->get_field_id( 'dsp_packweight' ); ?>">
		<option value="0" <?php selected( $dsp_packweight, '0' ); ?>>Hide</option>
		<option value="1" <?php selected( $dsp_packweight, '1' ); ?>>Show</option>
		</select>
		</p>


		<?php
		$dsp_order = 0;
		if ( isset( $instance[ 'dsp_order' ] ) ) {
		$dsp_order = $instance[ 'dsp_order' ];
		}

		?>
		<p><label for="<?php echo $this->get_field_id( 'dsp_order' ); ?>">Show order option(s):</label>
		<select name="<?php echo $this->get_field_name( 'dsp_order' ); ?>" id="<?php echo $this->get_field_id( 'dsp_order' ); ?>">
		<option value="0" <?php selected( $dsp_order, '0' ); ?>>Hide</option>
		<option value="1" <?php selected( $dsp_order, '1' ); ?>>Show</option>
		</select>
		</p>
		*/ ?>

		<?php

	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		//$instance['function_type'] = ( ! empty( $new_instance['function_type'] ) ) ? strip_tags( $new_instance['function_type'] ) : '';
		$instance['post_category'] = ( ! empty( $new_instance['post_category'] ) ) ? strip_tags( $new_instance['post_category'] ) : '';
		$instance['itemcount'] = ( ! empty( $new_instance['itemcount'] ) ) ? strip_tags( $new_instance['itemcount'] ) : '';
		$instance['itemorder'] = ( ! empty( $new_instance['itemorder'] ) ) ? strip_tags( $new_instance['itemorder'] ) : '';
		$instance['excerptlength'] = ( ! empty( $new_instance['excerptlength'] ) ) ? strip_tags( $new_instance['excerptlength'] ) : '';
		$instance['dsp_image'] = ( ! empty( $new_instance['dsp_image'] ) ) ? strip_tags( $new_instance['dsp_image'] ) : '';
		$instance['dsp_date'] = ( ! empty( $new_instance['dsp_date'] ) ) ? strip_tags( $new_instance['dsp_date'] ) : '';
		$instance['dsp_author'] = ( ! empty( $new_instance['dsp_author'] ) ) ? strip_tags( $new_instance['dsp_author'] ) : '';
		$instance['dsp_tags'] = ( ! empty( $new_instance['dsp_tags'] ) ) ? strip_tags( $new_instance['dsp_tags'] ) : '';

		/* Products
		$instance['dsp_label'] = ( ! empty( $new_instance['dsp_label'] ) ) ? strip_tags( $new_instance['dsp_label'] ) : '';
		$instance['dsp_size'] = ( ! empty( $new_instance['dsp_size'] ) ) ? strip_tags( $new_instance['dsp_size'] ) : '';
		$instance['dsp_price'] = ( ! empty( $new_instance['dsp_price'] ) ) ? strip_tags( $new_instance['dsp_price'] ) : '';
		$instance['dsp_packweight'] = ( ! empty( $new_instance['dsp_packweight'] ) ) ? strip_tags( $new_instance['dsp_packweight'] ) : '';
		$instance['dsp_order'] = ( ! empty( $new_instance['dsp_order'] ) ) ? strip_tags( $new_instance['dsp_order'] ) : '';
		*/
		return $instance;
	}

} // Class wpb_widget ends here

// Register and load the widget
function imagazine_load_widget() {
	register_widget( 'imagazine_postlist_widget' );
}
add_action( 'widgets_init', 'imagazine_load_widget' );


?>
