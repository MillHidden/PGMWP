<?php
/**
 * Template INDEX
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pgm 
 */
 
 /** PAGE PRINCIPALE **/

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
          <a href="https://www.twitchalerts.com/donate/puregamemedia" target="_blank"><p><img src="<?php echo get_bloginfo('template_directory');?>/images/logoPGM.png"></p><p> Puregamemedia </p></a>
          </div>
        </div>
        <div class="row">                       
          <div class="col-xs-6">
          <a href="https://www.twitchalerts.com/donate/kpo_4" ><p><img src="https://lh3.googleusercontent.com/-IaqPxjiwj2M/VTcV48KwedI/AAAAAAAAAHc/4wuMQstg8BI/s426/kpo_4-profile_image-83a3abf3d5237fc0-300x300.jpeg"></p><p> KPO </p></a>
          </div>
          <div class="col-xs-6">
          <a href="https://www.twitchalerts.com/donate/nightmgtv" ><p><img src="https://pbs.twimg.com/media/Ch9pdoRXEAQaKKq.jpg"></p><p> Night </p></a>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6">
          <a href="https://www.twitchalerts.com/donate/linyuu" ><p><img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/streamer/defaut/marco.png"></p><p> Linyuu </p></a>
          </div>
          <div class="col-xs-6">
          <a href="https://www.twitchalerts.com/donate/sparadrapguildenoob" ><p><img src="http://static.eclypsia.com/public/upload/cke/Articles/Eclypsia/EMISSIONS%20TV/La%20Bande%20a%20Pixel/Sparadrap.jpg"></p><p> Fred (aka Sparadrap) </p></a>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6">
          <a href="https://www.twitchalerts.com/donate/Klaptof" ><p><img src="https://pbs.twimg.com/profile_images/731943592281964544/GAFIcKEW.jpg"></p><p> Klaptof </p></a>
          </div>
          <div class="col-xs-6">
            <a href="#" ><p><img src="https://pbs.twimg.com/media/CnZ29w6WgAAwWS_.jpg"></p><p> Earil </p></a>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

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
        				<span class="text-gold-bloc"></span>
                </div>
                <div class="col-md-10">
                  <div class="row">
                    <?php if (is_user_logged_in()) {
                      $userdata = get_userdata( get_current_user_id() );
                      echo '<div id="follow" class="col-md-4 text-right-bloc">';
                        echo '<input type="hidden" value="6" id="user_id" />';
                        echo '<input type="hidden" value="' . wp_create_nonce('securite-nonce') . '" id="securite_nonce" />';
                    
                      echo '</div>';
                      } else {
                        echo '<div class="col-md-4 text-right-bloc">';
                        echo '<span class="glyphicon glyphicon-heart"></span><a id="show_login" href="">follow</a>';                            
                        echo '</div>';
                      }?>
                    

                    <div id="follow" class="col-md-4 text-right-bloc">

                    </div>
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
                      <div class="col-md-3">
                        <span class="time-first-child">00h00</span> <img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/top-round.png" class="timeline-round-top timeline-grey-img" alt="" /> <span class="time-second-child">02h00</span>
                      </div>
                      <div class="col-md-3">
                        <span class="time-first-child">03h00</span> <img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/top-round.png" class="timeline-round-top timeline-grey-img" alt="" /> <span class="time-second-child">05h00</span>
                      </div>
                      <div class="col-md-3">
                        <span class="time-first-child">06h00</span> <img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/top-round.png" class="timeline-round-top" alt="" /> <span class="time-second-child">08h00</span>
                      </div>
                      <div class="col-md-3 active">
                        <span class="time-first-child-active">09h00</span> <img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/top-round.png" class="timeline-round-top" alt="" /> <span class="time-second-child-active">11h00</span>
                      </div>
                      <div class="col-md-3">
                        <span class="time-first-child">12h00</span> <img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/top-round.png" class="timeline-round-top" alt="" /> <span class="time-second-child">14h00</span>
                      </div>
                      <div class="col-md-3">
                        <span class="time-first-child">15h00</span> <img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/top-round.png" class="timeline-round-top" alt="" /> <span class="time-second-child">17h00</span>
                      </div>
                      <div class="col-md-3">
                        <span class="time-first-child">18h00</span> <img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/top-round.png" class="timeline-round-top" alt="" /> <span class="time-second-child">20h00</span>
                      </div>
                      <div class="col-md-3">
                        <span class="time-first-child">03h00</span> <img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/top-round.png" class="timeline-round-top timeline-grey-img" alt="" /> <span class="time-second-child">05h00</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row timeline_second">
                  <div class="col-md-12 background-time-second">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="c100 p100">
                          <a class="timeline-off" href="">Live terminé !</a> <a class="timeline-off-profil" href="">Profil</a> <span><img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/streamer-round.png" class="timeline-grey-img-next"></span>
                          <div class="slice">
                            <div class="bar">
                            </div>
                            <div class="fill">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="c100 p100">
                          <a class="timeline-off" href="">Live terminé !</a> <a class="timeline-off-profil" href="">Profil</a> <span><img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/streamer-round.png" class="timeline-grey-img-next"></span>
                          <div class="slice">
                            <div class="bar">
                            </div>
                            <div class="fill">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="c100 p100">
                          <a class="timeline-off" href="">Live terminé !</a> <a class="timeline-off-profil" href="">Profil</a> <span><img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/streamer-round.png" class="timeline-grey-img-next"></span>
                          <div class="slice">
                            <div class="bar">
                            </div>
                            <div class="fill">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 active">
                        <img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/background-current.png" class="background-current" alt="" />
                        <div class="timeline-desc">
                          <span class="timeline-title-streamer">Marco</span><br>
                          Programme cassage de dents !
                        </div>
                        <div class="c100 p80">
                          <span><img src="<?php echo get_bloginfo('template_directory');?>/images/blocs/timeline/streamer-round.png" class="timeline-grey-img-next"></span>
                          <div class="slice">
                            <div class="bar">
                            </div>
                            <div class="fill">
                            </div>
                          </div>
                        </div>
                        <div>
                          <a class="timeline-profil-active" href="">Profil de marco</a>
                        </div>
                      </div>
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
				  <?php query_posts( 'posts_per_page=6' ); ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>					
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
        <div class="col-md-4 pull-right">
          <div class="row">
            <div class="col-md-12">
             <?php echo do_shortcode('[embedChat height="755"]'); ?>
            </div>
          </div>
          <div class="row">
          </div>
          <div class="col-md-12">
          </div>
          <div class="col-md-12 separator pull-right give-title-right margin-title-right-2">
            <span class="title-right-bloc pull-right">VOD</span>
          </div>
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


<style>
  /* CSS */ 
  .modal-body img {
  overflow:hidden;
  -webkit-border-radius:50px;
  -moz-border-radius:50px;
  border-radius:25px;
  width:90px;
  height:90px;
  }

  .modal-body a {
    text-align: center;
  }
</style>
  