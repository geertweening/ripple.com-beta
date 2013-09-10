<?php
/**
 * Template Name: Topic-Currency
 */

get_header('targets'); ?>
	
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
				<a href="<?php the_permalink() ?>">
					<h4><?php the_title(); ?></h4>
				</a>
				<?php the_content() ?>
		</div>
		<?php ripple_content_nav( 'nav-below' ); ?>
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
				<a href="<?php the_permalink() ?>">
					<h4><?php the_title(); ?></h4>
				</a>
				<?php the_content() ?>
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
				<a href="<?php the_permalink() ?>">
					<h4><?php the_title(); ?></h4>
				</a>
				<?php the_content() ?>
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
				<a href="<?php the_permalink() ?>">
					<h4><?php the_title(); ?></h4>
				</a>
				<?php the_content() ?>
			</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #no-counterparty-risk -->

		<!-- #no-fees-currency --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'no-fees-currency',
		'posts_per_page' => 1,
		));
	  
	while ( $the_query->have_posts() ) :
 $the_query->the_post();
?>
 <section id="no-fees-currency" <?php post_class(row); ?>>
		<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
		</div>
		<div class="post-content col-sm-9">
			<a href="<?php the_permalink() ?>">
				<h4><?php the_title(); ?></h4>
			</a>
			<?php the_content(); ?>
		</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #no-fees-currency -->

		<!-- #xrp-security-system --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'xrp-security-system',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="xrp-security-system" <?php post_class(row); ?>>
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
				<a href="<?php the_permalink() ?>">
					<h4><?php the_title(); ?></h4>
				</a>
				<?php the_content() ?>
			</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #xrp-security-system -->
		<!-- #xrp-fixes-a-law-in-internet --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'xrp-fixes-a-law-in-internet',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="xrp-fixes-a-law-in-internet" <?php post_class(row); ?>>
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
				<a href="<?php the_permalink() ?>">
					<h4><?php the_title(); ?></h4>
				</a>
				<?php the_content() ?>
			</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #xrp-fixes-a-law-in-internet -->
		<!-- #xrp-reserves --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'xrp-reserves',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="xrp-reserves" <?php post_class(row); ?>>
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
				<a href="<?php the_permalink() ?>">
					<h4><?php the_title(); ?></h4>
				</a>
				<?php the_content() ?>
			</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #xrp-reserves -->
		<!-- #the-two-types-of-xrp-reserves --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'the-two-types-of-xrp-reserves',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="the-two-types-of-xrp-reserves" <?php post_class(row); ?>>
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
				<a href="<?php the_permalink() ?>">
					<h4><?php the_title(); ?></h4>
				</a>
				<?php the_content() ?>
			</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #the-two-types-of-xrp-reserves -->
		<!-- #the-account-reserve --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'the-account-reserve',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="the-account-reserve" <?php post_class(row); ?>>
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
				<a href="<?php the_permalink() ?>">
					<h4><?php the_title(); ?></h4>
				</a>
				<?php the_content() ?>
			</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #the-account-reserve -->
		<!-- #the-account-reserve --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'the-account-reserve',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="the-account-reserve" <?php post_class(row); ?>>
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
				<a href="<?php the_permalink() ?>">
					<h4><?php the_title(); ?></h4>
				</a>
				<?php the_content() ?>
			</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #the-account-reserve -->
		<!-- #pathway-independent --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'pathway-independent',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="pathway-independent" <?php post_class(row); ?>>
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
				<a href="<?php the_permalink() ?>">
					<h4><?php the_title(); ?></h4>
				</a>
				<?php the_content() ?>
			</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #pathway-independent -->
		<!-- #pathway-gateway-video --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'pathway-gateway-video',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="pathway-gateway-video" <?php post_class(row); ?>>
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
				<a href="<?php the_permalink() ?>">
					<h4><?php the_title(); ?></h4>
				</a>
				<?php the_content() ?>
			</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #pathway-gateway-video -->
		<!-- #valuable --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'valuable',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="valuable" <?php post_class(row); ?>>
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
				<a href="<?php the_permalink() ?>">
					<h4><?php the_title(); ?></h4>
				</a>
				<?php the_content() ?>
			</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #valuable -->

		<!-- #no-inflation --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'no-inflation',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="no-inflation" <?php post_class(row); ?>>
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
				<a href="<?php the_permalink() ?>">
					<h4><?php the_title(); ?></h4>
				</a>
				<?php the_content() ?>
			</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #no-inflation -->

		<!-- #distribution --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'distribution',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="distribution" <?php post_class(row); ?>>
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
				<a href="<?php the_permalink() ?>">
					<h4><?php the_title(); ?></h4>
				</a>
				<?php the_content() ?>
			</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #distribution -->

		</div><!-- .wrapper-->	
	</div><!-- #tertiary -->

	
	</div><!-- #primary -->
	
	<?php get_footer('links'); ?>