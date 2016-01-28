<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Elena
 */
?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">

		<?php 
			// Footer Navigation
			wp_nav_menu( 
				array( 						
					'theme_location' => 'footer-navigation',
					'container' => 'div', 
					'container_class' => 'footer-navigation', 
					'fallback_cb' => false 
				) 
			); 
		?>

		<div class="footer-text">
			<p>
				&copy; <?php echo date("Y") . ' '; bloginfo( 'name' ); ?>.			
				<?php esc_attr_e( 'Proudly powered by ', 'elena' ); ?>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'elena' ) ); ?>" class="site-generator" title="WordPress">WordPress</a> &amp; 
				<a href="<?php echo esc_url( 'http://#' ); ?>" class="site-webdesign" title="Krusze Theme">Elena Theme</a>.
			</p>
		</div>	
	</div><!-- .site-info -->
</footer><!-- .site-footer -->

<?php wp_footer(); ?>

</body>
</html>