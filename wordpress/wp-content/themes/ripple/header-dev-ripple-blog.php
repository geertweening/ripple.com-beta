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
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:600italic,400,700,300' rel='stylesheet' type='text/css'>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">

	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	

	<!-- Flatdoc -->

	 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	// <script src='https://rstacruz.github.io/flatdoc/v/0.8.0/legacy.js'></script>
	// <script src='https://rstacruz.github.io/flatdoc/v/0.8.0/flatdoc.js'></script> -->

	<!-- Flatdoc theme -->
	 <link  href='https://ripple.com/wp-content/themes/ripple/assets/css/ricostacruz-style.css' rel='stylesheet'>

	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	
	 <!-- Bootstrap -->
	<link href="https://dev.ripple.com/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://dev.ripple.com/js/bootstrap.min.js"></script>
	
	<!-- Custom Styles -->
	<style>
	
		.navbar-nav {
			margin: 9.5px -5px !important;
		}
		
		img.small_logo {
			max-width: 100%;
		}		
		
		.navbar-inverse {
			background-color: #346AA9 !important;
			border-color: #346AA9 !important;
			height: 51px;
		}

		.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
			border-color: #346AA9 !important;
			background: #346AA9 !important;
			margin: -30px;
		}
		
		button.navbar-toggle {
			top: 0 !important;
		}

		.navbar-collapse {
			-webkit-box-shadow: none !important;
			box-shadow: none !important;
		}

		.navbar-inverse .navbar-brand, .navbar-inverse .navbar-nav>li>a {
			color: #fff !important;
		}

		.navbar-brand {
			padding: 8px 10px 10px 10px !important;
		}

		.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:hover, .navbar-inverse .navbar-nav>.active>a:focus, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus {
			background-color: #4a7ab3 !important;
			border-radius: 0;
			
		}

		.navbar-inverse .navbar-toggle {
			border-color: #346AA9 !important;
		}

		.navbar-inverse .navbar-toggle:hover, .navbar-inverse .navbar-toggle:focus {
			background-color: #4a7ab3 !important;
		}

		.right {
			float: right !important;
			margin-top: 15px !important;
			margin-right: 30px;
		}

		@media (max-width: 768px) {

			.right {
				float: left !important;
				margin-top: 0px !important;
			}

		}
		
		@media (min-width: 768px) {

			.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form  {
				height: 50px !important;
				
			}
			
			.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:hover, .navbar-inverse .navbar-nav>.active>a:focus, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus {
				padding: 15px;
				margin-top: -10px;
			}

		}
 
	</style>
	


	<?php wp_head(); ?>
</head>
<body role='flatdoc' <?php page_bodyclass(); ?>>
	
	<div id="page" class="hfeed site dev-ripple dev-ripple-blog">
		<?php do_action( 'before' ); ?>
	<!-- 
	<div class='header'>

			<div class='left' role="navigation">
				<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'ripple' ); ?>"><?php _e( 'Skip to content', 'ripple' ); ?></a></div>
				<h1><img class="small_logo" src="https://dev.ripple.com/assets/img/ripple_logo_small.png"></h1>
				<?php wp_nav_menu( array( 'theme_location' => 'dev-ripple-menu', 'container' => false, 'menu_class'=> 'navigation-menu' ) ); ?>
			</div>
		<div class="right">
			  <!~~ GitHub buttons: ghbtn.html ~~>
			  <iframe src="https://dev.ripple.com/vendor/ghbtn.html?user=ripple&amp;repo=ripple-dev-portal&amp;type=watch&amp;count=true" allowtransparency="true" frameborder="0" scrolling="0" width="110" height="20"></iframe>
		</div>
			
		</div>
 -->
		<!-- Header -->
			<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="https://dev.ripple.com/"><img class="small_logo" src="https://dev.ripple.com/assets/img/ripple_logo_small.png"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
			<li><a href="https://dev.ripple.com">Resources</a></li>
            <li><a href="https://www.bountysource.com/teams/ripple/bounties">Bounties</a></li>
            <li><a href="https://ripplelabs.atlassian.net/">Bug Tracking</a></li>
            <li class="active"><a href="https://ripple.com/dev/blog/">Dev Blog</a></li>
            <li><a href="https://ripple.com/forum/viewforum.php?f=2&sid=c016bc6b934120b7117c0e136e74de98">Forums</a></li>
          </ul>
          	<div class='right'>
		 	 <!-- GitHub buttons -->
		 		 <iframe src="https://dev.ripple.com/vendor/ghbtn.html?user=ripple&repo=ripple-dev-portal&type=watch&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="110" height="20"></iframe>
			</div>
        </div><!--/.nav-collapse -->
      </div>
    </div>

		<div id="main" class="site-main">
