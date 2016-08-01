<?php
/**
 * Template INDEX
 * @package pgm 
 */
 date_default_timezone_set('Europe/Brussels');
 /** PAGE PRINCIPAL **/
$infos = json_decode(do_shortcode('[embedDatas]'));

include(get_template_directory().'/timeline/timeline_class.php');
$timeline = new Timeline('wp_programme');

$date_du_jour = date('Y').'-'.date('m').'-'.date('j');
$getTimeline =  $timeline->getTimeline($date_du_jour); 

$userdata = get_userdata( get_current_user_id() );
?>

      <div id="donations" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <span>Donnez tout votre amour à vos streamers préférés</span>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-12">
                <a href="https://www.twitchalerts.com/donate/puregamemedia" target="_blank"><p class="text-center"><img src="<?php echo get_bloginfo('template_directory');?>/images/logoPGM.png"></p><p class="text-center"> Puregamemedia </p></a>
                </div>
              </div>
              <?php
              $args = array('role' => 'streamer');
              $streamers = get_users($args);
              $elem = 0;
              foreach ($streamers as $streamer) {
                if ($elem == 0){
                  echo '<div class="row">';                  
                } 
                echo '<div class="col-xs-3">';
                  echo '<a href="' .$streamer->twitchalert. '"><p class="text-center">'.get_avatar($streamer->id).'</p><p class="text-center"> '.$streamer->display_name.'</p>';
                echo '</div>';
                $elem++;
                if ($elem == 4) {
                  echo '</div>';
                  $elem = 0;                  
                }               
              }
              if (($elem == 1) || ($elem == 2) || ($elem == 3)) {
                echo '</div>';                                 
              }
              ?>              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
          </div>
        </div>
      </div>

        <div class="col-md-6">
          <div class="row">          
            <div class="col-md-12 embed-responsive embed-responsive-16by9">
            <?php echo do_shortcode('[embedTwitch]'); ?>
            </div>
          </div>
          <div class="row bloc-stream">
            <div class="col-md-5">
              <div class="row">
                <div class="col-md-12">
                  <div class="row outside-bloc-stream">
                    <div class="col-md-5">
                      <img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/streamer/defaut/marco.png" class="left-img-streamer" alt="" />
                    </div>
                    <div id="twitchdatas" class="col-md-7"></div>
                  </div>
                  <div class="row">
                    <div class="col-social-left">
                      <span class="glyphicon glyphicon-facebook"></span> Rejoignez Nywix
                    </div>
                    <div class="col-social-right">
                      <span class="glyphicon glyphicon-twitter"></span> Rejoignez Nywix
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7">
              <div class="row bloc-right">
                <div class="col-md-2 text-center">
                <img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/right_blocs/safe_door.png" class="safe-door-margin" alt="" />
                <span class="text-gold-bloc"><?php 
                  $nbtickets = get_user_meta($userdata->id, 'nbTickets', true);
                  if (!$nbtickets) {
                    $nbtickets = 0;
                  }
                  echo $nbtickets;
                ?>
                </span>
                </div>
                <div class="col-md-10">
                  <div class="row">
                    <?php 
                    if (is_user_logged_in()) {
                      echo '<input type="hidden" value="' . wp_create_nonce('securite-nonce') . '" id="securite_nonce" />';
                      echo '<input type="hidden" value="' . $userdata->id . '" id="user_id" />';                     
                      echo '<div id="login" class="col-md-4 text-right-bloc"><a href="">Lier à twitch</a></div>';                   
                      echo '<div id="follow" class="col-md-4 text-right-bloc"></div>';
                    }else {  
                      echo '<div class="col-md-4 text-right-bloc" id="show_login"><a href="">Follow !</a></div>';
                    }
                    ?>
                    <div class="col-md-4 text-right-bloc">
                      <a type="button" data-toggle="modal" data-target="#donations"><span class="glyphicon glyphicon-eur"></span> donation </a>
                    </div>
                    <div class="col-md-4 text-right-bloc">
                      <a href="#"><span class="glyphicon glyphicon-star-empty"></span> S'abonner</a>
                    </div>
                  </div>
                  <div class="row below-text-right">
                    <div class="col-md-4">
                      Elgrosboub
                    </div>
                    <div class="col-md-4">
                      Elgrosboub : 50 €
                    </div>
                    <div class="col-md-4">
                      Elgrosboub
                    </div>
                  </div>
                  <div class="row bloc-buy-how">
                    <div class="col-md-6 buy-ticket">
                      <a href="#"><span class="glyphicon glyphicon-tags"></span> Acheter un ticket</a>
                    </div>
                    <div class="how-work col-md-4">
                      <a href="#">Comment ça marche ?</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 timeline-wrap">
            <div class="row">
              <div class="col-md-12 find-streamer-timeline">
                Retrouver le programme de nos streamers.
              </div>
            </div>
            <div class="row" id="drag">
              <div class="col-md-12">
                <div class="row timeline">
                  <div class="col-md-12 background-time">
                    <div class="row">
                    <?php $heure_actuel = strtotime(date("H:i")); foreach ($getTimeline as $key => $value):  ?>
                      <?php $heures = explode("-", $value->start_end); ?>
                      <?php if($active == 0): ?>
                      <div class="col-md-3">
                        <span class="time-first-child"><?php echo $heures[0]; ?></span> <img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/top-round.png" class="timeline-round-top timeline-grey-img" alt="" /> <span class="time-second-child"><?php echo $heures[1]; ?></span>
                      </div>
                      <?php endif; ?>
                      <?php if($active == 1): ?>
                      <div class="col-md-3 active">
                        <span class="time-first-child-active">09h00</span> <img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/top-round.png" <!--class="timeline-round-top" alt="" /> <span class="time-second-child-active">11h00</span>-->
                     </div> 
                       <?php endif; ?>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
                <div class="row timeline_second">
                  <div class="col-md-12 background-time-second">
                    <div class="row">
                    <?php foreach ($getTimeline as $key => $value):  ?>
                      <?php  $heures = explode("-", $value->start_end);
                      ?>
                      <?php if(strtotime($heures[0]) > $heure_actuel): ?>
                      <div class="col-md-3">
                        <div class="c100 p0">
                          <a class="timeline-off-next" href="">Bientôt !</a> <a class="timeline-off-profil" href="">Profil</a> <span><img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/streamer-round.png" class="timeline-grey-img-next"></span>
                          <div class="slice">
                            <div class="bar">
                            </div>
                            <div class="fill">
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php elseif($heure_actuel > strtotime($heures[1])): ?>
                      <div class="col-md-3">
                        <div class="c100 p100">
                          <a class="timeline-off" href="">Live terminé !</a> <a class="timeline-off-profil" href="">Profil</a> <span><img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/streamer-round.png" class="timeline-grey-img"></span>
                          <div class="slice">
                            <div class="bar">
                            </div>
                            <div class="fill">
                            </div>
                          </div>
                        </div>
                      </div>                      
                      <?php elseif(strtotime($heures[0]) <= $heure_actuel && strtotime($heures[1]) >= $heure_actuel): ?>
                      <?php $active = 1; ?>
                      <div class="col-md-3 active">
                        <img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/background-current.png" class="background-current" alt="" />
                        <div class="timeline-desc">
                          <span class="timeline-title-streamer"><?php echo $value->user_login; ?></span><br>
                          <?php echo $value->description; ?>
                        </div>
                        <?php 
                        $start = strtotime($heures[0]);
                        $end = strtotime($heures[1]);
                        $pourcentage = $timeline->getPourcent($start,$end);
                        ?>
                        <div class="c100 <?php echo 'p'.round($pourcentage, 0); ?>">
                          <span><img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/streamer-round.png" class="timeline-grey-img-next"></span>
                          <div class="slice">
                            <div class="bar">
                            </div>
                            <div class="fill">
                            </div>
                          </div>
                        </div>
                        <div>
                          <a class="timeline-profil-active" href="">Profil de <?php echo $value->user_login; ?></a>
                        </div>
                      </div> 
                      <?php endif; ?>
                      <?php  endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12 title-container">
                <span class="glyphicon glyphicon-menu-right"></span> Actualités <span class="find-social pull-right">Retrouvez toute l’actualité en continue sur nos réseaux sociaux.</span>
              </div>
            </div>
            <div class="row bloc-news">
              <div class="col-md-12">
              <div class="row"> 
              <?php $query_actu = new WP_Query('posts_per_page=6');  ?>
                    <?php if ( $query_actu->have_posts() ) : while ( $query_actu->have_posts() ) : $query_actu->the_post(); ?>          
                      <div id="post-<?php the_ID(); ?>"  class="col-md-6">
                      <div class="title-news-inside">
                       <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                      </div>
                      <div class="news-img-center">
                       <?php the_post_thumbnail('article_entete'); ?>
                      </div>
                      <p class="text-inside-news"><?php echo get_excerpt(130); ?></p>
                      <span class="left-info-news pull-left"> le <?php the_time('d/m'); ?> à <?php the_time('H:i'); ?></span> <a href=""><span class="right-coment pull-right"><?php comments_number('0', '1', '%'); ?> <span class="glyphicon glyphicon-comment"></span></span></a> <a href="<?php the_permalink(); ?>" rel="bookmark" class="right-next pull-right" title="Permanent Link to <?php the_title_attribute(); ?>">Lire la suite</a>
                    </div>
                      <?php endwhile; else : ?>
                      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php endif; ?>   
                  </div>        
              </div>
            </div>
          </div>
           </div>

        



  