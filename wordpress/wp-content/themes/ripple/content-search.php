<?php
/**
 * @package Ripple
 */
?>
<!-- Begin content.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<header class="entry-header">
			<h2 class="blog-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ripple' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
				<?php echo $post->post_title; ?>
			</a></h2>
			<p class="entry-meta">

				<span class="author updated">Posted by <?php the_author(); ?></span> <?php the_time(get_option('date_format')); ?> 

			</p><!-- .entry-meta -->
		</header>
		<?php 
		if ( has_post_thumbnail() ) { ?>
		<div class="post-thumbnail col-sm-3">
			<?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
		</div>
		<?php } ?>
		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<?php echo excerpt(120); ?>
		<?php else : ?>
			<?php echo excerpt(120); ?>
		<?php endif; ?>
	</div><!-- End entry content -->
</article><!-- #post-## -->

