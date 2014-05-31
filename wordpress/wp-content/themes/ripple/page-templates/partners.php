<?php
/**
 * Template Name: Partners
 */

get_header(); ?>

	<div id="primary" class="banner content-area secondary-font-family">
		<div id="content" class="wrapper" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', 'partners' );
				?>

		<?php endwhile; ?>

			

		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<!-- <?php get_sidebar('tabs'); ?> -->
<?php get_footer('links'); ?>
