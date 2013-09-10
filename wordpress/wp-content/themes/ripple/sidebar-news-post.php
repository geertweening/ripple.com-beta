<?php
/**
 * The News Post Sidebar.
 *
 * @packageRipple
 */
?>
	<div id="tertiary" class="news-post widget-area" role="complementary">
		<div class="wrapper">
			<h3 class="post-area-heading"><a href="<?php echo esc_url( home_url( '/' ) ); ?>blog">From our blog</a></h3>
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'blog',
		'posts_per_page' => 2,
		));
	  
	while ( $the_query->have_posts() ) :
 $the_query->the_post();
?>
 		<article id="post-<?php the_ID(); ?>" <?php post_class(row); ?>>
 			
			<div class="post-thumbnail col-sm-3">
					 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
					<p class="news-meta"><?php the_time(get_option('date_format')); ?></p>
					<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
					<?php the_excerpt(); ?>
					<a class="readmore" href="<?php echo get_permalink(); ?>"> Read More</a>
			</div>
		</article> 
	<?php
 endwhile;
 wp_reset_postdata();
?>

		</div><!-- .wrapper-->	
	</div><!-- #tertiary -->
