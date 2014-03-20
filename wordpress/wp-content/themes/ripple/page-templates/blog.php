<?php
/**
 * Template Name: blog.php
 */

get_header('blog'); ?>




<div id="primary" class="content-area with-sidebar">
	<div class="article-wrap">
		<?php if( have_posts() ) the_post(); ?>
		<?php
		query_posts( array( 'category_name' => 'blog', 'paged' => get_query_var('paged') ) );

		while ( have_posts() ) : the_post(); ?>

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

				<?php echo excerpt(120); ?>

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

			<?php endwhile;?>
			<div class="wp-pagenavi-wrap">
				<?php wp_pagenavi();?>
			</div>
			<?php wp_reset_query();?>
		</div>
		<?php get_sidebar(); ?> 
</div><!-- #primary -->

<?php get_footer('with-sidebar'); ?>




