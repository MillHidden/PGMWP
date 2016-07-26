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


if ( is_page('dashboard')) {
	if (!is_user_logged_in()) {
		wp_redirect( home_url() );
		exit;
	}
	else {
		get_header(); 
		get_template_part( 'template-parts/content', 'header' );
	    get_template_part( 'template-parts/page/content', 'dashboard' );
	    $enable = true;
	    $page_css = 'dashboard.css';	    
	}
}

else {

	get_header(); 
	get_template_part( 'template-parts/content', 'header' );


	if (is_page('streamers')) {
	   get_template_part( 'template-parts/page/content', 'streamers' );
	   $enable = true;
	   $page_css = 'streamers.css';
	   $test = 'test';

	}
}




	
get_template_part( 'template-parts/content', 'footer' );
get_footer();

