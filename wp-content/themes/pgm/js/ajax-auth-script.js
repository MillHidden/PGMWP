
$(document).ready(function ($) {

    // Display form from link inside a popup
	$('#pop_login, #pop_signup, #pop_lost').on('click', function (e) {
        switch ($(this).attr('id')){
            case 'pop_signup' :
                formToFadeOut = new Array(
                    $('form#connexion'),
                    $('form#lostpassword')                    
                );
                formtoFadeIn = $('form#inscription');
                break;
            case 'pop_login' :
                formToFadeOut = new Array(
                    $('form#inscription'),
                    $('form#lostpassword')
                );
                formtoFadeIn = $('form#connexion');
                break;
            case 'pop_lost' :
                formToFadeOut = new Array(
                    $('form#inscription'),
                    $('form#connexion')
                );
                formtoFadeIn = $('form#lostpassword');
                break;
            default : 
                formToFadeOut = new Array(
                    $('form#inscription'),
                    $('form#connexion'),
                    $('form#lostpassword')
                );
                formtoFadeIn = "";
        }
        for (var i = 0, len = formToFadeOut.length; i < len ; i++) {
            formToFadeOut[i].fadeOut(500);
        }
        formtoFadeIn.fadeIn();       

        return false;
    });

	// Close popup
    $(document).on('click', '.login_overlay, .close', function () {
		console.log("popup");
        $('form#connexion, form#inscription, form#lostpassword' ).fadeOut(500, function () {
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
	$('form#connexion, form#inscription, form#lostpassword').on('submit', function (e) {
        
        if (!$(this).valid()){
            return false;
        } 
        $('p.status', this).show().text(ajax_auth_object.loadingmessage);
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
		} else if ($(this).attr('id') == 'lostpassword') {
            action = 'ajaxlost';
            username = $('#lostusername').val();
            security = $('#lostpasswordsecurity').val();
            password = '';
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
		$("#inscription").validate({
			rules: {
                signonname: "required",
                email: {
                    required: true,
                    email: true,
                },
                signonpassword: "required",
                password2: { 
                    required: true,                    
                    equalTo: "#signonpassword",
                },
                check: {
                    required: true,
                }
            },
            messages: {
                signonname: "entrer un username",
                email: {
                    required: "Ce champ est obligatoire",
                    email: "entrer une adresse mail valide",
                },
                signonpassword: "Ce champ est obligatoire",
                password2: {
                    required: "Ce champ est obligatoire",
                    equalTo: "Les deux mots de passe doivent correspondre",
                },
                check: {
                    required: "Vous devez approuver le règlement",
                }
            }

        });
    else if ($("#connexion").length) 
		$("#connexion").validate();
});