
		<?php
		// Dont display on home page
    if(!is_front_page()): ?>
      <!-- FOOTER -->
        <footer>

          <div class="wrapper">
              <ul class="links">
                  <li>
                      <span class="title">About Us</span>
                      <ul>
                          <li><a href="#">Individuals</a></li>
                          <li><a href="#">Bitcoin</a></li>
                          <li><a href="#">Merchants</a></li>
                          <li><a href="#">Developers</a></li>
                      </ul>
                  </li>
                  <li>
                      <span class="title">Resources</span>
                      <ul>
                          <li><a href="/about-ripple/">What is ripple</a></li>
                          <li><a href="/how-ripple-works/">How it works</a></li>
                          <li><a href="/working-with-ripple/">Ripple advanced</a></li>
                      </ul>
                  </li>
              </ul>
          </div>

          <?php //get_template_part('includes/widgets-columns') ?>

          <hr />

          <div class="copy">&copy; 2012 Ripple</div>

        </footer>
      <!-- ENDS FOOTER -->
    <?php endif ?>

       <?php wp_footer() ?>
    </body>
</html>
