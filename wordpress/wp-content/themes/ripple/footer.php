<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @packageRipple
 */
?>
	</div><!-- #main -->
	<div id="push"></div>
</div><!-- #page -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-wrapper">
			<div class="wrapper">
				<ul class="footer-links list-unstyled">	
					<li>
						<h5><a href="<?php echo esc_url( home_url( '/' ) ); ?>blog">From the Blog</a></h5>
						<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'ripple' ); ?>"><?php _e( 'Skip to content', 'ripple' ); ?></a></div>
						<?php wp_nav_menu( array( 'theme_location' => 'footer-links1', 'container' => false ) ); ?>	
					</li>
					<li>
						<a href="#"><h5>Learn More</h5></a>
						<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'ripple' ); ?>"><?php _e( 'Skip to content', 'ripple' ); ?></a></div>
						<?php wp_nav_menu( array( 'theme_location' => 'footer-links2', 'container' => false ) ); ?>	
					</li>
					<li>
						<a href="#"><h5>Technical</h5></a>
						<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'ripple' ); ?>"><?php _e( 'Skip to content', 'ripple' ); ?></a></div>
						<?php wp_nav_menu( array( 'theme_location' => 'footer-links3', 'container' => false ) ); ?>	
					</li>
					<li>
						<a href="#"><h5>Partners</h5></a>
						<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'ripple' ); ?>"><?php _e( 'Skip to content', 'ripple' ); ?></a></div>
						<?php wp_nav_menu( array( 'theme_location' => 'footer-links4', 'container' => false ) ); ?>	
					</li>

				</ul>
			</div><!-- .wrapper -->
			<div class="wrapper site-info">
				<p>
					Copyright 2013 Ripple, OpenCoin
				</p>
			</div>
		</div>
	</footer><!-- #colophon -->
<?php wp_footer(); ?>
</body>
</html>