<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @packageRipple
 */
?><!DOCTYPE html>
<html   <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>
<!-- header-targets.php -->
<body <?php page_bodyclass(); ?>>

<div id="page" class="hfeed site blog">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper">
				<div class="logo">
					<?php $header_image = get_header_image();
						if ( ! empty( $header_image ) ) { ?>
						<a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<img src="https://ripple.com/wp-content/uploads/2014/07/Ripple-Blog_logo.png" width="238" height="67" alt="Ripple Blog">
					<!--		<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt=""> -->
						</a>
<!-- 
						<h1 class="page-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>blog">blog</a></h1>
 -->
					<?php } // if ( ! empty( $header_image ) ) ?>
				</div>
				<nav class="header-navigation" role="navigation">
					<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'ripple' ); ?>"><?php _e( 'Skip to content', 'ripple' ); ?></a></div>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class'=> 'navigation-menu' ) ); ?>
				</nav><!-- #site-navigation -->	

			<div id="dashboard" class="dashboard">

				<a href="https://ripple.com/graph/">
					<div id="transaction-feed" class="transaction-feed">
						<p class="underline">live transaction feed</p>
							<div id="transactionFeed" class="light small mediumgray transactionFeed text-center">
						</div>
					</div>
				</a>
					<!-- 
<div id="wallet" class="wallet">
						<a href="https://ripple.com/client/">
							<button type="button" class="btn-wallet">Wallet</button>
						</a>
					</div>
 -->
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="main" class="site-main">
