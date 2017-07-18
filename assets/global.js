/* global.js */
jQuery(function ($) {
	$(document).ready( function(){

			var $wp_custom_vars = JSON.parse(site_data['customizer']);//alert( $wp_custom_vars['imagazine_topbar_behavior_minheight'] );
			var mediumswitch = $wp_custom_vars['imagazine_global_screenmode_mediummin'];

			var menusmall = $wp_custom_vars['imagazine_topbar_menu_smallscreen'];
			var menularge = $wp_custom_vars['imagazine_topbar_menu_largescreen'];


			var menu_button_html = '<div id="topmainmenubutton">MENU</div>';
			var menu_logo_html = '<li class="menu-item logo"></li>';

			var toplogopos = $wp_custom_vars['imagazine_topbar_logo_position'];

			var toplogominw = $wp_custom_vars['imagazine_topbar_logo_minwidth'];
			var toplogomaxw = $wp_custom_vars['imagazine_topbar_logo_maxwidth'];



			var topsidebar1pos = $wp_custom_vars['imagazine_topbar_sidebars_sidebar1pos'];
			var topsidebar1width = $wp_custom_vars['imagazine_topbar_sidebars_sidebar1width'];
			var topsidebar1align = $wp_custom_vars['imagazine_topbar_sidebars_sidebar1align'];
			var topsidebar1respon = $wp_custom_vars['imagazine_topbar_sidebars_sidebar1responsive'];

			var topsidebar2pos = $wp_custom_vars['imagazine_topbar_sidebars_sidebar2pos'];
			var topsidebar2width = $wp_custom_vars['imagazine_topbar_sidebars_sidebar2width'];
			var topsidebar2align = $wp_custom_vars['imagazine_topbar_sidebars_sidebar2align'];
			var topsidebar2respon = $wp_custom_vars['imagazine_topbar_sidebars_sidebar2responsive'];


			// set outermargins
			if( $wp_custom_vars['imagazine_topbar_behavior_position'] != 'none' && $wp_custom_vars['imagazine_topbar_behavior_width'] == 'margin'){
				$( "#topbarcontainer" ).wrapInner( '<div class="outermargin"></div>');
			}





			/*
			 * on resize end function
			 */
			var rctime;
			var ctimeout = false;
			var cdelta = 200;
			$(window).resize(function() {
				rctime = new Date();
				if (ctimeout === false) {
					ctimeout = true;
					setTimeout(customizer_resizeend, cdelta);
				}
			});

			function customizer_resizeend(){

				if(new Date() - rctime < cdelta){
					setTimeout(customizer_resizeend, cdelta);
				}else{
					ctimeout = false;
					//alert('Done resizing');

					// check topbar
					if($wp_custom_vars['imagazine_topbar_behavior_position'] != 'none'){
						set_topbar_elements();
					}
				}

			}


			function set_topbar_elements(){


				// default topmainbar width
				var mainwidth = 100;

				// for medium/large screen
				if( $(window).width() >= mediumswitch ){ //alert($mediumswitch); alert(topsidebar1width);



				// set top sidebars
					if( $('#topsidebar-1').length > 0 ){

						// before, after, collapsed, hide revert for large screen
						$('#topmainbar').parent().prepend( $('#topsidebar-2') );
						$('#topmainbar').parent().prepend( $('#topsidebar-1') );

						// split total width for topmainbar and sidebar 1
						mainwidth = mainwidth - topsidebar1width;
						$('#topsidebar-1').css({
						'width': topsidebar1width+'%'
						});
					}
					if( $('#topsidebar-2').length > 0 ){
						// split total width for topmainbar and sidebar 2
						mainwidth = mainwidth - topsidebar2width;
						$('#topsidebar-2').css({
						'width': topsidebar2width+'%'
						});
					}

				// define topmainbar width and float position
					var mainfloat = 'left';
					if( topsidebar1pos === 'left' && topsidebar2pos === 'left')
					{
						mainfloat = 'right';
					}

					$('#topmainbar').css({
						'width': mainwidth+'%',
						'float': mainfloat
					});


				// default hide menu & topmainmenubutton
					$('#topmenu').hide();
					$('#topmainmenubutton').remove();

				// menu placement
					if( menularge != 'none' && menularge != 'collapsed'){

							// menu available
							$('#topmenu').show();

							//  logo positioning inside
							if( toplogopos == 'middle'){

								// compute menu middle
								var total_menu_items = $('#topmenu nav div div > ul > li').length;
								var middle = Math.ceil(total_menu_items / 2);
								// place logo menu html wrapper in menu list
								if( $('#topmenu nav div div > ul li.logo').length < 1){
									$('#topmenu nav div div > ul > li:nth-child(' + middle + ')').after( $( menu_logo_html ) );
								}
								// move logo inside menu html wrapper
								$('#topmenu nav div div > ul li.logo').append( $('#toplogobox') );

								// adjust menu height to logo
								// .. todo: logo min height
								$('#topmenu nav div div > ul > li > a').css( 'height', $('#toplogobox a').height() );


							}else{

								// logo default (revert menu placement)
								$('#topmainbar').prepend( $('#toplogobox') );
								$('#topmenu nav div div > ul > li.logo').remove();
								$('#topmenu nav div div > ul > li > a').css( 'height', 'auto' );

							}


					}else{

						// do not show menu, place menu button
						if( menularge == 'collapsed' ){
							$('#topmainbar').append( menu_button_html );
						}

					}



				}else{ // smaller screens..

					// logo default
					$('#topmainbar').prepend( $('#toplogobox') );
					$('li.logo').remove();
					$('#topmenu nav div div > ul > li > a').css( 'height', 'auto' );

					// move sidebars before, after, collapsed, hide
					if( $('#topsidebar-2').length > 0 && topsidebar2respon === 'after' ){
						$('#topsidebar-2').insertAfter( $('#topmainbar') );
					}

					if( $('#topsidebar-1').length > 0 && topsidebar1respon === 'after' ){
						$('#topsidebar-1').insertAfter( $('#topmainbar') );
					}
					// revert maincolumn/sidebars full width
					// .. todo set small width
					$('#topmainbar, #topsidebar-1, #topsidebar-2').css({
						'width': '100%',
					});


					// default hide menu & topmainmenubutton
					$('#topmenu').hide();
					$('#topmainmenubutton').remove();

					// menu placement
					if( menusmall != 'none' && menusmall != 'collapsed'){

						// menu available
						$('#topmenu').show();

					}else{

						// do not show menu, place menu button
						if( menusmall == 'collapsed' ){
							$('#topmainbar').append( menu_button_html );
						}

					}

				}


			}

			// init resize end on document ready
			customizer_resizeend();

	});

});




