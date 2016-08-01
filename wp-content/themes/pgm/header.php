<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<?php do_shortcode('[contentblock id=1]'); ?>
</head>
<body <?php body_class( array( "fluid-background" ) ); ?>>
  <div class="background">
  
    <header>
      <div class="row">
        <div class="col-md-3">
          <div id="logo">
            <a href="<?php echo get_home_url( ); ?>"><img src="<?php echo get_bloginfo('template_directory');?>/images/logoPGM.png" alt=""></a>
          </div>
        </div>
        <div class="col-md-6">
          <div id="partnership">
            <a href="http://bit.ly/1Nm1MYv" target="blank"><img src="<?php echo get_bloginfo('template_directory');?>/images/Partnership/instant-gaming.png" alt=""></a> <a href="http://bit.ly/1WgBxWk" target="blank"><img src="<?php echo get_bloginfo('template_directory');?>/images/Partnership/gunnar.png" alt=""></a> <a href="http://bit.ly/1WgBxWk" target="blank"><img src="<?php echo get_bloginfo('template_directory');?>/images/Partnership/generation.png" alt=""></a> <a href="http://bit.ly/1WgBxWk" target="blank"><img src="<?php echo get_bloginfo('template_directory');?>/images/Partnership/arena.png" alt=""></a>
          </div>
        </div>

        <div id="logindiv" class="col-md-2 btn-group box-login">
         <?php if (is_user_logged_in()) { ?>
          <div>
            <a href="<?php echo wp_logout_url( home_url() ); ?>" class="btn btn-sample btn-border btn-sample-login" id="logout">
              <span class="glyphicon glyphicon-log-in"></span>
            </a>
            <a href="<?php echo home_url(); ?>/dashboard" class="btn btn-sample btn-border btn-sample-register" href="#">
              <span class="glyphicon glyphicon-user"></span> <?php echo wp_get_current_user()->display_name; ?>
            </a>
          </div>
          <?php if (current_user_can('manage_options')) { ?>
          <div>
            <a href="<?php echo home_url(); ?>/wp-admin" class="btn btn-sample btn-border btn-sample-admin" href="#">
              <span class="glyphicon glyphicon-user"></span> Dashboard du site
            </a>
          </div>
          <?php }?>
         
        <?php } else { get_template_part('ajax', 'auth'); ?>
                      
          <a class="btn btn-sample btn-border btn-sample-login" id="show_login" href="">
            <span class="glyphicon glyphicon-log-in"></span> Connexion
          </a>
          <a class="btn btn-sample btn-border btn-sample-register" id="show_signup" href="">
            <span class="glyphicon glyphicon-user"></span> Inscription
          </a>
        <?php } ?>
        </div>        
      </div>
    </header> 
  
      <div data-toggle="sticky-onscroll" class="container-fluid navbar-inverse">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <nav class="navbar" id="main-sticky">
            <div class="container-fluid">
              <ul class="nav navbar-nav navbar-left">
                <li id="select">
                  <a href="<?php echo home_url(); ?>"><img src="<?php echo get_bloginfo('template_directory');?>/images/home.png" alt=""></a>
                </li>
                <li class="divider">
                  <a href="<?php echo home_url(); ?>/planning/">programme</a>
                </li>
                <li class="divider">
                  <a href="<?php echo home_url(); ?>/actualites/">actualités</a>
                </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="tab-social">
                  <a href="https://twitter.com/PureGM_TV"><img src="<?php echo get_bloginfo('template_directory');?>/images/menu_index/tab-tweeter.png" alt=""></a>
                </li>
                <li class="tab-social">
                  <a href="https://www.facebook.com/PureGameMedia/"><img src="<?php echo get_bloginfo('template_directory');?>/images/menu_index/tab-facebook.png" alt=""></a>
                </li>
                <li class="tab-social">
                  <a href="http://www.dailymotion.com/PureGameMedia"><img src="<?php echo get_bloginfo('template_directory');?>/images/menu_index/tab-dailymotion.png" alt=""></a>
                </li>
                <li class="tab-social">
                  <a href="#"><img src="<?php echo get_bloginfo('template_directory');?>/images/menu_index/tab-youtube.png" alt=""></a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
        <div class="col-lg-2">
        </div>
      </div>
    </div>