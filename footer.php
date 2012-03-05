<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 
				if ( ! is_404() )
					get_sidebar( 'footer' );
				*/	
			?>
			<div id="supplementary">
			<?php 
				
				function makeWrapper($menu_id, $class){
					return '<ul id="%1$s" class="%2$s '.$class.'"><li class="footer-title"><h3><a href="#">'.wp_get_nav_menu_object($menu_id)->name.'</a></h3></li>%3$s</ul>';
				}
				wp_nav_menu( array( 'theme_location' => 'footer1', 'items_wrap' => makeWrapper(4, 'first') ) );
				
				makeFooterMenu(30, 'second');
				makeFooterMenu(36);
				makeFooterMenu(41);
				
				
			?>
			</div>
			<div id="bottom-bar">
				<div class="inner">
				<div class="copyright">Copyright Cardinal Intellectual Property 2012</div>   
				<?php wp_nav_menu( array( 'theme_location' => 'footer-end' ) ); ?>
				</div>
			</div>
			
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>