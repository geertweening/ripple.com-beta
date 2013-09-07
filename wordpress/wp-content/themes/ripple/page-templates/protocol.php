<?php
/**
 * Template Name: Topic-Protocol
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
<!-- #math-based-protocol --> 	
      <?php
		  $the_query = new WP_Query(array(
			'category_name' => 'math-based-protocol',
			'posts_per_page' => 1,
			));
		  
			while ( $the_query->have_posts() ) :
			 $the_query->the_post();
		?>
 	<section id="math-based-protocol" <?php post_class('shaded'); ?>>
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
	?><!-- #math-based-protocol -->

<!-- #distributed-protocol --> 	
    <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'distributed-protocol',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
 		$the_query->the_post();
	?>

 	<section id="distributed-protocol" <?php post_class(); ?>>
		<div class="wrapper">
			<div class="post-content col-sm-7">
				<a href="<?php the_permalink() ?>">
					<h4><?php the_title(); ?></h4>
				</a>
					<?php the_content(); ?>
			</div>
			<div class="post-thumbnail col-sm-5">
					 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
		</div>
	</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #distributed-protocol -->

<!-- #the-ledger --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'the-ledger',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="the-ledger" <?php post_class('shaded'); ?>>
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
		?> <!-- #the-ledger -->

<!-- #consensus --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'consensus',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="consensus" <?php post_class(); ?>>
 			<div class="wrapper">
				<div class="post-content col-sm-7 centered text-center">
				<a href="<?php the_permalink() ?>">
					<h4 class="text-center"><?php the_title(); ?></h4>
				</a>
					<?php the_content(); ?>
					<a href="#">
	                <div class="play-button-circle">
	                    <i class="icon-play"></i>
	                </div>
	            </a>
				</div>
			</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #consensus -->

		<!-- #secure-protocol --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'secure-protocol',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>

 		<section id="secure-protocol" <?php post_class(shaded); ?>>
 			<div class="wrapper">
				<div class="post-content col-sm-7 centered text-center">
				<a href="<?php the_permalink() ?>">
					<h4 class="text-center"><?php the_title(); ?></h4>
				</a>
					<?php the_content(); ?>
				</div>
			</div>
		
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #secure-protocol -->
		<!-- #advanced-security-measures --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'advanced-security-measures',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
	 		<div id="advanced-security-measures" <?php post_class(); ?>>
	 			<div class="wrapper">
					<div class="post-content col-sm-7 thumbnail centered text-left">
					<a href="<?php the_permalink() ?>">
						<h4><?php the_title(); ?></h4>
					</a>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #advanced-security-measures -->
		<!-- #powerful-apis --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'powerful-apis',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="powerful-apis" <?php post_class(); ?>>
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
		<!-- 	</section> -->
				<?php
			 endwhile;
			 wp_reset_postdata();
			?><!-- #powerful-apis -->
			<!-- #open-apis --> 	
		      <?php
			  $the_query = new WP_Query(array(
				'category_name' => 'open-apis',
				'posts_per_page' => 1,
				));
			  
				while ( $the_query->have_posts() ) :
				 $the_query->the_post();
				?>
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
		?><!-- #open-apis -->
		<!-- #easy-integration --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'easy-integration',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="easy-integration" <?php post_class('shaded'); ?>>
 			<div class="wrapper">
				<div class="post-content col-sm-7">
				<a href="<?php the_permalink() ?>">
					<h4><?php the_title(); ?></h4>
				</a>
					<?php the_content(); ?>
				</div>
				<div class="post-thumbnail col-sm-5">
					 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
				</div>
			</div>
		</section>
			<?php
		 endwhile;
		 wp_reset_postdata();
		?><!-- #easy-integration -->
		<!-- #open-source-coming-soon --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'open-source-coming-soon',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="open-source-coming-soon" <?php post_class(); ?>>
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

				<?php
			 endwhile;
			 wp_reset_postdata();
			?><!-- #open-source-coming-soon -->
			<!-- #open-client --> 	
	      <?php
		  $the_query = new WP_Query(array(
			'category_name' => 'open-client',
			'posts_per_page' => 1,
			));
		  
			while ( $the_query->have_posts() ) :
			 $the_query->the_post();
			?>
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
		?><!-- #open-client -->
		<!-- #smart-contracts-coming-soon --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'smart-contracts-coming-soon',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="smart-contracts-coming-soon" <?php post_class('shaded'); ?>>
 			<div class="wrapper">
				<div class="post-content col-sm-12 centered">
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
		?><!-- #smart-contracts-coming-soon -->

		<!-- #federation-api --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'federation-api',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="federation-api" <?php post_class(); ?>>
 			<div class="wrapper">
				<div class="post-content col-sm-12 centered">
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
		?><!-- #federation-api -->

		<!-- #bridge-protocol --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'bridge-protocol',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="bridge-protocol" <?php post_class('shaded'); ?>>
 			<div class="wrapper">
				<!-- <div class="post-thumbnail col-sm-5">
					 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
				</div> -->
				<div class="post-content col-sm-12 centered">
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
		?><!-- #bridge-protocol -->

		<!-- #dynamic-scalability --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'dynamic-scalability',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="dynamic-scalability" <?php post_class(); ?>>
 			<div class="wrapper">
				<!-- <div class="post-thumbnail col-sm-5">
					 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
				</div> -->
				<div class="post-content col-sm-12 centered">
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
		?><!-- #dynamic-scalability -->
	
	</div><!-- #primary -->
	
	<?php get_footer('links'); ?>