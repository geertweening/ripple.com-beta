<?php
/**
 * Template Name: Topic-Payment-Network OLD
 */

get_header('targets'); ?>
	
	<div id="primary" class="content-area">
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

<!-- #fast-payment-network --> 	
  <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'fast-payment-network',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
			$the_query->the_post();
	?>
 <section id="fast-payment-network" <?php post_class(); ?>>
 	<div class="wrapper">
		<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
		</div>
		<div class="post-content col-sm-9">
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
		?><!-- #fast-payment-network -->

<!-- #global-payment-network --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'global-payment-network',
		'posts_per_page' => 1,
		));
	  
	while ( $the_query->have_posts() ) :
 $the_query->the_post();
?>
 <section id="global-payment-network" <?php post_class(); ?>>
 	<div class="wrapper">
		<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
		</div>
		<div class="post-content col-sm-9">
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
		?><!-- #global-payment-network -->

<!-- #peer-to-peer --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'peer-to-peer',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="peer-to-peer" <?php post_class(); ?>>
 			<div class="wrapper">
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
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
		?><!-- #peer-to-peer -->

<!-- #cross-currency-payments-payment-network --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'cross-currency-payments-payment-network',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="cross-currency-payments-payment-network" <?php post_class(); ?>>
 			<div class="wrapper">
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
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
		?><!-- #cross-currency-payments-payment-network -->

		<!-- #secure-payment-network --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'secure-payment-network',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="secure-payment-network" <?php post_class(); ?>>
 			<div class="wrapper">
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
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
		?><!-- #secure-payment-network -->
		<!-- #accessible-to-everyone --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'accessible-to-everyone',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="accessible-to-everyone" <?php post_class(); ?>>
 			<div class="wrapper">
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
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
		?><!-- #accessible-to-everyone -->
		<!-- #tiny-fees --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'tiny-fees',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="tiny-fees" <?php post_class(); ?>>
 			<div class="wrapper">
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
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
		?><!-- #tiny-fees -->
		<!-- #what-makes-ripple-so-much-cheaper-than-traditional-payment-systems --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'what-makes-ripple-so-much-cheaper-than-traditional-payment-systems',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="what-makes-ripple-so-much-cheaper-than-traditional-payment-systems" <?php post_class(); ?>>
 			<div class="wrapper">
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
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
		?><!-- #what-makes-ripple-so-much-cheaper-than-traditional-payment-systems -->
		<!-- #no-merchant-fees-payment-network  --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'no-merchant-fees-payment-network',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="no-merchant-fees-payment-network" <?php post_class(); ?>>
 			<div class="wrapper">
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
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
		?><!-- #no-merchant-fees-payment-network  -->
		<!-- #micropayments --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'micropayments',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="micropayments" <?php post_class(); ?>>
 			<div class="wrapper">
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
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
		?><!-- #micropayments -->
		<!-- Todo 
		Edit categories to be all lowercase -->
		<!-- #irreversible --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'Irreversible',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="irreversible" <?php post_class(); ?>>
 			<div class="wrapper">
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
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
		?><!-- #irreversible -->
		<!-- #gateways-payment-network --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'gateways-payment-network',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="gateways-payment-network" <?php post_class(); ?>>
 			<div class="wrapper">
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
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
		?><!-- #gateways-payment-network -->
		<!-- #why-are-gateways-so-important --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'why-are-gateways-so-important',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="why-are-gateways-so-important" <?php post_class(); ?>>
 			<div class="wrapper">
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
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
		?><!-- #why-are-gateways-so-important -->

		<!-- #gateway-guides-and-resources --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'gateway-guides-and-resources',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="gateway-guides-and-resources" <?php post_class(); ?>>
 			<div class="wrapper">
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
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
		?><!-- #gateway-guides-and-resources -->

		<!-- #pathways-payment-network --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'pathways-payment-network',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="pathways-payment-network" <?php post_class(); ?>>
 			<div class="wrapper">
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
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
		?><!-- #pathways-payment-network -->

		<!-- #a-federated-network --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'a-federated-network',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="a-federated-network" <?php post_class(); ?>>
 			<div class="wrapper">
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
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
		?><!-- #a-federated-network -->

		<!-- #bridge-payments --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'bridge-payments',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="bridge-payments" <?php post_class(); ?>>
 			<div class="wrapper">
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
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
		?><!-- #bridge-payments -->

		<!-- #how-to-guides --> 	
      <?php
	  $the_query = new WP_Query(array(
		'category_name' => 'how-to-guides',
		'posts_per_page' => 1,
		));
	  
		while ( $the_query->have_posts() ) :
		 $the_query->the_post();
		?>
 		<section id="how-to-guides" <?php post_class(); ?>>
 			<div class="wrapper">
			<div class="post-thumbnail col-sm-3">
				 <?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
			</div>
			<div class="post-content col-sm-9">
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
		?><!-- #how-to-guides -->
	

		</div><!-- .wrapper-->	
	</div><!-- #primary -->
	
	<?php get_footer('links'); ?>