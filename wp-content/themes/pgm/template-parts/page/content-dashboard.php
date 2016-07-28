<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PureGameMedia
 */
// this can live in /themes/mytheme/functions.php, or maybe as a dev plugin?


$userdata = get_userdata( get_current_user_id() );

?>

<div class="container">
  <div class="row">
    <div class="col-md-2 separator give-right left-side">
    </div>
    <div class="col-md-6 col-sm-12 separator">
      <h1 id="title-stream" class="title-stream"></h1>
    </div>
    <div class="col-md-4 separator pull-right give-title-right margin-title-right">
      <span class="title-right-bloc pull-right">Rejoins la communauté !</span>
    </div>
  </div>
  
  <div class="row">
	<div class="col-md-2 give-right left-side">
	  <div class="row">
			<div class="col-md-12">
			<?php echo do_shortcode('[contentblock id=2]'); ?>
			</div>
	  </div>
	  <div class="col-md-12 separator separator-margin">
	  </div>
	  <div class="row">
			<div class="col-md-12">
		    <!-- TWITTER -->
			<?php echo do_shortcode('[contentblock id=6]'); ?>
			</div>
	  </div>
	  <div class="row">
			<div class="col-md-12 separator separator-margin">
			</div>
			<div class="col-md-12">
			<?php echo do_shortcode('[contentblock id=3]'); ?>
			</div>
	  </div>
	  <div class="row">
			<div class="col-md-12 separator separator-margin">
			</div>
			<div class="col-md-12">
			<!-- FACEBOOK -->
			<?php echo do_shortcode('[contentblock id=7]'); ?>
			</div>
	  </div>
	  <div class="row">
			<div class="col-md-12 separator separator-margin">
			</div>
			<div class="col-md-12">
			<?php echo do_shortcode('[contentblock id=4]'); ?>
			</div>
	  </div>
	</div>	

	<div class="col-md-6">
	  <div class="row">
			<div class="col-md-12 embed-responsive embed-responsive-16by9">
			<?php echo do_shortcode('[embedTwitch]'); ?>
			</div>
	  </div>

	  <div class="row">
	  	<div class="col-xs-12">
	  		<hr>
	  	</div>
	  </div>
	  
	  <div class="row">			
			<div class="col-xs-12 col-sm-6">
			  <div class="row">
			  	<div class="col-xs-6">
			  		<?php echo get_avatar(get_current_user_id()); ?>			  		
			  	</div>
			  	<div class="col-xs-6">			  		
			  		<div class="row">
			  			<?php echo '<input type="hidden" value="user" id="update_target" />';?>
			  			<?php echo '<input type="hidden" value="' . wp_create_nonce('securite-nonce') . '" id="securite_nonce" />';?>
			  			<?php echo '<input type="hidden" value="' . $userdata->id . '" id="user_id" />';?>			  			
			  			<?php echo '<p><span class="editable" id="display_name">' . $userdata->display_name . '</span></p>';?>
			  			<?php echo '<em>'. $userdata->user_email . '</em>'; ?>
			  			
			  		</div>
			  		<div class="row">
							<div class="col-xs-12">
								modifier mon mot de passe
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								Profil complété à <span id="complete"><?php echo $userdata->complete; ?></span> %
							</div>
						</div>
			  	</div>			  		  
			 	</div>			  		  
			</div>
			<div class="col-xs-12 col-sm-6">
			  <div class="row">
			  	<div class="col-xs-8">
			  		<div class="row">
			  			<div class="col-xs-12">
								<p><img src="<?php echo get_bloginfo('template_directory');?>/images/menu_index/tab-facebook.png" alt="facebook">
									<?php 
										$echoFB = "<span class='editable' id='facebook'>";
											if ($userdata->facebook != ""){
												$echoFB .= $userdata->facebook;
											}else {
												$echoFB .= "Indiquez votre page Facebook ici";
											}
											$echoFB .= "</span>";
										echo $echoFB;
									?>
								</p>
							</div>							
							<div class="col-xs-12">
								<p><img src="<?php echo get_bloginfo('template_directory');?>/images/menu_index/tab-tweeter.png" alt="twitter">
									<?php 
										$echoTW = "<span class='editable' id='twitter'>";
											if ($userdata->twitter != ""){
												$echoTW .= $userdata->twitter;
											}else {
												$echoTW .= "Indiquez votre page Twitter ici";
											}
											$echoTW .= "</span>";
										echo $echoTW;
									?>									
								</p>
							</div>
						</div>
					</div>
					<div class="col-xs-4">
						<div id="login" class="text-right-bloc col-xs-12">Lier à twitch </div>
			  		<div id="follow" class="text-right-bloc col-xs-12"></div>
					</div>			  	
			  </div>			  
			 	
			</div>
		</div>
		<div class="row">
	  	<div class="col-xs-12">
	  		<hr>
	  	</div>
	  </div>
		<div class="row">			
			<div class="col-md-5">
				<?php 
						$echoDesc = "<p class='edit_area' id='description' style='word-wrap: break-word'>";
						if ($userdata->user_description != ""){
							$echoDesc .= str_replace(array("\r\n","\n"),'<br />',$userdata->user_description);
						}else {
							$echoDesc .= "à propos de moi";
						}
						$echoDesc .= "</p>";
					echo $echoDesc;
				?>			  
			</div>
			<div class="col-md-7">
				<div class="row">			  	
			  	<div class="col-xs-4 col-xs-offset-2">
			  		<?php 
			  			$nbtickets = get_user_meta($userdata->id, 'nbTickets', true);
			  			if (!$nbtickets) {
			  				$nbtickets = 0;
			  			}
			  			echo $nbtickets;
			  		?>
			  		Tickets
			  	</div>
			  	<div class="col-xs-6">
				  	<div class="buy-ticket">
				  		<a href="#"><span class="glyphicon glyphicon-tags"></span> Acheter un ticket</a>
				  	</div>
					</div>
			  </div>
			  <div class="row" style="display: flex;">
			  	<div class="col-xs-8">
			  		<img class="img-responsive" src="http://www.terresdefrance.com/sites/relais-terres-de-france/files/fichiers/weekend-sejour-location-vacances/bon-cadeau-cheque-cadeau.jpg">
			  		<br>
			  		Tirage au sort le <strong>31 août 2016</strong>)
			  	</div>
			  	<div class="col-xs-4" style="margin: auto;">
			  		<div class="row">
			  			<div class="col-xs-12" >
						  	<div class="buy-ticket">
						  		<a href="#"> Participer</a>
						  	</div>
							</div>
					  	<div class="col-xs-12">
								<div class="how-work">
						  		<a href="#">Comment ça marche ?</a>
						  	</div>
							</div>
			  		</div>			  	
			  	</div>
					
				 </div>	
			</div>		
		</div>

		<div class="row">
	  	<div class="col-xs-12">
	  		<hr>
	  	</div>
	  </div>	
		
		<div class="row">
			<div class="col-xs-12">
				mes derniers commentaires
			</div>
		</div>
	</div>
	<div class="col-md-4 pull-right">	  	  
	  <div class="row">
		<div class="col-md-12">
		<?php echo do_shortcode('[embedChat height="755"]'); ?>
		</div>
	  </div>
	  <div class="row">	  
	    <div class="col-md-12">
	    </div>
	  </div>
	  <div class="row">
	    <div class="col-md-12 separator pull-right give-title-right margin-title-right-2">
		  <span class="title-right-bloc pull-right">VOD</span>
		</div>
	  </div>
	  <div class="row">
		<div class="col-md-12">
		  <div class="row bloc-daily">
			<div class="col-md-12">
		  	  <iframe frameborder="0" height="360px" scrolling="no" src="http://www.dailymotion.com/badge/user/PureGameMedia?type=carousel" width="300px"></iframe>
			  <div style="font-family: Arial, Helvetica, Clean, sans-serif; font-size: 11px; color: #555; width: 300px; text-align: right;">
				  <a href="http://www.dailymotion.com/PureGameMedia" style="text-decoration: none; line-height: 12px; font-size: 11px; color: #555;" target="_blank">PureGameMedia</a> sur <a href="http://www.dailymotion.com?utm_campaign=widget_promote&amp;utm_term=carousel" rel="nofollow" target="_blank"><img border="0" height="12" src="http://www.dailymotion.com/images/user_widget/logo.svg" style="vertical-align: top;" width="71"></a>
		  	  </div>
			</div>
		  </div>
		</div>
	  </div>  		
	</div>
  </div>
</div>
