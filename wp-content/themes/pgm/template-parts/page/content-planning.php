<?php
/**
 * Template planning
 */

include(get_template_directory().'/programme/programme_class.php');
$planning = new Programme('events');

setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
$year = date('Y');
$month = date('n');
$day = date('j');
$date_du_jour = date('Y').'-'.date('m').'-'.date('j');
$getPlanning =  $planning->getPlanning($date_du_jour);
$dates = $planning->getAll($year);
$heure_actuel = strtotime(date("H:i"));
?>
<script type="text/javascript">
$('.nav-tabs').tab();
</script>
			<div id="bs-example">
				<ul class="nav nav-tabs">
				 <?php foreach ($planning->days as $m): ?>
 					<li class="<?php if($m == ucfirst(strftime('%A'))):?>active<?php  endif; ?>">
 					<a data-toggle="tab" href="#<?php echo $m; ?>" role="tab"><?php echo utf8_encode(utf8_decode($m)); ?></a></li>						
                    <?php endforeach; ?>

				</ul>
				<div class="tab-content">
				<?php  if(isset($getPlanning)):  foreach($getPlanning as $id => $resultats): ?>	

						<div class="tab-pane fade in <?php if(ucfirst(strftime ('%A',strtotime($resultats[0]->date))) == ucfirst(strftime('%A'))): ?>active<?php endif; ?>" id="<?php echo ucfirst(strftime ('%A',strtotime($resultats[0]->date))); ?>">
						<br/><h6 class="prog-text-event text-center">Programme du <?php echo strftime ('%A %d %B %Y',strtotime($resultats[0]->date)); ?></h6><br/>
						<?php 
						$result_id = $id+1;
						?>
						<?php foreach($resultats as $event):  ?>
							<div class="col-md-10 col-md-offset-1">
								<ul class="event-list" >
									<li>
										<div class="prog-bloc-time">
											<span class="time"><?php echo $event->start_end; ?></span>
											<br/>
											<span class="prog-encours">
											<?php 
											$heures = explode("-", $event->start_end);
											if(strtotime($event->date) < strtotime($date_du_jour)): ?>
												Emission terminé.. 
											<?php elseif(strtotime($heures[0]) <= $heure_actuel && strtotime($heures[1]) <= $heure_actuel): ?>
												Emission en cours..
											<?php elseif(strtotime($heures[0]) >= $heure_actuel && strtotime($heures[1]) <= $heure_actuel): ?>
												Porchainement..
											<?php endif; ?>
										</span>
										</div>
										<div class="prog-slice-second c100 p50">
											<span><img src="wee_app/themes/default/images/blocs/timeline/streamer-round.png"></span>
											<div class="slice">
												<div class="bar">
												</div>
												<div class="fill">
												</div>
											</div>
										</div>
										<div class="info">
											<h2 class="title"><?php echo $event->user_login; ?></h2>
											<p class="desc"><?php echo $event->description; ?></p>
											<p class="profil-programme"><a class="btn btn-sample btn-border" href="login.html"><span class="glyphicon glyphicon-user"></span> Profil de Marco</a>
											</p>
										</div>
										<div class="social">
											<ul>
												<li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a>
												</li>
												<li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						<?php
						endforeach; ?>
					</div>
				<?php
				endforeach;
				endif;  
				?>
			</div>
		</div>
