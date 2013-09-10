<?php
/**
 * Template Name: Topic-Distributed-FX
 */

get_header('targets'); ?>
	
	<div id="primary" class="content-area topic-page">
		
		<div class="wrapper">
			<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php ripple_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>
		</div><!-- .wrapper -->

<!-- #direct-fx --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'direct-fx',
		'posts_per_page' => 1,
		));
	  
	while ( $the_query->have_posts() ) :
 $the_query->the_post();
?>
<section id="direct-fx" <?php post_class('shaded'); ?>>
	<div class="wrapper">
		<div class="post-thumbnail col-sm-5">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
		</div>
		<div class="post-content col-sm-7">
			<a href="<?php the_permalink() ?>">
				<h4><?php the_title(); ?></h4>
			</a>
			<?php the_content(); ?>
		</div>
	</div>		
</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #direct-fx -->

<!-- #no-fees-distributed-fx --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'no-fees-distributed-fx',
		'posts_per_page' => 1,
		));
	  
	while ( $the_query->have_posts() ) :
 $the_query->the_post();
?>
<section id="no-fees-distributed-fx" <?php post_class(); ?>>
	<div class="wrapper">
		<div class="post-thumbnail col-sm-5 pull-right">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
		</div>
		<div class="post-content col-sm-7">
			<a href="<?php the_permalink() ?>">
				<h4><?php the_title(); ?></h4>
			</a>
			<?php the_content(); ?>
		</div>
	</div>		
</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #no-fees-distributed-fx -->

<!-- #all-currencies --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'all-currencies',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
<section id="all-currencies" <?php post_class('shaded'); ?>>
	<div class="wrapper">
			<div class="post-thumbnail col-sm-5">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-7">
			<a href="<?php the_permalink() ?>">
				<h4><?php the_title(); ?></h4>
			</a>
			<?php the_content(); ?>
			</div>
	</div>		
</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #all-currencies -->

<!-- #instant-processing --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'instant-processing',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
<section id="instant-processing" <?php post_class(); ?>>
	<div class="wrapper">
			<div class="post-thumbnail col-sm-5 pull-right">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-7">
			<a href="<?php the_permalink() ?>">
				<h4><?php the_title(); ?></h4>
			</a>
			<?php the_content(); ?>
			</div>
	</div>		
</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #instant-processing -->

		<!-- #currency-choice --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'currency-choice',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
<section id="currency-choice" <?php post_class('shaded'); ?>>
	<div class="wrapper">
			<div class="post-thumbnail col-sm-5">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-7">
			<a href="<?php the_permalink() ?>">
				<h4><?php the_title(); ?></h4>
			</a>
			<?php the_content(); ?>
			</div>
	</div>		
</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #currency-choice -->
		<!-- #cross-currency-payments --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'cross-currency-payments',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
<section id="cross-currency-payments" <?php post_class(); ?>>
	<div class="wrapper">
			<div class="post-thumbnail col-sm-5 pull-right">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-7">
			<a href="<?php the_permalink() ?>">
				<h4><?php the_title(); ?></h4>
			</a>
			<?php the_content(); ?>
			</div>
	</div>		
</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #cross-currency-payments -->
		<!-- #global-marketplace --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'global-marketplace',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
<section id="global-marketplace" <?php post_class('shaded'); ?>>
	<div class="wrapper">
			<div class="post-thumbnail col-sm-5">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-7">
			<a href="<?php the_permalink() ?>">
				<h4><?php the_title(); ?></h4>
			</a>
			<?php the_content(); ?>
			</div>
	</div>		
</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #global-marketplace -->
		<!-- #secure-distributed-fx --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'secure-distributed-fx',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
<section id="secure-distributed-fx" <?php post_class(); ?>>
	<div class="wrapper">
			<div class="post-thumbnail col-sm-5">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-7">
			<a href="<?php the_permalink() ?>">
				<h4><?php the_title(); ?></h4>
			</a>
			<?php the_content(); ?>
			</div>
	</div>		
</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #secure-distributed-fx -->
		<!-- #everyone-is-a-market-maker --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'everyone-is-a-market-maker',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
<section id="everyone-is-a-market-maker" <?php post_class(); ?>>
	<div class="wrapper">
			<div class="post-thumbnail col-sm-5">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-7">
			<a href="<?php the_permalink() ?>">
				<h4><?php the_title(); ?></h4>
			</a>
			<?php the_content(); ?>
			</div>
	</div>		
</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #everyone-is-a-market-maker -->
		<!-- #accelerated-global-economy --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'accelerated-global-economy',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
<section id="accelerated-global-economy" <?php post_class(); ?>>
	<div class="wrapper">
			<div class="post-thumbnail col-sm-5">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-7">
			<a href="<?php the_permalink() ?>">
				<h4><?php the_title(); ?></h4>
			</a>
			<?php the_content(); ?>
			</div>
	</div>		
</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #accelerated-global-economy -->
		<!-- #capture-the-spread --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'capture-the-spread',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
<section id="capture-the-spread" <?php post_class(); ?>>
	<div class="wrapper">
			<div class="post-thumbnail col-sm-5">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-7">
			<a href="<?php the_permalink() ?>">
				<h4><?php the_title(); ?></h4>
			</a>
			<?php the_content(); ?>
			</div>
	</div>		
</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #capture-the-spread -->
		<!-- #how-to-guide-and-resources --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'how-to-guide-and-resources',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
<section id="how-to-guide-and-resources" <?php post_class(); ?>>
	<div class="wrapper">
			<div class="post-thumbnail col-sm-5">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-7">
			<a href="<?php the_permalink() ?>">
				<h4><?php the_title(); ?></h4>
			</a>
			<?php the_content(); ?>
			</div>
	</div>		
</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #how-to-guide-and-resources -->

		</div><!-- .wrapper-->		
	</div><!-- #primary -->
	
	<?php get_footer('links'); ?>