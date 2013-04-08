<?php get_header(); ?>
	<div id="main">
		<div class="wrapper">
			<!-- start blog posts column -->
			<h3>the Ripple blog</h3>
			<div class="blog-posts">
				<?php if (have_posts()) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to overload this in a child theme then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
						?>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php comments_template( '', true ); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>