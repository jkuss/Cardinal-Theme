<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

$options = twentyeleven_get_theme_options();
$current_layout = $options['theme_layout'];

if ( 'content' != $current_layout ) :
?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php 
				
				 popularWrapper(8, '');
			?>
				<aside id="contact" class="widget">
					<h3 class="widget-title">Contact Us</h3>
					<p>We welcome any questions, comments, or concerns you may have.<br />
					Call us at (847) 905-7122 or</p>
					<a href="<?php echo get_permalink(57); ?>"><img src="<?php bloginfo('template_url')?>/images/arrow-big.gif" class="arrow" />Contact Cardinal</a>
				</aside>
			
		</div><!-- #secondary .widget-area -->
<?php endif; ?>