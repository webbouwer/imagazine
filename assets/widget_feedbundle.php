<?php

/*
 * Feedbundle widget
 */
class imagazine_feedbundle_widget extends WP_Widget {


	public $feeddata = '';
	public $fullbundle = '';
	/* Twitter */
	public $twitterdata = '';

    private $tw_con_ky = 'xxxxxx'; // consumer key
    private $tw_con_st = 'xxxxxx'; // consumer secret
    private $tw_acc_tk = 'xxxxxx'; // acces token
    private $tw_acc_st = 'xxxxxx'; // acces token secret
	//private $tw_endpoint = 'https://api.twitter.com/1.1/users/show.json?screen_name=oddsized'; // user profile


	function __construct() {
		parent::__construct(
			'imagazine_feedbundle_widget', // Base ID
			__('Imagazine Feedbundle Widget', 'imagazine'), // Widget name and description in UI
			array( 'description' => __( 'Imagazine Widget listing various of messaging channels (in development)', 'imagazine' ), )
		);
	}


	// Creating widget front-end
	public function widget( $args, $instance ) {


		$itemcount = 3;
		$itemorder = 'DESC';
		$excerptlength = 20;
		$dsp_date = 0;
		$dsp_from = 0;
		$dsp_source = 0;


		$currentid = get_queried_object_id();


		if(isset($instance['itemcount']) && $instance['itemcount'] !='' )
			$itemcount = $instance['itemcount'];

		if(isset($instance['itemorder']) && $instance['itemorder'] !='' )
			$itemorder = $instance['itemorder'];

		if(isset($instance['excerptlength']) && $instance['excerptlength'] != 0 )
			$excerptlength = $instance['excerptlength'];

		if(isset($instance['dsp_date']) && $instance['dsp_date'] !='' )
			$dsp_date = $instance['dsp_date'];

		if(isset($instance['dsp_from']) && $instance['dsp_from'] !='' )
			$dsp_from = $instance['dsp_from'];

		if(isset($instance['dsp_source']) && $instance['dsp_source'] !='' )
			$dsp_source = $instance['dsp_tags'];


		$title = apply_filters( 'widget_title', $instance['title'] );



		// before and after widget arguments are defined by themes
		echo $args['before_widget'];

		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];





		/*
		 * Create feed list
		 */
		echo '<div>testing</div>';




		$feeddata = $this->collect_data_bundle(); //$this->socialBundle();






		echo $args['after_widget'];


	}

	/*
	* Sanitize text
	*/
	public function sanitizeText($str){

        $str = str_replace("&nbsp;", "", $str);
		$str = strip_tags( $str, '<br>');

		return $str;
	}




	public function get_twitter_json_to_array(){

		// request token
		$basic_credentials = base64_encode($this->tw_con_ky.':'.$this->tw_con_st);
		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'header'  =>    'Authorization: Basic '.$basic_credentials."\r\n".
				"Content-type: application/x-www-form-urlencoded;charset=UTF-8\r\n",
				'content' => 'grant_type=client_credentials'
			)
		);

		$context  = stream_context_create($opts);

		// send request
		$pre_token = file_get_contents('https://api.twitter.com/oauth2/token', false, $context);

		//Interpret token with JSON
		$token = json_decode($pre_token, true);

		if (isset($token["token_type"]) && $token["token_type"] == "bearer"){

			$opts = array('http' =>
				array(
					'method'  => 'GET',
					'header'  => 'Authorization: Bearer '.$token["access_token"]
				)
			);

			$context  = stream_context_create($opts);

			$endpoint = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=oddsized&include_entities=false&count=5';

			$data = file_get_contents($endpoint, false, $context);

			//Interpret data with JSON
		  	$twdata = json_decode($data);

			$arr = array();
		  	$i = 0;
		  	foreach ($twdata as $t ) {
		   		$arr[$i]['source'] = 'twitter';
		   		//$arr[$i]['title'] = $t->description;
		   		$arr[$i]['description'] = $this->sanitizeText(  $t->text );
		   		$arr[$i]['pubdate'] =$t->created_at; // strtotime( )  created_time
		   		$arr[$i]['link'] = $t->user->url;  // object link
				$arr[$i]['from'] = $t->user->name;  // owner ? twitter id
		   	$i++;
		  	}

		  	return $arr;

		}

	}


    /*
	 * Feed collector
     */
	public function collect_data_bundle(){

		$arr = array( 0 => array('pubdate' => 'testing!') );

		// all together
		$this->twitterdata = $this->get_twitter_json_to_array();
		// ..

		$this->feeddata = array_merge($this->twitterdata); // , ..

		// order feeds by date and/or type
		function cmp($a, $b){
    		$ad = strtotime($a['pubdate']);
    		$bd = strtotime($b['pubdate']);
    		return ($ad-$bd);
		}
		usort($this->feeddata, 'cmp');

		// if DESC
		$this->fullbundle = array_reverse( $this->feeddata );

		$this->outputHTMLbundle();

		return $this->fullbundle;
	}

	/* HTML output */
	public function outputHTMLbundle() {
		$output = '';
		foreach($this->fullbundle as $msg){
			if( !empty($msg['description']) ){
			$title = $msg['description'];
			}else{
			$title = $msg['title'];
			}
			if( !empty($title) ){
			$output .= '<li><h4>'.$title.'</h4>'.$msg['pubdate'].' on '.$msg['source'].'</li>';
			}
		}
		echo '<ul>'.$output.'</ul>';
	}





	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
		}else{
		$title = __( 'New title', 'imagazine' );
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
		$dsp_date = 0;
		if ( isset( $instance[ 'dsp_date' ] ) ) {
		$dsp_date = $instance[ 'dsp_date' ];
		}

		?>
		<p><label for="<?php echo $this->get_field_id( 'dsp_date' ); ?>">Show time:</label>
		<select name="<?php echo $this->get_field_name( 'dsp_date' ); ?>" id="<?php echo $this->get_field_id( 'dsp_date' ); ?>">
		<option value="0" <?php selected( $dsp_date, 0 ); ?>>Hide</option>
		<option value="1" <?php selected( $dsp_date, '1' ); ?>>Show Time Ago</option>
		<option value="2" <?php selected( $dsp_date, '2' ); ?>>Show Date</option>
		<option value="3" <?php selected( $dsp_date, '3' ); ?>>Show Date and Time</option>
		</select>
		</p>

		<?php
		$dsp_author = 0;
		if ( isset( $instance[ 'dsp_from' ] ) ) {
		$dsp_from = $instance[ 'dsp_from' ];
		}

		?>
		<p><label for="<?php echo $this->get_field_id( 'dsp_from' ); ?>">Show user/page:</label>
		<select name="<?php echo $this->get_field_name( 'dsp_from' ); ?>" id="<?php echo $this->get_field_id( 'dsp_from' ); ?>">
		<option value="0" <?php selected( $dsp_from, '0' ); ?>>Hide</option>
		<option value="1" <?php selected( $dsp_from, '1' ); ?>>Show</option>
		</select>
		</p>

		<?php
		$dsp_tags = 0;
		if ( isset( $instance[ 'dsp_source' ] ) ) {
		$dsp_source = $instance[ 'dsp_source' ];
		}

		?>
		<p><label for="<?php echo $this->get_field_id( 'dsp_source' ); ?>">Show data source</label>
		<select name="<?php echo $this->get_field_name( 'dsp_source' ); ?>" id="<?php echo $this->get_field_id( 'dsp_source' ); ?>">
		<option value="0" <?php selected( $dsp_source, '0' ); ?>>Hide</option>
		<option value="1" <?php selected( $dsp_source, '1' ); ?>>Show</option>
		</select>
		</p>
		<?php

	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		$instance['itemcount'] = ( ! empty( $new_instance['itemcount'] ) ) ? strip_tags( $new_instance['itemcount'] ) : '';
		$instance['itemorder'] = ( ! empty( $new_instance['itemorder'] ) ) ? strip_tags( $new_instance['itemorder'] ) : '';
		$instance['excerptlength'] = ( ! empty( $new_instance['excerptlength'] ) ) ? strip_tags( $new_instance['excerptlength'] ) : '';
		$instance['dsp_date'] = ( ! empty( $new_instance['dsp_date'] ) ) ? strip_tags( $new_instance['dsp_date'] ) : '';
		$instance['dsp_from'] = ( ! empty( $new_instance['dsp_from'] ) ) ? strip_tags( $new_instance['dsp_from'] ) : '';
		$instance['dsp_source'] = ( ! empty( $new_instance['dsp_source'] ) ) ? strip_tags( $new_instance['dsp_source'] ) : '';

		return $instance;
	}

} // Class wpb_widget ends here








?>
