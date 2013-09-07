	<header id="masthead" class="site-header static" role="banner">
		<div class="wrapper">
				<h1 class="logo">
					<?php $header_image = get_header_image();
						if ( ! empty( $header_image ) ) { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
						</a>
					<?php } // if ( ! empty( $header_image ) ) ?>
				</h1>
				<nav class="header-navigation" role="navigation">
					<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'ripple' ); ?>"><?php _e( 'Skip to content', 'ripple' ); ?></a></div>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class'=> 'navigation-menu' ) ); ?>
				</nav><!-- #site-navigation -->		
			<div id="dashboard" class="dashboard">
					<div id="transaction-feed" class="transaction-feed">
						<p class="underline">live transaction feed</p>
						<p><i class="icon-tags"></i><strong>13,123</strong> xrp <span class="italic">for</span><strong>2,362,159</strong> BTC</p>

					</div>
					<div id="wallet" class="wallet">
						<button type="button" class="btn-wallet">Wallet</button>
					</div>
			</div>
		</div><!-- .wrapper -->
	</header><!-- #masthead -->