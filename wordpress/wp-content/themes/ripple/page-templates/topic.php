<?php
/**
 * Template Name: Topic
 */

get_header('targets'); ?>
	<nav id="site-navigation" class="video-splash-navigation" role="navigation">
		<div class="wrapper">
			<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'ripple' ); ?>"><?php _e( 'Skip to content', 'ripple' ); ?></a></div>
			<?php wp_nav_menu( array( 'theme_location' => 'video-splash' ) ); ?>
		</div>
	</nav><!-- #site-navigation -->	
	
	<div id="primary" class="content-area wrapper">

		<div id="tertiary" class="news-post widget-area" role="complementary">
		<div class="wrapper">
			<h3>Currency</h3>
<!-- #math-based --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'math-based',
		'posts_per_page' => 1,
		));
	  
	while ( $the_query->have_posts() ) :
 $the_query->the_post();
?>
 <section id="math-based" <?php post_class(row); ?>>
		<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
		</div>
		<div class="post-content col-sm-9">
				<h4><?php the_title(); ?></h4>
				<?php the_excerpt(); ?>
		</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #math-based -->

<!-- #direct --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'Direct',
		'posts_per_page' => 1,
		));
	  
	while ( $the_query->have_posts() ) :
 $the_query->the_post();
?>
 <section id="direct" <?php post_class(row); ?>>
		<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
		</div>
		<div class="post-content col-sm-9">
				<h4><?php the_title(); ?></h4>
				<?php the_excerpt(); ?>
		</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #direct -->

<!-- #distributed --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'distributed',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="distributed" <?php post_class(row); ?>>
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
				<h4><?php the_title(); ?></h4>
				<?php the_excerpt(); ?>
			</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #distributed -->

<!-- #no-counterparty-risk --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'no-counterparty-risk',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="no-counterparty-risk" <?php post_class(row); ?>>
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
				<h4><?php the_title(); ?></h4>
				<?php the_excerpt(); ?>
			</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #no-counterparty-risk -->

		</div><!-- .wrapper-->	
	</div><!-- #tertiary -->

	
	</div><!-- #primary -->
	
	<?php get_footer('links'); ?>