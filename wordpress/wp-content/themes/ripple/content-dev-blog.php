<?php
/**
 * @package Ripple
 */
?>
<!-- Begin content.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class("content"); ?>>
	
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<header class="entry-header">
			<h1 class="dev-blog-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ripple' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<p class="entry-meta">
				<?php the_date('M j, y'); ?>
			</p><!-- .entry-meta -->
		</header>
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
	<?php endif; ?>

</article><!-- #post-## -->
<!-- End content.php -->
