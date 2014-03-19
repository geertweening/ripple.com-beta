<?php
/**
 * The template for displaying Search Results pages.
 *
 * @packageRipple
 */

get_header('blog'); ?>

	<div id="primary" class="content-area with-sidebar">
		<div class="article-wrap">
			<header class="search-results">
				<h1 class="page-title">Tag: <?php single_tag_title(); ?></h1>
			</header>
		<?php 
		
		
		
		while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'search' ); ?>

			<?php ripple_content_nav( 'nav-below' ); ?>

		<?php endwhile; // end of the loop. ?>
		<div class="wp-pagenavi-wrap">
			<?php wp_pagenavi();?>
		</div>
	</div>
		<?php get_sidebar('blog-single'); ?>
		
	</div><!-- #primary -->
<?php get_footer('links'); ?>

