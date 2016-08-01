<?php
/**
 * ** PAGE ARTICLE **
 *
 * @link http://www.puregamemedia.fr/
 * @title Page article seul
 */

$category = get_the_category();
$id = get_the_ID();
$query_single = new WP_Query('p='.$id);
$meta_value = get_post_meta( $id, '_amt_description', true );	
$title_value = get_post_meta( $id, '_amt_title', true );				
$author_id = $post->post_author;
$img_url = get_user_meta($author_id, 'user_avatar', true); 
?>
<?php if ( $query_single->have_posts() ) : while ( $query_single->have_posts() ) : $query_single->the_post(); ?>	

<section id="article" itemscope itemtype="http://schema.org/NewsArticle" itemref="author_box review_box">
				<ol class="article-top-nav" itemscope itemtype="http://schema.org/BreadcrumbList">
				  <li itemprop="itemListElement" itemscope
					  itemtype="http://schema.org/ListItem">
					<a itemprop="item" href="http://localhost/actualites/">
					   <span itemprop="name">Actualités</span></a>
					<meta itemprop="position" content="1" />
				  </li>
				  <li itemprop="itemListElement" itemscope
					  itemtype="http://schema.org/ListItem">
					<a itemprop="item" href="<?php echo get_category_link($category[0]->cat_ID); ?>">
										  <span itemprop="name">
										 <?php echo '<a href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.'</a>'; ?> 
										  </span></a>
					<meta itemprop="position" content="2" />
				  </li>
				  <li itemprop="itemListElement" itemscope
					  itemtype="http://schema.org/ListItem">
					<a itemprop="item" href="<?php echo get_permalink(); ?>">
						<span itemprop="name"><?php the_title(); ?></span></a>
					<meta itemprop="position" content="3" />
				  </li>
				</ol>
				<div class="" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
					<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
					  <meta itemprop="url" content="wp-content/uploads/logo/PGM-150x150.png">
					  <meta itemprop="width" content="150">
					  <meta itemprop="height" content="60">
					</div>
					<meta itemprop="name" content="PureGameMedia">
				  </div>				
				<header class="photo" style="width:100%">	
					 <h1 itemprop="name"><a href="<?php echo get_permalink(); ?>" itemprop="mainEntityOfPage"><?php the_title(); ?></a></h1>
					 <p class="article-top-desc" itemprop="headline"><?php echo $meta_value; ?></p>
                      <!--<p class="article-top-desc" itemprop="description">PureGameMedia souhaite développer son équipe rédactionelle.</p>   --> 
					 <?php the_post_thumbnail( 'image-size', array( 'itemprop' => 'Photo',  'style' => 'width: inherit') ); ?>
					<div class="col-md-2 article-cat text-center">	
                            <?php 
							echo '<img src="'.z_taxonomy_image_url($category[0]->term_id).'" /> <span itemprop="articleSection"><a href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.'</a></span>'; 
							?>
					</div>
				</header>
				<hr>
				<aside id="author_box" class="pull-left text-left">
					 <img class="img-circle pull-left" width='50px' alt="Avatar de <?php get_the_author(); ?>" src="<?php echo '../wp-content/uploads'.$img_url; ?>" />
						<p class="">
						Publié le <time itemprop="datePublished" content="<?php the_time('Y:d:m'); ?>T<?php the_time('H:i'); ?>Z"><?php the_time('d/m/Y'); ?> - Par 
                         <span itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name"><?php echo get_the_author(); ?></span></span></br>
						</p>
						<p class="article-top-coment "><span class="glyphicon glyphicon-comment"></span> <meta itemprop="interactionCount" content="13 Usercomments"><?php comments_number('0', '1', '%'); ?> commentaires sur l'article</p>
				</aside>					
				<div class="text-right">Partager sur : <div class="addthis_sharing_toolbox"></div></div>
				<hr class="hr-top clear">
				<div id="article-inside" itemprop="articleBody">
					<?php echo the_content(); ?>		
				</div>
				<hr>
				<aside id="author_box" class="pull-left text-left">
						<img class="img-circle pull-left" width='50px' alt="Avatar de <?php get_the_author(); ?>" src="<?php echo '../wp-content/uploads'.$img_url; ?>" />
						<p class="">
						Publié le <time itemprop="datePublished" content="<?php the_time('Y:d:m'); ?>T<?php the_time('H:i'); ?>Z"><?php the_time('d/m/Y'); ?> - Par 
                         <span itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name"><?php echo get_the_author(); ?></span></span></br>
						</p>
						<p class="article-top-coment "><span class="glyphicon glyphicon-comment"></span> <meta itemprop="interactionCount" content="13 Usercomments"><?php comments_number('0', '1', '%'); ?> commentaires sur l'article</p>
				</aside>					
				<div class="text-right">Partager sur : <div class="addthis_sharing_toolbox"></div></div>				
			</section>
			<hr>
			<h2 class="related_articles">Articles conseillés</h2>
			<?php get_related_posts_thumbnails(); ?>			
			<div class="dailymotion-widget" data-placement="5737a114a94fba0397edeaef"></div><script>(function(w,d,s,u,n,e,c){w.PXLObject = n; w[n] = w[n] || function(){(w[n].q = w[n].q || []).push(arguments);};w[n].l = 1 * new Date();e = d.createElement(s); e.async = 1; e.src = u;c = d.getElementsByTagName(s)[0]; c.parentNode.insertBefore(e,c);})(window, document, "script", "//api.dmcdn.net/pxl/client.js", "pxl");</script>
			<hr>
			<?php comments_template(); ?>
<?php endwhile; endif; ?>