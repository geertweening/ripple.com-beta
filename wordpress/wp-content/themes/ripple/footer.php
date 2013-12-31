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
					<?php
					$the_query = new WP_Query(array(
						'category_name' => 'blog',
						'posts_per_page' => 5,
						));
					
					while ( $the_query->have_posts() ) :
						$the_query->the_post();
					?>
					<ul>
						<li>
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ripple' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
						</li>
					</ul>
					
					<?php
					endwhile;
					wp_reset_postdata();
					?>
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
				Copyright 2013 Ripple, Ripple Labs LLC
			</p>
		</div>
	</div>
</footer><!-- #colophon -->
<footer id="sub-colophon" class="sub-footer" role="siteinfo">
	<div class="wrapper">
		<div class="pull-right">
			<p class="gray">TM+ 2013 Ripple Labs LLC LLC. All Rights Reserved</p>
		</div>
		<div class="pull-right">
			<ul>
				<li>Terms</li>
				<li>Privacy</li>
			</ul>
		</div>
	</div>
	<div class="pull-right">
		Language: English
	</div>
</footer>
<?php wp_footer(); ?>

<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-45576805-1', 'ripple.com');
ga('send', 'pageview');

</script>
</body>
</html>