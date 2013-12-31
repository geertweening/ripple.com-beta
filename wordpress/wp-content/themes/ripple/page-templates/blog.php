<?php
/**
 * Template Name: Blog
 */

get_header('targets'); ?>

<?php include (TEMPLATEPATH . '/inc/default-header.php' ); ?>
<div class="mailing-list">
	<h1>The Ripple Blog</h1>
	<p><a href="https://ripple.com/">Ripple</a> is an open-source, distributed payment protocol. It enables free and instant payments to merchants, consumers and developers in any currency – including dollars, yen, euros, and even Bitcoin. </p>
	<div class="ripple-blog-subscribe">

		<p class="form-input">
			<input type="email" id="mc4wp_email" name="EMAIL" placeholder="Get Ripple updates" />
		</p>

		<p class="form-submit">
			<input type="submit" value="Subscribe" />
		</p>
	</div>
</div>

<div id="primary" class="content-area">

	<?php
	$the_query = new WP_Query(array(
		'category_name' => 'blog',
		));

	while ( $the_query->have_posts() ) :
		$the_query->the_post();
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<header class="entry-header">
				<p class="entry-meta">
					<?php the_date('M j, y'); ?>
				</p><!-- .entry-meta -->
				<h2 class="blog-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ripple' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			</header>
			<?php 
			if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail col-sm-3">
				<?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<?php } ?>
			<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'ripple' ) ); ?>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'ripple' ),
				'after'  => '</div>',
				) );
				?>
				<footer class="entry-meta">
					<a class="readmore" href="<?php echo get_permalink(); ?>"> Read More</a>
				</footer>

			</div><!-- .entry-content -->
		</article> 
		<?php
		endwhile;
		wp_reset_postdata();
		?>

		
	</div><!-- #primary -->

	<?php get_footer('links'); ?>