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
						<h5>Ripple</h5>
						<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'ripple' ); ?>"><?php _e( 'Skip to content', 'ripple' ); ?></a></div>
						<?php wp_nav_menu( array( 'theme_location' => 'footer-links2', 'container' => false ) ); ?>	
					</li>
					<li>
						<h5>Topics</h5>
						<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'ripple' ); ?>"><?php _e( 'Skip to content', 'ripple' ); ?></a></div>
						<?php wp_nav_menu( array( 'theme_location' => 'footer-links3', 'container' => false ) ); ?>	
					</li>
					<li>
						<h5>Guides</h5>
						<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'ripple' ); ?>"><?php _e( 'Skip to content', 'ripple' ); ?></a></div>
						<?php wp_nav_menu( array( 'theme_location' => 'footer-links4', 'container' => false ) ); ?>	
					</li>
				</ul>
			</div><!-- .wrapper -->
		</div>
	</footer><!-- #colophon -->

	<footer id="sub-colophon" class="sub-footer" role="siteinfo">
		<div class="wrapper">
			<div class="pull-left">
				<p>TM+ 2013 <a href="https://opencoin.com/">OpenCoin LLC</a>. All Rights Reserved</p>
			</div>
			<div class="pull-left">
				<ul class="list-inline">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>terms/">Terms</a></li>
					<li class="icon-circle"></li>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>privacy-policy/">Privacy</a></li>
				</ul>
			</div>
			<div class="pull-right white">
				<p>Language: English</p>
			</div>
		</div>
	</footer>
<?php wp_footer(); ?>
</body>
</html>