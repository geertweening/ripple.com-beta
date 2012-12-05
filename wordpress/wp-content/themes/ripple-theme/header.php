<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php wp_title( '|', true, 'right'); ?><?php bloginfo('name'); ?> </title>
		<meta name="viewport" content="width=device-width">
		
		<!-- CSS -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/responsive.css">
        <!-- ENDS CSS -->
        <script src="js/modernizr-2.6.1.min.js"></script>
        
        <?php /* Always have wp_head() just before the closing </head> */ wp_head() ?>
        
    </head>
    <body <?php body_class() ?>>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        
        
    <!-- HEADER -->
	<header>
	  <div class="wrapper cf">
	      <div id="logo" class="cf">
			<a href="<?php echo home_url(); ?>" ><img src="<?php echo ANSIMUZ_THEME_DIR ?>/img/logo<?php if(is_front_page()) echo '-home'; ?>.png" alt="Ripple" /></a>
		</div>
		
		
		<?php 
		// Dont display on home page
		if(!is_front_page()): ?>
		<?php get_template_part('includes/nav') ?>
		<?php endif ?>
	       
	  </div>
	</header>
	<!-- ENDS HEADER -->
	
	
	<?php 
		// Dont display on home page
		if(is_front_page()): ?>
	<!-- banner -->
	<div class="banner-holder cf">
		<div class="bg-holder">
	  	<div class="wrapper cf">
	  		<div class="tagline"><?php echo stripcslashes( get_option('ansimuz_tagline') ) ?> </div>
	  		<a href="" class="call-to-action" ><img src="<?php echo ANSIMUZ_THEME_DIR ?>/img/call-to-action.png" alt="Start Ripple" /></a>
	  	</div>
		</div>
	</div>
	<!-- ENDS banner -->
	
	
	<!-- main buttons -->
	<div class="wrapper cf">
	  <ul class="main-buttons cf">
	  	<li class="bitcoin"><a href=""></a></li>
	  	<li class="merchants"><a href=""></a></li>
	  	<li class="developers"><a href=""></a></li>
	  </ul>
	</div>
	<!-- ENDS main buttons -->
	<?php endif ?>
