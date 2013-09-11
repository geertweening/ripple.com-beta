<?php
/**
 * Template Name: Topic Payment Network
 */

get_header('targets'); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('topic'); ?>>
		<header class="guide-header">
			<div class="wrapper">
				<h1 class="entry-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>topic-directory"><span class="muted">Topic:</span></a>  <?php the_title(); ?><br>
				</h1>
				<div class="entry-content">
					<h2 class="topic-header">Payment Network</h2>
						<p>The Ripple payment network allows anyone to send money to anyone in any currency. It is founded on the same principles as the Internet: free for everyone, accessible to anyone, owned by no one, and connecting the whole world on a shared network.</p>
				</div>
			</div>
		</header><!-- .entry-header -->

		<div id="primary" class="content-area wrapper">
			<?php get_sidebar('topic-payment-network-nav'); ?>
			<?php get_template_part( 'content', 'topic-payment-network' );?>
		</div><!-- #primary -->
	</article><!-- #post-## -->
		<?php get_footer('links'); ?>