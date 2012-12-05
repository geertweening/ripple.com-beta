<?php 
/*
* Template name: Faq Page Template
*
*/
?>

<?php get_header() ?>
	
	<?php get_template_part('includes/header') ?>
	<?php get_template_part('includes/subnav-empty') ?>
	
	<!-- MAIN -->
	<div id="main">
		<!-- WRAPPER -->
		<div class="wrapper cf">
   		
			<?php the_post() ?>
		
			<!-- Content area -->
			<div class="content-area-left">
				<h3><?php the_title() ?></h3>
				<div class="entry-content">
					<?php the_content() ?>
				</div>
			</div>
		    <!-- ENDS content area -->
		    
		    <?php get_sidebar('faq') ?>
		
		</div>
		<!-- ENDS WRAPPER -->
	</div>
	<!-- ENDS MAIN -->

		
<?php get_footer() ?>