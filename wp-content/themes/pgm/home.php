<?php
/**
 * Template Name: Page des actualites/news
 *
 * @link http://www.puregamemedia.fr/
 *
 */

get_template_part( 'template-parts/content', 'header' );

	get_template_part( 'template-parts/content', 'left' );

  	get_template_part( 'template-parts/page/content', 'actualites' );

   	get_template_part( 'template-parts/content', 'right' );

get_template_part( 'template-parts/content', 'footer' );

// INCLURE SEULEMENT POUR LA BARRE ADMIN TOP HEADER
get_footer();
