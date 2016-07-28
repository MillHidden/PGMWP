-$(document).ready(function($) {
	var channelname = 'puregamemedia'; // nom de la chaine à suivre
	var timecookie = 15;  // durée de vie du cookie en jours	
	var username;
	var accesstoken;

	$.post(
		MyAjax.ajaxurl, {
			'action'		: 'getinfo',
			'target'		: 'user',
			'elem_id'		: $("#user_id").val(),
			'id'			: 'twitchToken',
			'value'			: 'accesstoken',
			'securite_nonce': $("#securite_nonce").val(),
		}
	).done(function(data, status, xhr) {
		accesstoken = JSON.parse(data).value;

		/* initialisation api twitch */	
		Twitch.init({
			clientId: PGM.key,			
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

				$('#logout').click(function(){
					Twitch.logout(function(error) {
					    // the user is now logged out
					    $('#follow').hide();				    
					});				
				});					
				
				if ((accesstoken == null) || (accesstoken == "")) {
					if (status.authenticated){
						Twitch.api({method: 'user'}, function(error, user) {						
							username = user.display_name;
							getFollow(username, channelname);						
							$('#follow').show();
			          		accesstoken = Twitch.getToken();
			          		$.post(
			          			MyAjax.ajaxurl, {
			          				'action'		: 'update',
			          				'target'		: 'user',
			          				'elem_id'		: $("#user_id").val(),
			          				'id'			: 'twitchToken',
			          				'value'			: accesstoken,
			          				'securite_nonce': $("#securite_nonce").val(),
			          			}
			          		);		
			          	});
			          	$('#login').html("").hide();					          	         	       	
					}						
				}
				else {
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
			          		$.post(
			          			MyAjax.ajaxurl, {
			          				'action'		: 'update',
			          				'target'		: 'user',
			          				'elem_id'		: $("#user_id").val(),
			          				'id'			: 'twitchToken',
			          				'value'			: accesstoken,
			          				'securite_nonce': $("#securite_nonce").val(),
			          				dataType		: "json",
			          			}
			          		);   		
						}
					});
				}
			}	
		});	
						
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
	});	
}
