
// jQuery(window).load(function(){
//	jQuery('.navigation a[href^="#"]').click(function (e) {
//	    e.preventDefault();
//
//	    var target = this.hash;
//	    jQuerytarget = jQuery(target);
//
//	    jQuery('html, body').stop().animate({
//	        'scrollTop': jQuerytarget.offset().top
// 	    }, 900, 'swing', function () {
// 	        window.location.hash = target;
//	    });
// 	});
// });

var $ = jQuery;
 jQuery(document).ready(function() {
 	//jQuery(".navbar-toggle").click(function(event) {
		
// 		if (jQuery(this).hasClass('addclose')) {
//			jQuery(this).removeClass('addclose');
// 		} else {
//			jQuery(".navbar-toggle").removeAttr('class');
//			jQuery(this).addClass('addclose');
//		}
//	});
	jQuery(".navigation").click(function(event) {
		
		if (jQuery(this).hasClass('menuopen')) {
			jQuery(this).removeClass('menuopen');
 		} else {
 			jQuery(".navbar-toggle").removeAttr('class');
			jQuery(this).addClass('menuopen');
 		}
	});
	
 });



/* ---------------------------------------------------------------------------
 *  Filterable Function
 * --------------------------------------------------------------------------- */
function portfolio_mix(){
	'use strict';
	jQuery('#list').mixitup({ effects :["blur","fade"]});
	jQuery(".splitter li a") .click(function(event){
		jQuery(".splitter li") .removeClass("active");
		jQuery(this).parent() .addClass("active")
		event.preventDefault();
	});
	return false;
}

/* ---------------------------------------------------------------------------
 *  Upload Files Button Function
 * --------------------------------------------------------------------------- */
jQuery(document).ready(function($) {
// header_resize()
	jQuery("#browse-two").click(function () {
	    jQuery("#cs-files-two").click();
	});
	jQuery('#cs-files-two').change(function () {
	    jQuery('#cs-fileupload-two').val($(this).val());
	});
	jQuery("#browse-thr").click(function () {
	    jQuery("#cs-files-thr").click();
	});
	jQuery('#cs-files-thr').change(function () {
	    jQuery('#cs-fileupload-thr').val($(this).val());
	});
});
/* ---------------------------------------------------------------------------
	 *  ShortCode NAV Content Slide Function
	 * --------------------------------------------------------------------------- */

jQuery(document).ready(function($) {
	jQuery(".uploadMedia").live('click', function() {
		var $ = jQuery;
		var id = $(this).attr("name");
		var custom_uploader = wp.media({
			title: 'Select File',
			button: {
				text: 'Add File'
			},
			multiple: false
	})
	  .on('select', function() {
		  var attachment = custom_uploader.state().get('selection').first().toJSON();
		  jQuery('#' + id).val(attachment.url);
		  jQuery('#' + id + '_img').attr('src', attachment.url);
		  jQuery('#' + id + '_box').show();
	  }).open();
		
});
jQuery(".cs-filter-menu li a").on("click", function(event) {
	if (jQuery(this).hasClass('addclose')) {
		jQuery(this).removeClass('addclose');
	} else {
		jQuery(".cs-filter-menu li a").removeAttr('class');
		jQuery(this).addClass('addclose');
	}
	var a = jQuery(this).attr('href');
	jQuery('.filter-pager').not(a).slideUp();
	jQuery(a).slideToggle(300)
	return false;
 });
});
/* ---------------------------------------------------------------------------
	 	 *  Filter Menu Function
	 	 * --------------------------------------------------------------------------- */
function cs_filter_menu(){
}		 
jQuery(document).ready(function($) {
	$('.btn-default,.tolbtn').tooltip('hide');
	$('.btn-default,.tolbtn').popover('hide')
	var _do_google_connect = function() {
		var google_auth = jQuery('#social_connect_google_auth');
		var redirect_uri = google_auth.find('input[type=hidden][name=redirect_uri]').val();
		window.open(redirect_uri,'','scrollbars=no,menubar=no,height=400,width=800,resizable=yes,toolbar=no,status=no');
	};
	var _do_twitter_connect = function() {
		var twitter_auth = jQuery('#social_connect_twitter_auth');
		var redirect_uri = twitter_auth.find('input[type=hidden][name=redirect_uri]').val();
		window.open(redirect_uri,'','scrollbars=no,menubar=no,height=400,width=800,resizable=yes,toolbar=no,status=no');
	};
	var _do_facebook_connect = function() {
		var facebook_auth = jQuery('#cs_connect_facebook_auth');
		var client_id = facebook_auth.find('input[type=hidden][name=client_id]').val();
		var redirect_uri = facebook_auth.find('input[type=hidden][name=redirect_uri]').val();
		if(client_id == "") {
			alert("CS Social Connect plugin has not been configured for this provider")
		} else {
			window.open('https://graph.facebook.com/oauth/authorize?client_id=' + client_id + '&redirect_uri=' + redirect_uri + '&scope=email',
			'','scrollbars=no,menubar=no,height=400,width=800,resizable=yes,toolbar=no,status=no');
		}
	};
	jQuery(".cs_connect_login_facebook").live("click", function() {
		_do_facebook_connect();
	});
	jQuery(".cs_connect_login_continue_facebook").on("click", function() {
		_do_facebook_connect();
	});
	jQuery(".cs_connect_login_twitter").on("click", function() {
		_do_twitter_connect();
	});
	jQuery(".cs_connect_login_continue_twitter").on("click", function() {
		_do_twitter_connect();
	});
	jQuery(".cs_connect_login_google").on("click", function() {
		_do_google_connect();
	});
	jQuery(".cs_connect_login_continue_google").on("click",function() {
		_do_google_connect();
	});
});

/* ---------------------------------------------------------------------------
	 * User Login Toggle Function
	 * --------------------------------------------------------------------------- */
	//Function For Search 
     jQuery('.cs-searchv2').hide();
		jQuery("a.cs-search").click(function(){
			jQuery('.cs-searchv2').hide();
	  	jQuery(".cs-searchv2").fadeToggle();
	 });
	 jQuery('html').click(function() {
	 	jQuery(".cs-searchv2").fadeOut();
	 });
	jQuery('#main-header').click(function(event){
	     event.stopPropagation();
	 });


/*	jQuery('#cs-signup').hide();
		jQuery("a.cs-user").click(function(){
			jQuery('#cs-signup').hide();
	  	jQuery("#cs-signup").fadeToggle();
	 });
	 jQuery('html').click(function() {
	 	jQuery("#cs-signup").fadeOut();
	 });
	jQuery('#cs-signup').click(function(event){
	     event.stopPropagation();
	 });*/
	 
	 
	 
jQuery(document).ready(function(){
	jQuery('#cs-signup').hide();
    jQuery("a.cs-user").click(function(){
        $("#cs-signup").toggle();
    });
});
	 
	 
	 
/* ---------------------------------------------------------------------------
	 *  ShortCode NAV Content Slide Function
	 * --------------------------------------------------------------------------- */
 /* Function's | File  */
 jQuery(document).ready(function($) {});
/** Create HTML5 elements for IE's sake **/

document.createElement("article");
document.createElement("section");
// Parallex Function
/* ---------------------------------------------------------------------------
	 * Wow Animation Function
	 * --------------------------------------------------------------------------- */
jQuery(document).ready(function() {
	wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100
      }
    );
    wow.init();
});
/* ---------------------------------------------------------------------------
	 * Form Focus Function
	 * --------------------------------------------------------------------------- */
jQuery(document).ready(function($) {
	jQuery( "div#dir-search input[type=text], div#dir-search input[type=text]" )
		.focusin(function() {
			jQuery( this ).closest( "form" ).css( "min-width", "80%" );
		});
	jQuery( "div#dir-search input[type=text], div#dir-search input[type=text]" )
		.focusout(function() {
			jQuery( this ).closest( "form" ).css( "min-width", "60%" );
		});
});

/* ---------------------------------------------------------------------------
	 * Tabs Loader Function
	 * --------------------------------------------------------------------------- */
	 jQuery(document).ready(function($) {
	 	$(".cs-form-tab > ul > li > a") .click(function(){
	 		$(".cs-loading").show();
	 		setTimeout(function(){
	 			$(".cs-loading") .hide()
	 		},1000)
	 	})
	 });
/* ---------------------------------------------------------------------------
	 *  ShortCode NAV Content Slide Function
	 * --------------------------------------------------------------------------- */
	 jQuery(document).ready(function($) {
		 jQuery('.shortcode-nav li a')	.click(function(event) {
		 	var _this = jQuery(this);
		 	jQuery('.shortcode-nav li').removeClass("active");
		 	_this.parent('li').addClass("active");
		 	jQuery("body, html").animate({ 
	            scrollTop: (jQuery( _this.attr('href') ).offset().top ) - 120
	        }, 600);
		 });

	 });

/*----------------------------Post Slider Function-----------------------------
-
-
------------------------------------------------------------------------------*/

/* jQuery(function($){
        jQuery('video,audio').mediaelementplayer({
			loop: true,
			shuffle: true,
			playlist: true,
			audioHeight: 30,
			playlistposition: 'bottom',
			features: ['playlistfeature','playpause', 'current', 'progress', 'duration', 'volume'],
			keyActions: []
        });      
 });*/

jQuery(window).load(function($) {
	jQuery('body').removeClass('loadingPage');
});

jQuery(document).ready(function($) {
	jQuery('body').addClass('loadingPage');
});

jQuery(document).ready(function($) {
	jQuery(".dropdown-menu").parent("li").addClass("parentIcon sub-menu");
	jQuery(".mega-grid").parent("li").addClass("parentIcon");
});

/*global module:true*/
// mousewheel event hooks borrowed from
// https://github.com/brandonaaron/jquery-mousewheel/

(function (factory) {
	if (typeof define === 'function' && define.amd) {
		// AMD. Register as an anonymous module.
		define(['jquery'], factory);
	} else if (typeof exports === 'object') {
		// Node/CommonJS style for Browserify
		module.exports = factory;
	} else {
		// Browser globals
		factory(jQuery);
	}
}(function ($) {
	var arrayremove = function (array, from, to) {
		var rest = array.slice((to || from) + 1 || array.length);
		array.length = from < 0 ? array.length + from : from;
		return array.push.apply(array, rest);
	};
	var average = function (array) {
		var average = 0;
		var count = 0;
		for (var i = 0, length = array.length; i < length; i += 1) {
			var member = +array[i];
			if (!member && array[i] !== 0 && array[i] !== '0') {
				member -= 1;
			}
			if (array[i] === member) {
				average += member;
				count += 1;
			}
		}
		return average / count;
	};
	var toFix  = ['wheel', 'mousewheel', 'DOMMouseScroll', 'MozMousePixelScroll'];
	var toBind = ('onwheel' in document || document.documentMode >= 9) ? ['wheel'] : ['mousewheel', 'DomMouseScroll', 'MozMousePixelScroll'];
	if ($.event.fixHooks) {
		for (var l = toFix.length; l;) {
			$.event.fixHooks[toFix[--l]] = $.event.mouseHooks;
		}
	}
	
	$.event.special.mousewheelintention = {
		version: '0.1.1',
	
		setup: function () {
			if (this.addEventListener) {
				for (var i = toBind.length; i;) {
					this.addEventListener(toBind[--i], mouseWheelListener, false);
				}
			} else {
				this.onmousewheel = mouseWheelListener;
			}
		},
		teardown: function () {
			if (window.removeEventListener) {
				window.removeEventListener('mousewheel', mouseWheelListener, false);
				window.removeEventListener('DOMMouseScroll', mouseWheelListener, false);
			} else if (window.detachEvent) {
				window.detachEvent('onmousewheel', mouseWheelListener);
			}
		}
	};
	$.fn.extend({
		mousewheelintention: function (fn) {
			return fn ? this.bind('mousewheelintention', fn) : this.trigger('mousewheelintention');
		},
		unmousewheelintention: function (fn) {
			return this.unbind('mousewheelintention', fn);
		}
	});
	var prevY = 0;
	var lastEvents = [];
	var lastScrolls = [];
	// populate the lastEvents array with 1s
	for (var i = 0; i < 16; i += 1) {
		lastEvents.push(1);
	}
	// populate the lastScrolls array with0s
	for (var j = 0; j < 10; j += 1) {
		lastScrolls.push(0);
	}
/* ---------------------------------------------------------------------------
	 * Mouse Wheel Listener
	 * --------------------------------------------------------------------------- */
	function mouseWheelListener(event) {
		var orginalEvent = event || window.event;
		var args = Array.prototype.slice.call(arguments, 1);

		event = $.event.fix(orginalEvent);
		event.type = 'mousewheelintention';
		
		var y = Math.abs(event.originalEvent.wheelDeltaY);

		// use detail when not wheelDelta not available like in firefox
		if (!event.originalEvent.wheelDeltaY) {
			y = Math.abs(event.originalEvent.detail * 3);
		}

		// update the lastEvents array
		arrayremove(lastEvents, 0);
		lastEvents.push(y);

		var scrolling = average(lastEvents.slice(0, 5)) < average(lastEvents.slice(5));
		if (scrolling) {
			arrayremove(lastScrolls, 0);
			lastScrolls.push(1);
		} else {
			arrayremove(lastScrolls, 0);
			lastScrolls.push(0);
		}
		event.certainty = average(lastScrolls);
		args.unshift(event);
		prevY = y;
		return ($.event.dispatch || $.event.handle).apply(this, args);
	}

	}));


/* ---------------------------------------------------------------------------
	 * Extra P Tag Function's
	 * --------------------------------------------------------------------------- */
	jQuery('p').each(function() {
		var jQuerythis = jQuery(this);
		if(jQuerythis.html().replace(/\s|&nbsp;/g, '').length == 0)
			jQuerythis.remove();
	});
/* ---------------------------------------------------------------------------
	* JQuery Easing Plugin 1.3
 	* --------------------------------------------------------------------------- */
	jQuery.easing.jswing=jQuery.easing.swing,jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(a,b,c,d,e){return jQuery.easing[jQuery.easing.def](a,b,c,d,e)},easeInQuad:function(a,b,c,d,e){return d*(b/=e)*b+c},easeOutQuad:function(a,b,c,d,e){return-d*(b/=e)*(b-2)+c},easeInOutQuad:function(a,b,c,d,e){return(b/=e/2)<1?d/2*b*b+c:-d/2*(--b*(b-2)-1)+c},easeInCubic:function(a,b,c,d,e){return d*(b/=e)*b*b+c},easeOutCubic:function(a,b,c,d,e){return d*((b=b/e-1)*b*b+1)+c},easeInOutCubic:function(a,b,c,d,e){return(b/=e/2)<1?d/2*b*b*b+c:d/2*((b-=2)*b*b+2)+c},easeInQuart:function(a,b,c,d,e){return d*(b/=e)*b*b*b+c},easeOutQuart:function(a,b,c,d,e){return-d*((b=b/e-1)*b*b*b-1)+c},easeInOutQuart:function(a,b,c,d,e){return(b/=e/2)<1?d/2*b*b*b*b+c:-d/2*((b-=2)*b*b*b-2)+c},easeInQuint:function(a,b,c,d,e){return d*(b/=e)*b*b*b*b+c},easeOutQuint:function(a,b,c,d,e){return d*((b=b/e-1)*b*b*b*b+1)+c},easeInOutQuint:function(a,b,c,d,e){return(b/=e/2)<1?d/2*b*b*b*b*b+c:d/2*((b-=2)*b*b*b*b+2)+c},easeInSine:function(a,b,c,d,e){return-d*Math.cos(b/e*(Math.PI/2))+d+c},easeOutSine:function(a,b,c,d,e){return d*Math.sin(b/e*(Math.PI/2))+c},easeInOutSine:function(a,b,c,d,e){return-d/2*(Math.cos(Math.PI*b/e)-1)+c},easeInExpo:function(a,b,c,d,e){return 0==b?c:d*Math.pow(2,10*(b/e-1))+c},easeOutExpo:function(a,b,c,d,e){return b==e?c+d:d*(-Math.pow(2,-10*b/e)+1)+c},easeInOutExpo:function(a,b,c,d,e){return 0==b?c:b==e?c+d:(b/=e/2)<1?d/2*Math.pow(2,10*(b-1))+c:d/2*(-Math.pow(2,-10*--b)+2)+c},easeInCirc:function(a,b,c,d,e){return-d*(Math.sqrt(1-(b/=e)*b)-1)+c},easeOutCirc:function(a,b,c,d,e){return d*Math.sqrt(1-(b=b/e-1)*b)+c},easeInOutCirc:function(a,b,c,d,e){return(b/=e/2)<1?-d/2*(Math.sqrt(1-b*b)-1)+c:d/2*(Math.sqrt(1-(b-=2)*b)+1)+c},easeInElastic:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(0==b)return c;if(1==(b/=e))return c+d;if(g||(g=.3*e),h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return-(h*Math.pow(2,10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g))+c},easeOutElastic:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(0==b)return c;if(1==(b/=e))return c+d;if(g||(g=.3*e),h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return h*Math.pow(2,-10*b)*Math.sin((b*e-f)*2*Math.PI/g)+d+c},easeInOutElastic:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(0==b)return c;if(2==(b/=e/2))return c+d;if(g||(g=e*.3*1.5),h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return 1>b?-.5*h*Math.pow(2,10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g)+c:.5*h*Math.pow(2,-10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g)+d+c},easeInBack:function(a,b,c,d,e,f){return void 0==f&&(f=1.70158),d*(b/=e)*b*((f+1)*b-f)+c},easeOutBack:function(a,b,c,d,e,f){return void 0==f&&(f=1.70158),d*((b=b/e-1)*b*((f+1)*b+f)+1)+c},easeInOutBack:function(a,b,c,d,e,f){return void 0==f&&(f=1.70158),(b/=e/2)<1?d/2*b*b*(((f*=1.525)+1)*b-f)+c:d/2*((b-=2)*b*(((f*=1.525)+1)*b+f)+2)+c},easeInBounce:function(a,b,c,d,e){return d-jQuery.easing.easeOutBounce(a,e-b,0,d,e)+c},easeOutBounce:function(a,b,c,d,e){return(b/=e)<1/2.75?d*7.5625*b*b+c:2/2.75>b?d*(7.5625*(b-=1.5/2.75)*b+.75)+c:2.5/2.75>b?d*(7.5625*(b-=2.25/2.75)*b+.9375)+c:d*(7.5625*(b-=2.625/2.75)*b+.984375)+c},easeInOutBounce:function(a,b,c,d,e){return e/2>b?.5*jQuery.easing.easeInBounce(a,2*b,0,d,e)+c:.5*jQuery.easing.easeOutBounce(a,2*b-e,0,d,e)+.5*d+c}});
/* ---------------------------------------------------------------------------
	* Scroll To Top
 	* --------------------------------------------------------------------------- */
	jQuery(document).ready(function($) {
		$("a.top-link").click(function() {
			$("html, body").animate({ scrollTop: 0 }, "slow");
			return false;
		});
	});
/* ---------------------------------------------------------------------------
	* Contact Form Styling
 	* --------------------------------------------------------------------------- */
	jQuery("a.comment-reply-link").click(function() {
		jQuery('#comments #respond').addClass('comment-area');
	});
	jQuery(function() {
		jQuery('.comment-respond #commentform').addClass('contact-form');
	});
/* ---------------------------------------------------------------------------
	* nice scroll for theme
 	* --------------------------------------------------------------------------- */
	function cs_nicescroll(){
		'use strict';	
		var nice = jQuery("html").niceScroll({mousescrollstep: "20",scrollspeed: "150",}); 
	}

	
/* ---------------------------------------------------------------------------
	* skill shortcode js function
 	* --------------------------------------------------------------------------- */
	function cs_skills_shortcode_script(){
		'use strict';	
		jQuery("[data-loadbar]").each(function(index){
			var d =jQuery(this) .attr('data-loadbar');
			var e =jQuery(this) .attr('data-loadbar-text');
			var ani = jQuery(this).find('div');
			jQuery(ani).animate({width:d+"%"},2000).next().html(e);
		}); 
	}
	cs_skills_shortcode_script();

/* ---------------------------------------------------------------------------
	* To check the Quantity of Tickets
 	* --------------------------------------------------------------------------- */
	function check_quantity(available_tickets){
		  value = jQuery("#quantity").val();
		  if(value == ''){
			  jQuery("#warning_message").show(50);
			  jQuery("#warning_message").text("Please Fill this Field");
				return false;
		  }
		  if( value > available_tickets ){
				jQuery("#warning_message").show(50);
				jQuery("#warning_message").text("Quantity should not be greater than "+available_tickets);
				return false;
		  }else if(value < 1){
			  jQuery("#warning_message").show(50);
				jQuery("#warning_message").text("Quantity should not be Less than 1");
				return false;
				}else{
				  jQuery("#warning_message").hide(50);
				  return true; 
		  }
	}
/* ---------------------------------------------------------------------------
	* Owl Slider Function
 	* --------------------------------------------------------------------------- */
	function cs_owl_slider(){
		
		jQuery(document).ready(function($){
			 var galleryslider = $("#galleryslider");
				var thumbslider = $("#thumbslider");
		
				galleryslider.owlCarousel({
				singleItem : true,
				slideSpeed : 1000,
				navigation: false,
				pagination:false,
				afterAction : syncPosition,
				responsiveRefreshRate : 200,
				});
		
				thumbslider.owlCarousel({
				items : 10,
				itemsDesktop      : [1199,10],
				itemsDesktopSmall     : [979,10],
				itemsTablet       : [768,8],
				itemsMobile       : [479,4],
				pagination:false,
				responsiveRefreshRate : 100,
				afterInit : function(el){
				el.find(".owl-item").eq(0).addClass("synced");
				}
				});
		
				function syncPosition(el){
					var current = this.currentItem;
					$("#thumbslider")
					.find(".owl-item")
					.removeClass("synced")
					.eq(current)
					.addClass("synced")
					if($("#thumbslider").data("owlCarousel") !== undefined){
					center(current)
					}
				}
		
				$("#thumbslider").on("click", ".owl-item", function(e){
				e.preventDefault();
				var number = $(this).data("owlItem");
				galleryslider.trigger("owl.goTo",number);
				});
		
				function center(number){
				var thumbslidervisible = thumbslider.data("owlCarousel").owl.visibleItems;
				var num = number;
				var found = false;
				for(var i in thumbslidervisible){
				if(num === thumbslidervisible[i]){
				var found = true;
				}
				}
		
				if(found===false){
				if(num>thumbslidervisible[thumbslidervisible.length-1]){
				thumbslider.trigger("owl.goTo", num - thumbslidervisible.length+2)
				}else{
				if(num - 1 === -1){
				num = 0;
				}
				thumbslider.trigger("owl.goTo", num);
				}
				} else if(num === thumbslidervisible[thumbslidervisible.length-1]){
				thumbslider.trigger("owl.goTo", thumbslidervisible[1])
				} else if(num === thumbslidervisible[0]){
				thumbslider.trigger("owl.goTo", num-1)
				}
		
				}	
			});
	}
/* ---------------------------------------------------------------------------
	* skills Function
 	* --------------------------------------------------------------------------- */
	function cs_skill_bar(){
		"use strict";	 
		jQuery(document).ready(function($){
			jQuery('.skillbar').each(function($) {
				jQuery(this).waypoint(function(direction) {
					jQuery(this).find('.skillbar-bar').animate({
						width: jQuery(this).attr('data-percent')
					}, 2000);
				}, {
					offset: "100%",
					triggerOnce: true
				});
			});
		});
	}

/* ---------------------------------------------------------------------------
	* Like Counter Function
 	* --------------------------------------------------------------------------- */
	function cs_like_counter(theme_url, post_id,likes,admin_url){
		"use strict";
		jQuery("#like_this"+post_id).html('<i class="fa fa-spinner fa-spin"></i>');
		var dataString = 'post_id=' + post_id+'&action=cs_likes_count';
		jQuery.ajax({
			type:"POST",
			url: admin_url,
			data:dataString, 
			success:function(response){
				 jQuery("#you_liked"+post_id).show();
				 jQuery("#like_this"+post_id).remove();
				 jQuery(".tooltip").removeClass('in');
				 jQuery(".like_counter"+post_id).html(response+' '+likes);
				 jQuery(".likes"+post_id).attr("title",response);
				 jQuery(".likes"+post_id).attr("data-original-title",response);
			}
		});
		//return false;
	}
/* ---------------------------------------------------------------------------
	* Tooltip Function
 	* --------------------------------------------------------------------------- */
	function cs_tooltip(){
		"use strict";
		jQuery(document).ready(function($) {
			$('.tooltip').tooltip('hide');
			$('.tooltip').popover('hide')
		});	
	}
	
/* ---------------------------------------------------------------------------
	* Piechart Function
 	* --------------------------------------------------------------------------- */
	function cs_piechart(id){
		"use strict";
		jQuery(document).ready(function($){
			// Circul Progress Function
			$('#chart'+id).waypoint(function(direction) {
				$(this).circliful();
			}, {
				offset: "100%",
				triggerOnce: true
			});
		});	
	}
/* ---------------------------------------------------------------------------
	* Parallex Function
	* --------------------------------------------------------------------------- */
	function cs_owl_carousel(id){
		"use strict";
		jQuery('#'+id).owlCarousel({
			loop:true,
			nav:true,
			margin: 15,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1000:{
					items:1
				}
			}
		})	
	}
/* ---------------------------------------------------------------------------
	* Parallex Function
	* --------------------------------------------------------------------------- */
	function cs_parallax_func(){
		"use strict";
		// Cache the Window object     
		jQuery('section.parallex-bg[data-type="background"]').each(function(){
			var $bgobj = jQuery(this); // assigning the object
			jQuery(window).scroll(function() {
				// Scroll the background at var speed
				// the yPos is a negative value because we're scrolling it UP!								
				var yPos = -(jQuery(window).scrollTop() / $bgobj.data('speed')); 
				// Put together our final background position
				var coords = '50% '+ yPos + 'px';
				// Move the background
				$bgobj.css({ backgroundPosition: coords });
			}); // window scroll Ends
		});
	}
/* ---------------------------------------------------------------------------
	*  Mail Chimp Funtion For Ajax Submit Function
	* --------------------------------------------------------------------------- */
	function cs_mailchimp_submit(theme_url,counter,admin_url){
		'use strict';
		$ = jQuery;
		$('#btn_newsletter_'+counter).hide();
		$('#process_'+counter).html('<div id="process_newsletter_'+counter+'"><i class="fa fa-refresh fa-spin"></i></div>');
		$.ajax({
			type:'POST', 
			url: admin_url,
			data:$('#mcform_'+counter).serialize()+'&action=cs_mailchimp', 
			success: function(response) {
				$('#mcform_'+counter).get(0).reset();
				$('#newsletter_mess_'+counter).fadeIn(600);
				$('#newsletter_mess_'+counter).html(response);
				$('#btn_newsletter_'+counter).fadeIn(600);
				$('#process_'+counter).html('');
			}
		});
	}
/* ---------------------------------------------------------------------------
	* CountDown Function
	* --------------------------------------------------------------------------- */
	function cs_event_countdown(year_event,month_event,date_event,hours,mints,id){
		"use strict";
		var austDay = new Date();
		austDay = new Date(year_event,month_event-1,date_event,hours,mints);
		jQuery('#defaultCountdown'+id).countdown({until: austDay});
		jQuery('#year').text(austDay.getFullYear());
	}
/* ---------------------------------------------------------------------------
	* Counter Integers Function
	* --------------------------------------------------------------------------- */
	function cs_count_numbers(){	
		jQuery(document).ready(function($){
			jQuery('.custom-counter').counterUp({
				delay: 10,
				time: 1000
			});
		});
	}
	/*jQuery(document).ready(function($){
		jQuery('.custom-counter').counterUp({
			delay: 10,
			time: 1000
		});
	});*/
/* ---------------------------------------------------------------------------
	* Registration Vaidation Function
	* --------------------------------------------------------------------------- */			 
	function cs_registration_validation(admin_url,id){
		"use strict";
		jQuery('div#result_'+id).html('<i class="fa fa-spinner fa-spin"></i>').fadeIn();
		
		function newValues(id) {
			jQuery('#user_profile').val();
			var serializedValues = jQuery("#wp_signup_form_"+id).serialize();
			return serializedValues;
		}
		var serializedReturn = newValues(id);
		jQuery('div#result_'+id).removeClass('success error');
		jQuery.ajax({
			type:"POST",
			url: admin_url,
			dataType: 'json',
			data:serializedReturn, 
				
			success:function(response){
				if ( response.type == 'error' ) {
					jQuery('div#result_'+id+' .fa-spin').remove();
					jQuery("div#result_"+id).removeClass('success').addClass( "error" );
					jQuery("div#result_"+id).show();
					jQuery('div#result_'+id).html(response.message);
				} else if ( response.type == 'success' ) {
					jQuery('div#result_'+id+' .fa-spin').remove();
					jQuery("div#result_"+id).removeClass('error').addClass( "success" );
					jQuery("div#result_"+id).show();
					jQuery('div#result_'+id).html(response.message);
					
				}
			}
		});
	}
/* ---------------------------------------------------------------------------

/* ---------------------------------------------------------------------------
	* User Autentication Function
	* --------------------------------------------------------------------------- */			 
	function cs_user_authentication(admin_url,id){
		"use strict";
		jQuery('.login-form-id-'+id+' .status-message').addClass('cs-spinner');
		jQuery('.login-form-id-'+id+' span.status').html('<i class="fa fa-spinner fa-spin"></i>').fadeIn();
		
		function newValues(id) {
			var serializedValues = jQuery("#ControlForm_"+id).serialize();
			return serializedValues;
		}
		var serializedReturn = newValues(id);
		jQuery('.login-form-id-'+id+' .status-message').removeClass('success error');
        jQuery.ajax({
            type:"POST",
			url: admin_url,
			dataType: 'json',
			data:serializedReturn, 
            success: function(data){
				jQuery('.login-form-id-'+id+' .status-message').html(data.message);
				jQuery('.fa-spin').remove();
				
                if (data.loggedin == false){
					jQuery('.login-form-id-'+id+' .status-message').removeClass('success').addClass( "error" );
					jQuery('.login-form-id-'+id+' .status-message').removeClass('cs-spinner');
                    jQuery('.login-form-id-'+id+' .status-message').html(data.message);
					jQuery('.login-form-id-'+id+' .status-message').show();
                }else if (data.loggedin == true){
					jQuery('.login-form-id-'+id+' .status-message').removeClass('error').addClass( "success" );
					jQuery('.login-form-id-'+id+' .status-message').removeClass('cs-spinner');
					jQuery('.login-form-id-'+id+' .status-message').html(data.message);
					jQuery('.login-form-id-'+id+' .status-message').show();
                    document.location.href = data.redirecturl;
                }
            }
        });
	}
/* ---------------------------------------------------------------------------

	 * Delete Media image
	 * --------------------------------------------------------------------------- */
	function del_media(id) {
		"use strict";
		var $ = jQuery;
		jQuery('#' + id + '_box').hide();
		jQuery('#' + id).val('');
	}
/* ---------------------------------------------------------------------------
	 * My Carousel
	 * --------------------------------------------------------------------------- */
	function mycarousel_initCallback(carousel) {
		"use strict";
		jQuery('.jcarousel-control a').bind('click', function() {
			carousel.scroll(jQuery.jcarousel.intval(jQuery(this).text()));
			return false;
		});
		jQuery('.jcarousel-scroll select').bind('change', function() {
			carousel.options.scroll = jQuery.jcarousel.intval(this.options[this.selectedIndex].value);
			return false;
		});
		jQuery('.jcarousel-next').bind('click', function() {
			carousel.next();
			return false;
		});
		jQuery('.jcarousel-prev').bind('click', function() {
			carousel.prev();
			return false;
		});
	};
/* ---------------------------------------------------------------------------
	 * Masonary Function
	 * --------------------------------------------------------------------------- */
	function cs_masonary_js(){
		"use strict";
		var container = jQuery(".mas-isotope").imagesLoaded(function() {
			container.isotope()
		});
		jQuery(window).resize(function() {
			setTimeout(function() {
				jQuery(".mas-isotope").isotope()
			}, 600)
		});
	}
/* ---------------------------------------------------------------------------
	 * Add to Wishlist Function
	 * --------------------------------------------------------------------------- */
	function cs_addto_wishlist(admin_url, post_id,type){
		"use strict";
		 var dataString = 'post_id=' + post_id+'&type='+type+'&action=cs_addto_usermeta';
		 jQuery(".post-"+post_id+" .cs-add-wishlist").html('<i class="fa fa-spinner fa-spin"></i>');
			jQuery.ajax({
				type:"POST",
				url: admin_url,
				data: dataString,
				success:function(response){
					jQuery(".post-"+post_id+" .cs-add-wishlist").html(response);
					jQuery(".post-"+post_id+" a.cs-add-wishlist").removeAttr("onclick");
				}
		});
	
		return false;
	}
/* ---------------------------------------------------------------------------
	 * Remove Wishlist Function
	 * --------------------------------------------------------------------------- */
	function cs_delete_wishlist(admin_url, post_id){

		"use strict";
		 var dataString = 'post_id=' + post_id+'&action=cs_delete_wishlist';
		 jQuery(".post-"+post_id+" a.custom-btn").html('<i class="fa fa-spinner fa-spin"></i>');
			jQuery.ajax({
				type:"POST",
				url: admin_url,
				data: dataString,
				success:function(response){
					//jQuery(".fig-"+post_id+" .cs-add-wishlist").html('<i class="fa fa-heart"></i>'+response);
					jQuery(".post-"+post_id+"").parent().remove();
					//slideout();
				
				}
		});
	
		return false;
	}
	
/* ---------------------------------------------------------------------------
	 * widget Flex Slider
	 * --------------------------------------------------------------------------- */

	function cs_widget_flex_slider(counter){
		
		"use strict";
		jQuery('.widget_slider .flexslider').flexslider({
			 animation: "fade",
			 prevText: "<span class='btnprev'></span>",
			 nextText: "<span class='btnnext'></span>",
			 slideshowSpeed: 4000,
			 start: function(slider) {
				jQuery('.flexslider'+counter).fadeIn();
			}
		
		  });	
	}

/* ---------------------------------------------------------------------------
	 * Flex Slider
	 * --------------------------------------------------------------------------- */

	function cs_flex_slider(fx_speed, fx_pause_time, fx_counter, fx_effect, fx_auto_play){
		
		"use strict";
		var speed = fx_speed; 
		var slidespeed = fx_pause_time;
		jQuery('#flexslider'+fx_counter+' .flexslider').flexslider({
			animation: fx_effect, // fade
			slideshow: fx_auto_play,
			slideshowSpeed:speed,
			animationSpeed:slidespeed,
			prevText:"<em class='fa fa-long-arrow-left'></em>",
			nextText:"<em class='fa fa-long-arrow-right'></em>",
			start: function(slider) {
				jQuery('.flexslider').fadeIn();
			}
		});
	}


/* ---------------------------------------------------------------------------
	 * Upload Browse Button Style
	 * --------------------------------------------------------------------------- */


	function cs_user_profile_picture_del(picture_class,user_id,admin_url){
		var dataString='picture_class=' + picture_class + 
				'&user_id=' + user_id +
				'&action=cs_admin_user_profile_picture_ajax';
		jQuery(".profile-loading").html('<i class="fa fa-spinner fa-spin fa-2x"></i>');
		jQuery.ajax({
			type:"POST",
			url: admin_url,
			data:dataString, 
			success:function(response){
				if(response != 'error'){
					jQuery("article figure").html(response);
					jQuery("#user_avatar_display_box").remove();
					jQuery(".profile-loading").html('');
				} else {
					jQuery(".profile-loading").html(' There is error while removing profile picture.');
				}
				
			}
		});
		return false;
	}
