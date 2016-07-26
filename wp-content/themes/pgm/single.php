<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pgm
 */

get_header(); 
get_template_part( 'template-parts/content', 'header' );


   get_template_part( 'template-parts/content', 'articles' );


get_template_part( 'template-parts/content', 'footer' );
get_footer();


