
<?php
function ajax_auth_init(){	
	wp_register_style( 'ajax-auth-style', get_template_directory_uri() . '/css/ajax-auth-style.css' );
	wp_enqueue_style('ajax-auth-style');
	
	wp_register_script('validate-script', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery') ); 
    wp_enqueue_script('validate-script');

    wp_register_script('ajax-auth-script', get_template_directory_uri() . '/js/ajax-auth-script.js', array('jquery') ); 
    wp_enqueue_script('ajax-auth-script');

    wp_localize_script( 'ajax-auth-script', 'ajax_auth_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
    ));

    if (is_page ('retrievepwd')) {
        wp_register_script('ajax-reset-script', get_template_directory_uri() . '/js/ajax-reset-script.js', array('jquery') ); 
        wp_enqueue_script('ajax-reset-script');

        wp_localize_script( 'ajax-reset-script', 'ajax_auth_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
    ));
    }

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
	// Enable the user with no privileges to run ajax_register() in AJAX
	add_action( 'wp_ajax_nopriv_ajaxregister', 'ajax_register' );
    // Enable the user with no privileges to run ajax_lost() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlost', 'ajax_lost' );

    // Enable the user with no privileges to run ajax_lost() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxresetpass', 'ajax_reset_pass' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_auth_init');
}
  
function ajax_login(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
  	// Call auth_user_login
	auth_user_login($_POST['username'], $_POST['password'], 'Login'); 
	
    die();
}

function ajax_register(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-register-nonce', 'security' );
		
    // Nonce is checked, get the POST data and sign user on
    $info = array();
  	$info['user_nicename'] = $info['nickname'] = $info['display_name'] = $info['first_name'] = $info['user_login'] = sanitize_user($_POST['username']) ;
    $info['user_pass'] = sanitize_text_field($_POST['password']);
	$info['user_email'] = sanitize_email( $_POST['email']);
	
	// Register the user
    $user_register = wp_insert_user( $info );
 	if ( is_wp_error($user_register) ){	
		$error  = $user_register->get_error_codes()	;
		
		if(in_array('empty_user_login', $error))
			echo json_encode(array('loggedin'=>false, 'message'=>__($user_register->get_error_message('empty_user_login'))));
		elseif(in_array('existing_user_login',$error))
			echo json_encode(array('loggedin'=>false, 'message'=>__('This username is already registered.')));
		elseif(in_array('existing_user_email',$error))
        echo json_encode(array('loggedin'=>false, 'message'=>__('This email address is already registered.')));
    } else {
	  auth_user_login($info['nickname'], $info['user_pass'], 'Registration');       
    }

    die();
}

function auth_user_login($user_login, $password, $login)
{
	$info = array();
    $info['user_login'] = $user_login;
    $info['user_password'] = $password;
    $info['remember'] = true;
	
	$user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
		echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
    } else {
		wp_set_current_user($user_signon->ID); 
        echo json_encode(array('loggedin'=>true, 'message'=>__($login.' successful, redirecting...')));
    }
	
	die();
}

function ajax_lost(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-lost-password-nonce', 'security' );

    $errors = new WP_Error();

    $user = $_POST['username'];

    if (empty($user)) {
        $errors->add('empty username', __('<strong>Erreur</strong>: Entrer un username ou un email.'));
        return $errors;
    }
    else if (strpos($user, '@')) {
        $user_data = get_user_by('email', trim( $user ));
    } else {
        $user_data = get_user_by('login', trim( $user ));
    }

    if (!$user_data) {
        $errors->add('invalidcombo', __('<strong>Erreur</strong>: username ou email inexistant.'));
        return $errors;
    }

    $user_login = $user_data->user_login;
    $user_email = $user_data->user_email;
    $key = get_password_reset_key( $user_data );    

    if ( is_wp_error ( $key )) {
        return $key;
    }

    $message = __('Il a été demandé un reset du mot de passe pour le compte suivant:') . "\r\n\r\n";
    $message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
    $message .= __('En cas d\'erreur, ignorez cet email et rien ne se passera.') . "\r\n\r\n";
    $message .= __('Pour reset votre mot de passe, allez à l\'adresse suivante:') . "\r\n\r\n";
   
    $message .= __( home_url() . "/retrievepwd?action=rp&key=$key&login=" . rawurlencode($user_login) ) . "\r\n";

    $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
    $title = sprintf( __('[%s] Renouvellement du mot de passe'), $blogname );

    $title = apply_filters( 'retrieve_password_title', $title, $user_login, $user_data );

    $message = apply_filters( 'retrieve_password_message', $message, $key, $user_login, $user_data );
    
    

    if ( wp_mail( $user_email, wp_specialchars_decode( $title ), $message ) )
        $errors->add('confirm', __('Consultez votre adresse email pour le lien de confirmation.'), 'message');
    else
        $errors->add('could_not_sent', __('L\'email n\'a pas pu être envoyé.<br />\n"'), 'message');
    
    if ( $errors->get_error_code() )
        
        echo json_encode(array('loggedin'=>false, 'message'=>  $errors->get_error_message( $errors->get_error_code() ))); 
    
    die();
}

function ajax_reset_pass(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-reset-password-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $key       = $_POST['user_key'];
    $login     = $_POST['user_login'];

    $user = check_password_reset_key( $key, $login );

    $errors = new WP_Error();

    // check to see if user added some string
    if( empty( $pass1 ) || empty( $pass2 ) )
        $errors->add( 'password_required', __( 'Password is required field' ) );
 
    // is pass1 and pass2 match?
    if ( isset( $pass1 ) && $pass1 != $pass2 )
        $errors->add( 'password_reset_mismatch', __( 'The passwords do not match.' ) );
    
    do_action( 'validate_password_reset', $errors, $user );
 
    if ( ( ! $errors->get_error_code() ) && isset( $pass1 ) && !empty( $pass1 ) ) {
        reset_password($user, $pass1);
        
        $errors->add( 'password_reset', __( 'Votre mot de passe a été modifié.' ) );
    }

     if ( $errors->get_error_code() )
        
        echo json_encode(array('message'=>  $errors->get_error_message( $errors->get_error_code() ))); 
   
    
    die();
}