<?php
/**
 * Template Name: Section
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php get_template_part( 'content', 'page' ); ?>

					

				<?php endwhile; // end of the loop. ?>
				<?php 
					
				$hPages = new WP_Query( 
							array( 
								'post_type' => 'page', 
								'post_status' => 'publish', 
								'posts_per_page' => -1, 
								'post_parent'=> $post->ID 
							)
				); 
				
				//print_r ( get_the_category($post->ID)->0 );
				$catarr = get_the_category($post->ID);
				//print_r ($catarr[0]->category_nicename);
				
				$args = array(
					'category_name' => $catarr[0]->category_nicename,
					'post_type' => array( 'page', 'post' ),
					'post__not_in'  => array($post->ID),
					'post_status' => 'publish', 
					'posts_per_page' => -1, 
					/*'post_parent'=> $post->ID */
				);
				$cPages = new WP_Query($args); 
				
				
				
				?>
				<ul class="page-toc">
				<?php while ( $hPages->have_posts() ) : $hPages->the_post(); ?>
						<li>
						<?php the_title( '<a href="#page-' . $post->ID . '" title="' . the_title_attribute( 'echo=0' ) . '">', '</a>' ); ?>
						</li>
				<?php endwhile; ?>
				<?php if (has_category()) {while ( $cPages->have_posts() ) : $cPages->the_post(); ?>
						<li>
						<?php the_title( '<a href="#page-' . $post->ID . '" title="' . the_title_attribute( 'echo=0' ) . '">', '</a>' ); ?>
						</li>
				<?php endwhile; }wp_reset_query();?>
				
				</ul>
				<?php while ( $hPages->have_posts() ) : $hPages->the_post(); ?>
						
						<div class="excerpt">
							<?php the_title( '<h2 class="entry-title" id="page-'.$post->ID.'"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>
						
							<div class="excerpt-content">
								<?php the_excerpt(); ?>
							</div>
						</div>
					
				<?php endwhile; wp_reset_query();?>
				<?php if (has_category()) {while ( $cPages->have_posts() ) : $cPages->the_post(); ?>
						<div class="excerpt">
							<?php the_title( '<h2 class="entry-title" id="page-'.$post->ID.'"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>
						
							<div class="excerpt-content">
								<?php the_excerpt(); ?>
							</div>
						</div>
					
				<?php endwhile; }
				wp_reset_query();
				?>
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>