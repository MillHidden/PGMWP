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
	    get_template_part( 'template-parts/content', 'left' );
	   	 	get_template_part( 'template-parts/page/content', 'dashboard' );	
	   	get_template_part( 'template-parts/content', 'right' );	 	    
	}
}

else {

	get_header(); 
	get_template_part( 'template-parts/content', 'header' );

	if (is_page('planning')) {
		get_template_part( 'template-parts/content', 'left' );
	   		get_template_part( 'template-parts/page/content', 'planning' );
	   	get_template_part( 'template-parts/content', 'right' );
	}

	else if (is_page('mentions-legales')) {
		get_template_part( 'template-parts/content', 'left' );
	   		get_template_part( 'template-parts/content', 'mentions-legales' );
	   	get_template_part( 'template-parts/content', 'right' );
	}

	else if (is_page('conditions-generales-de-vente')) {
		get_template_part( 'template-parts/content', 'left' );
	   		get_template_part( 'template-parts/content', 'conditions-generales-de-vente' );
	   	get_template_part( 'template-parts/content', 'right' );
	}

	else if (is_page('cookies')) {
		get_template_part( 'template-parts/content', 'left' );
	   		get_template_part( 'template-parts/content', 'cookies' );
	   	get_template_part( 'template-parts/content', 'right' );
	}

	else if (is_page('contact')) {
		get_template_part( 'template-parts/content', 'left' );
	   		get_template_part( 'template-parts/content', 'contact' );
	   	get_template_part( 'template-parts/content', 'right' );
	}		

	else if (is_page('retrievepwd')) {
		get_template_part( 'template-parts/content', 'left' );
			get_template_part( 'template-parts/page/content', 'retrievepwd' );
		get_template_part( 'template-parts/content', 'right' );
	}
}
	
get_template_part( 'template-parts/content', 'footer' );
get_footer();

