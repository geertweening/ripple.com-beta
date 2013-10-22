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

        <div class="copy">&copy; <?php echo date('Y',current_time('timestamp',0)); ?> <a href="http://www.ripplelabs.com/">Ripple Labs</a></div>
      </footer>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
      <script src="<?php echo get_template_directory_uri() ?>/js/jQuery.ScrollTo.js"></script>
      <script src="<?php echo get_template_directory_uri() ?>/js/vendor/jquery.ui.widget.js"></script>
      <script src="<?php echo get_template_directory_uri() ?>/js/jquery.rs.carousel.js"></script>
      <script src="<?php echo get_template_directory_uri() ?>/js/custom.js"></script>

	<script>
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-35589474-1']);
		_gaq.push(['_trackPageview']);

		(function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>

<!-- ENDS FOOTER -->
      <?php wp_footer() ?>
    </body>
</html>
