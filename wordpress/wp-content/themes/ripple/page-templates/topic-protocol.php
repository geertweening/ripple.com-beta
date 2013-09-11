<?php
/**
 * Template Name: Topic Protocol
 */

get_header('targets'); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('topic'); ?>>
		<header class="guide-header">
			<div class="wrapper">
				<h1 class="entry-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>topic-directory"><span class="muted">Topic:</span></a> <?php the_title(); ?><br>
				</h1>
				<div class="entry-content">
					<h2 class="topic-header">A universal protocol for money</h2>
					<p>The Internet is only as powerful as its protocols. HTTP produced the World Wide Web. SMTP gave us email. RTXP (the Ripple Transaction Protocol) creates a payment network that automatically processes payments, currency exchange, and other financial transactions. RTXP can be used, modified, and implemented by anyone for free. Developers can use RTXP to build real-money applications. Businesses can integrate RTXP to add advanced functionality. RTXP is more than a payment system -- it’s the next stage in the evolution of the Internet.</p>
				</div>
			</div>
		</header><!-- .entry-header -->

		<div id="primary" class="content-area wrapper">
			<?php get_sidebar('topic-protocol-nav'); ?>
			<?php get_template_part( 'content', 'topic-protocol' );?>
		</div><!-- #primary -->
	</article><!-- #post-## -->
		<?php get_footer('links'); ?>