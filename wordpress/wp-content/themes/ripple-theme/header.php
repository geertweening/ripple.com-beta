<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php wp_title( '|', true, 'right'); ?><?php bloginfo('name'); ?> </title>
		<meta name="viewport" content="width=device-width">
		
		<!-- CSS -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/landing.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/responsive.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/ripple-jun2013.css">
    <!-- ENDS CSS -->
        <script src="/js/modernizr-2.6.1.min.js"></script>
        
        <?php /* Always have wp_head() just before the closing </head> */ wp_head() ?>
        
    </head>
    <body <?php body_class() ?>>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        
        
    <!-- HEADER -->
	<header>
	     <div id="logo" class="cf">
			<a href="<?php echo home_url(); ?>" ><img src="<?php echo ANSIMUZ_THEME_DIR ?>/img/logo<?php if(is_front_page()) echo '-home'; ?>.png" alt="Ripple" width="180px" /></a>
		</div>
			<?php wp_nav_menu( array('menu' => 'top-menu' )); ?>
			<a id="nav-wallet" href="/wallet">open wallet</a>
	</header>