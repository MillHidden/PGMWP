<?php
/**
 * pgm functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pgm
 */

if ( ! function_exists( 'pgm_setup' ) ) {

	/**
	 * Ajout d'une taille personnalisée pour le bloc "Image à la une"
	 */
	 
	add_theme_support('post-thumbnails');
	if (function_exists('add_image_size')) {
	     add_image_size('article_entete', 370, 140, true);
	}

	add_theme_support('post-thumbnails');
	if (function_exists('add_image_size')) {
	     add_image_size('article_related', 165, 94.78, true);
	}

	function pgm_setup() {

		require_once( get_template_directory() . '/libs/custom-ajax-auth.php' );

		load_theme_textdomain( 'pgm', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
}
add_action( 'after_setup_theme', 'pgm_setup' );

/*-------------------------------------------------------------------------------
	Enlever la barre de connexion wordpress
-------------------------------------------------------------------------------*/

function my_function_admin_bar(){
    return false;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

/*-------------------------------------------------------------------------------
	Ajout script google api
-------------------------------------------------------------------------------*/

//function modify_jquery() {
//		wp_deregister_script('jquery');
//		wp_register_script('jquery', 'https://code.jquery.com/jquery-1.12.4.min.js', false, '1.12.4');
//		wp_enqueue_script('jquery');
//}
//add_action('init', 'modify_jquery');

/*-------------------------------------------------------------------------------
	Enqueue scripts and styles
-------------------------------------------------------------------------------*/

$wp_roles = new WP_Roles();
$wp_roles->remove_role("basic_contributor");

function pgm_scripts() {

	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery'), '', false);
	wp_enqueue_script('bootstrap-dropdown', 'http://twitter.github.com/bootstrap/1.4.0/bootstrap-dropdown.js',  array(), '1.4.0', true );
	
	wp_enqueue_script( 'pgm-scroll', get_template_directory_uri() . '/js/scroll.js', array(), '', true );
	wp_enqueue_script( 'sticky', get_template_directory_uri() . '/js/sticky.js',  array(), '', true );

	wp_enqueue_script( 'twitchSDK', 'https://ttv-api.s3.amazonaws.com/twitch.min.js', array('jquery'), '', false);
	wp_enqueue_script( 'pgm-twitchdatas', '/wp-content/plugins/PGMTwitch/js/pgmdatas.js', array('jquery', 'twitchSDK'), '', false);
	wp_localize_script( 'pgm-twitchdatas' , 'PGM' , array('redirect' => home_url() . '/', 'key' =>  't6a5c7t3yr8usx1yh3kuse4w3uwlq5r'));
	
	
	if (is_page('dashboard')) {
		wp_enqueue_script( 'jeditable', get_template_directory_uri() . '/js/jquery.jeditable.min.js',  array(), '1.0', true );	
		wp_enqueue_script( 'my-ajax-request', get_template_directory_uri() .'/js/update.js', array( 'jquery' ), '', false );
		wp_localize_script( 'my-ajax-request' , 'MyAjax' , array('ajaxurl' => admin_url ( 'admin-ajax.php' ))  );
	}

	if (is_home()) {
		wp_enqueue_script( 'twitch-redirect', get_template_directory_uri() .'/js/twitchredirect.js', array( 'jquery' ), '', false );		
	}

	if (is_user_logged_in()) {
		wp_enqueue_script( 'pgm-twitchapi', '/wp-content/plugins/PGMTwitch/js/pgmapi.js', array('jquery', 'twitchSDK'), '', false);
		wp_localize_script( 'pgm-twitchapi' , 'MyAjax' , array('ajaxurl' => admin_url ( 'admin-ajax.php' ))  );
	}

	if ( is_archive() ) {
		wp_enqueue_script( 'pgm-archives', get_template_directory_uri() . '/js/archives.js',  array(), '1.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'pgm_scripts' );


function pgm_styles() {
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.css', 'all');    
    wp_enqueue_style( 'font-awesome.min', get_template_directory_uri() . '/bootstrap/font-awesome.min.css', 'all' );
    wp_enqueue_style( 'theme', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css', 'all');	

    // Page home + actualités + article simple
    if ( is_home() || is_front_page() || is_single()) {
    	wp_enqueue_style( 'pgm-actualites', get_template_directory_uri() . '/custom/actualites.css', 'all' );
    	wp_enqueue_style( 'circle', get_template_directory_uri() . '/custom/circle.css', 'all' );
	}
	

	// Page des commentaires : article simple
	if (is_single()) {
		wp_enqueue_style( 'pgm-commentaire', get_template_directory_uri() . '/custom/commentaire.css', 'all');
	}

	// Page des archives
	if ( is_archive() ) {
		wp_enqueue_style( 'pgm-archives', get_template_directory_uri() . '/custom/archives.css', 'all');
	}

	// Page ou se trouve la recherche	
	if ( is_search() ) {   
    	wp_enqueue_style( 'pgm-search', get_template_directory_uri() . '/custom/search.css', 'all');
	}	
	
	if ( is_page( 'vod' ) ) {
    /*Enqueue The Styles*/    
    	wp_enqueue_style( 'vod', get_template_directory_uri() . '/custom/vod.css' );
	}

	// Page ou se trouve le planning	
	if ( is_page( 'planning' ) ) {
    	wp_enqueue_style( 'pgm-planning', get_template_directory_uri() . '/custom/planning.css', 'all');
	}

	// Page ou se trouve les tickets
	if ( is_page( 'ticket' ) ) {  
    	wp_enqueue_style( 'pgm-ticket', get_template_directory_uri() . '/custom/ticket.css', 'all');
	}			
	
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );		
}
add_action( 'wp_enqueue_scripts', 'pgm_styles' );

/*-------------------------------------------------------------------------------
	Ajout css/script panel admin 
-------------------------------------------------------------------------------*/

function pgm_scripts_admin() {

	if($_GET['page'] == 'programme'):
		wp_enqueue_script('bootstrap-min', get_stylesheet_directory_uri().'/js/bootstrap-min.js', "", true);
        wp_enqueue_style( 'custom_wp_admin_css', get_template_directory_uri() . '/custom/programme-admin.css', '20151215', true );
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.css', '20151215', true );
		wp_enqueue_style( 'circle', get_template_directory_uri() . '/custom/circle.css', '20151215', true );
		wp_enqueue_style( 'bootstrap-editable_css', get_template_directory_uri() . '/custom/bootstrap-editable.css', '20151215', true );
		wp_enqueue_script('bootstrap-editable', get_stylesheet_directory_uri().'/js/bootstrap-editable.min.js', "", true);
		wp_enqueue_script('inputAjax', get_stylesheet_directory_uri().'/js/inputAjax.js', "", true);
		endif;
		
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
	Ajout des variables sessions
-------------------------------------------------------------------------------*/

function myStartSession() { if(!session_id()) { session_start(); } }
function myEndSession() { session_destroy (); }
add_action('init', 'myStartSession', 1); 
add_action('wp_logout', 'myEndSession'); 
add_action('wp_login', 'myEndSession');

/*-------------------------------------------------------------------------------
	Ajout du programme dans l'administration
-------------------------------------------------------------------------------*/

function add_links_menu() {
	add_menu_page('Programme', 'Programme', 'administrator', 'programme', 'page_gen', 'images/marker.png', 50);	
}
add_action( 'admin_menu', 'add_links_menu' );

function page_gen() {
	include(get_template_directory().'/programme/programme.php');
}




/*-------------------------------------------------------------------------------
	AJAX programme
-------------------------------------------------------------------------------*/

require_once( $_SERVER['DOCUMENT_ROOT'] . '/PGMWP/wp-load.php' );

add_action( 'wp_ajax_my_action', 'my_action' );
add_action( 'wp_ajax_nopriv_my_action', 'my_action' ); 

wp_localize_script (  'my_action' ,  'ajaxurl' , array (  'ajaxurl'  => admin_url (   'admin-ajax.php'  )  )  );

function my_action(){

$id = $_POST['pk'];
$data_edited = $_POST['value'];
$sql = $_POST['sql'];

   if(!is_null($id))
    {
    	global $wpdb;
		$wpdb->update('wp_programme', array($sql => $data_edited), array("id" => $id));
	}

	wp_die();
} 

add_action( 'wp_ajax_add_streamer', 'add_streamer' );
add_action( 'wp_ajax_nopriv_add_streamer', 'add_streamer' ); 

wp_localize_script (  'add_streamer' ,  'ajaxurl' , array (  'ajaxurl'  => admin_url (   'admin-ajax.php'  )  )  );

function add_streamer(){

	$start_end = $_POST['value']['start_end'];
	$streamer = $_POST['value']['streamer'];
	$description = $_POST['value']['description'];
	$date = $_POST['value']['date'];
    
    global $wpdb;
    $req = $wpdb->get_var("SELECT wp_usermeta.user_id,  wp_users.user_login, wp_users.ID FROM wp_usermeta INNER JOIN  wp_users ON  wp_users.ID = wp_usermeta.user_id WHERE wp_users.user_login LIKE '%".$streamer."%' ORDER BY '%".$streamer."%' ");

    $wpdb->insert('wp_programme', array(
                'description' => $description,
                'id_streamer' => $req,
                 'date' => $date,
                	'start_end' => $start_end)
			);            
	wp_die();
} 

add_action( 'wp_ajax_update', 'update' );
add_action( 'wp_ajax_getinfo', 'getinfo' );

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
	if ( is_user_logged_in() && !is_admin() ) {
		wp_redirect( home_url( '/dashboard/' ) );
		exit();
	}
}

/*-------------------------------------------------------------------------------
	Recherche
-------------------------------------------------------------------------------*/

add_action( 'pre_get_posts', function( $query ) {

  // Check that it is the query we want to change: front-end search query
    if( $query->is_main_query() && ! is_admin() && $query->is_search() ) {

        // Change the query parameters
        $query->set( 'posts_per_page', 10 );

    }

} );

function numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}


/*-------------------------------------------------------------------------------
	Fix to URL Problem : #038; replaces & and breaks the navigation
-------------------------------------------------------------------------------*/
function workaroundpaginationampersandbug($link) {
	return str_replace('#038;', '&', $link);
}
add_filter('paginate_links', 'workaroundpaginationampersandbug');