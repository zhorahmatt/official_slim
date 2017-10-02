/*------------------------------------
	Theme Name: Businessz
	Start Date : 
	End Date : 
	Last change: 
	Version: 1.0
	Assigned to:
	Primary use:
---------------------------------------*/
/*	

	+ Responsive Caret
	+ Expand Panel Resize
	+ Google Map
	+ Sticky Menu
	
	+ Document On Ready
		- Scrolling Navigation
		- Set Sticky Menu
		- Responsive Caret
		- Expand Panel
		- Collapse Panel
		- Search
		- Contact Map
		- Quick Contact Form
	
	+ Window On Scroll
		- Set Sticky Menu
		
	+ Window On Resize
		- Expand Panel Resize
		
	+ Window On Load
		- Site Loader
		- Largest Post
		
*/

(function($) {

	"use strict"
	
	/* + Responsive Caret* */
	function menu_dropdown_open(){
		var width = $(window).width();
		if($(".ownavigation .nav li.ddl-active").length ) {
			if( width > 991 ) {
				$(".ownavigation .nav > li").removeClass("ddl-active");
				$(".ownavigation .nav li .dropdown-menu").removeAttr("style");
			}
		} else {
			$(".ownavigation .nav li .dropdown-menu").removeAttr("style");
		}
	}
	
	/* + Expand Panel Resize * */
	function panel_resize(){
		var width = $(window).width();
		if( width > 991 ) {
			if($(".header_s #slidepanel").length ) {
				$(".header_s #slidepanel").removeAttr("style");
			}
		}
	}
	
	/* - Portfolio Fit */
	function portfolio_fit() {
		if($(".portfolio-list").length) {
			var $container = $(".portfolio-list");
			$container.isotope({
				layoutMode: 'fitRows',
				percentPosition: true,				
				itemSelector: ".portfolio-box",
				gutter: 0
			});
			
			$("#filters a").on("click",function(){
				$('#filters a').removeClass("active");
				$(this).addClass("active");
				var selector = $(this).attr("data-filter");
				$container.isotope({ filter: selector });
				return false;
			});
		}
	}	
	function portfolio_masonry_full() {
		if($(".portfolio-masonry-list").length) {
			var $container = $(".portfolio-masonry-list");
			$container.isotope({
				percentPosition: true,				
				itemSelector: ".portfolio-box",
				masonry: {
					columnWidth: '.grid-sizer'
				}
			});
			
			$("#filters a").on("click",function(){
				$('#filters a').removeClass("active");
				$(this).addClass("active");
				var selector = $(this).attr("data-filter");
				$container.isotope({ filter: selector });
				return false;
			});
		}
	}
	
	/* + Google Map* */
	function initialize(obj) {
		var lat = $("#"+obj).attr("data-lat");
        var lng = $("#"+obj).attr("data-lng");
		var contentString = $("#"+obj).attr("data-string");
		var myLatlng = new google.maps.LatLng(lat,lng);
		var map, marker, infowindow;
		var image =  $("#"+obj).attr("data-pin");
		var zoomLevel = parseInt($("#"+obj).attr("data-zoom") ,10);		
		var styles = [{"featureType": "administrative.province","elementType": "all","stylers": [{"visibility": "off"}]},
					  {"featureType": "landscape","elementType": "all","stylers": [{"saturation": -100},{"lightness": 65},{"visibility": "on"}]},
					  {"featureType": "poi","elementType": "all","stylers": [{"saturation": -100},{"lightness": 51},{"visibility": "simplified"}]},
					  {"featureType": "poi.place_of_worship","elementType": "geometry.fill","stylers": [{"saturation": "6"},{"gamma": "1.29"},{"color": "#010101"}]},
					  {"featureType": "road.highway","elementType": "all","stylers": [{"saturation": -100},{"visibility": "simplified"}]},
					  {"featureType": "road.arterial","elementType": "all","stylers": [{"saturation": -100},{"lightness": 30},{"visibility": "on"}]},
					  {"featureType": "road.local","elementType": "all","stylers": [{"saturation": -100},{"lightness": 40},{"visibility": "on"}]},
					  {"featureType": "transit","elementType": "all","stylers": [{"saturation": -100},{"visibility": "simplified"}]},
					  {"featureType": "water","elementType": "geometry","stylers": [{"hue": "#ffff00"},{"lightness": -25},{"saturation": -97}]},
					  {"featureType": "water","elementType": "labels","stylers": [{"visibility": "on"},{"lightness": -25},{"saturation": -100}]}]
		var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});	
		
		var mapOptions = {
			zoom: zoomLevel,
			disableDefaultUI: true,
			center: myLatlng,
            scrollwheel: false,
			mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, "map_style"]
			}
		}
		
		map = new google.maps.Map(document.getElementById(obj), mapOptions);	
		
		map.mapTypes.set("map_style", styledMap);
		map.setMapTypeId("map_style");
		
		if( contentString != "" ) {
			infowindow = new google.maps.InfoWindow({
				content: contentString
			});
		}		
	    
        marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			icon: image
		});

		google.maps.event.addListener(marker, "click", function() {
			infowindow.open(map,marker);
		});
	}
	
	/* + Sticky Menu */
	function sticky_menu() {
		var menu_scroll = $(".header_s").offset().top;
		var scroll_top = $(window).scrollTop();
		
		if ( scroll_top > menu_scroll ) {
			$(".header_s .menu-block").addClass("navbar-fixed-top animated fadeInDown");
		} else {
			$(".header_s .menu-block").removeClass("navbar-fixed-top animated fadeInDown"); 
		}
	}
	
	/* + Document On Ready */
	$(document).on("ready", function() {

		/* - Scrolling Navigation* */
		var width	=	$(window).width();
		var height	=	$(window).height();
		
		/* - Set Sticky Menu* */
		if( $(".header_s").length ) {
			sticky_menu();
		}
		
		$('.navbar-nav li a[href*="#"]:not([href="#"]), .site-logo a[href*="#"]:not([href="#"])').on("click", function(e) {
	
			var $anchor = $(this);
			
			$("html, body").stop().animate({ scrollTop: $($anchor.attr("href")).offset().top - 49 }, 1500, "easeInOutExpo");
			
			e.preventDefault();
		});

		/* - Responsive Caret* */
		$(".ddl-switch").on("click", function() {
			var li = $(this).parent();
			if ( li.hasClass("ddl-active") || li.find(".ddl-active").length !== 0 || li.find(".dropdown-menu").is(":visible") ) {
				li.removeClass("ddl-active");
				li.children().find(".ddl-active").removeClass("ddl-active");
				li.children(".dropdown-menu").slideUp();
			}
			else {
				li.addClass("ddl-active");
				li.children(".dropdown-menu").slideDown();
			}
		});
		
		/* - Expand Panel * */
		$("#slideit").on ("click", function() {
			$("#slidepanel").slideDown(1000);
			$("html").animate({ scrollTop: 0 }, 1000);
		});	

		/* - Collapse Panel * */
		$("#closeit").on("click", function() {
			$("#slidepanel").slideUp("slow");
			$("html").animate({ scrollTop: 0 }, 1000);
		});	
		
		/* Switch buttons from "Log In | Register" to "Close Panel" on click * */
		$("#toggle a").on("click", function() {
			$("#toggle a").toggle();
		});
		
		/* - Search * */
		if($(".search-box").length){
			$("#search").on("click", function(){
				$(".search-box").addClass("active")
			});
			$(".search-box span").on("click", function(){
				$(".search-box").removeClass("active")
			});
		}
		
		panel_resize();
		
		/* - Back To Top */
		$("#back-to-top").on("click",function()
		{
			$("body,html").animate(
			{
				scrollTop : 0 // Scroll to top of body
			},800);
		});
		
		/* - Revolution Slider */
		if($("#home_slider_1").length){
			var tpj=jQuery;			
			var revapi3;			
			if(tpj("#home_slider_1").revolution === undefined){
				revslider_showDoubleJqueryError("#home_slider_1");
			} else {
				revapi3 = tpj("#home_slider_1").show().revolution({
					sliderType:"standard",
					sliderLayout:"fullwidth",
					dottedOverlay:"none",
					delay:5000,
					navigation: {
						keyboardNavigation:"off",
						keyboard_direction: "horizontal",
						mouseScrollNavigation:"off",
						mouseScrollReverse:"default",
						onHoverStop:"off",
						arrows: {
							style:"custom",
							enable:true,
							hide_onmobile:true,
							hide_under:768,
							hide_onleave:false,
							tmp:'',
							left: {
								h_align:"left",
								v_align:"center",
								h_offset:20,
								v_offset:0
							},
							right: {
								h_align:"right",
								v_align:"center",
								h_offset:40,
								v_offset:0
							}
						},
						bullets: {
							enable:true,
							hide_onmobile:false,
							style:"hermes",
							hide_onleave:false,
							direction:"horizontal",
							h_align:"center",
							v_align:"bottom",
							h_offset:0,
							v_offset:20,
							space:5,
							tmp:''
						}
					},
					responsiveLevels:[1920,1200,768,480],
					visibilityLevels:[1920,1200,768,480],
					gridwidth:[1920,1200,768,480],
					gridheight:[700,600,490,390],
					lazyType:"none",
					shadow:0,
					spinner:"spinner3",
					stopLoop:"off",
					stopAfterLoops:-1,
					stopAtSlide:-1,
					shuffle:"off",
					autoHeight:"off",
					hideThumbsOnMobile:"off",
					hideSliderAtLimit:0,
					hideCaptionAtLimit:0,
					hideAllCaptionAtLilmit:0,
					debugMode:false,
					fallbacks: {
						simplifyAll:"off",
						nextSlideOnWindowFocus:"off",
						disableFocusListener:false,
					}
				});
			}
		}
		
		if($("#home_slider_2").length){
			var tpj=jQuery;
			var revapi2;			
			if(tpj("#home_slider_2").revolution === undefined){
				revslider_showDoubleJqueryError("#home_slider_2");
			}else{
				revapi2 = tpj("#home_slider_2").show().revolution({
					sliderType:"standard",
					jsFileLocation:"//localhost/wp_slider/wp-content/plugins/revslider/public/assets/js/",
					sliderLayout:"fullwidth",
					dottedOverlay:"none",
					delay:5000,
					navigation: {
						keyboardNavigation:"off",
						keyboard_direction: "horizontal",
						mouseScrollNavigation:"off",
						mouseScrollReverse:"default",
						onHoverStop:"off",
						arrows: {
							style:"custom",
							enable:true,
							hide_onmobile:true,
							hide_under:768,
							hide_onleave:false,
							tmp:'',
							left: {
								h_align:"left",
								v_align:"center",
								h_offset:20,
								v_offset:0
							},
							right: {
								h_align:"right",
								v_align:"center",
								h_offset:40,
								v_offset:0
							}
						}
						,
						bullets: {
							enable:true,
							hide_onmobile:false,
							style:"hermes",
							hide_onleave:false,
							direction:"horizontal",
							h_align:"center",
							v_align:"bottom",
							h_offset:0,
							v_offset:20,
							space:5,
							tmp:''
						}
					},
					responsiveLevels:[1920,1200,768,480],
					visibilityLevels:[1920,1200,768,480],
					gridwidth:[1920,1200,768,480],
					gridheight:[700,600,490,390],
					lazyType:"none",
					shadow:0,
					spinner:"spinner3",
					stopLoop:"off",
					stopAfterLoops:-1,
					stopAtSlide:-1,
					shuffle:"off",
					autoHeight:"off",
					hideThumbsOnMobile:"off",
					hideSliderAtLimit:0,
					hideCaptionAtLimit:0,
					hideAllCaptionAtLilmit:0,
					debugMode:false,
					fallbacks: {
						simplifyAll:"off",
						nextSlideOnWindowFocus:"off",
						disableFocusListener:false,
					}
				});
			}
		}
		if($("#home_slider_3").length){
			var tpj=jQuery;
			var revapi1;
				if(tpj("#home_slider_3").revolution === undefined){
					revslider_showDoubleJqueryError("#home_slider_3");
				}else{
					revapi1 = tpj("#home_slider_3").show().revolution({
					sliderType:"standard",
					
					sliderLayout:"fullwidth",
					dottedOverlay:"none",
					delay:5000,
					navigation: {
						keyboardNavigation:"off",
						keyboard_direction: "horizontal",
						mouseScrollNavigation:"off",
						mouseScrollReverse:"default",
						onHoverStop:"off",
						arrows: {
							style:"custom",
							enable:true,
							hide_onmobile:true,
							hide_under:768,
							hide_onleave:false,
							tmp:'',
							left: {
								h_align:"left",
								v_align:"center",
								h_offset:20,
								v_offset:0
							},
							right: {
								h_align:"right",
								v_align:"center",
								h_offset:40,
								v_offset:0
							}
						}
						,
						bullets: {
							enable:true,
							hide_onmobile:false,
							style:"hermes",
							hide_onleave:false,
							direction:"horizontal",
							h_align:"center",
							v_align:"bottom",
							h_offset:0,
							v_offset:20,
							space:5,
							tmp:''
						}
					},
					responsiveLevels:[1920,1200,768,480],
					visibilityLevels:[1920,1200,768,480],
					gridwidth:[1920,1200,768,480],
					gridheight:[810,600,490,390],
					lazyType:"none",
					shadow:0,
					spinner:"spinner3",
					stopLoop:"off",
					stopAfterLoops:-1,
					stopAtSlide:-1,
					shuffle:"off",
					autoHeight:"off",
					hideThumbsOnMobile:"off",
					hideSliderAtLimit:0,
					hideCaptionAtLimit:0,
					hideAllCaptionAtLilmit:0,
					debugMode:false,
					fallbacks: {
						simplifyAll:"off",
						nextSlideOnWindowFocus:"off",
						disableFocusListener:false,
					}
				});
			}
		}
		
		/* - Team Carousel */
		if( $(".team-carousel").length ) {
			if($('html[dir="rtl"]').length) {
				$(".team-carousel").owlCarousel({
					loop: true,
					margin: 30,
					nav: false,
					dots: true,
					rtl: true,
					autoplay: true,
					responsive:{
						0:{
							items: 1
						},
						568:{
							items: 2
						},
						768 : {
							items: 3
						}
					}
				});
			} else {
				$(".team-carousel").owlCarousel({
					loop: true,
					margin: 30,
					nav: false,
					dots: true,
					autoplay: true,
					responsive:{
						0:{
							items: 1
						},
						568:{
							items: 2
						},
						768 : {
							items: 3
						}
					}
				});
			}
		}
		
		/* - Skill Section */
		$( "[id*='skill_type-']" ).each(function ()
		{
			var ele_id = 0;
			ele_id = $(this).attr('id').split("-")[1];
			
			var $this = $(this);
			var myVal = $(this).data("value");

			$this.appear(function()
			{			
				var skill_type1_item_count = 0;
				var skill_type1_count = 0;					
				skill_type1_item_count = $( "[id*='skill_"+ ele_id +"_count-']" ).length;				
				
				for(var i=1; i<=skill_type1_item_count; i++)
				{
					skill_type1_count = $( "[id*='skill_"+ ele_id +"_count-"+i+"']" ).attr( "data-skill_percent" );
					$("[id*='skill_"+ ele_id +"_count-"+i+"']").animateNumber({ number: skill_type1_count }, 5000);
					if($('html[dir="rtl"]').length) {
						$("[id*='skill_"+ ele_id +"_count-"+i+"']").css("right",skill_type1_count +"%");
					} else {
						$("[id*='skill_"+ ele_id +"_count-"+i+"']").css("left",skill_type1_count +"%");
					}
				}
				
				var skill_bar_count = 0;
				var skills_bar_count = 0;
				skill_bar_count = $( "[id*='skill_bar_"+ ele_id +"_count-']" ).length;
				
				for(var j=1; j<=skill_bar_count; j++)
				{
					skills_bar_count = $( "[id*='skill_"+ ele_id +"_count-"+j+"']" ).attr( "data-skill_percent" );
					$("[id*='skill_bar_"+ ele_id +"_count-"+j+"']").css({'width': skills_bar_count +'%'});
				}
			});
		});
		
		/* - Counter Section  */
		$("[id*='counter_type-']").each(function ()
		{		
			var ele_id = 0;
			ele_id = $(this).attr('id').split("-")[1];
			
			var $this = $(this);
			var myVal = $(this).data("value");	

			$this.appear(function()
			{
				var skill_item_count = 0;
				var skills_count = 0;

				skill_item_count = $( "[id*='count_"+ ele_id +"_box-']" ).length;

				for(var i=1; i<=skill_item_count; i++)
				{
					skills_count = $( "[id*='count_"+ ele_id +"_box-"+i+"']" ).attr( "data-skills_percent" );
					$("[id*='count_"+ ele_id +"_box-"+i+"']").animateNumber({ number: skills_count }, 2000);
				}
			});
		});
		
		portfolio_fit();
		portfolio_masonry_full();
		
		/* - Portfolio Popup */
		if($(".portfolio-box").length){
			var url;
			$(".portfolio-box .portfolio-detail").magnificPopup({
				delegate: " > a",
				type: "image",
				tLoading: "Loading image #%curr%...",
				mainClass: "mfp-img-mobile",
				gallery: {
					enabled: true,
					navigateByImgClick: false,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image
				},
				image: {
					tError: "<a href="%url%">The image #%curr%</a> could not be loaded.",				
				}
			});
		}
		
		if( $( "#map-canvas-event").length === 1 ){
			initialize( "map-canvas-event" );
		}
		
		if( $( "#contact-map-canvas").length === 1 ){
			initialize( "contact-map-canvas" );
		}
		
		/* - Quick Contact Form* */
		$( "#btn_submit" ).on( "click", function(event) {
		  event.preventDefault();
		  var mydata = $("form").serialize();
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "contact.php",
				data: mydata,
				success: function(data) {
					if( data["type"] === "error" ){
						$("#alert-msg").html(data["msg"]);
						$("#alert-msg").removeClass("alert-msg-success");
						$("#alert-msg").addClass("alert-msg-failure");
						$("#alert-msg").show();
					} else {
						$("#alert-msg").html(data["msg"]);
						$("#alert-msg").addClass("alert-msg-success");
						$("#alert-msg").removeClass("alert-msg-failure");					
						$("#input_name").val("");						
						$("#input_email").val("");												
						$("#input_website").val("");										
						$("#textarea_message").val("");
						$("#alert-msg").show();				
					}			
				},
				error: function(xhr, textStatus, errorThrown) {
					alert(textStatus);
				}
			});
		});
		
	});	/* - Document On Ready /- */
	
	/* + Window On Scroll */
	$(window).on("scroll",function() {
		/* - Set Sticky Menu* */
		if( $(".header_s").length ) {
			sticky_menu();
		}
	});
	
	/* + Window On Resize */ 
	$( window ).on("resize",function() {
		var width	=	$(window).width();
		var height	=	$(window).height();
		
		/* - Expand Panel Resize */
		panel_resize();
		menu_dropdown_open();
	});
	
	/* + Window On Load */
	$(window).on("load",function() {
		/* - Site Loader* */
		if ( !$("html").is(".ie6, .ie7, .ie8") ) {
			$("#site-loader").delay(1000).fadeOut("slow");
		}
		else {
			$("#site-loader").css("display","none");
		}
		
		portfolio_fit();
		portfolio_masonry_full();
	});

})(jQuery);