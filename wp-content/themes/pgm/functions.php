<?php
/**
 * pgm functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pgm
 */

if ( ! function_exists( 'pgm_setup' ) ) :

/**
 * Ajout d'une taille personnaliser pour le bloc "Image à la une"
 */
 
add_theme_support('post-thumbnails');
if (function_exists('add_image_size')) {
     add_image_size('article_entete', 370, 140, true);
}

function pgm_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on pgm, use a find and replace
	 * to change 'pgm' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'pgm', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'pgm' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif;
add_action( 'after_setup_theme', 'pgm_setup' );

/**
 * Enqueue scripts and styles.
 */

function pgm_scripts() {
	wp_enqueue_script( 'jquery2', 'https://code.jquery.com/jquery-1.12.4.min.js');
	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery2'), '1.0', true);
	wp_enqueue_script( 'pgm-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery2'), '20151215', true );
	wp_enqueue_script( 'pgm-scroll', get_template_directory_uri() . '/js/scroll.js', array('jquery2'), '20151215', true );
	wp_enqueue_script( 'pgm-form', get_template_directory_uri() . '/js/form.js', array('jquery2'), '20151215', true );
	wp_enqueue_script( 'pgm-slider', get_template_directory_uri() . '/js/slider.js', array('jquery2'), '20151215', true );
	wp_enqueue_script( 'pgm-validator', get_template_directory_uri() . '/js/validator.js', array('jquery2'), '20151215', true );
	wp_enqueue_script( 'pgm-carousel', get_template_directory_uri() . '/js/carousel.js', array('jquery2'), '20151215', true );
	wp_enqueue_script( 'pgm-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery2'), '20151215', true );
	wp_enqueue_script( 'twitchSDK', 'https://ttv-api.s3.amazonaws.com/twitch.min.js', array('jquery2'), '', true);
	wp_enqueue_script( 'pgm-twitchapi', '/wp-content/plugins/PGMTwitch/js/pgmapi.js', array('jquery2', 'twitchSDK'), '', true);
	wp_enqueue_script( 'pgm-twitchdatas', '/wp-content/plugins/PGMTwitch/js/pgmdatas.js', array('jquery2', 'twitchSDK'), '', true);
	wp_enqueue_script( 'jeditable', get_template_directory_uri() . '/js/jquery.jeditable.min.js', array('jquery2'), '', true);
	//if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		//wp_enqueue_script( 'comment-reply' );
	//}

	wp_enqueue_script( 'my-ajax-request', get_template_directory_uri() .'/js/update.js', array( 'jquery' ) );

	wp_localize_script( 'my-ajax-request' , 'MyAjax' , array('ajaxurl' => admin_url ( 'admin-ajax.php' ))  );
	wp_localize_script( 'pgm-twitchapi' , 'MyAjax' , array('ajaxurl' => admin_url ( 'admin-ajax.php' ))  );
}
add_action( 'wp_enqueue_scripts', 'pgm_scripts' );


function additional_custom_styles() {
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.css');    
    wp_enqueue_style( 'font-awesome.min', get_template_directory_uri() . '/bootstrap/font-awesome.min.css' );
	wp_enqueue_style( 'circle', get_template_directory_uri() . '/custom/circle.css' );

	if ( is_page( 'streamers' ) ) {
    /*Enqueue The Styles*/    
    wp_enqueue_style( 'streamers', get_template_directory_uri() . '/custom/streamers.css' );
	}

	if ( is_page( 'register' ) ) {
    /*Enqueue The Styles*/    
    wp_enqueue_style( 'custom register', get_template_directory_uri() . '/custom/register.css' );
	}	
	
	if ( is_page( 'vod' ) ) {
    /*Enqueue The Styles*/    
    wp_enqueue_style( 'vod', get_template_directory_uri() . '/custom/vod.css' );
	}	

	if ( is_page( 'programme' ) ) {
    /*Enqueue The Styles*/    
    wp_enqueue_style( 'programme', get_template_directory_uri() . '/custom/programme.css' );
	}	

	if ( is_page( 'ticket' ) ) {
    /*Enqueue The Styles*/    
    wp_enqueue_style( 'ticket', get_template_directory_uri() . '/custom/ticket.css' );
	}		
	
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );		
}
add_action( 'wp_enqueue_scripts', 'additional_custom_styles' );

/*-------------------------------------------------------------------------------
	Ajout css/script panel admin 
-------------------------------------------------------------------------------*/

function pgm_scripts_admin() {
		wp_enqueue_script('bootstrap-min', get_stylesheet_directory_uri().'/js/bootstrap-min.js', array('jquery'), '', true);
        wp_enqueue_style( 'custom_wp_admin_css', get_template_directory_uri() . '/custom/programme-admin.css', array('jquery'), '20151215', true );
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.css', array('jquery'), '20151215', true );
		wp_enqueue_style( 'circle', get_template_directory_uri() . '/custom/circle.css', array('jquery'), '20151215', true );
		wp_enqueue_style( 'bootstrap-editable_css', get_template_directory_uri() . '/custom/bootstrap-editable.css', array('jquery'), '20151215', true );
		wp_enqueue_script('bootstrap-editable', get_stylesheet_directory_uri().'/js/bootstrap-editable.min.js', array('jquery'), "", true);	
		
}
add_action( 'admin_enqueue_scripts', 'pgm_scripts_admin' );



/*-------------------------------------------------------------------------------
	Lire la suite d'un article
-------------------------------------------------------------------------------*/

function get_excerpt($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = $excerpt.'...';
  return $excerpt;
}

/*-------------------------------------------------------------------------------
	Ajout du programme dans l'administration
-------------------------------------------------------------------------------*/

function add_links_menu() {
   add_menu_page('Programme', 'Programme', 'programme', 'programme', 'page_gen', 'images/marker.png', 50);		
}
add_action( 'admin_menu', 'add_links_menu' );

function page_gen() {
	include(get_template_directory().'/programme/programme.php');
}


/*-------------------------------------------------------------------------------
	Ajout des variables sessions
-------------------------------------------------------------------------------*/

function myStartSession() { if(!session_id()) { session_start(); } }
function myEndSession() { session_destroy (); }
add_action('init', 'myStartSession', 1); 
add_action('wp_logout', 'myEndSession'); 
add_action('wp_login', 'myEndSession');


/*-------------------------------------------------------------------------------
	JS programme / ajax
-------------------------------------------------------------------------------*/

require_once( $_SERVER['DOCUMENT_ROOT'] . '/PGMWP/wp-load.php' );

add_action( 'wp_ajax_update', 'update' );
add_action( 'wp_ajax_nopriv_update', 'update' ); // This lines it's because we are using AJAX on the FrontEnd.

add_action( 'wp_ajax_getinfo', 'getinfo' );
add_action( 'wp_ajax_nopriv_getinfo', 'getinfo' ); // This lines it's because we are using AJAX on the FrontEnd.

//wp_localize_script (  'my_action' ,  'ajaxurl' , array (  'ajaxurl'  => admin_url (   'admin-ajax.php'  )  )  );

function update(){	
	if (isset($_POST['target']) 
		&& !empty($_POST['target']) 
		&& (isset($_POST['securite_nonce'])) 
		&& (wp_verify_nonce($_POST['securite_nonce'], 'securite-nonce'))) {		
			// Le formulaire est validé et sécurisé, suite du traitement		

		switch ($_POST['target']) {
			case 'user' :
				if(isset($_POST['id']) 
					&& !empty($_POST['id']) 
					&& isset($_POST['value']) 
					&& !empty($_POST['value'])
					&& isset($_POST['elem_id']) 
					&& !empty($_POST['elem_id'])) {

					if ($_POST['id'] == "display_name") {
						//On vérifie que le display name choisi n'est pas déjà utilisé
						global $wpdb;
						if ($wpdb->get_var(
							$wpdb->prepare(
								"SELECT COUNT(ID) FROM $wpdb->users WHERE display_name = %s AND ID <> %d",
								 $_POST['value'],
								 $_POST['elem_id']
							)
						)) {
							$response = new stdClass();
							$response->valid = false;
							$response->error = "Ce pseudo est déjà utilisé";
							echo (json_encode($response));
							break;
						}
					}

					wp_update_user(array(
						'ID' 			=> $_POST['elem_id'],
						$_POST['id'] 	=> $_POST['value']
					));

					$userdata = get_userdata( $_POST['elem_id'] );
					$complete = 0;

					if ($userdata->description) {
						$complete += 10;
					}
					if ($userdata->facebook) {
						$complete += 10;
					}
					if ($userdata->twitter) {
						$complete += 10;
					}

					$prev = $userdata->complete;
					if ($prev == "") {
						add_user_meta($_POST['elem_id'],
							'complete',
							$complete
						);
					} else {
						update_user_meta($_POST['elem_id'],
							'complete',
							$complete
						);
					}

					$prev = get_user_meta($_POST['elem_id'], $_POST['id'], true);
					if ($prev === null) {
						add_user_meta($_POST['elem_id'],
							$_POST['id'],
							$_POST['value']
						);
					} else {
						update_user_meta($_POST['elem_id'],
							$_POST['id'],
							$_POST['value']
						);
					}

					$response = new stdClass();
					$response->valid = true;
					$response->value = $_POST['value'];
					$response->complete = $complete;
					echo (json_encode($response));				
					
				}

				break;
			default :
				$response = new stdClass();
				$response->valid = false;
				$response->error = "error";
				echo (json_encode($response));	
				break;
		}	

 
	} else {
			$response = new stdClass();
			$response->valid = false;
			$response->error = "Erreur dans le formulaire";
			echo (json_encode($response));							
	}		
	/*} else {
		$id = $_POST['pk'];
		$data_edited = $_POST['value'];
		$sql = $_POST['sql'];
		    
		     Check submitted value
		    
		   if(!is_null($id))
		    {
		    	global $wpdb;
		               // $wpdb->insert('events', array(
						//	'id' => '20',
						//	'description' => $description,
						//	'id_streamer' => $id_streamer,
		                 //   'date' => '2016-07-10')
					//);

				$wpdb->update('events', array($sql => $data_edited), array("id" => $id));

			}
		die();
		echo ("other");
	}*/

	wp_die();
}


function getinfo(){	
	if (isset($_POST['target']) 
		&& !empty($_POST['target']) 
		&& (isset($_POST['securite_nonce'])) 
		&& (wp_verify_nonce($_POST['securite_nonce'], 'securite-nonce'))) {		
			// Le formulaire est validé et sécurisé, suite du traitement		

		switch ($_POST['target']) {
			case 'user' :
				if(isset($_POST['id']) 
					&& !empty($_POST['id'])					
					&& isset($_POST['elem_id']) 
					&& !empty($_POST['elem_id'])) {

					$userdata = get_user_meta( $_POST['elem_id'], $_POST['id'], true);

					$response = new stdClass();
					$response->valid = true;
					$response->value = $userdata;
					echo (json_encode($response));				
					
				}

				break;
			default :
				$response = new stdClass();
				$response->valid = false;
				$response->error = "error";
				echo (json_encode($response));	
				break;
		}	

 
	} else {
			$response = new stdClass();
			$response->valid = false;
			$response->error = "Erreur dans le formulaire";
			echo (json_encode($response));							
	}		
	/*} else {
		$id = $_POST['pk'];
		$data_edited = $_POST['value'];
		$sql = $_POST['sql'];
		    
		     Check submitted value
		    
		   if(!is_null($id))
		    {
		    	global $wpdb;
		               // $wpdb->insert('events', array(
						//	'id' => '20',
						//	'description' => $description,
						//	'id_streamer' => $id_streamer,
		                 //   'date' => '2016-07-10')
					//);

				$wpdb->update('events', array($sql => $data_edited), array("id" => $id));

			}
		die();
		echo ("other");
	}*/

	wp_die();
}


add_filter("login_redirect", "gkp_subscriber_login_redirect", 10, 3);
function gkp_subscriber_login_redirect($redirect_to, $request, $user) {

  if(is_array($user->roles))
      if(in_array('administrator', $user->roles)) return site_url('/wp-admin/');

  return home_url();
}

function my_new_contactmethods( $contactmethods ) {
    unset( $contactmethods['yim'] );
    unset( $contactmethods['aim'] );
    unset( $contactmethods['jabber'] );
    $contactmethods['facebook'] = 'Facebook';
    $contactmethods['twitter'] = 'Twitter';
    $contactmethods['gplus'] = 'Google+';
    $contactmethods['linkedin'] = 'LinkedIn';
    $contactmethods['instagram'] = 'Instagram';
    return $contactmethods;
}
add_filter('user_contactmethods','my_new_contactmethods',10,1);


add_action( 'current_screen', 'redirect_non_authorized_user' );
function redirect_non_authorized_user() {
	// Si t'es pas admin, tu vires
	if ( is_user_logged_in() && ! current_user_can( 'manage_options' ) ) {
		wp_redirect( home_url( '/dashboard/' ) );
		exit();
	}
}

require_once( get_template_directory() . '/libs/custom-ajax-auth.php' );
