<?php

/*
 * Feedbundle widget
 */
class imagazine_feedbundle_widget extends WP_Widget {


	public $feeddata = array();
	public $fullbundle = array();

	public $maxitems = 25;

	/* Twitter */
	public $twitterdata = '';
	private $twitter_page_id = ''; // consumer key
    private $twitter_consumer_key = ''; // consumer key
    private $twitter_consumer_secret = ''; // consumer secret
    //private $twitter_acces_token = '98573475-xDXwlzNepYEb5RaStrIbl4VbaBISnZHshu59AQ1nT'; // acces token
    //private $twitter_acces_secret = 'IAN8KB20MWo5fWjdcSfi8oGZz9GAvzLtv7pjF9LOC6GNk'; // acces token secret
	//private $tw_endpoint = 'https://api.twitter.com/1.1/users/show.json?screen_name=oddsized'; // user profile


	/* Facebook */
	public $facebookdata = '';

	private $facebook_page_id = ''; // user/page key
    private $facebook_consumer_key = ''; // app id
	private $facebook_consumer_secret = ''; // app secret
    //private $facebook_acces_token = '405814669437291|w8qzcM-rww1D913w2GNrz-UptfI'; // acces token (no expire)

	/* Wordpress */
	public $wordpressdata = '';
	private $wordpress_url = '';



	function __construct() {
		parent::__construct(
			'imagazine_feedbundle_widget', // Base ID
			__('Imagazine Feedbundle Widget', 'imagazine'), // Widget name and description in UI
			array( 'description' => __( 'Imagazine Widget listing various of messaging channels (in development)', 'imagazine' ), )
		);
	}


	// Creating widget front-end
	public function widget( $args, $instance ) {


		// check channel options

		/* Twitter */
		if(isset($instance['twitter_page_id']) && $instance['twitter_page_id'] !='' )
			$this->twitter_page_id = $instance['twitter_page_id']; // page/user id key
		if(isset($instance['twitter_consumer_key']) && $instance['twitter_consumer_key'] !='' )
			$this->twitter_consumer_key = $instance['twitter_consumer_key']; // consumer key
		if(isset($instance['twitter_consumer_secret']) && $instance['twitter_consumer_secret'] !='' )
			$this->twitter_consumer_secret = $instance['twitter_consumer_secret']; // consumer secret
		//$twitter_acces_token = ''; // acces token
		//$twitter_acces_secret = ''; // acces token secret

		/* Facebook */
		if(isset($instance['facebook_page_id']) && $instance['facebook_page_id'] !='' )
			$this->facebook_page_id = $instance['facebook_page_id']; // user/page key
		if(isset($instance['facebook_consumer_key']) && $instance['facebook_consumer_key'] !='' )
			$this->facebook_consumer_key = $instance['facebook_consumer_key']; // app id
		if(isset($instance['facebook_consumer_secret']) && $instance['facebook_consumer_secret'] !='' )
			$this->facebook_consumer_secret = $instance['facebook_consumer_secret']; // app secret

		/* Wordpress */
		if(isset($instance['wordpress_url']) && $instance['wordpress_url'] !='' )
			$this->wordpress_url = $instance['wordpress_url']; // user/page key


		// check display options
		$itemcount = 3;
		$itemorder = 'DESC';
		$excerptlength = 20;
		$dsp_date = 0;
		$dsp_from = 0;
		$dsp_source = 0;
		$currentid = get_queried_object_id();

		if(isset($instance['itemcount']) && $instance['itemcount'] !='' )
			$itemcount = $instance['itemcount'];
			$this->maxitems = $itemcount;

		if(isset($instance['itemorder']) && $instance['itemorder'] !='' )
			$itemorder = $instance['itemorder']; // DESC / ASC

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

		$feedbundle = $this->collect_data_bundle(); //$this->socialBundle();
		$c = 1;
		$output = '<ul>';

		if( $itemorder == 'ASC' ){
			// reverse the order
			$feedbundle = array_reverse( $feedbundle );
		}

		foreach($feedbundle as $msg){


			$output .= '<li>';
			// date format :: make all the same -> create formats
			// title and/or text
			$reference_link_text_open = '';
			$reference_link_text_close = '';
			if( !empty( $msg['link'] ) ){
				$reference_link_text_open = '<a href="'.$msg['link'].'" target="_blank">';
				$reference_link_text_close = '</a>';
			}


			if( empty( $msg['title'] ) && !empty($msg['description']) ){

				//$output .= '<h4>'.$msg['description'].' - '.$reference_link_text_open.'Lees meer'.$reference_link_text_close.'</h4>';
				$output .= '<h4>'.$reference_link_text_open.$msg['description'].$reference_link_text_close.'</h4>';

			}else{

				if( !empty( $msg['title'] ) ){
				$output .= '<h4>'.$reference_link_text_open.$msg['title'].$reference_link_text_close.'</h4>';
				}

				if( !empty( $msg['description'] ) ){
				$output .= '<p>'.$msg['description'].'</p>';
				}

			}
			// link to article/update page

			// link to source (profile) page


			if( !empty($msg['title']) || !empty($msg['description']) ){

			$output .= $msg['pubdate'];

			$output .= ' on '.$msg['source'];

			}

			$output .= '</li>';



			if( $c++ >= $itemcount ) break;

		}
		$output .= '</ul>';

		echo $output;

		print $global['wp_registered_widgets'];

		echo $args['after_widget'];

	}



    /*
	 * Collect & order
     */
	public function collect_data_bundle(){



		$this->feeddata = array();

		// all together
		if( $this->wordpress_url != '' ){
		$this->wordpressdata = $this->get_wordpress_json_to_array();
			if( !$this->wordpressdata['error'] )
			$this->feeddata = array_merge($this->feeddata,$this->wordpressdata);
		}
		if( $this->twitter_page_id != '' && $this->twitter_consumer_key != '' && $this->twitter_consumer_secret != ''){
		$this->twitterdata = $this->get_twitter_json_to_array();
			if( !$this->twitterdata['error'] )
			$this->feeddata = array_merge($this->feeddata,$this->twitterdata);
		}
		if( $this->facebook_page_id != '' && $this->facebook_consumer_key != '' && $this->facebook_consumer_secret != ''){
		$this->facebookdata = $this->get_facebook_json_to_array();
			if( !$this->facebookdata['error'] )
			$this->feeddata = array_merge($this->feeddata,$this->facebookdata);
		}
		// ..

		//$this->feeddata = array_merge($this->wordpressdata, $this->twitterdata, $this->facebookdata); // , ..

		// order feeds by date and/or type
		function cmp($a, $b){
    		$ad = strtotime($a['pubdate']);
    		$bd = strtotime($b['pubdate']);
    		return ($ad-$bd);
		}
		usort($this->feeddata, 'cmp');

		// order DESC
		$this->fullbundle = array_reverse( $this->feeddata );

		return $this->fullbundle;
	}


	/*
	 * Wordpress json
	 */
	public function get_wordpress_json_to_array(){

			// send request
			$data = file_get_contents($this->wordpress_url.'/wp-json/wp/v2/posts?per_page='.$this->maxitems);

			$WPdata = json_decode($data);
			if( count($WPdata) > 0){
			//Interpret data with JSON
				$arr = array();
				$i = 0;
				foreach ($WPdata as $w ) {
					$arr[$i]['source'] = 'wordpress';
					$arr[$i]['title'] = $this->sanitizeText( $w->title->rendered );
					$arr[$i]['description'] = $this->sanitizeText( $w->excerpt->rendered );
					$arr[$i]['pubdate'] = $w->modified_gmt; // created_time
					$arr[$i]['link'] = $w->link;  // owner ? fb_pag_id
				$i++;
				}
			  return $arr;
			}else{
			  	return array('error'=>'Failed retrieving Wordpress feeds', 'desc'=>'');
			}
	}


	/*
	 * Twitter json
	 */
	public function get_twitter_json_to_array(){

		// request token
		$basic_credentials = base64_encode($this->twitter_consumer_key.':'.$this->twitter_consumer_secret);
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

			$endpoint = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$this->twitter_page_id.'&include_entities=false&count='.$this->maxitems;

			$data = file_get_contents($endpoint, false, $context);

			//Interpret data with JSON
		  	$twdata = json_decode($data);

			if( count($twdata) > 0){
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
			}else{
			  	return array('error'=>'Failed retrieving Twitter feeds', 'desc'=>'');
			}
		}

	}


	public function get_facebook_json_to_array(){

		$tokenurl = 'https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id='.$this->facebook_consumer_key.'&client_secret='.$this->facebook_consumer_secret;
		$pre_token = file_get_contents($tokenurl);


		//Interpret token with JSON
		$token = json_decode($pre_token, true);

		/*
		$endpoint = 'https://graph.facebook.com/'.$this->facebook_page_id.'/feed';
		$endpoint .= '?fields=id,type,status_type,updated_time,created_time,story,description,picture,from,link,likes.summary(true)';
		$endpoint .= '&limit=10';
*/

				$endpoint = 'https://graph.facebook.com/'.$this->facebook_page_id.'/feed';
				$endpoint .= '?fields=id,type,status_type,updated_time,created_time,story,description,picture,from,link,likes.summary(true)';
				$endpoint .= '&limit='.$this->maxitems;

			if (isset($token["token_type"]) && $token["token_type"] == "bearer"){

				$opts = array('http' =>
					array(
						'method'  => 'GET',
						'header'  => 'Authorization: Bearer '.$token["access_token"]
					)
				);

				$context  = stream_context_create($opts);


				$data = file_get_contents($endpoint, false, $context);

			}elseif(isset($token["acces_token"])){

				$endpoint .= '&acces_token='.$token["acces_token"];
				$data = file_get_contents($endpoint);

			}

			$FBdata = json_decode($data);

			if( count($FBdata->data) > 0){
			//Interpret data with JSON
				$arr = array();
				$i = 0;
				foreach ($FBdata->data as $f ) {
					$arr[$i]['source'] = 'facebook';
					$arr[$i]['title'] = $this->sanitizeText( $f->story );
					$arr[$i]['description'] = $this->sanitizeText( $f->description );
					$arr[$i]['pubdate'] = $f->updated_time; // created_time - date("F j, Y, g:i a", strtotime($f->updated_time) )
					$arr[$i]['link'] = $f->link;  // object link
					$arr[$i]['from'] = $f->from->id;  // owner ? fb_pag_id
				$i++;
				}
			  return $arr;

			}else{
			  return array('error'=>'Failed retrieving Facebook feeds', 'desc'=>'');
			}

	}




	/*
	* Sanitize output text
	*/
	public function sanitizeText($str){

        $str = str_replace("&nbsp;", "", $str);
		$str = strip_tags( $str, '<br>');
		$str = $this->makeLinks($str);
		return $str;
	}

	public function makeLinks($str) {
		// http://krasimirtsonev.com/blog/article/php--find-links-in-a-string-and-replace-them-with-actual-html-link-tags
		$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
		$urls = array();
		$urlsToReplace = array();
		if(preg_match_all($reg_exUrl, $str, $urls)) {
			$numOfMatches = count($urls[0]);
			$numOfUrlsToReplace = 0;
			for($i=0; $i<$numOfMatches; $i++) {
				$alreadyAdded = false;
				$numOfUrlsToReplace = count($urlsToReplace);
				for($j=0; $j<$numOfUrlsToReplace; $j++) {
					if($urlsToReplace[$j] == $urls[0][$i]) {
						$alreadyAdded = true;
					}
				}
				if(!$alreadyAdded) {
					array_push($urlsToReplace, $urls[0][$i]);
				}
			}
			$numOfUrlsToReplace = count($urlsToReplace);
			for($i=0; $i<$numOfUrlsToReplace; $i++) {
				$str = str_replace($urlsToReplace[$i], "<a href=\"".$urlsToReplace[$i]."\" target=\"_blank\">".$urlsToReplace[$i]."</a> ", $str);
			}
			return $str;
		} else {
			return $str;
		}
	}











	// Widget Backend
	public function form( $instance ) {

		/*
	 	 * Widget admin form
		 */

		/* Twitter */
		if(isset($instance['twitter_page_id']) && $instance['twitter_page_id'] !='' )
			$this->twitter_page_id = $instance['twitter_page_id']; // page/user id key
		if(isset($instance['twitter_consumer_key']) && $instance['twitter_consumer_key'] !='' )
			$this->twitter_consumer_key = $instance['twitter_consumer_key']; // consumer key
		if(isset($instance['twitter_consumer_secret']) && $instance['twitter_consumer_secret'] !='' )
			$this->twitter_consumer_secret = $instance['twitter_consumer_secret']; // consumer secret
		//$twitter_acces_token = ''; // acces token
		//$twitter_acces_secret = ''; // acces token secret

		/* Facebook */
		if(isset($instance['facebook_page_id']) && $instance['facebook_page_id'] !='' )
			$this->facebook_page_id = $instance['facebook_page_id']; // user/page key
		if(isset($instance['facebook_consumer_key']) && $instance['facebook_consumer_key'] !='' )
			$this->facebook_consumer_key = $instance['facebook_consumer_key']; // app id
		if(isset($instance['facebook_consumer_secret']) && $instance['facebook_consumer_secret'] !='' )
			$this->facebook_consumer_secret = $instance['facebook_consumer_secret']; // app secret

		/* Wordpress */
		if(isset($instance['wordpress_url']) && $instance['wordpress_url'] !='' )
			$this->wordpress_url = $instance['wordpress_url']; // user/page key

		?>

		<?php
		// set title
		if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
		}else{
		$title = __( 'New title', 'imagazine' );
		}
		?>


		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php __( 'Title:', 'imagazine' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>


		<div style="border:1px solid #c4c4c4;padding:4px;">


		<strong>Wordpress Url</strong>
		<p>
		<strong><small>Wordpress website url</small></strong>
		<label for="<?php echo $this->get_field_id( 'wordpress_url' ); ?>"><?php __( 'Wordpress Posts url:', 'imagazine' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'wordpress_url' ); ?>" name="<?php echo $this->get_field_name( 'wordpress_url' ); ?>" type="text" value="<?php echo esc_attr( $this->wordpress_url ); ?>" />
		</p>


		<strong>Facebook credentials</strong>
		<p>
		<strong><small>Page/Profile id</small></strong>
		<label for="<?php echo $this->get_field_id( 'facebook_page_id' ); ?>"><?php __( 'Facebook page/profile id:', 'imagazine' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'facebook_page_id' ); ?>" name="<?php echo $this->get_field_name( 'facebook_page_id' ); ?>" type="text" value="<?php echo esc_attr( $this->facebook_page_id ); ?>" />
		</p>
		<p>
		<strong><small>App/Consumer key</small></strong>
		<label for="<?php echo $this->get_field_id( 'facebook_consumer_key' ); ?>"><?php __( 'Facebook consumer/api key:', 'imagazine' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'facebook_consumer_key' ); ?>" name="<?php echo $this->get_field_name( 'facebook_consumer_key' ); ?>" type="text" value="<?php echo esc_attr( $this->facebook_consumer_key ); ?>" />
		</p>
		<p>
		<strong><small>App/Consumer secret</small></strong>
		<label for="<?php echo $this->get_field_id( 'facebook_consumer_secret' ); ?>"><?php __( 'Facebook consumer/api secret:', 'imagazine' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'facebook_consumer_secret' ); ?>" name="<?php echo $this->get_field_name( 'facebook_consumer_secret' ); ?>" type="text" value="<?php echo esc_attr( $this->facebook_consumer_secret ); ?>" />
		</p>

		<strong>Twitter credentials</strong>
		<p>
		<strong><small>Page/User name (screen_name)</small></strong>
		<label for="<?php echo $this->get_field_id( 'twitter_page_id' ); ?>"><?php __( 'Twitter page/profile id:', 'imagazine' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'twitter_page_id' ); ?>" name="<?php echo $this->get_field_name( 'twitter_page_id' ); ?>" type="text" value="<?php echo esc_attr( $this->twitter_page_id ); ?>" />
		</p>
		<p>
		<strong><small>App/Consumer key</small></strong>
		<label for="<?php echo $this->get_field_id( 'twitter_consumer_key' ); ?>"><?php __( 'Twitter consumer/api key:', 'imagazine' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'twitter_consumer_key' ); ?>" name="<?php echo $this->get_field_name( 'twitter_consumer_key' ); ?>" type="text" value="<?php echo esc_attr( $this->twitter_consumer_key ); ?>" />
		</p>
		<p>
		<strong><small>App/Consumer secret</small></strong>
		<label for="<?php echo $this->get_field_id( 'twitter_consumer_secret' ); ?>"><?php __( 'Twitter consumer/api secret:', 'imagazine' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'twitter_consumer_secret' ); ?>" name="<?php echo $this->get_field_name( 'twitter_consumer_secret' ); ?>" type="text" value="<?php echo esc_attr( $this->twitter_consumer_secret ); ?>" />
		</p>

		</div>


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
		/*
		$value = '';
		if ( isset( $instance[ 'excerptlength' ] ) ) {
			$value = 'value="'.$instance[ 'excerptlength' ].'" ';
		}
		?>
		<p><label for="<?php echo $this->get_field_id( 'excerptlength' ); ?>">Amount of text in words:</label>
		<input type="text" size="3" <?php echo $value; ?>name="<?php echo $this->get_field_name( 'excerptlength' ); ?>" id="<?php echo $this->get_field_id( 'excerptlength' ); ?>" />
		<small>0 or empty = no text display</small></p>

		<?php
		*/
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
		$dsp_from = 0;
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

		/* Twitter */
		$instance['twitter_page_id'] = ( ! empty( $new_instance['twitter_page_id'] ) ) ? strip_tags( $new_instance['twitter_page_id'] ) : '';
		$instance['twitter_consumer_key'] = ( ! empty( $new_instance['twitter_consumer_key'] ) ) ? strip_tags( $new_instance['twitter_consumer_key'] ) : '';
		$instance['twitter_consumer_secret'] = ( ! empty( $new_instance['twitter_consumer_secret'] ) ) ? strip_tags( $new_instance['twitter_consumer_secret'] ) : '';

		/* Facebook */
		$instance['facebook_page_id'] = ( ! empty( $new_instance['facebook_page_id'] ) ) ? strip_tags( $new_instance['facebook_page_id'] ) : '';
		$instance['facebook_consumer_key'] = ( ! empty( $new_instance['facebook_consumer_key'] ) ) ? strip_tags( $new_instance['facebook_consumer_key'] ) : '';
		$instance['facebook_consumer_secret'] = ( ! empty( $new_instance['facebook_consumer_secret'] ) ) ? strip_tags( $new_instance['facebook_consumer_secret'] ) : '';

		/* Wordpress */
		$instance['wordpress_url'] = ( ! empty( $new_instance['wordpress_url'] ) ) ? strip_tags( $new_instance['wordpress_url'] ) : '';


		$instance['itemcount'] = ( ! empty( $new_instance['itemcount'] ) ) ? strip_tags( $new_instance['itemcount'] ) : '';
		$instance['itemorder'] = ( ! empty( $new_instance['itemorder'] ) ) ? strip_tags( $new_instance['itemorder'] ) : '';
		//$instance['excerptlength'] = ( ! empty( $new_instance['excerptlength'] ) ) ? strip_tags( $new_instance['excerptlength'] ) : '';
		$instance['dsp_date'] = ( ! empty( $new_instance['dsp_date'] ) ) ? strip_tags( $new_instance['dsp_date'] ) : '';
		$instance['dsp_from'] = ( ! empty( $new_instance['dsp_from'] ) ) ? strip_tags( $new_instance['dsp_from'] ) : '';
		$instance['dsp_source'] = ( ! empty( $new_instance['dsp_source'] ) ) ? strip_tags( $new_instance['dsp_source'] ) : '';

		return $instance;
	}

} // Class wpb_widget ends here








?>
