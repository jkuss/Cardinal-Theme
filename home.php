<?php
/**
 * Template Name: Home
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>


		<div id="primary">
			<div id="content" role="main">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
					
					<div id="slideshow-container">
						<div id="slideshow">
							
							<?php $newloop = new WP_Query( array( 'post_type' => 'cdnl_home_feature', 'post_status' => 'publish', 'posts_per_page' => -1 ) ); ?>
	
							<?php while ( $newloop->have_posts() ) : $newloop->the_post(); ?>
								<div class="slide">
									<div class="feature-content">
										<?php if ( has_post_thumbnail() ): 
												the_post_thumbnail( 'single-post-thumbnail' ); 
											elseif(get_post_meta($post->ID, 'youtube', true)): ?>
												<div id="<?php echo get_post_meta($post->ID, 'youtube', true); ?>"></div>
												<script>
													videos.push('<?php echo get_post_meta($post->ID, 'youtube', true); ?>'); 
													
												</script>
											<?php else : ?>
												<img width="460" height="264" src="<?php bloginfo( 'template_url' );?>/images/default.png" class="attachment-single-post-thumbnail wp-post-image" alt="beaker" title="beaker">
											<?php endif; ?>
										
									</div>
									<div class="excerpt">
										<?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>
									
										<div class="excerpt-content">
											<?php echo myexcerpt(14, get_post_meta($post->ID, 'url', true)); ?>
										</div>
									</div>
								</div>
								
							<?php endwhile; 
							
							wp_reset_query();
							
							?>
							
							<!--<iframe width="460" height="264" src="http://www.youtube.com/embed/qvEsuV3Z6g0?rel=0" frameborder="0" allowfullscreen></iframe>
							<iframe width="460" height="264" src="http://www.youtube.com/embed/BhUZmvAEIN4?rel=0" frameborder="0" allowfullscreen></iframe>-->
						</div>
						<?php echo "<script>videosReady();</script>"; ?>
						<div class="flipper prev"></div>
						<div class="flipper next"></div>
						<ul class="pager"></ul>
					</div>
					
					<div class="entry-content">
						<?php the_content(); ?>
						<?php //wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
						<?php 
								
						 popularWrapper(8, '');
						?>
					</div><!-- .entry-content -->
					
				</article><!-- #post-<?php the_ID(); ?> -->
				
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>


