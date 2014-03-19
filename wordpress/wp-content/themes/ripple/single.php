<?php
/**
 * The Template for displaying all single posts.
 *
 * @packageRipple
 */

get_header('blog'); ?>

	<div id="primary" class="content-area with-sidebar">
		
		

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php ripple_content_nav( 'nav-below' ); ?>

		<?php endwhile; // end of the loop. ?>

		
	</div><!-- #primary -->
<?php get_footer('links'); ?>