<?php
/**
 * The Template for displaying all single dev blog  posts.
 *
 * @packageRipple
 */

get_header('dev-ripple-blog'); ?>

	<div id="primary" class="single-dev-blog content-root">
		<div class="menubar">
		<div class="dev-menu">
			<ul>
				<li class="level-0">
					<?php do_action( 'before_sidebar' ); ?>
					<?php if ( ! dynamic_sidebar( 'Dev Sidebar' ) ) : ?>

					<aside id="search" class="widget widget_search">
						<?php get_search_form(); ?>
					</aside>

					<aside id="archives" class="widget">
						<h1 class="widget-title"><?php _e( 'Archives', 'ripple' ); ?></h1>
						<ul>
							<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
						</ul>
					</aside>

					<aside id="meta" class="widget">
						<h1 class="widget-title"><?php _e( 'Meta', 'ripple' ); ?></h1>
						<ul>
							<?php wp_register(); ?>
							<li><?php wp_loginout(); ?></li>
							<?php wp_meta(); ?>
						</ul>
					</aside>
				</li>
			</ul>

		<?php endif; // end sidebar widget area ?>
	</div>
</div>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single-dev-blog' ); ?>

			<?php ripple_content_nav( 'nav-below' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

		
	</div><!-- #primary -->
<?php get_footer('dev-ripple'); ?>