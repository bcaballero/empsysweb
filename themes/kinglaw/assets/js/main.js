jQuery(document).ready(function($) {
	"use strict";

	/* window */
	var window_width, window_height, scroll_top;

	/* admin bar */
	var adminbar = $('#wpadminbar');
	var adminbar_height = 0;

	/* header menu */
	var header = $('#cshero-header');
	var header_top = 0;

	/* scroll status */
	var scroll_status = '';

	/**
	 * window load event.
	 * 
	 * Bind an event handler to the "load" JavaScript event.
	 * 
	 */
	$(window).on('load', function() {
		/** current scroll */
		scroll_top = $(window).scrollTop();

		/** current window width */
		window_width = $(window).width();

		/** current window height */
		window_height = $(window).height();

		/* get admin bar height */
		adminbar_height = adminbar.length > 0 ? adminbar.outerHeight(true) : 0 ;

		/* get top header menu */
		header_top = header.length > 0 ? header.offset().top - adminbar_height : 0 ;

		/* check sticky menu. */
		cms_stiky_menu();

		cms_enscroll();

		cms_col_sameheight();

		cms_section_offset();

		cms_auto_video_width();

		cms_mega_resize();

		cms_carousel_gallery();

		cms_page_loading();

		cms_scroll_opacity();

		cms_modal_menu();

		cms_custom_vc_row_stretch_content();

		$(".cms-carousel-wrap").css('opacity','1');
		$(".owl-carousel").css('opacity','1');

	});

	/**
	 * reload event.
	 * 
	 * Bind an event handler to the "navigate".
	 */
	$(window).unload(function() { cms_page_loading(1); });
	
	/**
	 * resize event.
	 * 
	 * Bind an event handler to the "resize" JavaScript event, or trigger that event on an element.
	 * 
	 */
	$(window).on('resize', function(event, ui) {
		/** current window width */
		window_width = $(event.target).width();

		/** current window height */
		window_height = $(window).height();

		/** current scroll */
		scroll_top = $(window).scrollTop();

		/* check sticky menu. */
		cms_stiky_menu();

		cms_enscroll();

		cms_col_sameheight();

		cms_section_offset();

		cms_auto_video_width();

		cms_mega_resize();
		
		cms_carousel_gallery();

		cms_scroll_opacity();

		cms_modal_menu();

		cms_custom_vc_row_stretch_content();

	});
	
	/**
	 * scroll event.
	 * 
	 * Bind an event handler to the "scroll" JavaScript event, or trigger that event on an element.
	 * 
	 */
	var lastScrollTop = 0; 
	$(window).on('scroll', function() {
		/** current scroll */
		scroll_top = $(window).scrollTop();
		  
		  if(scroll_top < lastScrollTop) {
		   scroll_status = 'up';
		  } else {
		   scroll_status = 'down';
		  }
		  
		/* check sticky menu. */
		cms_stiky_menu();

		/* check back to top */
		cms_back_to_top(); 
	});
	lastScrollTop = scroll_top;
	/**
	 * Stiky menu
	 *
	 * Show or hide sticky menu.
	 * 
	 * 
	 */
	function cms_stiky_menu() {
		var startSticky = $('#cshero-header-holder').offset().top;
		if ( header.hasClass('sticky-desktop') && scroll_top > startSticky && window_width > 991) {
			header.addClass('header-fixed');
			$('body').addClass('hd-fixed');
		} else {
			header.removeClass('header-fixed');
			$('body').removeClass('hd-fixed');
		}
		if(scroll_status == 'down') {
		   header.addClass('header-scroll-down').removeClass('header-scroll-up');
		  } else if(scroll_status == 'up') {
		   header.addClass('header-scroll-up').removeClass('header-scroll-down');
		  } else if(scroll_top == 0) {
		   header.removeClass('header-scroll-up');
		}
	}

	/**
	 * Mobile menu
	 * 
	 * Show or hide mobile menu.
	 * 
	 * 
	 */
	

	$("#cshero-menu-mobile .open-menu").on('click',function(){
		$('#cshero-header-navigation').toggleClass('navigation-open');
    })

    /* Sign In & Sign Up */
    $('.btn-text-login').on('click', function() {
    	$('.cms-login-wrap').addClass('open');
    })
    $(document).on('click',function(e){
		if(e.target.className == 'cms-login-wrap cms-popup open')
		$('.cms-login-wrap').removeClass('open');
	});
	$('.switch_to_sign_up').on('click', function() {
    	$('.cms-login-wrap').removeClass('open');
    	$('.cms-register-wrap').addClass('open');
    })

	$('.btn-text-register').on('click', function() {
    	$('.cms-register-wrap').addClass('open');
    })
    $(document).on('click',function(e){
		if(e.target.className == 'cms-register-wrap cms-popup open')
		$('.cms-register-wrap').removeClass('open');
	});
    $('.cms-modal-close').on('click', function() {
    	$('.cms-login-wrap').removeClass('open');
    	$('.cms-register-wrap').removeClass('open');
    })
    $('.switch_to_login').on('click', function() {
    	$('.cms-register-wrap').removeClass('open');
    	$('.cms-login-wrap').addClass('open');
    })


	/**
	 * Back To Top
	 * 
	 * 
	 * 
	 */
	$('body').on('click', '#back_to_top', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1500);
    });


    /* Show or Hide Buttom  */
	function cms_back_to_top(){
		/* Back To Top */
        if (scroll_top < window_height) {
        	$('#back_to_top').addClass('off').removeClass('on');
        } else {
        	$('#back_to_top').removeClass('off').addClass('on');
        }
	}

	/**
	 * Auto width video iframe
	 * 
	 * Youtube Vimeo.
	 * 
	 */
	function cms_auto_video_width() {
		$('.entry-video iframe').each(function(){
			var v_width = $(this).width();
			
			v_width = v_width / (16/9);
			$(this).attr('height',v_width + 35);
		})
	}	

	/* Video Light Box */
	$('.cms-button-video').magnificPopup({
		//disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,

		fixedContentPos: false
	});

	$('#searchform').find("input[type='text']").each(function(ev) {
	    if(!$(this).val()) { 
	        $(this).attr("placeholder", "Enter Search");
	    }
	});

	$('.cms-search-wrap #searchform').find("input[type='text']").each(function(ev) {
	    if(!$(this).val()) { 
	        $(this).attr("placeholder", "Type Words Then Enter");
	    }
	});

	$('.tnp-field-email').find("input[type='email']").each(function(ev) {
	    if(!$(this).val()) { 
	        $(this).attr("placeholder", "Enter email address");
	    }
	});

	/* Scrolling Sidebar */
	function cms_scrolling_sidebar(){
		var offset = $("#sidebar").offset();
	    var topPadding = 60;
	    $(window).scroll(function() {
	        if ($(window).scrollTop() > offset.top) {
	            $("#sidebar").stop().animate({
	                marginTop: $(window).scrollTop() - offset.top + topPadding
	            });
	        } else {
	            $("#sidebar").stop().animate({
	                marginTop: 0
	            });
	        };
	    });
	}

	/**
	 * Enscroll
	 * 
	 * 
	 * 
	 */
	function cms_enscroll() {
		$('#cshero-header-top .widget_shopping_cart_content ').enscroll();
		$('.cms-recent-post').enscroll();

		/* Hidden Sidebar */
		var h_hidden_sidebar = $('.cms-hidden-sidebar-inner').height();
		var h_hidden_w = $(window).height();
		var h_sidebar_h = h_hidden_w - 110;

		if( h_hidden_sidebar > h_hidden_w ) {
			$('.cms-hidden-sidebar-inner').css('height',h_sidebar_h+'px');
			$('.cms-hidden-sidebar-inner').enscroll();
		}

		/* Menu Popup */
		var h_menu_inner = $('.cms-menu-popup-inner').height();
		var h_menu_wh = $(window).height();
		var h_menu_inner_h = h_menu_inner + 90;
		var h_menu_inner_h_z = h_menu_inner - 120;

		if( h_menu_inner_h > h_menu_wh ) {
			$('.cms-menu-popup-inner').css('height',h_menu_inner_h_z+'px');
			$('.cms-menu-popup-inner').enscroll();
		}

		/* Cart */
		var h_cart_list = $('#cshero-header .product_list_widget').height();
		if( h_cart_list > 210 ) {
			$('#cshero-header .product_list_widget').css('height', 200+'px');
			$('#cshero-header .product_list_widget').enscroll();
		}

		/* Menu Left */
		var h_menu_left = $('#cshero-header-left .menu-accordion').height();
		if( h_menu_left > 300 ) {
			$('#cshero-header-left .menu-accordion').css('height', 300+'px');
			$('#cshero-header-left .menu-accordion').enscroll();
		}

		/* Mobile Menu 

		var h_navigation = $('#cshero-header #cshero-header-navigation').height();
		if($(window).width() < 991 && h_navigation > 330) {
			$('#cshero-header #cshero-header-navigation').css('height', 330+'px');
			$('#cshero-header #cshero-header-navigation').enscroll();
		} */
	}

	function cms_col_sameheight() {
		$('.columns-same .col-same').matchHeight();
		$('.vc_row-o-equal-height > .wpb_column .cms-fancyboxes-layout3 .cms-fancybox-item').matchHeight();
		$('.cms-grid-team .cms-grid-item .cms-team-wrapper').matchHeight();
		$('.cms-grid-item .entry-services').matchHeight();
		$('.cms-grid-team .cms-grid-item .cms-team-wrapper .entry-specialized').matchHeight();
		$('.multicolumn.sub-menu').each(function () {
			$(this).find('> li').matchHeight();
		})
	}

	/* Mega Menu Padding */
	function cms_mega_resize() {
		if($(window).width() > 1200) {
			var w_desktop = $(window).width();
			var mg_padding = (w_desktop - 1200)/2;
			$('.cshero-header-navigation .main-navigation .menu-main-menu li:not(.group) > ul.drop_full_width').css('padding-left',mg_padding+'px');
			$('.cshero-header-navigation .main-navigation .menu-main-menu li:not(.group) > ul.drop_full_width').css('padding-right',mg_padding+'px');
		}
	}

	/* Woo Add Class */
	$('.woo-social').on('click', function() {
    	$(this).toggleClass('opened');
    })
    $('.plus').on('click', function(){
    	$(this).parent().find('input[type="number"]').get(0).stepUp();
    });
    $('.minus').on('click', function(){
    	$(this).parent().find('input[type="number"]').get(0).stepDown();
    });

    /* Hidden Sidebar */
    $('.h-hidden-sidebar').on('click', function() {
    	$('.cms-hidden-sidebar-wrap').toggleClass('open');
    	$('.cms-hidden-overlay').toggleClass('open');
    })
    $('.hidden-sidebar-close').on('click', function() {
    	$('.cms-hidden-sidebar-wrap').removeClass('open');
    	$('.cms-hidden-overlay').removeClass('open');
    })

    /* Hidden Search */
    $('.open-search').on('click', function() {
    	$('.cms-search-wrap').toggleClass('open');
    	$('.cms-search-wrap input[type="text"]').focus();
    })

    $('body').on('click', '.open-search',function(){
		setTimeout(function(){$('.cms-search-wrap input#s').focus()}, 500);
	});

    /* Menu Popup */
    $('.open-menu-popup').on('click', function() {
    	$('.cms-menu-popup-wrap').addClass('open');
    	$('#cms-theme').addClass('menu-popup-active');
    })
    $('.cms-modal-close').on('click', function() {
    	$('.cms-menu-popup-wrap').removeClass('open');
    	$('.cms-search-wrap').removeClass('open');
    	$('.cms-menu-popup-inner .menu-main-menu > li').removeClass('open');
    	$('#cms-theme').removeClass('menu-popup-active');
    })
    $('.open-menu-sidebar').on('click', function() {
    	$('#cshero-header-left').toggleClass('open');
    	$('#cms-theme').toggleClass('menu-sidebar-active');
    })

    /* Cart Header */
    $('.icon-cart').on('click', function() {
    	$('#cshero-header .widget_shopping_cart').toggleClass('open');
    })
    $('.open-cart').on('click', function() {
    	$('#cshero-header .widget_shopping_cart').toggleClass('open');
    })

    /* Hide search form + Menu Popup*/
	$(document).on('click',function(e){
		
		if(e.target.className == 'cms-search-wrap open') {
			$('.cms-search-wrap').removeClass('open');
		}

	});

    /* CMS Image Popup */
    $('.cms-images-zoom').magnificPopup({
	  delegate: 'a.z-view', // child items selector, by clicking on it popup will open
	  type: 'image',
	  gallery: {
	     enabled: true
	  },
	  mainClass: 'mfp-fade',
	  // other options
	});

	$('.cms-image-zoom').magnificPopup({
	  delegate: 'a.z-view', // child items selector, by clicking on it popup will open
	  type: 'image',
	  gallery: {
	     enabled: false
	  },
	  mainClass: 'mfp-fade',
	  // other options
	});

	$('.cshero-product-images').magnificPopup({
	  delegate: 'a.zoom', // child items selector, by clicking on it popup will open
	  type: 'image',
	  gallery: {
	     enabled: false
	  },
	  mainClass: 'mfp-fade',
	  // other options
	});

	/* Add Class Input Contact Form */

    $(".wpcf7-form-control").focus(function(){
        $('.wpcf7-row-two').removeClass('input-filled-active');
        $(this).parents('.wpcf7-row-two').addClass('input-filled-active');
    })
    $(".wpcf7-form-control").focusout(function(){
        $(this).parents('.wpcf7-row-two').removeClass('input-filled-active');
    });
    var filled = $(".wpcf7-form-control").val();
    if(filled == '') {
        $('.wpcf7-form-control').parents('.wpcf7-row-two').removeClass('input-filled-hold');
    }
    $(".wpcf7-form-control").change(function(){ 
        $(this).parents('.wpcf7-row-two').addClass('input-filled-hold');
    });

	/* Section Offset */
	function cms_section_offset() {
		if($(window).width() > 992) {
			var w_desktop = $(window).width();
			var w_padding = (w_desktop - 1140)/2;
			$('.section-offset-left > .vc_column-inner').css('padding-left',w_padding+'px');
			$('.section-offset-right > .vc_column-inner').css('padding-right',w_padding+'px');

		}

		if($(window).width() < 991) {
			$('.section-offset-left > .vc_column-inner').css('padding-left',15+'px');
			$('.section-offset-right > .vc_column-inner').css('padding-right',15+'px');

		}

		var t_height = $('.cms-testimonial-layout1 .cms-testimonial-content').height();
		var tl_height = ( t_height / 2 ) - 20;
		$('.cms-testimonial-layout1 .owl-controls .owl-nav .owl-prev, .cms-testimonial-layout1 .owl-controls .owl-nav .owl-next').css('top',tl_height+'px');
	}

	$('#comments .comments-title, #comments #reply-title').append('<span class="line1"></span><span class="line2"></span><span class="line3"></span>');

	$('[data-toggle="tooltip"]').tooltip();

	/**
	 * Page Loading.
	 */
	function cms_page_loading($load) {
		switch ($load) {
		case 1:
			$('#cms-loadding').css('display','block')
			$('body.header-12').css('margin-left','0px')
			break;
		default:
			$('#cms-loadding').css('display','none')
			break;
		}
	}

	/* Scroll Opacity */
	function cms_scroll_opacity() { 
		var fadeStart=200,fadeUntil=400,fading = $('.cms-page-title-inner h1');
		$(window).bind('scroll', function(){
		    var offset = $(document).scrollTop()
		        ,opacity=0
		    ;
		    if( offset<=fadeStart ){
		        opacity=1;
		    }else if( offset<=fadeUntil ){
		        opacity=1-offset/fadeUntil;
		    }
		    fading.css('opacity',opacity);
		});

		var fadeStartb=200,fadeUntilb=400,fadingb = $('.cms-page-title-inner span');
		$(window).bind('scroll', function(){
		    var offset = $(document).scrollTop()
		        ,opacity=0
		    ;
		    if( offset<=fadeStartb ){
		        opacity=1;
		    }else if( offset<=fadeUntilb ){
		        opacity=1-offset/fadeUntilb;
		    }
		    fadingb.css('opacity',opacity);
		});

		var fadeStartc=200,fadeUntilc=800,fadingc = $('#cms-page-title .breadcrumbs');
		$(window).bind('scroll', function(){
		    var offset = $(document).scrollTop()
		        ,opacity=0
		    ;
		    if( offset<=fadeStartc ){
		        opacity=1;
		    }else if( offset<=fadeUntilc ){
		        opacity=1-offset/fadeUntilc;
		    }
		    fadingc.css('opacity',opacity);
		});
	}

	function cms_carousel_gallery() {
		if($('.cms-carousel-gallery').length > 0) {
			$('.cms-carousel-gallery').owlCarousel({
				navigation: false,
				smartSpeed: 1000,
				paginationSpeed: 3000,
				rewindSpeed: 1000,
				singleItem: true,
				responsiveClass: true,
				dots: true,
				dotData: true,
				nav: $('.cms-carousel-gallery').data("nav"),
				navText : ['<i class="zmdi zmdi-arrow-left"></i>','<i class="zmdi zmdi-arrow-right"></i>'],
				loop: $('.cms-carousel-gallery').data("loop"),
				margin: 0,
				dotsContainer: '.dotsCont',
				responsive: {
					0: {
						items: parseInt($('.cms-carousel-gallery').data("xs")),
					},
					768: {
						items: parseInt($('.cms-carousel-gallery').data("sm")),
					},
					992: {
						items: parseInt($('.cms-carousel-gallery').data("md")),
					},
					1200: {
						items: parseInt($('.cms-carousel-gallery').data("lg")),
					}
				}
			});
		}
	}

	function cms_modal_menu() {
		$('.open-menu-popup').click(function() {
			$('#cms-theme').toggleClass('header-5-modal');
	        /** Main menu add class animation */
			var hidden_menu = jQuery('.cms-menu-popup-inner');
			var li = hidden_menu.find('li').length;
			var i = 0;
			window.setInterval(function() {
				if(i <= li){
					var _li = hidden_menu.find('.menu-main-menu > li:eq('+i+')');
						_li.toggleClass('open');
					i++;
				} else {
					clearInterval(this);
				}
			}, 50);
	    });
	}

	function cms_custom_vc_row_stretch_content() {
        var html_rtl = $('html[dir="rtl"]'),
            vc_left = html_rtl.find('.vc_row[data-vc-full-width]').css('left');
        	$('.cms-rtl .vc_row[data-vc-full-width]').css('right',vc_left+'');
    }
	
	/*$('.arrow-effect').each(function(){
		var w_arrow_effect = $(this).width();
		var h_arrow_effect = $(this).height();
		$(this).find('.arrow-top').css('border-width',w_arrow_effect+'px');
	})*/

});