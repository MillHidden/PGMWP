<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pgm
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<?php do_shortcode('[contentblock id=1]'); ?>

<?php 
if (!current_user_can( 'manage_options' )) {
        add_filter('show_admin_bar', '__return_false');
}
?>

<script type="text/javascript">
$(document).ready(function() {
  // Custom 
  var stickyToggle = function(sticky, stickyWrapper, scrollElement) {
    var stickyHeight = sticky.outerHeight();
    var stickyTop = stickyWrapper.offset().top;
    if (scrollElement.scrollTop() >= stickyTop){
      stickyWrapper.height(stickyHeight);
      sticky.addClass("is-sticky");
    }
    else{
      sticky.removeClass("is-sticky");
      stickyWrapper.height('auto');
    }
  };
  
  // Find all data-toggle="sticky-onscroll" elements
  $('[data-toggle="sticky-onscroll"]').each(function() {
    var sticky = $(this);
    var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
    sticky.before(stickyWrapper);
    sticky.addClass('sticky');
    
    // Scroll & resize events
    $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function() {
      stickyToggle(sticky, stickyWrapper, $(this));
    });
    
    // On page load
    stickyToggle(sticky, stickyWrapper, $(window));
  });
});
$(document).ready(function(){
      $('body').append('<div id="toTop" class="btn btn-info"><i class="fa fa-arrow-up"></i>Back to Top</div>');
    	$(window).scroll(function () {
			if ($(this).scrollTop() != 0) {
				$('#toTop').fadeIn();
			} else {
				$('#toTop').fadeOut();
			}
		}); 
    $('#toTop').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});
</script>

<style type="text/css"> 
.sticky.is-sticky {
  position: fixed;
  left: 0;
  right: 0;
  top: 0;
  z-index: 1000;
  width: 100%;
}
#toTop{
	position: fixed;
	bottom: 95px;
	right: 40px;
	cursor: pointer;
	display: none;
}
#toTop .fa {margin-right: 5px;}
</style>
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
          
          <a href="<?php echo wp_logout_url( home_url() ); ?>" class="btn btn-sample btn-border btn-sample-login">
            <span class="glyphicon glyphicon-log-in"></span> logout
          </a>
          <a href="/test/dashboard" class="btn btn-sample btn-border btn-sample-register" href="#">
            <span class="glyphicon glyphicon-user"></span> Dashboard
          </a>
         
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
                  <a href="index.html"><img src="<?php echo get_bloginfo('template_directory');?>/images/home.png" alt=""></a>
                </li>
                <li class="divider">
                  <a href="programme.html">programme</a>
                </li>
                <li class="divider">
                  <a href="articles.html">actualités</a>
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