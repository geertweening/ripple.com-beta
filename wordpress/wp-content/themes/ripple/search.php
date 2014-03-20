<?php
/**
 * The template for displaying Search Results pages.
 *
 * @packageRipple
 */

get_header('blog'); ?>

<div id="primary" class="content-area with-sidebar">
		<div class="article-wrap">
			<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$posts_per_page = 6;
				$args = array(
					'posts_per_page' => $posts_per_page,
					's' => $s,
					'paged' => $paged
					);
				query_posts( $args );

				if (have_posts()) :
					$page_count = $paged * $posts_per_page;
			?>
			<header class="search-results">
			<h1 class="pagetitle"><?php printf( __( 'Search Results for: %s', 'foo' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<h4>Showing
					<?php
					switch($paged) {
						case 1 :
						echo $page_count - $posts_per_page . ' - ';
						break;
						case $paged > 1 :
						echo $page_count - $posts_per_page + 1 . ' - ';
						break;
					}
					if($wp_query->found_posts < $page_count) { echo $wp_query->found_posts; }
					else { echo $page_count; }
					?> of
					<?php echo $wp_query->found_posts; ?> results</h4>
				</header>
				<?php while (have_posts()) : the_post(); ?>
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
						<!-- 
						<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments »', '1 Comment »', '% Comments »'); ?></p>
					 -->
					</div>
				</article>

			
			<?php endwhile;?>
				<div class="wp-pagenavi-wrap">
					<?php wp_pagenavi();?>
				</div>


		<?php else : ?>

			<h2 class="center">No posts found. Try a different search?</h2>
			<?php get_search_form(); ?>

		<?php endif; ?>
		</div>
		<?php get_sidebar('blog-single'); ?>
</div>



<?php get_footer('links'); ?>

