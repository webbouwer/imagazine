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

			var topbarlargebehavior = $wp_custom_vars['imagazine_topbar_behavior_largeposition']; // relative / fixed / scroll / none
			var topbarsmallbehavior = $wp_custom_vars['imagazine_topbar_behavior_smallposition']; // relative / fixed / scroll / none
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

				var tsp = 0;

				if( $('#wpadminbar').length > 0 ){
					$('#wpadminbar').css('top', 0 );
					$('#wpadminbar').css('position', 'fixed');
					tsp = $('#wpadminbar').outerHeight();
				}

				var ut = tsp;

				if( $('#upperbarcontainer').length > 0 ){

					// fixed positioning
					if( ( $(window).width() < mediumswitch  && upperbardisplaysmall == 'fixed' ) || ( $(window).width() >= mediumswitch && upperbardisplaylarge == 'fixed' ) ){

						if( !$('#upperbarcontainer').hasClass('sticky') ){

							// set absolute pos on nst
							$('#upperbarcontainer').css('top', ut);

							// set next sticky top
							var uh = $('#upperbarcontainer').outerHeight();
							tsp += uh;

							// insert relative spacer div
							$('<div id="upperspacer" style="height:'+uh+'px;"></div>').insertAfter( $('#upperbarcontainer') );

							// set fixed
							$('#upperbarcontainer').addClass('sticky');

						}

					}else{

						if( $('#upperbarcontainer').hasClass('sticky') ){
							// set next sticky top
							var uh = $('#upperbarcontainer').outerHeight();

							// revert absolute pos on tsp
							tsp -= uh;

							// relative or none positioning
							$('#upperbarcontainer').removeClass('sticky');

							// set relative pos
							$('#upperbarcontainer').css('top', 0);

							// remove spacer
							$('#upperspacer').remove();
						}
					}


				}






				if( $('#topbarcontainer').length > 0 ){

					if( ( $(window).width() < mediumswitch && topbarsmallbehavior == 'fixed' ) || ( $(window).width() >= mediumswitch && topbarlargebehavior == 'fixed') ){


						// get offsets
						var topbarTop = $('#topbarcontainer').offset().top;

						// get topbarcontainer height
						var th = $('#topbarcontainer').outerHeight();

						// fixed on top after scrolling upperbar height

							// onscroll
							$(window).scroll(function(){

								// get scroll top position
								var windowTop = $(window).scrollTop() + tsp;

								// check topbar position
								if ( topbarTop < windowTop && !$('#topbarcontainer').hasClass('sticky') ){

									// set absolute pos on nst
									$('#topbarcontainer').css('top', tsp);

									// insert relative spacer div
									$('<div id="topspacer" style="height:'+th+'px;"></div>').insertAfter( $('#topbarcontainer') );

									// set sticky
									$('#topbarcontainer').addClass('sticky');

								}else if( topbarTop >= windowTop && $('#topbarcontainer').hasClass('sticky') ) {

									// remove sticky
									$('#topbarcontainer').removeClass('sticky');

									// set absolute pos return
									$('#topbarcontainer').css('top', 0);

									// remove spacer
									$('#topspacer').remove();

								}

							});


					}else{

									// remove sticky
									$('#topbarcontainer').removeClass('sticky');

									// remove spacer
									$('#topspacer').remove();

					}

				}
			}


				/*
				// adminbar on top
				var nst = 0; // window top - uppervoid
				if( $('#wpadminbar').length > 0 ){
					$('#wpadminbar').css('top', 0 );
					$('#wpadminbar').css('position', 'fixed');
					nst = $('#wpadminbar').outerHeight();
				}

				// remove spacers
				$('#upperspacer,#topspacer').remove();

				// onresize set variables
				if( $('#upperbarcontainer').length > 0 ){

					// fixed positioning
					if( ( $(window).width() < mediumswitch  && upperbardisplaysmall == 'fixed' ) || ( $(window).width() >= mediumswitch && upperbardisplaylarge == 'fixed' ) ){

						// set absolute pos on nst
						$('#upperbarcontainer').css('top',nst);

						// set next sticky top
						var uh = $('#upperbarcontainer').outerHeight();
						nst += uh;

						// insert relative spacer div
						$('<div id="upperspacer" style="height:'+uh+'px;"></div>').insertAfter( $('#upperbarcontainer') );

						// set fixed
						$('#upperbarcontainer').addClass('sticky');

					}else{

						// relative or none positioning
						$('#upperbarcontainer').removeClass('sticky');

						$('#upperspacer').remove();
					}


				}

				if( $('#topbarcontainer').length > 0 ){

					if( ( $(window).width() < mediumswitch && topbarsmallbehavior == 'fixed' ) || ( $(window).width() >= mediumswitch && topbarlargebehavior == 'fixed') ){


						// get offsets
						var upperbarTop = $('#upperbarcontainer').offset().top;
						var topbarTop = $('#topbarcontainer').offset().top;

						// get topbarcontainer height
						var th = $('#topbarcontainer').outerHeight();

						// fixed on top after scrolling upperbar height
						if( $('#upperbarcontainer').length > 0 ){

							// onscroll
							$(window).scroll(function(){

								// get scroll top position
								var windowTop = $(window).scrollTop();

								// check topbar position
								if ( ( topbarTop - nst )  < windowTop && !$('#topbarcontainer').hasClass('sticky') ){

									// set absolute pos on nst
									$('#topbarcontainer').css('top',nst);

									// insert relative spacer div
									$('<div id="topspacer" style="height:'+th+'px;"></div>').insertAfter( $('#topbarcontainer') );

									// set sticky
									$('#topbarcontainer').addClass('sticky');

								}else if( ( topbarTop - nst ) >= windowTop && $('#topbarcontainer').hasClass('sticky') ) {

									// remove sticky
									$('#topbarcontainer').removeClass('sticky');

									// remove spacer
									$('#topspacer').remove();

								}


							});


						}else{ // fixed on top directly

								// insert relative spacer div
								$('<div id="topspacer" style="height:'+th+'px;"></div>').insertAfter( $('#topbarcontainer') );

								// set sticky
								$('#topbarcontainer').addClass('sticky');


						}



					}else{
								// remove sticky
								$('#topbarcontainer').removeClass('sticky');

								// remove spacer
								$('#topspacer').remove();

					}

				}*/




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
				if( $(window).width() >= mediumswitch ){
					if( topbarlargebehavior == 'none' ){
						$('#topbarcontainer').hide();
					}else{
						$('#topbarcontainer').show();
					}
				}else{
					if( topbarsmallbehavior == 'none' ){
						$('#topbarcontainer').hide();
					}else{
						$('#topbarcontainer').show();
					}
				}

				if( ( $(window).width() < mediumswitch && topbarsmallbehavior != 'none') || ( $(window).width() >= mediumswitch && topbarlargebehavior != 'none') ){//$wp_custom_vars['imagazine_topbar_behavior_position'] != 'none'){

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

				} //


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


		$(window).load(function() {
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
					set_topbar_elements();


					// fixed topbar etc.
					set_top_behavior();


					// header
					set_header_elements();

					// work maincontent
					set_maincontent_elements();


					// footer
					set_footer_elements();


				}

			}

			// init resize end on document ready
			customizer_resizeend();

		}); //end onload

	}); //end on ready

}); // end jquery




