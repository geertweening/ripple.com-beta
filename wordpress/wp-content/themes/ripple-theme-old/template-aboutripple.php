<?php 
/*
* Template name: How works Page Template
*
*/
?>

<?php get_header() ?>
<?php get_template_part('includes/header') ?>
	<?php get_template_part('includes/subnav-aboutripple') ?>
	<!-- MAIN -->
	<div id="main">
		<!-- WRAPPER -->
		<div class="wrapper cf">
   		
			<?php the_post() ?>
			
			<!-- Content area -->
			<div class="content-area">
				<div class="entry-content">
					<?php the_content() ?>
				</div>
			</div>
		    <!-- ENDS content area -->
		    
		
		</div>
		<!-- ENDS WRAPPER -->
	</div>
	<!-- ENDS MAIN -->

		
<?php get_footer() ?>