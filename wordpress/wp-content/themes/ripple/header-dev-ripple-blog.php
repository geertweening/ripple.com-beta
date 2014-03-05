<?php
/**
 * The Header for dev.ripple.com.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @packageRipple
 */
?>
<!doctype html>
<!--

  Instructions:

  - Save this file.
  - Replace "ripple" with your GitHub ripplename.
  - Replace "ripple-client" with your GitHub ripple-client name.
  - Replace "Ripple Web Client" with Ripple Web Client name.
  - Upload this file (or commit to GitHub Pages).

  Customize as you see fit!

-->
<html  xmlns:fb="http://ogp.me/ns/fb#"  <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">

	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	

	<!-- Flatdoc -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src='http://rstacruz.github.io/flatdoc/v/0.8.0/legacy.js'></script>
	<script src='http://rstacruz.github.io/flatdoc/v/0.8.0/flatdoc.js'></script>

	<!-- Flatdoc theme -->
	<link  href='http://rstacruz.github.io/flatdoc/v/0.8.0/theme-white/style.css' rel='stylesheet'>
	<script src='http://rstacruz.github.io/flatdoc/v/0.8.0/theme-white/script.js'></script>


	<!-- Custom Stylesheet -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,700,300' rel='stylesheet' type='text/css'>
	

	<!-- Initializer -->
	<script>
	Flatdoc.run({
		fetcher: Flatdoc.github('ripple/ripple-client')
	});
	</script>
	<?php wp_head(); ?>
</head>
<body role='flatdoc' <?php page_bodyclass(); ?>>
	
	<div id="page" class="hfeed site dev-ripple dev-ripple-blog">
		<?php do_action( 'before' ); ?>
		<div class='header'>

			<div class='left' role="navigation">
				<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'ripple' ); ?>"><?php _e( 'Skip to content', 'ripple' ); ?></a></div>
				<h1>{<i class="icon-ripple-logo"></i>}</h1>
				<?php wp_nav_menu( array( 'theme_location' => 'dev-ripple-menu', 'container' => false, 'menu_class'=> 'navigation-menu' ) ); ?>
			</div>

			
		</div><!-- Header -->
		<div id="main" class="site-main">
