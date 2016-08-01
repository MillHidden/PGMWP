$(document).ready(function($) {
	$("form#resetPasswordForm").submit(function(){
        action = 'ajaxresetpass';
		password = $('form#connexion #pass').val();
		password2 = $('form#connexion #pass2').val();
		security = $('form#connexion #resetpasswordsecurity').val();
		userlogin = $('form#connexion #user_login').val();
		userkey = $('form#connexion #user_key').val();

		ctrl = $(this);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_auth_object.ajaxurl,
            data: {
                'action': action,
                'password': password,
                'password2' : password2,
				'security': security,
				'user_login' : userlogin,
				'user_key' : userkey
            },
            success: function (data) {
				$('p.status', ctrl).text(data.message);                
            }

        });
        e.preventDefault();
    });
}