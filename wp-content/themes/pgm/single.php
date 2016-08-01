<?php
/**
 * @title Page article seul
 */

get_template_part( 'template-parts/content', 'header' );

	get_template_part( 'template-parts/content', 'left' );
	 
  	 get_template_part( 'template-parts/content', 'articles' );

   	get_template_part( 'template-parts/content', 'right' );

get_template_part( 'template-parts/content', 'footer' );

// INCLURE SEULEMENT POUR LA BARRE ADMIN TOP HEADER
get_footer();
