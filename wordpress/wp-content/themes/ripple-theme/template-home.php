<?php
/*
* Template name: Home
*
*/
?>

<?php get_header() ?>

	<!-- MAIN -->
	<div id="main">
		<!-- WRAPPER -->
		<div class="wrapper cf">

			<?php the_post() ?>

			<?php get_template_part('includes/slides') ?>

		</div>
		<!-- ENDS WRAPPER -->
	</div>
	<!-- ENDS MAIN -->


<?php get_footer() ?>