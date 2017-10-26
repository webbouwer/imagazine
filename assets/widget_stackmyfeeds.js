( function( $ ){
	var data = { action: 'feedstack_manager' },		// this is used in add_action('wp_ajax_', ) and add_action('wp_ajax_nopriv_', );
		$feedstackbox = $( '#feedstackcontainer' );//.slideUp(),		// find the (initially) empty DIV

		loadfeedstack = function() {
			$feedstackbox.addClass( 'spinner' );		// add a .spinner class, to show an animated .GIF
			$.post( ajaxObject.ajaxurl, data,		// ajaxObject is my namespace, assigned in wp_localize_script()
				function( response ) {				// success
					if ( response.length > 2 ){		// the ajax request might return -1 or 0
						$feedstackbox.html( response ).addClass( 'loaded' );//.slideDown(); // render the HTML and add the .loaded class to let us know

					}
				}
			).always( function() {
				$feedstackbox.removeClass( 'spinner' );	// remove the .spinner class, whether we got data or not
			} );
		}

	$( function(){								// document ready
		if ( $feedstackbox.is( ':visible' ) && !$feedstackbox.hasClass( 'loaded' ) ) // if the sidebar is not display:none and if we have not already loaded the data
			loadfeedstack();						// load!
	} );

	$(window).resize( function() {
		if ( $feedstackbox.is( ':visible' ) && !$feedstackbox.hasClass( 'loaded' ) )
			loadfeedstack();						// load again!
	} );
} )( jQuery );
