/* global.js */
jQuery(function ($) {


	$(document).ready( function(){

			var $wp_custom_vars = JSON.parse(site_data['customizer']);//alert( $wp_custom_vars['imagazine_topbar_behavior_minheight'] );

			//alert( JSON.stringify( $wp_custom_vars ) );
            var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;

			var mediumswitch = 580;
			var largeswitch = 1150;
            var maxpagewidth = $wp_custom_vars['imagazine_global_screenmode_pagemaxwidth'];
            var pagewidth = $wp_custom_vars['imagazine_global_screenmode_pagewidth'];

			if( $wp_custom_vars['imagazine_global_screenmode_mediummin'] && $wp_custom_vars['imagazine_global_screenmode_mediummin'] > 580 ){
			mediumswitch = $wp_custom_vars['imagazine_global_screenmode_mediummin'];
			}
			if( $wp_custom_vars['imagazine_global_screenmode_largemin'] && $wp_custom_vars['imagazine_global_screenmode_largemin'] > 1150 ){
			largeswitch = $wp_custom_vars['imagazine_global_screenmode_largemin'];
			}
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
            var menu_button_more = '<li class="menubutton"><a href="">more</a></li>';

            var menu_overflow_box = '<ul class="overflow"></ul>';
			var menu_logo_html = '<li class="menu-item logo"></li>';

			var topbarlargebehavior = $wp_custom_vars['imagazine_topbar_behavior_largeposition']; // relative / fixed / scroll / none
			var topbarsmallbehavior = $wp_custom_vars['imagazine_topbar_behavior_smallposition']; // relative / fixed / scroll / none
            var topbaranimationspeed = parseInt($wp_custom_vars['imagazine_topbar_behavior_anispeed']);

			var topbarwidth =  $wp_custom_vars['imagazine_topbar_behavior_width'];
			var toplogopos = $wp_custom_vars['imagazine_topbar_logo_position'];
			var toplogominw = $wp_custom_vars['imagazine_topbar_logo_minwidth'];
			var toplogomaxw = $wp_custom_vars['imagazine_topbar_logo_maxwidth'];
			var topbarminheight = $wp_custom_vars['imagazine_topbar_behavior_minheight'];
			var topbarmaxheight = $wp_custom_vars['imagazine_topbar_behavior_maxheight'];
			var topbarscroll = $wp_custom_vars['imagazine_topbar_behavior_scroll'];
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



		 	/* logo shape instance */
			var lbform = $("#toplogobox img").clientWidth / $("#toplogobox img").clientHeight;




            // default hide menu & topmainmenubutton
            //$('#topmenu').hide();
            function check_overflow_x( element, margin = 0){

                if( $('#pagecontainer ul.overflow').length < 1 ){
                    $('#pagecontainer').append('<div id="menucloak"></div>');
                    $('#pagecontainer #menucloak').append( menu_overflow_box );
                }
                if( element.parent().find('li.menubutton').length < 1 ){
                    //element.append( menu_button_more );
                }

                var tw = margin;
                var ow = element.width();
                $.each( element.children(), function(ind, obj){
                    tw += $(this).outerWidth();
                });
                if ( ow < tw ) { //console.log( ow +' vs '+ tw + ');
                    return true;
                }
                return false;

            }

            function set_topmenu_behavior(){

                //$('ul.overflow').hide();
                $('ul.overflow').removeClass('active');
                if( $(window).outerWidth() >= mediumswitch ){

                    var el = $('#topmenu ul.menu');

                    // medium/large
                    if( menularge != 'none' && menularge != 'collapsed'){

                        var m = $('#toplogobox').outerWidth();

                        if( $(window).outerWidth() >= largeswitch ){
                            $('#pagecontainer ul.overflow').children().appendTo($('#topmenu ul.menu'));
                        }

                        if( check_overflow_x( el, m ) ){


                            el.children().not('.menubutton').last().prependTo($('#pagecontainer ul.overflow'));
                            //$('#topmainbar ul.menu .menubutton').css({ 'display': 'table-cell', 'height': $('#topmainbar').height() });
                            $('#topmainbar ul.menu .menubutton').show();



                        }else{
                            var m = $('#toplogobox').outerWidth() + $('#pagecontainer ul.overflow').children().first().outerWidth();
                            if( !check_overflow_x( el, m ) ){
                                $('#pagecontainer ul.overflow').children().first().appendTo($('#topmenu ul.menu'));
                                $('#topmainbar ul.menu .menubutton').appendTo( $('#topmainbar ul.menu') );
                                if( $('#pagecontainer ul.overflow').children().length < 1 ) {
                                    $('#topmainbar ul.menu .menubutton').hide();
                                }
                            }

                        }

						// menu available
						el.show();

                    }else{
                        if( menularge == 'collapsed'){
                            el.children().not('.menubutton').prependTo($('#pagecontainer ul.overflow'));
                            $('#topmainbar ul.menu .menubutton').show();
                        }else{
                            //el.hide();
                        }
                    }

                }else{

                    // small- if( menusmall != 'none' && menusmall != 'collapsed'){
                       $('#topmenu ul.menu').children().not('.menubutton').prependTo($('#pagecontainer ul.overflow'));
					   $('#topmainbar ul.menu .menubutton').show();

                }

                set_topbar_elements();

            }



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

					if( ( $(window).width() < mediumswitch && ( topbarsmallbehavior == 'fixed' || topbarsmallbehavior == 'overflow' ) )
                       || ( $(window).width() >= mediumswitch && ( topbarlargebehavior == 'fixed' || topbarlargebehavior == 'overflow') ) ) {


						// get offsets
						var topbarTop = $('#topbarcontainer').offset().top;
						// get topbarcontainer height
						var th = $('#topbarcontainer').outerHeight();


						// fixed on top after scrolling upperbar height

							// onscroll
							$(window).scroll(function(e){

								//e.preventDefault();
								if( $('#toplogobox img,#topmenu, #topmenu nav div div > ul > li > a, #toplogobox a').is(':animated') ) {
									e.preventDefault();
									e.stopPropagation();
									return false;
								}


                                    // get scroll top position
                                    var windowTop = $(window).scrollTop() + tsp;

                                    // check topbar position
                                    if ( topbarTop < ( windowTop  ) && !$('#topbarcontainer').hasClass('sticky') ){

                                        // set absolute pos on nst
                                        $('#topbarcontainer').css('top', tsp);

                                        // insert relative spacer div
                                        if( topbarlargebehavior == 'fixed'){
                                            $('<div id="topspacer" style="height:'+th+'px;"></div>').insertBefore( $('#topbarcontainer') );
                                        }
                                        // set sticky
                                        $('#topbarcontainer').addClass('sticky');


                                        if(topbarscroll == 'mini' && !iOS && $(window).width() >= mediumswitch ){

                                            //clearTimeout($.data(this, 'scrollTimer'));
                                            //$.data(this, 'scrollTimer', setTimeout(function() {


                                            // only if medium/large screen set menu height
                                            $("#toplogobox img").animate({
                                              width: toplogominw+'px'
                                            }, topbaranimationspeed );
                                            $("#topmenu, #topmenu nav div div > ul > li > a, #topmenu .menubutton, #toplogobox a, #topspacer").animate({ height: topbarminheight }, topbaranimationspeed );

                                            //}, 0)); // endscroll
                                        }


                                    }else if( topbarTop >= windowTop && $('#topbarcontainer').hasClass('sticky') ) {

                                        // remove spacer
                                        $('#topspacer').remove();


                                        // only if medium/large screen set menu height
                                        if(topbarscroll == 'mini' && !iOS && $(window).width() >= mediumswitch){
                                            //clearTimeout($.data(this, 'scrollTimer'));
                                            //$.data(this, 'scrollTimer', setTimeout(function() {
                                            $("#toplogobox img").animate({
                                              width: toplogomaxw+'px'
                                            }, topbaranimationspeed );

                                            $("#topmenu, #topmenu nav div div > ul > li > a, #topmenu .menubutton, #toplogobox a, #topspacer").animate({ height: topbarmaxheight  }, topbaranimationspeed );

                                            //}, 0)); // endscroll
                                        }

                                        // remove sticky
                                        $('#topbarcontainer').removeClass('sticky');

                                        if( //( $(window).width() < mediumswitch && ( topbarsmallbehavior == 'fixed') ) ||
                                           ( $(window).width() >= mediumswitch && ( topbarlargebehavior == 'fixed') ) || $('#upperbarcontainer').length < 1 ){
                                            // set absolute pos return
                                            $('#topbarcontainer').css('top', 0);
                                        }else if( (  //( $(window).width() < mediumswitch && ( topbarsmallbehavior == 'overflow') ) ||
                                           ( $(window).width() >= mediumswitch && ( topbarlargebehavior == 'overflow') ) )){
                                            // set absolute pos return
                                            $('#topbarcontainer').css('top', $('#upperbarcontainer').outerHeight() );
                                        }else if( $(window).width() < mediumswitch && topbarsmallbehavior == 'fixed' && $('#upperbarcontainer').length > 0 ){
                                            // set absolute pos return
                                            $('#topbarcontainer').css('top', $('#upperbarcontainer').outerHeight() );
                                        }

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

                            if( uppersidebarrespon == 'before' ){
                                $('#uppermenubox').parent().prepend( $('#uppersidebar') );
                            }
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
						$('#topsidebar-1 .collapsed').slideDown();
					}
					if( $('#topsidebar-2').length > 0 ){
						// split total width for topmainbar and sidebar 2
						mainwidth = mainwidth - topsidebar2width;
						$('#topsidebar-2').css({
						'width': topsidebar2width+'%'
						});
						$('#topsidebar-2 .collapsed').slideDown();
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


				///	$('#topmainmenubutton').remove();

				// menu placement
					if( menularge != 'none' && menularge != 'collapsed'){

							// menu available
							$('#topmenu').show();

							//var topnavheight = ( $('#toplogobox').outerHeight() > topbarminheight ? $('#toplogobox').outerHeight() : topbarminheight);

							//  logo positioning inside
							if( toplogopos == 'middle'){

								// compute menu middle
								var total_menu_items = $('#topmenu nav div div > ul > li').length;
								var middle = Math.ceil( total_menu_items / 2 ) -1;

								// place logo menu html wrapper in menu list
								if( $('#topmenu nav div div > ul li.logo').length < 1){
									$('#topmenu nav div div > ul > li:nth-child(' + middle + ')').after( $( menu_logo_html ) );
								}
								// move logo inside menu html wrapper
								$('#topmenu nav div div > ul li.logo').append( $('#toplogobox') );
								// adjust menu height to logo
								// .. todo: logo min height
									$('#topmenu, #topmenu nav div div > ul > li > a').css( 'height', topbarmaxheight  );
									$('#toplogobox > a').css( 'height', topbarmaxheight  );

							}else{

								// logo default (revert menu placement)
								$('#topmainbar').prepend( $('#toplogobox') );
								$('#topmenu nav div div > ul > li.logo').remove();

								if( toplogopos != 'above' && toplogopos != 'none'){

									$('#topmenu, #topmenu nav div div > ul > li > a').css( 'height', topbarmaxheight  );
									$('#toplogobox > a').css( 'height', topbarmaxheight  );

								}else{

									$('#topmenu, #topmenu nav div div > ul > li > a, #toplogobox > a').css( 'height', topbarminheight );

								}

							}



					}else{

						// do not show menu, place menu button
						/*if( menularge == 'collapsed' ){
							$('#topmainbar').append( menu_button_html );
						}
                        */

					}



				}else{ // smaller screens..



					// logo default
					$('#topmainbar').prepend( $('#toplogobox') );
					$('li.logo').remove();
					$('#topmenu, #topmenu nav div div > ul > li > a, #topmenu nav div div > ul > li > #toplogobox > a, #overflow li a').css( 'height', 'auto' );


					// move sidebars before, after, collapsed, hide
					if( $('#topsidebar-2').length > 0 ){
						if( topsidebar2respon === 'before' ){
							$('#topsidebar-2').insertBefore( $('#topmainbar') );
						}
						if( topsidebar2respon === 'after' ){
							$('#topsidebar-2').insertAfter( $('#topmainbar') );
						}
						if( topsidebar2respon === 'collapsed' ){
							$('#topsidebar-2').insertAfter( $('#topmainbar') );
							$('#topsidebar-2 .widget-contentbox').addClass('collapsed').slideUp();
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
						if( topsidebar1respon === 'collapsed' ){
							$('#topsidebar-1').insertAfter( $('#topmainbar') );
							$('#topsidebar-1 .widget-contentbox').addClass('collapsed').slideUp();
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
					/*$('#topmenu').hide();
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
                    */
				} // end smaller screens

				} // end if upperbar / topbar available


			} // end function





			function set_header_elements(){


                if( $('#headermedia').length > 0 && ( topbarsmallbehavior == 'overflow' || topbarlargebehavior == 'overflow' ) ){
                    // set topbar padding
                    $('#headermedia').css('padding-top', $('#topbarcontainer').outerHeight() );
                }


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
						$('#headersidebar-1 .collapsed').removeClass('collapsed').slideDown();
					}

					if( $('#headersidebar-2').length > 0 ){
						// split total width
						mainwidth = mainwidth - headersidebar2width;
						$('#headersidebar-2').css({
						'width': headersidebar2width+'%'
						});
						$('#headersidebar-2 .collapsed').removeClass('collapsed').slideDown();
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
						windowspace -= $("upperbarcontainer").outerHeight();
					}
					if( $("topbarcontainer").height() > 0 ){
						windowspace -= $("topbarcontainer").outerHeight();
					}


					if( (( windowspace / 100 ) * headerheight) > headerminheight ){
						$('#headermedia, #headermedia > .outermargin, #headermainbar').height( ( windowspace / 100 ) * headerheight );
						//$('#headermedia .outermargin, #headermedia .maincolumnbox, #headermedia .sidecolumn').height( ( windowspace / 100 ) * headerheight );
					}


				}else{
					// move sidebars before, after, collapsed, hide
					if( $('#headersidebar-2').length > 0 ){
						if(headersidebar2respon === 'after'){
							$('#headersidebar-2').insertAfter( $('#headermainbar') );
						}
						if(headersidebar2respon === 'hide'){
							$('#headersidebar-2').hide();
						}
						if(headersidebar2respon === 'collapsed'){
							$('#headersidebar-2').insertAfter( $('#headermainbar') );
							$('#headersidebar-2 .widget-contentbox').addClass('collapsed').slideUp();
						}
					}

					if( $('#headersidebar-1').length > 0 ){
						if(headersidebar1respon === 'after'){
							$('#headersidebar-1').insertAfter( $('#headermainbar') );
						}
						if(headersidebar1respon === 'hide'){
							$('#headersidebar-1').hide();
						}
						if(headersidebar1respon === 'collapsed'){
							$('#headersidebar-1').insertAfter( $('#headermainbar') );
							$('#headersidebar-1 .widget-contentbox').addClass('collapsed').slideUp();
						}
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

			}




			function set_maincontent_elements(){

				// default topmainbar width
				var maincontentwidth = 100;

				// for medium/large screen
				if( $(window).width() >= mediumswitch ){ //alert($mediumswitch); alert(sidebar1width);

				// set top sidebars
					if( $('#sidebar').length > 0 ){

						// before, after, collapsed, hide revert for large screen
						$('#maincontent').parent().prepend( $('#sidebar-2').show() );
						$('#maincontent').parent().prepend( $('#sidebar').show() );

						$('.widget .collapsed,#sidemenu').delay(200).removeClass('collapsed').slideDown();


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
					if( $('#sidebar-2').length > 0 && sidebar2respon === 'hide' ){
						$('#sidebar-2').hide();
					}
					if( $('#sidebar-2').length > 0 && sidebar2respon === 'collapsed' ){
						$('#sidebar-2').insertAfter( $('#maincontent') );
						$('#sidebar-2 .widget-contentbox').addClass('collapsed').slideUp();
					}

					if( $('#sidebar').length > 0 && sidebar1respon === 'after' ){
						$('#sidebar').insertAfter( $('#maincontent') );
					}
					if( $('#sidebar').length > 0 && sidebar1respon === 'hide' ){
						$('#sidebar').hide();
					}
					if( $('#sidebar').length > 0 && sidebar1respon === 'collapsed' ){
						$('#sidebar').insertAfter( $('#maincontent') );
						$('#sidebar .widget-contentbox, #sidemenu').addClass('collapsed').slideUp();
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

                // timed resize
				rctime = new Date();
				if (ctimeout === false) {
					ctimeout = true;
					setTimeout(customizer_resizeend, cdelta);
				}
                // & set menu etc.
                //
                set_topmenu_behavior();
				//set_topbar_elements();
				//set_top_behavior();



			});

			function customizer_resizeend(){


				// add mobile class
				var screensizeclass = 'smallscreen';
				if( $(window).width() > largeswitch ){
					screensizeclass = 'largescreen';
				}else if( $(window).width() > mediumswitch ){
					screensizeclass = 'mediumscreen';
				}
				$('body').removeClass('smallscreen mediumscreen largescreen').addClass(screensizeclass);



				if(new Date() - rctime < cdelta){
					setTimeout(customizer_resizeend, cdelta);
				}else{
					ctimeout = false;
					//alert('Done resizing');


					// set upperbar
					set_upperbar_elements();

					// check topbar
					set_topbar_elements();

					// fixed topbar
					set_top_behavior();

                    // responsive topmenu overflow
                    set_topmenu_behavior();

					// header
					set_header_elements();

					// work maincontent
					set_maincontent_elements();


					// footer
					set_footer_elements();
					set_footer_elements();


				}



			}



            $('#topbarcontainer').on( 'click', '.menubutton a', function( e ){
                e.preventDefault();
                //$('ul.overflow').fadeToggle();
                //$('ul.overflow').toggleClass('active');
                $('#menucloak').toggleClass('active');
                $('body').toggleClass('menu_active');
            });

            $('#pagecontainer').on( 'click', '#menucloak.active', function( e ){
                if (e.target !== this) return;
                e.preventDefault();
                //$('ul.overflow').fadeToggle();
                //$('ul.overflow').toggleClass('active');
                $('#menucloak').toggleClass('active');
                $('body').toggleClass('menu_active');
            });

        // init resize end on document ready
        if( $('#pagecontainer ul.overflow').length < 1 ){

            $('#pagecontainer').append('<div id="menucloak"></div>');
            $('#pagecontainer #menucloak').append( menu_overflow_box );

        }
        if( $('#topmenu ul.menu').parent().find('li.menubutton').length < 1 ){
            $('#topmenu ul.menu').append( menu_button_more );
        }


		customizer_resizeend();





        $(window).load(function(){

        var element  = $('#topmenu ul.menu');


                set_topmenu_behavior();
          //$('#topmenu ul.menu').children().not('.more').prependTo($('#topmainbar ul.overflow'));


            /*setTimeout( function(){
                $('body').fadeIn(600);
                set_topmenu_behavior();
            }, 10);
            */
    });

    //$(window).unload(function () {
    //    $('body').fadeOut(600);
    //});



	}); //end on ready


}); // end jquery




