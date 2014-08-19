<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @packageRipple
 */

get_header('targets'); ?>
	
	<?php include (TEMPLATEPATH . '/inc/404-header.php' ); ?>

	<div id="primary" class="content-area">
		<main id="main404" class="site-main wrapper four-o-four 404" role="main">

				<div class="entry-content">

					<div class="col-sm-12 404">
						<p><?php echo "<h3>Well, this is embarrasing. Check out our <a href=https://ripple.com/forum/>forums</a> or head back to <a href=https://ripple.com/>home</a>. Perhaps search Ripple below ?</h3>" ?></p>
						<p><img src="https://ripple.com/wp-content/uploads/2014/08/404.png"></p>
						<p>Search Ripple:</p>
						<?php get_search_form(); ?>
					</div>

				</div><!-- .entry-content -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer('links'); ?>