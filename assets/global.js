/* global.js */
jQuery(function ($) {
	$(document).ready( function(){

			var $wp_custom_vars = JSON.parse(site_data['customizer']);

			//alert( $wp_custom_vars['imagazine_topbar_behavior_minheight'] );

			// check topbar
			if($wp_custom_vars['imagazine_topbar_behavior_position'] != 'none'){



			// set outermargins
			if( $wp_custom_vars['imagazine_topbar_behavior_width'] == 'margin'){
				//$('#topbarcontainer')
				$( "#topbarcontainer" ).wrapInner( '<div class="outermargin"></div>');
			}






			}
			//alert( $wp_custom_vars['imagazine_topbar_behavior_width'] );

	});

});
