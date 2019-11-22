(function($) { 
	$(function() {
		var cs_google_connect = function(id) {
			var google_auth = $('.social_login_google_auth');
			var client_id = google_auth.find('input[type=hidden][name=client_id]').val();
			var redirect_uri = google_auth.find('input[type=hidden][name=redirect_uri]').val();
			if(client_id == "") {
				$(" #"+id+" .fb-social-login").hide();
				$(" #"+id+" .tw-social-login").hide();
				$(" #"+id+" .gplus-social-login").show();
			} else {
				$(" #"+id+" .fb-social-login").hide();
				$(" #"+id+" .tw-social-login").hide();
				$(" #"+id+" .gplus-social-login").hide();
				window.open(redirect_uri,'_self');
			}
		};

			var cs_twitter_connect = function(id) {
			var twitter_auth = $('.social_login_twitter_auth');
			var client_id = twitter_auth.find('input[type=hidden][name=client_id]').val();
			var redirect_uri = twitter_auth.find('input[type=hidden][name=redirect_uri]').val();
			
			if(client_id == "") {
				$(" #"+id+" .gplus-social-login").hide();
				$(" #"+id+" .fb-social-login").hide();
				$(" #"+id+" .tw-social-login").show();
			} else {
				$(" #"+id+" .gplus-social-login").hide();
				$(" #"+id+" .fb-social-login").hide();
				$(" #"+id+" .tw-social-login").hide();
				window.open(redirect_uri,'','scrollbars=no,menubar=no,height=400,width=800,resizable=yes,toolbar=no,status=no');
			}
		};

		var cs_facebook_connect = function(id) {
			var facebook_auth = $('.social_login_facebook_auth');
			var client_id = facebook_auth.find('input[type=hidden][name=client_id]').val();
			var redirect_uri = facebook_auth.find('input[type=hidden][name=redirect_uri]').val();
  			if(client_id == "") {
				$(" #"+id+" .gplus-social-login").hide();
				$(" #"+id+" .tw-social-login").hide();
				$(" #"+id+" .fb-social-login").show();
				//alert("Social Login API'S has not been configured for this provider");
			} else {
				$(" #"+id+" .gplus-social-login").hide();
				$(" #"+id+" .tw-social-login").hide();
				$(" #"+id+" .fb-social-login").hide();
				window.open('https://graph.facebook.com/oauth/authorize?client_id=' + client_id + '&redirect_uri=' + redirect_uri + '&scope=email',
				'','scrollbars=no,menubar=no,height=400,width=800,resizable=yes,toolbar=no,status=no');
			}
		};

		$(".social_login_login_facebook").on("click", function() {
			var id	= $(this).attr('id');
			cs_facebook_connect(id);
		});

		$(".social_login_login_continue_facebook").on("click", function() {
			var id	= $(this).attr('id');
			cs_facebook_connect(id);
		});

		$(".social_login_login_twitter").on("click", function() {
			var id	= $(this).attr('id');
			cs_twitter_connect(id);
		});

		$(".social_login_login_continue_twitter").on("click", function() {
			var id	= $(this).attr('id');
			cs_twitter_connect(id);
		});
		
		$(".social_login_login_google").on("click", function() {
			var id	= $(this).attr('id');
			cs_google_connect(id);
		});
		
/*
		$(".social_login_login_google").on("click", function() {
			cs_google_connect();
		});

		$(".social_login_login_continue_google").on("click",function() {
			cs_google_connect();
		});*/

	});
})(jQuery);


window.wp_social_login = function(config) {
	jQuery('#loginform').unbind('submit.simplemodal-login');

	var form_id = '#loginform';

	if(!jQuery('#loginform').length) {
		// if register form exists, just use that
		if(jQuery('#registerform').length) {
			form_id = '#registerform';
		} else {
			// create the login form
			var login_uri = jQuery("#social_login_form_uri").val();
			jQuery('body').append("<form id='loginform' method='post' action='" + login_uri + "'></form>");
			if (!jQuery('#setupform').length) {
				jQuery('#loginform').append("<input type='hidden' id='redirect_to' name='redirect_to' value='" + window.location.href + "'>");
			}
		}
	}

	jQuery.each(config, function(key, value) { 
		jQuery("#" + key).remove();
		jQuery(form_id).append("<input type='hidden' id='" + key + "' name='" + key + "' value='" + value + "'>");
	});  

	if(jQuery("#simplemodal-login-form").length) {
		var current_url = window.location.href;
		jQuery("#redirect_to").remove();
		jQuery(form_id).append("<input type='hidden' id='redirect_to' name='redirect_to' value='" + current_url + "'>");
	}

	jQuery(form_id).submit();
}
