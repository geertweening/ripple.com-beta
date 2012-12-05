<?php

#--------------------------------------------------------------------
#
#	NEW OPTIONS PANEL FRAME WORK
#
#--------------------------------------------------------------------


// Theme suport

add_theme_support('post-thumbnails');

//automatic feed links
add_theme_support('automatic-feed-links');
	
// Theme version

$curr_theme = wp_get_theme();
$theme_version = trim($curr_theme->Version);
if(!$theme_version) $theme_version = "1.0";

//Define constants:

define('ANSIMUZ_FUNCTIONS', get_template_directory() . '/functions/');
define('ANSIMUZ_POST_TYPES', get_template_directory() . '/functions/custom-post-types/');
define('ANSIMUZ_INCLUDES', get_template_directory() . '/includes/');
define('ANSIMUZ_THEME', 'Ripple');
define('ANSIMUZ_THEME_DIR', get_template_directory_uri());
define('ANSIMUZ_THEME_LOGO', ANSIMUZ_THEME_DIR.'/img/logo.png');
define('ANSIMUZ_MAINMENU_NAME', 'general-options');
define('ANSIMUZ_THEME_VERSION', $theme_version);


// INCLUDES ---------------------------------------------------------//


// Load All-Purpose

include_once(ANSIMUZ_FUNCTIONS.'custom-functions.php');
require_once(ANSIMUZ_FUNCTIONS . 'shortcodes.php');

// Custom post types
//require_once(ANSIMUZ_POST_TYPES . 'work.php');

// Admin enqueue scripts
if(is_admin()):
	require_once(ANSIMUZ_FUNCTIONS . 'admin-helper.php');
	require_once(ANSIMUZ_FUNCTIONS . 'ajax-image.php');
	
	// Classes
	require_once(ANSIMUZ_FUNCTIONS . 'generate-meta-box.php');
	require_once(ANSIMUZ_FUNCTIONS . 'generate-options.php');
	
	// Options
	require_once(ANSIMUZ_FUNCTIONS . 'include-options.php' );
endif;

add_action('admin_head', 'ansimuz_admin_head');

#--------------------------------------------------------------------
#
#	GENERAL
#
#--------------------------------------------------------------------

// Video and Images Max Width ----------------------------------------------------//

if ( ! isset( $content_width ) ) $content_width = 960;

// Localization ----------------------------------------------------//

load_theme_textdomain( 'ansimuz', get_template_directory() . '/languages/' );

// SHORTCUT CONSTANTS ----------------------------------------------------//

define('CSSPATH', get_template_directory_uri() . "/css/");
define('JSPATH', get_template_directory_uri() . "/js/");
define('IMGPATH', get_template_directory_uri() . "/img/");

// ADD ADMIN JS SCRIPTS ----------------------------------------------------//

function load_custom_wp_admin_scripts(){
    
    // scripts
	//wp_enqueue_script('jquery-ui-encore');
	wp_enqueue_script('jquery-ui-sortable');
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_scripts');

// ADD FRONTEND CSS and JS SCRIPTS ----------------------------------------------------//

function load_js_scripts() {
    if ( !is_admin() ) {
    	
		
    	//  JS
    	wp_enqueue_script('custom', JSPATH . "custom.js", array('jquery'), false, true );
    	wp_enqueue_script('modernizr', JSPATH . "modernizr.js", array('jquery'), false, true );
		wp_enqueue_script('mediaqueries', JSPATH . 'css3-mediaqueries.js', array('jquery'), false, true );
		wp_enqueue_script('scrollto', JSPATH . 'jQuery.ScrollTo.js', array('jquery'), false, true );
		wp_enqueue_script('waypoints', JSPATH . 'waypoints.js', array('jquery'), false, true );
		wp_enqueue_script('slides', JSPATH . 'slides.js', array('jquery'), false, true );
		
		if( is_singular() ) wp_enqueue_script( 'comment-reply' ); // loads the javascript required for threaded comments
    }
}
add_action('wp_enqueue_scripts', 'load_js_scripts');

//  sidebar & footer ----------------------------------------------------//

if ( function_exists('register_sidebar') ){
	
	
	register_sidebar(array(
		'name' => 'Faq Sidebar',
		'before_widget' => '<li class="block">',
		'after_widget' => '</li>',
		'before_title' => '<h6 class="heading">',
		'after_title' => '</h6>',	));
	
	
	register_sidebar(array(
		'name' => 'Footer 1',
		'before_widget' => '<div class="widget-block">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="heading">',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'name' => 'Footer 2',
		'before_widget' => '<div class="widget-block">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="heading">',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'name' => 'Footer 3',
		'before_widget' => '<div class="widget-block">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="heading">',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'name' => 'Footer 4',
		'before_widget' => '<div class="widget-block">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="heading">',
		'after_title' => '</h4>',
	));	
}


// Enable Nav Menu -----------------------------//

if ( function_exists( 'add_theme_support' ) )
add_theme_support ('nav-menus');


function register_ansimuz_menus() {
	register_nav_menus  (array(
		'main'   => __('Main Navigation', 'top_navigation' )
	));
}
add_action('init', 'register_ansimuz_menus' );


// adds nav menu if exists if not add regular menu
function ansimuz_menu(){
	
	wp_nav_menu( array(
			'menu' => 'main_menu',
			'menu_id' => 'nav',
			'menu_class' => 'sf-menu',
			'theme_location' => 'main'
	));
}


