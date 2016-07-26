<?php
/**
 * ** PAGE PRINCIPAL **
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pgm
 */

 
/** PAGE PRINCIPAL **/

function load_css() {
	wp_enqueue_style( 'actualites', get_template_directory_uri() . '/custom/actualites.css' );
}
add_action('wp_enqueue_scripts', 'load_css');


get_template_part( 'template-parts/content', 'header' );



   get_template_part( 'template-parts/content', 'defaut' );

get_template_part( 'template-parts/content', 'footer' );

// INCLURE SEULEMENT POUR LA BARRE ADMIN TOP HEADER
get_footer();
