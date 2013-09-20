<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @packageRipple
 */

get_header('targets'); ?>

	<?php include (TEMPLATEPATH . '/inc/404-header.php' ); ?>
<!-- Begin page.php-->	
	<div id="primary" class="content-area">
		<main id="main" class="wrapper" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>


			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<!-- End page.php -->
<?php get_footer('links'); ?>
