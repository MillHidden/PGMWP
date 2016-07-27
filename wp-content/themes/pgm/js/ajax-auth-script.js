
jQuery(document).ready(function ($) {

    // Display form from link inside a popup
	$('#pop_login, #pop_signup').on('click', function (e) {
        console.log("popup");
        formToFadeOut = $('form#inscription');
        formtoFadeIn = $('form#connexion');
        if ($(this).attr('id') == 'pop_signup') {
            formToFadeOut = $('form#connexion');
            formtoFadeIn = $('form#inscription');
        }
        formToFadeOut.fadeOut(500, function () {
            formtoFadeIn.fadeIn();
        })

        return false;
    });

	// Close popup
    $(document).on('click', '.login_overlay, .close', function () {
		console.log("popup");
        $('form#connexion, form#inscription').fadeOut(500, function () {
            $('.login_overlay').remove();
        });
        return false;
    });

    // Show the login/signup popup on click
    $('#show_login, #show_signup').on('click', function (e) {
        $('body').prepend('<div class="login_overlay"></div>');
        if ($(this).attr('id') == 'show_signup') 
			$('form#inscription').fadeIn(500);
        else 
			$('form#connexion').fadeIn(500);
        e.preventDefault();
    });

	// Perform AJAX login/register on form submit
	$('form#connexion, form#inscription').on('submit', function (e) {
        if (!$(this).valid()) return false;
        //$('p.status', this).show().text(ajax_auth_object.loadingmessage);
		action = 'ajaxlogin';
		username = 	$('form#connexion #username').val();
		password = $('form#connexion #password').val();
		email = '';
		security = $('form#connexion #security').val();

		if ($(this).attr('id') == 'inscription') {
			action = 'ajaxregister';
			username = $('#signonname').val();
			password = $('#signonpassword').val();
        	email = $('#email').val();
        	security = $('#signonsecurity').val();	
		}  
		ctrl = $(this);
		$.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_auth_object.ajaxurl,
            data: {
                'action': action,
                'username': username,
                'password': password,
				'email': email,
                'security': security
            },
            success: function (data) {
				$('p.status', ctrl).text(data.message);
				if (data.loggedin == true) {
                    document.location.href = ajax_auth_object.redirecturl;
                }
            }
        });
        e.preventDefault();
    });
	
	// Client side form validation
   if ($("#inscription").length) 
		$("#inscription").validate(
		{ 
			rules:{
			password2:{ equalTo:'#signonpassword' 
			}	
		}}
		);
    else if ($("#connexion").length) 
		$("#connexion").validate();
});