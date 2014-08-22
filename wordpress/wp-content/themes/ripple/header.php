<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @packageRipple
 */
?><!DOCTYPE html>
<html  xmlns:fb="http://ogp.me/ns/fb#" <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title><?php if ( is_page('market-makers') ) {
       echo 'Ripple for Market Makers - Open, Distributed Currency Exchange | Ripple';
    } else if ( is_page('financial-institutions') ){
       echo 'Ripple for Financial Institutions - Global Funds Settlement Protocol | Ripple';
     } else {
        wp_title( '|', true, 'right' );
    }
    ?></title>
<meta name="description" content="<?php if ( is_page('market-makers') ) {
       echo 'Ripple is the world’s first distributed foreign currency exchange, enabling market makers to exchange any type of asset instantly and for free.';
    } else if ( is_page ('financial-institutions') ) {
       echo 'Ripple is technology infrastructure that powers settlement for instant, low-cost payment networks.';
     } else {
        bloginfo('name'); echo " - "; bloginfo('description');
    }
    ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>
<!-- Header.php -->
<body <?php body_class(); ?>>  
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=477386009022238";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
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

<!--
				<div id="dashboard" class="dashboard">

					<a href="https://ripplecharts.com">
						<div id="transaction-feed" class="transaction-feed boxed">
							<p class="underline">live transaction feed</p>
							<p>
								<div id="transactionFeed" class="light small mediumgray transactionFeed text-center">
							</div>
						</p>
						</div>
					</a>

					<div id="wallet" class="wallet">
						<a href="https://ripple.com/client/" class="btn-wallet">
							Wallet
						</a>
					</div>
				</div>
-->
		</div><!-- .wrapper -->
	</header><!-- #masthead -->
	<div id="main" class="site-main">
