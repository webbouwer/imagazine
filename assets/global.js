/* global.js */
jQuery(function ($) {
	$(document).ready( function(){

			var $wp_custom_vars = JSON.parse(site_data['customizer']);//alert( $wp_custom_vars['imagazine_topbar_behavior_minheight'] );
			var mediumswitch = $wp_custom_vars['imagazine_global_screenmode_mediummin'];


			/* Upperbar */
			var upperbardisplaysmall = $wp_custom_vars['imagazine_upperbar_behavior_displaysmall'];
			var upperbardisplaylarge = $wp_custom_vars['imagazine_upperbar_behavior_displaylarge'];

			var upperbarwidth = $wp_custom_vars['imagazine_upperbar_behavior_width'];

			var uppermenusmallpos = $wp_custom_vars['imagazine_upperbar_menu_smallscreen'];
			var uppermenulargepos = $wp_custom_vars['imagazine_upperbar_menu_largescreen'];
			var uppermenutextalign = $wp_custom_vars['imagazine_upperbar_menu_textalign'];

			var uppersidebarsmallpos = $wp_custom_vars['imagazine_upperbar_sidebar_smallscreen'];

			var uppersidebarpos = $wp_custom_vars['imagazine_upperbar_sidebar_pos'];
			var uppersidebarwidth = $wp_custom_vars['imagazine_upperbar_sidebar_width'];
			var uppersidebaralign = $wp_custom_vars['imagazine_upperbar_sidebar_align'];
			var uppersidebarrespon = $wp_custom_vars['imagazine_upperbar_sidebar_responsive'];

			/* Topbar */
			var menusmall = $wp_custom_vars['imagazine_topbar_menu_smallscreen'];
			var menularge = $wp_custom_vars['imagazine_topbar_menu_largescreen'];


			var menu_button_html = '<div id="topmainmenubutton">MENU</div>';
			var menu_logo_html = '<li class="menu-item logo"></li>';

			var topbarbehavior = $wp_custom_vars['imagazine_topbar_behavior_position']; // relative / fixed / scroll / none
			var topbarwidth =  $wp_custom_vars['imagazine_topbar_behavior_width'];
			var toplogopos = $wp_custom_vars['imagazine_topbar_logo_position'];
			var toplogominw = $wp_custom_vars['imagazine_topbar_logo_minwidth'];
			var toplogomaxw = $wp_custom_vars['imagazine_topbar_logo_maxwidth'];

		    var topwidgetspos = $wp_custom_vars['imagazine_topbar_widgets_position'];


			var topsidebar1pos = $wp_custom_vars['imagazine_topbar_sidebars_sidebar1pos'];
			var topsidebar1width = $wp_custom_vars['imagazine_topbar_sidebars_sidebar1width'];
			var topsidebar1align = $wp_custom_vars['imagazine_topbar_sidebars_sidebar1align'];
			var topsidebar1respon = $wp_custom_vars['imagazine_topbar_sidebars_sidebar1responsive'];

			var topsidebar2pos = $wp_custom_vars['imagazine_topbar_sidebars_sidebar2pos'];
			var topsidebar2width = $wp_custom_vars['imagazine_topbar_sidebars_sidebar2width'];
			var topsidebar2align = $wp_custom_vars['imagazine_topbar_sidebars_sidebar2align'];
			var topsidebar2respon = $wp_custom_vars['imagazine_topbar_sidebars_sidebar2responsive'];

		    var headerdsptype = $wp_custom_vars['imagazine_header_display_type'];
			var headerheight = $wp_custom_vars['imagazine_header_height'];
			var headerminheight = $wp_custom_vars['imagazine_header_height'];

			var headersidebar1pos = $wp_custom_vars['imagazine_header_sidebar1pos'];
			var headersidebar1width = $wp_custom_vars['imagazine_header_sidebar1width'];
			var headersidebar1align = $wp_custom_vars['imagazine_header_sidebar1align'];
			var headersidebar1respon = $wp_custom_vars['imagazine_header_sidebar1responsive'];

			var headersidebar2pos = $wp_custom_vars['imagazine_header_sidebar2pos'];
			var headersidebar2width = $wp_custom_vars['imagazine_header_sidebar2width'];
			var headersidebar2align = $wp_custom_vars['imagazine_header_sidebar2align'];
			var headersidebar2respon = $wp_custom_vars['imagazine_header_sidebar2responsive'];


			/* main content */
			var sidebar1pos = $wp_custom_vars['imagazine_content_sidebars_sidebar1pos'];
			var sidebar1width = $wp_custom_vars['imagazine_content_sidebars_sidebar1width'];
			var sidebar1align = $wp_custom_vars['imagazine_content_sidebars_sidebar1align'];
			var sidebar1respon = $wp_custom_vars['imagazine_content_sidebars_sidebar1responsive'];

			var sidebar2pos = $wp_custom_vars['imagazine_content_sidebars_sidebar2pos'];
			var sidebar2width = $wp_custom_vars['imagazine_content_sidebars_sidebar2width'];
			var sidebar2align = $wp_custom_vars['imagazine_content_sidebars_sidebar2align'];
			var sidebar2respon = $wp_custom_vars['imagazine_content_sidebars_sidebar2responsive'];

			/* footercontent */
			var footsidebar1pos = $wp_custom_vars['imagazine_footer_sidebars_sidebar1pos'];
			var footsidebar1width = $wp_custom_vars['imagazine_footer_sidebars_sidebar1width'];
			var footsidebar1align = $wp_custom_vars['imagazine_footer_sidebars_sidebar1align'];
			var footsidebar1respon = $wp_custom_vars['imagazine_footer_sidebars_sidebar1responsive'];

			var footsidebar2pos = $wp_custom_vars['imagazine_footer_sidebars_sidebar2pos'];
			var footsidebar2width = $wp_custom_vars['imagazine_footer_sidebars_sidebar2width'];
			var footsidebar2align = $wp_custom_vars['imagazine_footer_sidebars_sidebar2align'];
			var footsidebar2respon = $wp_custom_vars['imagazine_footer_sidebars_sidebar2responsive'];




			function set_top_behavior(){


				var upperbarTop = $('#upperbarcontainer').offset().top;
				var topbarTop = $('#topbarcontainer').offset().top;
				var uh = 0;
				var th = 0;

				$('#upperspacer,#topspacer').remove();

				if( $('#upperbarcontainer').length > 0 && ( upperbardisplaysmall == 'fixed' || upperbardisplaylarge == 'fixed' ) ){
					uh = $('#upperbarcontainer').height();
					$('<div id="upperspacer" style="height:'+uh+'px;"></div>').insertAfter( $('#upperbarcontainer') );

						$('#upperbarcontainer').addClass('sticky');
				}

				if( $('#topbarcontainer').length > 0 && topbarbehavior == 'fixed' ){
					th = $('#topbarcontainer').height();
					$('<div id="topspacer" style="height:'+th+'px;"></div>').insertAfter( $('#topbarcontainer') );
				}

				$(window).scroll(function() {

					// topbar
					var windowTop = $(window).scrollTop(); // top + upperbar

					if (topbarTop < ( windowTop + uh ) && topbarbehavior == 'fixed' && !$('#topbarcontainer').hasClass('sticky') ){

						$('#topbarcontainer').addClass('sticky');
						$('#topbarcontainer').css('top', uh );

					} else if( topbarTop >= ( windowTop + uh ) && $('#topbarcontainer').hasClass('sticky') ) {

						$('#topbarcontainer').removeClass('sticky');
						$('#topbarcontainer').css('top', topbarTop );

					}


				});

			}
				/*
				var upperbarTop = $('#upperbarcontainer').offset().top;
				var topbarTop = $('#topbarcontainer').offset().top;
				var uppervoid = 0;
				var topvoid = 0;

				if( $('#wpadminbar').length > 0 ){
					uppervoid = $('#wpadminbar').outerHeight();
				}

			  	$(window).scroll(function() {

					var windowTop = $(window).scrollTop() + uppervoid;

					if (upperbarTop < windowTop  && ( upperbardisplaysmall == 'fixed' || upperbardisplaylarge == 'fixed' ) && !$('#upperbarcontainer').hasClass('sticky') ){

						$('#upperbarcontainer').addClass('sticky');
						topvoid = uppervoid + $('#upperbarcontainer').height();
						$('#pagecontainer').css('margin-top', $('#upperbarcontainer').height() );

					} else if( upperbarTop >= windowTop && $('#upperbarcontainer').hasClass('sticky') ) {

						$('#upperbarcontainer').removeClass('sticky');
						$('#pagecontainer').css('margin-top', 0 );

					}

					windowTop = $(window).scrollTop() + topvoid;
					if (topbarTop < windowTop + topvoid && topbarbehavior == 'fixed' && !$('#topbarcontainer').hasClass('sticky') ){

						$('#topbarcontainer').addClass('sticky');
						$('#topbarcontainer').css('top', topvoid );

					} else if( topbarTop >= windowTop + topvoid && $('#topbarcontainer').hasClass('sticky') ) {

						$('#topbarcontainer').removeClass('sticky');
						$('#topbarcontainer').css('top', 0 );

					}




				});

				*/


		 		/*
				var topvoid = 0;
				var topbarstickyheight = 0;

				if( $('#wpadminbar').length > 0 ){
					topvoid = $('#wpadminbar').outerHeight();
				}

				var upperbarTop = $('#upperbarcontainer').offset().top;
				var topbarTop = $('#topbarcontainer').offset().top;


			  	$(window).scroll(function() {

					var windowTop = $(window).scrollTop() + topvoid;
					//console.log(windowTop);

					if (upperbarTop < windowTop && ( upperbardisplaysmall == 'fixed' || upperbardisplaylarge == 'fixed' ) && !$('#upperbarcontainer').hasClass('sticky') ){

						$('#upperbarcontainer').addClass('sticky');
						topbarstickyheight = $('#upperbarcontainer').outerHeight();

					} else if( upperbarTop >= windowTop && $('#upperbarcontainer').hasClass('sticky') ) {

						$('#upperbarcontainer').removeClass('sticky');

					}


					if (topbarTop < ( windowTop + topbarstickyheight) && topbarbehavior == 'fixed' && !$('#topbarcontainer').hasClass('sticky')){
							$('#topbarcontainer').addClass('sticky');
							$('#topbarcontainer').css({
								"top": topbarstickyheight;
							});

						} else if( topbarTop >= windowTop && $('#topbarcontainer').hasClass('sticky') ){

						    $('#topbarcontainer').css({
								"top": 0
							});
							$('#topbarcontainer').removeClass('sticky');
						}
					}



				});
				*/
				/*
				// relative positioned element distances to top
				var upperbarTop = $('#upperbarcontainer').offset().top;
				var topbarTop = $('#upperbarcontainer').offset().top;

				// onscroll
			  	$(window).scroll(function() {
					// detect page top
					var windowTop = $(window).scrollTop();
					var topbartoppos = 0;

					// add adminbar margintop
					if( $('#wpadminbar').length > 0 ){
						topbartoppos = $('#wpadminbar').height();
					}

					// large screen
					if( $(window).width() >= mediumswitch ){

						// if upper large fixed
						if (upperbarTop < windowTop && upperbardisplaylarge == 'fixed' && !$('#upperbarcontainer').hasClass('sticky') ){

							$('#upperbarcontainer').addClass('sticky');

						} else {

							$('#upperbarcontainer').removeClass('sticky');

						}




						// topbar large screen
						// if topbar fixed
						if (topbarTop < windowTop && topbarbehavior == 'fixed' && !$('#topbarcontainer').hasClass('sticky')){
							$('#topbarcontainer').addClass('sticky');
							$('#topbarcontainer').css({
								"top": topbartoppos
							});

						} else {

						    $('#topbarcontainer').css({
								"top": 0
							});
							$('#topbarcontainer').removeClass('sticky');

						}


					// small sreen
					}else{

						// if upper small fixed
						if (upperbarTop < windowTop && upperbardisplaysmall == 'fixed' && !$('#upperbarcontainer').hasClass('sticky') ){
							$('#upperbarcontainer').css({
								"position": "fixed",
								"width": "100%",
							});
							topbartoppos += $('#upperbarcontainer').height();
							$('#upperbarcontainer').addClass('sticky');

						} else {

						    $('#upperbarcontainer').css('position', 'relative');
							$('#upperbarcontainer').removeClass('sticky');
						}




						// topbar small screen
						// if topbar fixed
						if (topbarTop < windowTop && topbarbehavior == 'fixed' && !$('#topbarcontainer').hasClass('sticky')){
							$('#topbarcontainer').css({
								"position": "fixed",
								"width": "100%",
								"top": 0
							});
							$('#topbarcontainer').addClass('sticky');

						} else {

						  $('#topbarcontainer').css({
								"position": "relative",
								"width": "100%",
								"top": 0
							});
							$('#topbarcontainer').removeClass('sticky');

						}




					}




	    		});
				*/





			function set_upperbar_elements(){

				$('#upperbarcontainer').hide();
				$('#uppermenubox').hide();

				// for medium/large screen upperbarcontainer
				if( $(window).width() >= mediumswitch ){

					if( upperbardisplaylarge != 'none' ){


						// upperbardisplaylarge fixed / relative / none

						$('#upperbarcontainer').show();

						$('#uppermenubox').parent().prepend( $('#uppersidebar') );



						// default topmainbar width
						var uppermenuwidth = 100;
						if( $('#uppersidebar').length > 0 ){

							if( uppermenulargepos != 'none' ){ // check if width shoulb be split

							// split total width for topmainbar and sidebar 1
							uppermenuwidth = uppermenuwidth - uppersidebarwidth;
							$('#uppersidebar').css({
							'width': uppersidebarwidth+'%'
							});


							// define topmainbar width and float position
							var uppermenufloat = 'left';
							if( uppersidebarpos === 'left')
							{
								uppermenufloat = 'right';
							}

							$('#uppermenubox').css({
								'width': uppermenuwidth+'%',
								'float': uppermenufloat
							});


							}
						}



					}
					if( uppermenulargepos != 'none' && uppermenulargepos != 'collapsed' ){

						$('#uppermenubox').show();

					}

				}else{

					if( upperbardisplaysmall != 'none' ){

						// upperbardisplaysmall fixed / relative / none
						$('#upperbarcontainer').show();

					}

					if( uppermenusmallpos != 'none' && uppermenusmallpos != 'collapsed' ){

						$('#uppermenubox').show();

					}


				}

			}


			function set_topbar_elements(){

				// default topmainbar width
				var mainwidth = 100;

				// before, after, collapsed, hide revert for large screen
				$('#topmainbar').parent().prepend( $('#topsidebar-2').show() );
				$('#topmainbar').parent().prepend( $('#topsidebar-1').show() );


				if( topwidgetspos == 'top'){
					$('#topmainbar').parent().prepend( $('#topwidgets') ); // top of topbar
				}else if( topwidgetspos == 'above'){
					$('#topmainbar').prepend( $('#topwidgets') ); // top of topmainbar
				}else if( topwidgetspos == 'below'){
					$('#topmainbar').append( $('#topwidgets') ); // bottom of topmainbar
				}else{
					$('#topmainbar').parent().append( $('#topwidgets') ); // bottom of topbar
				}





				// for medium/large screen
				if( $(window).width() >= mediumswitch ){ //alert($mediumswitch); alert(topsidebar1width);

					// set top sidebars
					if( $('#topsidebar-1').length > 0 ){
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
								$('#topmenu nav div div > ul > li > a').css( 'height', $('#toplogobox a img').height() );


							}else{

								// logo default (revert menu placement)
								$('#topmainbar').prepend( $('#toplogobox') );
								$('#topmenu nav div div > ul > li.logo').remove();

								if( toplogopos != 'above' && toplogopos != 'none'){
									$('#topmenu nav div div > ul > li > a').css( 'height', $('#toplogobox a img').height() );
								}else{
									$('#topmenu nav div div > ul > li > a').css( 'height', 'auto' );
								}

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
					if( $('#topsidebar-2').length > 0 ){
						if( topsidebar2respon === 'before' ){
						$('#topsidebar-2').insertBefore( $('#topmainbar') );
						}
						if( topsidebar2respon === 'after' ){
						$('#topsidebar-2').insertAfter( $('#topmainbar') );
						}
						if( topsidebar2respon === 'hide' ){
						$('#topsidebar-2').hide();
						}
					}

					if( $('#topsidebar-1').length > 0 ){
						if( topsidebar1respon === 'before' ){
						$('#topsidebar-1').insertBefore( $('#topmainbar') );
						}
						if( topsidebar1respon === 'after' ){
						$('#topsidebar-1').insertAfter( $('#topmainbar') );
						}

						if( topsidebar1respon === 'hide' ){
						$('#topsidebar-1').hide();
						}
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





			function set_header_elements(){



				if( $(window).width() >= mediumswitch ){ //alert($mediumswitch); alert(topsidebar1width);

					var mainwidth = 100;

					// before, after, collapsed, hide revert for large screen
					$('#headermainbar').parent().prepend( $('#headersidebar-2') );
					$('#headermainbar').parent().prepend( $('#headersidebar-1') );

					// set top sidebars
					if( $('#headersidebar-1').length > 0 ){
						// split total width
						mainwidth = mainwidth - headersidebar1width;
						$('#headersidebar-1').css({
						'width': headersidebar1width+'%'
						});
					}

					if( $('#headersidebar-2').length > 0 ){
						// split total width
						mainwidth = mainwidth - headersidebar2width;
						$('#headersidebar-2').css({
						'width': headersidebar2width+'%'
						});
					}

					// define topmainbar width and float position

					var mainfloat = 'left';
					if( headersidebar1pos === 'left' && headersidebar2pos === 'left')
					{
						mainfloat = 'right';
					}

					$('#headermainbar').css({
						'width': mainwidth+'%',
						'float': mainfloat
					});



					// set height
					var windowspace = $(window).height();
					if( $("upperbarcontainer").height() > 0 ){
						windowspace -= $("upperbarcontainer").height();
					}
					if( $("topbarcontainer").height() > 0 ){
						windowspace -= $("topbarcontainer").height();
					}

					if( (( windowspace / 100 ) * headerheight) > headerminheight ){
						$('#headermedia > .outermargin, #headermainbar').height( ( windowspace / 100 ) * headerheight );
					}


				}else{
					// move sidebars before, after, collapsed, hide
					if( $('#headersidebar-2').length > 0 && headersidebar2respon === 'after' ){
						$('#headersidebar-2').insertAfter( $('#headermainbar') );
					}

					if( $('#headersidebar-1').length > 0 && headersidebar1respon === 'after' ){
						$('#headersidebar-1').insertAfter( $('#headermainbar') );
					}
					// revert maincolumn/sidebars full width
					// .. todo set small width
					$('#headermainbar, #headersidebar-1, #headersidebar-2').css({
						'width': '100%',
					});

					$('#headermedia > .outermargin').height( 'auto' );

					//if( (( $(window).height() / 100 ) * headerheight) > headerminheight ){
					//	$('#headermedia > .outermargin, #headermainbar').height( ( $(window).height() / 100 ) * headerheight );
					//}else{
						$('#headermedia, #headermedia *').height('auto');
					//}


				}

				/* global set header height
				var windowspace = $(window).height();
				if( $("upperbarcontainer").height() > 0 ){
				windowspace -= $("upperbarcontainer").height();
				}
				if( $("topbarcontainer").height() > 0 ){
				windowspace -= $("topbarcontainer").height();
				}

				if( (( windowspace / 100 ) * headerheight) > headerminheight ){
				$('#headermedia > .outermargin, #headermainbar').height( ( windowspace / 100 ) * headerheight );
				}
				*/
				//$('#headermedia, #headermedia > .outermargin').height( ( $windowspace / 100 ) * headerheight );


				//if( headerdsptype == 'split' ){
				//$('#headermainbar').height( $("#headermedia").height() );
				//}
				// #headermedia .maincolumn, #headermedia .sidecolumn

			}




			function set_maincontent_elements(){

				// default topmainbar width
				var maincontentwidth = 100;

				// for medium/large screen
				if( $(window).width() >= mediumswitch ){ //alert($mediumswitch); alert(sidebar1width);

				// set top sidebars
					if( $('#sidebar').length > 0 ){

						// before, after, collapsed, hide revert for large screen
						$('#maincontent').parent().prepend( $('#sidebar-2') );
						$('#maincontent').parent().prepend( $('#sidebar') );

						// split total width for topmainbar and sidebar 1
						maincontentwidth = maincontentwidth - sidebar1width;
						$('#sidebar').css({
						'width': sidebar1width+'%'
						});
					}
					if( $('#sidebar-2').length > 0 ){
						// split total width for topmainbar and sidebar 2
						maincontentwidth = maincontentwidth - sidebar2width;
						$('#sidebar-2').css({
						'width': sidebar2width+'%'
						});
					}

					// define topmainbar width and float position
					var maincontentfloat = 'left';
					if( sidebar1pos === 'left' && sidebar2pos === 'left')
					{
						maincontentfloat = 'right';
					}

					$('#maincontent').css({
						'width': maincontentwidth+'%',
						'float': maincontentfloat
					});


				}else{ // smaller screens..

					// move sidebars before, after, collapsed, hide
					if( $('#sidebar-2').length > 0 && sidebar2respon === 'after' ){
						$('#sidebar-2').insertAfter( $('#maincontent') );
					}

					if( $('#sidebar').length > 0 && sidebar1respon === 'after' ){
						$('#sidebar').insertAfter( $('#maincontent') );
					}
					// revert maincolumn/sidebars full width
					// .. todo set small width
					$('#maincontent, #sidebar, #sidebar-2').css({
						'width': '100%',
					});

				}



			}




		function set_footer_elements(){

				// default topmainbar width
				var footercontentwidth = 100;

				// for medium/large screen
				if( $(window).width() >= mediumswitch ){ //alert($mediumswitch); alert(sidebar1width);

					// set top sidebars
					if( $('#footersidebar-1').length > 0 ){

						// split total width for topmainbar and sidebar 1
						footercontentwidth = footercontentwidth - footsidebar1width;
						$('#footersidebar-1').css({
						'width': footsidebar1width+'%'
						});
					}
					if( $('#footersidebar-2').length > 0 ){
						// split total width for topmainbar and sidebar 2
						footercontentwidth = footercontentwidth - footsidebar2width;
						$('#footersidebar-2').css({
						'width': footsidebar2width+'%'
						});
					}

					// define topmainbar width and float position
					var footercontentfloat = 'left';
					if( footsidebar1pos === 'left' && footsidebar2pos === 'left')
					{
						footercontentfloat = 'right';
					}

					$('#footermainbar.maincolumn').css({
						'width': footercontentwidth+'%',
						'float': footercontentfloat
					});


				}else{ // smaller screens..

					// move sidebars before, after, collapsed, hide
					if( $('#footersidebar-2').length > 0 && footsidebar2respon === 'after' ){
						$('#footersidebar-2').insertAfter( $('#footermainbar') );
					}

					if( $('#footersidebar-1').length > 0 && sidebar1respon === 'after' ){
						$('#footersidebar-1').insertAfter( $('#footermainbar') );
					}
					// revert maincolumn/sidebars full width
					// .. todo set small width
					$('#footermainbar, #footersidebar-1, #footersidebar-2').css({
						'width': '100%',
					});

				}

					//window.console&&console.log(footercontentwidth);


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


					// set upperbar
					set_upperbar_elements();

					// check topbar
					if($wp_custom_vars['imagazine_topbar_behavior_position'] != 'none'){
						set_topbar_elements();
					}


					// header
					set_header_elements();

					// work maincontent
					set_maincontent_elements();


					// footer
					set_footer_elements();



					// fixed topbar etc.
					set_top_behavior();
				}

			}

			// init resize end on document ready
			customizer_resizeend();

	});

});




