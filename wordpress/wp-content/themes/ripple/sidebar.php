<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @packageRipple
 */
?>
<div id="secondary" class="sidebar widget-area" role="complementary">
	<?php do_action( 'before_sidebar' ); ?>
	<?php if ( ! dynamic_sidebar( 'blog-post-list-sidebar' ) ) : ?>

	<aside id="search" class="widget widget_search">
		<?php get_search_form(); ?>
	</aside>

	<aside id="archives" class="widget">
		<h3 class="widget-title"><?php _e( 'Archives', 'ripple' ); ?></h3>
		<ul>
			<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
		</ul>
	</aside>

	<aside id="meta" class="widget">
		<h3 class="widget-title"><?php _e( 'Meta', 'ripple' ); ?></h3>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
		</ul>
	</aside>





<?php endif; // end sidebar widget area ?>

</div><!-- #secondary -->
