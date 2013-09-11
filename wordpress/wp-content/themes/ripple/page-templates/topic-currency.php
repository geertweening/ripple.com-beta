<?php
/**
 * Template Name: Topic Currency
 */

get_header('targets'); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('topic'); ?>>
		<header class="guide-header">
			<div class="wrapper">
				<h1 class="entry-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>topic-directory"><span class="muted">Topic:</span></a> <?php the_title(); ?><br>
				</h1>
				<div class="entry-content">
					<h2 class="topic-header">A New Currency for the Internet Age</h2>
					<p>XRP is a math-based currency designed to work seamlessly with the Internet. Powered by a global network of computers, XRP is a fast, direct, and secure way to send payments on the web.</p>
				</div>
			</div>
		</header><!-- .entry-header -->

		<div id="primary" class="content-area wrapper">
			<?php get_sidebar('topic-currency-nav'); ?>
			<?php get_template_part( 'content', 'topic-currency' );?>
		</div><!-- #primary -->
	</article><!-- #post-## -->
		<?php get_footer('links'); ?>