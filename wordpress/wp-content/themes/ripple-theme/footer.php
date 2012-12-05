   	
		<?php 
		// Dont display on home page
		if(!is_front_page()): ?>
	       <!-- FOOTER -->
	       <footer>
		       
		       <div class="wrapper">
		       		<?php get_template_part('includes/widgets-columns') ?>
		       </div>
				
				<!-- BOTTOM -->
				<div class="bottom two-target">
					<div class="wrapper"><?php echo stripcslashes(get_option('ansimuz_footer')) ?></div> 
				</div>
				<!-- ENDS BOTTOM -->
			
	       </footer>
	       <!-- ENDS FOOTER -->
	   <?php endif ?>

       <?php wp_footer() ?>
    </body>
</html>
