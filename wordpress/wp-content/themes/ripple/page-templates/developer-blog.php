<?php
/**
 * Template Name: developer-blog.php
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
get_header('dev-ripple-blog'); ?>
<!-- Begin Index.php -->

<div id="primary" class="content-root">
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
<?php query_posts( 'post_type=dev-blog'); ?>

<?php if ( have_posts() ) : ?>

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'dev-blog' ); ?>

				<?php endwhile; ?>

				<?php ripple_content_nav( 'nav-below' ); ?>

			<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>


	</div><!-- #primary -->

	<?php get_footer('dev-ripple'); ?>