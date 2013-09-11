<?php
/**
 * Template Name: Topic Distributed FX
 */

get_header('targets'); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('topic'); ?>>
		<header class="guide-header">
			<div class="wrapper">
				<h1 class="entry-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>topic-directory"><span class="muted">Topic:</span></a>  <?php the_title(); ?><br>
				</h1>
				<div class="entry-content">
					<h2 class="topic-header">A universal translator for money</h2>
						<p>Trading currencies has never been so easy. Ripple’s distributed currency exchange allows anyone to trade currencies on a global network. Trades are peer-to-peer, automatic, and have no fees or added margins. The result is complete currency choice: you can hold, send, and receive whatever currency you prefer.</p>
				</div>
			</div>
		</header><!-- .entry-header -->

		<div id="primary" class="content-area wrapper">
			<?php get_sidebar('topic-distributed-fx-nav'); ?>
			<?php get_template_part( 'content', 'topic-distributed-fx' );?>
		</div><!-- #primary -->
	</article><!-- #post-## -->
		<?php get_footer('links'); ?>