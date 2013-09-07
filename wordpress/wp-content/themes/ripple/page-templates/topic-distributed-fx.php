<?php
/**
 * Template Name: Topic Distributed FX
 */

get_header('targets'); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('topic'); ?>>
		<header class="guide-header">
			<div class="wrapper">
				<h1 class="entry-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>/topic-directory"><span class="muted">Topic:</span></a>  <?php the_title(); ?><br>
				</h1>
				<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php ripple_content_nav( 'nav-below' ); ?>

				<?php else : ?>

					<?php get_template_part( 'no-results', 'index' ); ?>

				<?php endif; ?>
			</div>
		</header><!-- .entry-header -->

		<div id="primary" class="content-area wrapper">
			<?php get_sidebar('topic-distributed-fx-nav'); ?>
			<?php get_template_part( 'content', 'topic-distributed-fx' );?>
		</div><!-- #primary -->
	</article><!-- #post-## -->
		<?php get_footer('links'); ?>