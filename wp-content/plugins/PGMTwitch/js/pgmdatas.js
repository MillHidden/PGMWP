$(document).ready(function($) {

	var timecall = 3000;  // temps entre deux récupération datas twitch en millisecondes
	var channelname = 'puregamemedia'; // nom de la chaine à suivre
	
	/* lecture datas du stream */	
	getDatasCall(channelname);
	setInterval(getDatasCall, timecall, channelname);
	
	function getDatasCall(channelname){
		var url = "https://api.twitch.tv/kraken/streams/"+channelname;
			
		$.ajax({
			url : url,
			dataType : "json"
		})
		.done(function (data, status, xhr){		
			stream = data.stream;

			if (stream != null) {

				left_bloc1 = $('<div />', {
					class : "text-left-bloc"
				});
				
				live = $('<span />', {
					class : "glyphicon glyphicon-facetime-video "
				}).html(" En live avec ");				

				streamer = $('<span />', {
					class : "text-purple"
				}).html("Earil");

				live.append(streamer);

				joue = $('<span />', {
					class : "glyphicon glyphicon-play-circle"
				}).html(" joue à ")
				
				game =  $('<span />', {
					class : "text-blue"
				}).html(stream.game);

				img_viewers = $('<span />', {
					class : "glyphicon glyphicon-info-sign"
				});

				viewers = $('<span />', {
					class : "text-red"
				}).html(stream.viewers);

				left_bloc1
					.append(live)
					.append("<br>")
					.append(joue)
					.append("<br>")
					.append(game)
					.append("<br>")
					.append(img_viewers)
					.append(viewers)
					.append(" regardent le live");
				
				left_bloc2 = $('<div />', {
					class : "text-left-bloc"
				});

				vues = $('<span />', {
					class : "glyphicon glyphicon-eye-open"
				}).html(stream.channel.views);

				followers = $('<span />', {
					class : "glyphicon glyphicon-heart"
				}).html(stream.channel.followers);

				left_bloc2
					.append(vues)
					.append(" vues ")
					.append(followers)
					.append(" followers");

				$("#twitchdatas").html("");

				$("#twitchdatas")
					.append(left_bloc1)
					.append(left_bloc2);

				$("#title-stream").html(stream.channel.status);

				timecall = 3000;
			}
			else {


				url = "https://api.twitch.tv/kraken/channels/"+channelname;
				$.ajax({
					url : url,
					dataType : "json"
				})
				.done(function (data, status, xhr){

					div_left_bloc = $('<div />', {
						class : "text-left-bloc"
					});	
					div_social_bloc = $('<div />', {
						class : "social-left-bloc"
					});
					span_views = $('<span />', {
						class : "glyphicon glyphicon-eye-open"
					}).html(data.views );
					span_followers = $('<span />', {
						class : "glyphicon glyphicon-heart"
					}).html(data.followers);				
					
					div_social_bloc
						.append(span_views)
						.append(span_followers);

					div_left_bloc
						.append("TV offline")
						.append(div_social_bloc);

					$("#twitchdatas").html("");

					$("#twitchdatas").append(div_left_bloc);

					timecall = 20000;

				})
				.fail(function(){
					$("#twitchdatas").html("il y a eu des erreurs...");
				});
			}
		})
		.fail(function(){
			$("#twitchdatas").html("il y a eu des erreurs...");
		});

	}
});

