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
				<?php $newloop = new WP_Query( array( 'post_type' => 'page', 'post_status' => 'publish', 'posts_per_page' => -1, 'post_parent'=> $post->ID ) ); ?>
				<ul class="page-toc">
				<?php while ( $newloop->have_posts() ) : $newloop->the_post(); ?>
						<li>
						<?php the_title( '<a href="#page-' . $post->ID . '" title="' . the_title_attribute( 'echo=0' ) . '">', '</a>' ); ?>
						</li>
				<?php endwhile; ?>
				</ul>
				<?php while ( $newloop->have_posts() ) : $newloop->the_post(); ?>
						
						<div class="excerpt">
							<?php the_title( '<h2 class="entry-title" id="page-'.$post->ID.'"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>
						
							<div class="excerpt-content">
								<?php the_excerpt(); ?>
							</div>
						</div>
					
				<?php endwhile; 
				wp_reset_query();
				?>
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>