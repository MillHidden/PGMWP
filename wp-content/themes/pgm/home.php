<?php
/**
 * The template for displaying all pages.
 *
 * This is the template for PAGE ACTUALITES
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PureGameMedia
 */

function load_css() {
	wp_enqueue_style( 'actualites', get_template_directory_uri() . '/custom/actualites.css' );
}
add_action('wp_enqueue_scripts', 'load_css');

get_header(); 
get_template_part( 'template-parts/content', 'header' );


   get_template_part( 'template-parts/page/content', 'actualites' );


get_template_part( 'template-parts/content', 'footer' );
get_footer();

