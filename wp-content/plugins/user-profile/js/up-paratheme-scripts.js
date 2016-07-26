
jQuery(document).ready(function($)
	{



	$(document).on('click', '.author-follow', function(event)
		{
			var author_id = $(this).attr('authorid');
			
			$.ajax(
				{
			type: 'POST',
			url:up_paratheme_ajax.up_paratheme_ajaxurl,
			data: {"action": "up_paratheme_update_follow", "authorid":author_id },
			success: function(data)
					{	
					
							
						var html = JSON.parse(data)
						
						var login_error = html['login_error'];
						var follow_success = html['follow_success'];						
						var self_follow = html['self_follow'];	
						var unfollow_success = html['unfollow_success'];
						var follow_class = html['follow_class'];
						var follower_html = html['follower_html'];																		
						var follower_id = html['follower_id'];											
						var follower_count_msg = html['follower_count_msg'];											
											
						$('.follower-list').prepend(follower_html);			
									
						
						if(unfollow_success)
							{
								$('.author-follow-count').html(follower_count_msg);								
								$('.follower-mgs').html(unfollow_success).fadeIn();								
								$('.follower-list .follower-'+follower_id).hide();	
							}	
								
						if(self_follow)
							{
								$('.follower-mgs').html(self_follow).fadeIn();								
	
							}
						if(login_error)
							{
								$('.follower-mgs').html(login_error).fadeIn();								
	
							}							
						if(follow_success)
							{
								$('.author-follow-count').html(follower_count_msg);				
								$('.follower-mgs').html(follow_success).fadeIn();								
	
							}	
							
							
																				
						setTimeout(function(){ 
						
						$('.follower-mgs').fadeOut();
						
						
						 }, 3000);				
											
		
						
						if(follow_class == 'follow_yes')
							{
								$('.author-follow').addClass('following');	
								$('.author-follow').html('Following');
							}
						else
							{
								$('.author-follow').removeClass('following');	
								$('.author-follow').html('Follow');
							}
					}
				});	
			
		})

		$(document).on('click', '.new_user_meta', function()
			{	
				jQuery('.create-new-field').css("display","block");
				
				jQuery(this).removeClass("new_user_meta");
				jQuery(this).addClass("new_up_paratheme_submit");
				jQuery(this).html("Submit New Field");
				
			
		});	
			


		$(document).on('click', '.new_up_paratheme_submit', function()
			{	
				
				var icon = jQuery('.up_paratheme_input_fields_icon:checked').val();
				var lable = jQuery('.up_paratheme_input_fields_lable').val();				
				var meta = jQuery('.up_paratheme_input_fields_meta').val();				
				var type = jQuery('.up_paratheme_input_fields_type').val();
				var tooltip = jQuery('.up_paratheme_input_fields_tooltip').val();								
				
				if(meta == "")
					{
						alert("Meta Key field empty.");
					}
				else
					{
						jQuery.ajax(
							{
						type: 'POST',
						url:up_paratheme_ajax.up_paratheme_ajaxurl,
						data: {"action": "up_paratheme_add_new_field", "icon":icon,"lable":lable,"meta":meta,"type":type,"tooltip":tooltip, },
						success: function(data)
								{	
									
									
									jQuery(".up-paratheme-submit-status").css("display","block");
									jQuery(".up-paratheme-submit-status").html("New Meta added successful.");
								
									jQuery('.create-new-field').fadeOut();
			
									jQuery(".new_up_paratheme_submit").addClass("new_user_meta");
									jQuery(".new_user_meta").removeClass("new_up_paratheme_submit");
									jQuery(".new_user_meta").html("Add New Field");
									
									location.reload();
									
									//alert(data);
									
								}
							});
					}
				

			});	
			
			
			
			
			
			
			
		$(document).on('click', '.up_paratheme_reset', function()
			{
				
			var value =	confirm("Do you really want to reset ?");
			
			if( value == true )
				{
					jQuery.ajax(
						{
					type: 'POST',
					url:up_paratheme_ajax.up_paratheme_ajaxurl,
					data: {"action": "up_paratheme_reset"},
					success: function(data)
							{	
								
								
								jQuery(".up_paratheme_reset_status").css("display","block");
								
								setTimeout(function(){
									
									jQuery(".up_paratheme_reset_status").fadeOut();
									location.reload();
									},2000);
									
								
								
								
								
							}
						});
				}
				

		
			})
			
			
			
		$(document).on('click', '.remove-field', function()
			{
				
				var meta = jQuery(this).attr("field-value");

				
			var confirmation =	confirm("Do you really want to delete "+ meta +" ?");
			
			if( confirmation == true )
				{
					jQuery.ajax(
						{
					type: 'POST',
					url:up_paratheme_ajax.up_paratheme_ajaxurl,
					data: {"action": "up_paratheme_delete_field","meta":meta},
					success: function(data)
							{	
								
								location.reload();
								

								
							}
						});
				}
				

		
			})
			
			






		$(document).on('click', '.author-tab-nav li', function()
			{
				
				//alert("Hello");
				
				
				$(".active").removeClass("active");
				$(this).addClass("active");
				
				var nav = $(this).attr("nav");
				
				$(".author-tab-box li.tab-box").css("display","none");
				$(".box"+nav).css("display","block");
		
			})







			

	});	
