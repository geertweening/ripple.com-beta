<?php
/**
 * Template Name: Guide to Currency Trading 
 */

get_header('targets'); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('guide'); ?>>
		<header class="guide-header">
			<div class="wrapper">
				<h1 class="entry-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>guide-directory"><span class="muted">Ripple Guides</span></a><br>
					<?php the_title(); ?>
				</h1>
			</div>
		</header><!-- .entry-header -->
		<div id="primary" class="content-area wrapper">
			<?php get_sidebar('currency-trading-guide-nav'); ?>
			<?php get_template_part( 'content', 'guide-currency-trading' );?>
		</div><!-- #primary -->
	</article><!-- #post-## -->
		<?php get_footer('links'); ?>