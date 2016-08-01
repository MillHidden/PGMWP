<?php
/*
Template Name: Search Page
*/


get_template_part( 'template-parts/content', 'header' );

	get_template_part( 'template-parts/content', 'left' );

?>

<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
<hr>
<h2><?php echo $wp_query->found_posts; ?> résultats trouvés : <span><?php the_search_query(); ?></span></h2>
<hr>
        <?php if ( have_posts() ) { ?>
        	<?php while ( have_posts() ) { the_post(); ?>
			<article>
					<header>
						<h2><a href="<?php echo get_permalink(); ?>"><?php the_title();  ?></a></h2>
					</header>
			            <!-- end header -->	            
			            <div class="search_entry">
			           	 <?php  the_post_thumbnail('thumbnail') ?>
						<p>
							<?php echo substr(get_the_excerpt(), 0,300); ?>
						</p>
			            <div class="pull-right"> <a href="<?php the_permalink(); ?>">Lire la suite..</a></div>        
			            </div>
			            <!-- end .entry -->
			            <aside>
			                Auteur : <a href="" title="¨Posté par <?php echo get_the_author(); ?>" rel="author"><?php echo get_the_author(); ?></a><br/>
			                Le <?php the_time('d/m'); ?> à <?php the_time('H:i'); ?>
			            </aside>                        
			</article>

			<hr>

            <?php } ?>

         

           <?php paginate_links(); ?>

        <?php } ?>


<?php
   	get_template_part( 'template-parts/content', 'right' );

get_template_part( 'template-parts/content', 'footer' );

// INCLURE SEULEMENT POUR LA BARRE ADMIN TOP HEADER
get_footer();
