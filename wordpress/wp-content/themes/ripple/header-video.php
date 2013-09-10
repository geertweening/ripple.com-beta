<?php
/**
 * The Header the Video Template
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @packageRipple
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class('video-splash'); ?>>
	
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper">
			<div id="home-page-logo" class="centered"><img alt="Ripple Logo" src="<?php bloginfo('template_url'); ?>/assets/img/logo.png"></div>
			<div id="wallet" class="wallet pull-right">
				<a href="https://ripple.com/client/">
					<button type="button" class="btn-wallet">Wallet</button>
				</a>
			</div>
		</div><!-- .wrapper -->
	</header><!-- #masthead -->

	<div id="main" class="site-main">