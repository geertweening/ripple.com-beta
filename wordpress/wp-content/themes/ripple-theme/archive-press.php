<?php get_header(); ?>
	<div id="main">
		<div class="wrapper">
			<!-- start blog posts column -->
			<h3>Press</h3>
			<div class="blog-posts press-posts">
				<?php if (have_posts()) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="entry-header">
								<span class="entry-date"><?php the_time('F j, Y'); ?></span> 
								<span class="press-by"><?php the_field('press_by'); ?></span>
								<h1 class="entry-title"><a href="<?php the_field('press_link'); ?>"><?php the_title(); ?></a></h1>
							</div>
						</article><!-- #post-<?php the_ID(); ?> -->
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>