<?php 
add_action('wp_ajax_passwd', 'passwd');
add_action('wp_ajax_nopriv_passwd', 'passwd');


function saveToDatabase($result1)
    {
        global $wpdb;
    $wpdb->update( 
        'table', 
        array( 
            'description' => $_POST["editval"]  // string
        ), 
        array( 'ID' => 1 ), 
        array( 
            '%s',   // value1
        ), 
        array( '%s' ) 
    ); 
      // Terminer la fonction avec un die()
	die();     
    }  

 ?>