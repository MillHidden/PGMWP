-$(document).ready(function($) {
	var channelname = 'puregamemedia'; // nom de la chaine à suivre
	var timecookie = 15;  // durée de vie du cookie en jours	
	var accesstoken = readCookie("PGMCookieuser"); // lecture du cookie
	var redirect = 'http://localhost/PGMWP/dashboard/'; // redirection défini dans l'api
	var client_id = 't6a5c7t3yr8usx1yh3kuse4w3uwlq5r'; // client id définie dans l'api"
	var username;

	$('#follow').html("").hide();

	/* initialisation api twitch */		
	Twitch.init({
			clientId: client_id,
			redirect_uri: redirect
		}, 
		function(error, status){
		if (error){
			$('#login').html("fail");

		}else {

			$('#login').click(function(){
				Twitch.login({
					scope: ['user_read', 'user_follows_edit']					
				});
			});					
			
			if ((accesstoken == null) || (accesstoken == "undefined")){
				if (status.authenticated){
					$('#login').html("").hide();					
					Twitch.api({method: 'user'}, function(error, user) {						
						username = user.display_name;
						getFollow(username, channelname);						
						$('#follow').show();
		          		accesstoken = Twitch.getToken();
		          		createCookie("PGMCookieuser", accesstoken, timecookie);
		          	});          	         	       	
				}								
			}else{				
				url = "https://api.twitch.tv/kraken/?oauth_token=" + accesstoken;
				$.ajax({
					url : url,
					dataType : "json"
				}).done(function (data, status, xhr){
					if (data.token.valid) {
						username = data.token.user_name;
						getFollow(username, channelname);
		          		$('#follow').show();
		          		$('#login').html("").hide();
		          		          		
					}else{
						eraseCookie("PGMCookieuser");							
					}
				});
			}
		}	
	});	

	$("#follow").click(function(){
		var value = $("#follow").attr("value");
		
		var url = "https://api.twitch.tv/kraken/users/"+username+"/follows/channels/"+channelname+"?oauth_token="+accesstoken;
		var meth;

		if (value == "true"){				
			meth = "PUT";		
			
		}else if (value == "false"){
			meth = "DELETE";
		}

		$.ajax({
			url : url,
			method : meth
		})
		.done(function(){
			getFollow(username, channelname);
		})
		.fail(function(){
			$('#follow').html("Erreur...");
		});			
	});
});

function getFollow(username, channelname){	
	url = "https://api.twitch.tv/kraken/users/"+username+"/follows/channels/"+channelname;	

	$.get(url, {format: "json"})
	.done(function(){	
		$('#follow').attr("value", false).html("<a class=\"text-ghostwhite\"><span class=\"glyphicon glyphicon-heart\"></span>");						
	})
	.fail(function (){		
		$('#follow').attr("value", true).html("<a><span class=\"glyphicon glyphicon-heart\"></span>Suivre</a>");
	})
	;	
}

function createCookie(name, value, days) {
    var expires;

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = encodeURIComponent(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}