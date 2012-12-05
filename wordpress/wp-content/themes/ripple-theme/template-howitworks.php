<?php 
/*
* Template name: How works Page Template
*
*/
?>

<?php get_header() ?>
	
	<!-- MAIN -->
	<div id="main">
		<!-- WRAPPER -->
		<div class="wrapper cf">
   		
			<?php the_post() ?>
		
			<!-- Content area -->
			<div class="content-area">
				<h3><?php the_title() ?></h3>
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