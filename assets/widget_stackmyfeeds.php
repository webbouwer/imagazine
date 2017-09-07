<?php

/*
 *  Stack my feeds
 */
class imagazine_stackmyfeeds_widget extends WP_Widget {


	public $feedstack = '';
	public $wordpressdata = '';
	public $facebookdata = '';
	public $twitterdata = '';


	public $stack_max = '';
	public $stack_order = '';

	private $wordpress_url = '';   // requires wordpress website url

	private $facebook_page_id = ''; // requires user/page key
    private $facebook_consumer_key = ''; // requires app id
	private $facebook_consumer_secret = ''; // requires app secret

	private $twitter_page_id = ''; // requires consumer key
    private $twitter_consumer_key = ''; // requires consumer key
    private $twitter_consumer_secret = ''; // requires consumer secret


	function __construct() {

		parent::__construct(
			'imagazine_stackmyfeeds_widget', // Base ID
			__('Imagazine Stack my Feeds Widget', 'imagazine'), // Widget name and description in UI
			array( 'description' => __( 'Imagazine Widget listing various of messaging channels (in development)', 'imagazine' ), )
		);


		// prepare ajax javascript
		wp_enqueue_script( 'stack_my_feeds_js', get_template_directory_uri() . '/assets/widget_stackmyfeeds.js', array( 'jquery' ), false, true );
		wp_localize_script( 'stack_my_feeds_js', 'ajaxObject', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

		// prepare ajax source function


		add_action('wp_ajax_feedstack_manager',     array($this,'feedstack_manager'));
  		add_action('wp_ajax_nopriv_feedstack_manager',    array($this,'feedstack_manager'));

	}




	/*
	 * WP json
	 */
	public function feedstack_manager( ){




		/* use child class for settings */
		$newstack = new imagazine_stackmyfeeds_widget();
 		$settings = $newstack->get_settings();
		unset($newstack);
		$var = $settings[$this->number];





		/* feed widget settings variables */
		$this->stack_max = 12;
		if( !empty($var['stack_max']) )
		$this->stack_max = $var['stack_max'];

		$this->stack_order = 'DESC';
		if( !empty($var['stack_order']) )
		$this->stack_order = $var['stack_order'];

		/* feed access variables */
		$this->wordpress_url = $var['wordpress_url'];

		$this->facebook_page_id = $var['facebook_page_id'];
		$this->facebook_consumer_key = $var['facebook_consumer_key'];
		$this->facebook_consumer_secret = $var['facebook_consumer_secret'];

		$this->twitter_page_id = $var['twitter_page_id'];
		$this->twitter_consumer_key = $var['twitter_consumer_key'];
		$this->twitter_consumer_secret = $var['twitter_consumer_secret'];

		//..








		/* retrieve feeds */
		$this->feedstack = array();

		if( $this->wordpress_url != '' )
			$this->wordpressdata = $this->get_wordpress_json_to_array();
		if( $this->facebook_page_id != '' )
			$this->facebookdata = $this->get_facebook_json_to_array();
		if( $this->twitter_page_id != '' )
			$this->twitterdata = $this->get_twitter_json_to_array();

		//..








		/* filter feed stack */
		function orderbydate($a, $b){
    		$ad = strtotime($a['pubdate']);
    		$bd = strtotime($b['pubdate']);
    		return ($ad-$bd);
		}
		usort($this->feedstack, 'orderbydate');

		if( $this->stack_order == 'ASC' ){
			// set recent on top
			$this->feedstack = array_reverse( $this->feedstack );
			// shorten stack
			$this->feedstack = array_slice($this->feedstack, 0, $this->stack_max);
			// reverse to oldest first
			$this->feedstack = array_reverse( $this->feedstack );
		}

		if( $this->stack_order == 'DESC' ){

		$this->feedstack = array_reverse( $this->feedstack );

		}




		/* output stack html */
		$count = 0;

		$output = '<ul>';

		foreach($this->feedstack as $msg){


			if( $count++ >= $this->stack_max ) break;

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
				// show available description
				//if( !empty( $msg['description'] ) ){
				//$output .= '<p>'.$msg['description'].'</p>';
				//}

			}

			if( !empty($msg['title']) || !empty($msg['description']) ){

			$output .= $msg['pubdate'];

			$output .= ' on '.$msg['source'];

			}

			$output .= '</li>';


		} // end output loop


		$output .= '</ul>';

		echo $output;

		die();
	}
	//https://wordpress.stackexchange.com/questions/2091/using-widget-options-outside-the-widget







	/*
	 * Wordpress json
	 */
	public function get_wordpress_json_to_array(){
		//echo $this->wordpress_url;

		/* Wordpress */
		if( isset( $this->wordpress_url ) ){

		echo $this->wordpress_url;
		$json = file_get_contents($this->wordpress_url.'/wp-json/wp/v2/posts?per_page='.$this->stack_max);
		$WPdata = json_decode($json);
			if( count($WPdata) > 0 && is_array($WPdata) ){
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

				// add to bundle
				$this->feedstack = array_merge($this->feedstack,$arr);
				// single stack
				return $arr;

			}else{

			  	return array('error'=>'Failed retrieving Wordpress feeds');
			}

		}else{

			return array('error'=>'No Wordpress url');

		}

	}






	/*
	 * Facebook json
	 */

	public function get_facebook_json_to_array(){

		/* Facebook */
		if( isset( $this->facebook_page_id ) && isset( $this->facebook_consumer_key ) && isset( $this->facebook_consumer_secret ) ){


			$tokenurl = 'https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id='.$this->facebook_consumer_key.'&client_secret='.$this->facebook_consumer_secret;
			$pre_token = file_get_contents($tokenurl);


			//Interpret token with JSON
			$token = json_decode($pre_token, true);

			$endpoint = 'https://graph.facebook.com/'.$this->facebook_page_id.'/feed';
			$endpoint .= '?fields=id,type,status_type,updated_time,created_time,story,description,picture,from,link,likes.summary(true)';
			$endpoint .= '&limit='.$this->stack_max;

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
				$this->feedstack = array_merge($this->feedstack,$arr);
			  return $arr;

			}else{

			  return array('error'=>'Failed retrieving Facebook feeds');

			}

		}else{

			  return array('error'=>'Facebook credentials incomplete');

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

			$endpoint = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$this->twitter_page_id.'&include_entities=false&count='.$this->stack_max;

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


				$this->feedstack = array_merge($this->feedstack,$arr);

				return $arr;

			}else{
			  	return array('error'=>'Failed retrieving Twitter feeds', 'desc'=>'');
			}
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














	// Widget front-end
	public function widget( $args, $instance ) {

		// before
		echo $args['before_widget'];

		$title = apply_filters( 'widget_title', $instance['title'] );
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

		//echo 'testing!';
		echo '<div id="feedstackcontainer"></div>';

		// after
		echo $args['after_widget'];

	}


	// Widget Backend
	public function form( $instance ) {

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
		<?php
		// set stack max

		$stack_max = 'value="12" ';
		if ( isset( $instance[ 'stack_max' ] ) ) {
			$stack_max = 'value="'.$instance[ 'stack_max' ].'" ';
		}
		?>
		<p><label for="<?php echo $this->get_field_id( 'stack_max' ); ?>">Amount feeds to stack:</label>
		<input type="text" size="3" <?php echo $stack_max; ?>name="<?php echo $this->get_field_name( 'stack_max' ); ?>" id="<?php echo $this->get_field_id( 'stack_max' ); ?>" />
		</p>

		<?php
		$stack_order = 'DESC';
		if ( isset( $instance[ 'stack_order' ] ) ) {
		$stack_order = $instance[ 'stack_order' ];
		}
		?>
		<p><label for="<?php echo $this->get_field_id( 'stack_order' ); ?>">List order:</label>
		<select name="<?php echo $this->get_field_name( 'stack_order' ); ?>" id="<?php echo $this->get_field_id( 'stack_order' ); ?>">
		<option value="DESC" <?php selected( $stack_order, 'DESC' ); ?>>Most recent</option>
		<option value="ASC" <?php selected( $stack_order, 'ASC' ); ?>>Oldest first</option>
		</select>
		</p>

		<?php
		/* Wordpress */
		if(isset($instance['wordpress_url']) && $instance['wordpress_url'] !='' )
			$this->wordpress_url = $instance['wordpress_url']; // user/page key
		?>

		<strong>Wordpress</strong>
		<p>
		<strong><small>Wordpress website url</small></strong>
		<label for="<?php echo $this->get_field_id( 'wordpress_url' ); ?>"><?php __( 'Wordpress Posts url:', 'imagazine' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'wordpress_url' ); ?>" name="<?php echo $this->get_field_name( 'wordpress_url' ); ?>" type="text" value="<?php echo esc_attr( $this->wordpress_url ); ?>" />
		</p>

		<?php

		/* Facebook */
		if(isset($instance['facebook_page_id']) && $instance['facebook_page_id'] !='' )
			$this->facebook_page_id = $instance['facebook_page_id']; // user/page key
		if(isset($instance['facebook_consumer_key']) && $instance['facebook_consumer_key'] !='' )
			$this->facebook_consumer_key = $instance['facebook_consumer_key']; // app id
		if(isset($instance['facebook_consumer_secret']) && $instance['facebook_consumer_secret'] !='' )
			$this->facebook_consumer_secret = $instance['facebook_consumer_secret']; // app secret

		?>

		<strong>Facebook</strong>
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

		<?php


		/* Twitter */
		if(isset($instance['twitter_page_id']) && $instance['twitter_page_id'] !='' )
			$this->twitter_page_id = $instance['twitter_page_id']; // page/user id key
		if(isset($instance['twitter_consumer_key']) && $instance['twitter_consumer_key'] !='' )
			$this->twitter_consumer_key = $instance['twitter_consumer_key']; // consumer key
		if(isset($instance['twitter_consumer_secret']) && $instance['twitter_consumer_secret'] !='' )
			$this->twitter_consumer_secret = $instance['twitter_consumer_secret']; // consumer secret
		?>
		<strong>Twitter </strong>
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
		<?php
	}


	// Updating widget instances
	public function update( $new_instance, $old_instance ) {

		$instance = array();
		/* wp widget */
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		/* widget settings */
		$instance['stack_max'] = ( ! empty( $new_instance['stack_max'] ) ) ? strip_tags( $new_instance['stack_max'] ) : '';
		$instance['stack_order'] = ( ! empty( $new_instance['stack_order'] ) ) ? strip_tags( $new_instance['stack_order'] ) : '';

		/* Wordpress */
		$instance['wordpress_url'] = ( ! empty( $new_instance['wordpress_url'] ) ) ? strip_tags( $new_instance['wordpress_url'] ) : '';
		/* Facebook */
		$instance['facebook_page_id'] = ( ! empty( $new_instance['facebook_page_id'] ) ) ? strip_tags( $new_instance['facebook_page_id'] ) : '';
		$instance['facebook_consumer_key'] = ( ! empty( $new_instance['facebook_consumer_key'] ) ) ? strip_tags( $new_instance['facebook_consumer_key'] ) : '';
		$instance['facebook_consumer_secret'] = ( ! empty( $new_instance['facebook_consumer_secret'] ) ) ? strip_tags( $new_instance['facebook_consumer_secret'] ) : '';
		/* Twitter */
		$instance['twitter_page_id'] = ( ! empty( $new_instance['twitter_page_id'] ) ) ? strip_tags( $new_instance['twitter_page_id'] ) : '';
		$instance['twitter_consumer_key'] = ( ! empty( $new_instance['twitter_consumer_key'] ) ) ? strip_tags( $new_instance['twitter_consumer_key'] ) : '';
		$instance['twitter_consumer_secret'] = ( ! empty( $new_instance['twitter_consumer_secret'] ) ) ? strip_tags( $new_instance['twitter_consumer_secret'] ) : '';

		return $instance;

	}

}

/* Notes

ajax var in class
https://wordpress.stackexchange.com/questions/112203/ajaxing-function-in-widget-class
http://www.pvgr.eu/en/article/loading-a-wordpress-sidebar-with-ajax/

*/
?>
