<?php
/*
 * Template Name: Pages des actualites
 */	
?>
<div class="bloc-news">
<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
<br/>
<?php $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1; $query_actu = new WP_Query('posts_per_page=4&paged='.$paged);  ?>
	<?php if ( $query_actu->have_posts() ) : while ( $query_actu->have_posts() ) : $query_actu->the_post(); ?>					
	  <div id="post-<?php the_ID(); ?>"  class="col-md-6">
		<div class="title-news-inside">
		 <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</div>
		<div class="news-img-center">
		 <?php the_post_thumbnail('article_entete'); ?>
		</div>
		<p class="text-inside-news"><?php echo get_excerpt(130); ?></p>
		<span class="left-info-news pull-left"> le <?php the_time('d/m'); ?> à <?php the_time('H:i'); ?></span> <a href=""><span class="right-coment pull-right"><?php comments_number('0', '1', '%'); ?> <span class="glyphicon glyphicon-comment"></span></span></a> <a href="<?php the_permalink(); ?>" rel="bookmark" class="right-next pull-right" title="Permanent Link to <?php the_title_attribute(); ?>">Lire la suite</a>
	</div>
	  <?php endwhile; ?>
		<div class="clear"></div>
		<hr>
		<?php  numeric_posts_nav(); ?>
		<hr>
	  <?php else : ?>
		<p><?php _e( 'Désolé, aucun résultats trouvés !.' ); ?></p>
	<?php endif; ?>	
	<?php  echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>	
</div>