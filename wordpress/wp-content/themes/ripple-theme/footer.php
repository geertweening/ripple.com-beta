<!-- FOOTER -->
      <footer>
        <div class="wrapper">
          <?php get_template_part('includes/widgets-columns') ?>
        </div>

        <hr />

        <!-- BOTTOM -->
        <div class="bottom two-target">
          <div class="wrapper"><?php echo stripcslashes(get_option('ansimuz_footer')) ?></div>
        </div>
        <!-- ENDS BOTTOM -->

        <div class="copy">&copy; 2012 Ripple</div>
      </footer>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
      <script src="<?php echo get_template_directory_uri() ?>/js/jQuery.ScrollTo.js"></script>
      <script src="<?php echo get_template_directory_uri() ?>/js/vendor/jquery.ui.widget.js"></script>
      <script src="<?php echo get_template_directory_uri() ?>/js/jquery.rs.carousel.js"></script>
      <script src="<?php echo get_template_directory_uri() ?>/js/custom.js"></script>

<!-- ENDS FOOTER -->
      <?php wp_footer() ?>
    </body>
</html>
