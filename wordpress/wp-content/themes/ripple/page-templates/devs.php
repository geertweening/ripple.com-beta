<?php
/**
 * Template Name: Developers
 */

get_header('targets'); ?>

	<div id="primary" class="banner content-area secondary-font-family developer-page">
		<div id="content" class="wrapper" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', 'developers' );
				?>

			<?php endwhile; ?>

			

		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar('icons-dev'); ?>
<?php get_sidebar('start-using-dev'); ?>
<?php get_footer('links'); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/dev-script.js"></script>