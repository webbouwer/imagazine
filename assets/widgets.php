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

?>
