<?php
/**
 * Template Name: Video
 */

get_header('video'); ?>

	<div id="primary" class="content-area secondary-font-family">
			<article id="video-area" class="video-area wrapper">
			        <div class="entry-content callout">
			        	<h1>The Future of Payments</h1>
			            <a id="start-video" href="#">
			                <div class="play-button-circle">
			                    <i class="fa fa-play">
			                    	
			                    </i>
			                </div>
			            </a>
			        </div><!-- .entry-content -->

			</article><!-- #post-## -->
	</div><!-- #primary -->
	<nav id="site-navigation" class="nav-bg" role="navigation">
		<div class="wrapper">
			<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'ripple' ); ?>"><?php _e( 'Skip to content', 'ripple' ); ?></a></div>
			<?php wp_nav_menu( array( 'theme_location' => 'video-splash' ) ); ?>
		</div>
	</nav><!-- #site-navigation -->	
	<?php get_sidebar('news-post'); ?>
	<?php get_sidebar('featured-quotes'); ?>
	<?php get_footer('links'); ?>