<?php
/**
 * The template used for displaying page content in guide.php
 *
 * @packageRipple
 */
?>
<!-- Begin content-blog.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="post-thumbnail col-sm-3">
		<?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
	</div>
	<header class="entry-header">
		<h2 class="blog-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ripple' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
		<p class="entry-meta">
			<?php ripple_posted_on(); ?>
		</p><!-- .entry-meta -->
		<?php endif; ?>
		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="sep"> | </span>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'ripple' ), __( '1 Comment', 'ripple' ), __( '% Comments', 'ripple' ) ); ?></span>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'ripple' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'ripple' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

</article><!-- #post-## -->
<div class="blog-dotted-line"></div>
<div class="blog-dotted-line"></div>
<!-- End content.php -->
