<?php
/**
 * @packageRipple
 */
?>
<!-- Begin content-single.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
	<header class="entry-header">
		<h1 class="dev-blog-title"><?php the_title(); ?></h1>
		<p class="entry-meta">
			<?php the_date('M j, y'); ?>
		</p><!-- .entry-meta -->	
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php the_content(); ?>
		<?php include (TEMPLATEPATH . '/inc/sharing-is-caring-dev-blog.php' ); ?>
			<?php
				wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'ripple' ),
				'after'  => '</div>',
				) );
			?>

		<div class="about-author-wrapper">
			<div class="about-author">
				<div class="author-img">
					<?php the_author_image($author_id = null); ?>
				</div>
				<div class="author-meta">
					<h6 class="author-title">About <?php the_author(); ?></h6>
				</div>
				<p class="author-bio">
					<?php the_author_meta('description'); ?> 
				</p>
			</div>
		</div>

	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
		/* translators: used between list items, there is a space after the comma */
		$category_list = get_the_category_list( __( ', ', 'ripple' ) );

		/* translators: used between list items, there is a space after the comma */
		$tag_list = get_the_tag_list( '', __( ', ', 'ripple' ) );

		if ( ! ripple_categorized_blog() ) {
			// This blog only has 1 category so we just need to worry about tags in the meta text
			if ( '' != $tag_list ) {
				$meta_text = __( 'tagged %2$s.' );
			} else {
				$meta_text = __( '' );
			}

		} else {
			// But this blog has loads of categories so we should probably display them here
			if ( '' != $tag_list ) {
				$meta_text = __( ' tagged %2$s.' );
			} else {
				$meta_text = __( 'Tagged %1$s.' );
			}

		} // end check for categories on this blog

		printf(
			$meta_text,
			$category_list,
			$tag_list,
			get_permalink(),
			the_title_attribute( 'echo=0' )
			);
			?>

			<?php edit_post_link( __( 'Edit', 'ripple' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post-## -->
