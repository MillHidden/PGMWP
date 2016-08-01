<?php
/**
 * ** PAGE PRINCIPAL **
 *
 * @link http://www.puregamemedia.fr/
 * @title pgm
 */

get_template_part( 'template-parts/content', 'header' );

	get_template_part( 'template-parts/content', 'left' );
	 
  	 get_template_part( 'template-parts/content', 'defaut' );

   	get_template_part( 'template-parts/content', 'right' );

get_template_part( 'template-parts/content', 'footer' );

// INCLURE SEULEMENT POUR LA BARRE ADMIN TOP HEADER
get_footer();
