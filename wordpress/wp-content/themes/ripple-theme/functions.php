<?php

#--------------------------------------------------------------------
#
#	NEW OPTIONS PANEL FRAME WORK
#
#--------------------------------------------------------------------

add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) 
{
// add your extension to the array
$existing_mimes['exe'] = 'application/x-msdownload';

return $existing_mimes;
}


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
		wp_enqueue_script('scrollspy', JSPATH . 'jquery-scrollspy.js', array('jquery'), false, true );
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
		'name' => 'Blog Sidebar',
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

if ( function_exists( 'register_nav_menus' ) ) {
  	register_nav_menus(
  		array(
  		  'top_menu' => 'Top Navigation',
  		  'top_mini_menu' => 'Top Mini Navigation',
  		)
  	);
}

//change excerpts more string
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Register Custom Post Type
function custom_post_type() {
	$labels = array(
		'name'                => _x( 'Press', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Press', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Press', 'text_domain' ),
		'parent_item_colon'   => __( '', 'text_domain' ),
		'all_items'           => __( 'All Press Items', 'text_domain' ),
		'view_item'           => __( 'View Press', 'text_domain' ),
		'add_new_item'        => __( 'Add New Press Item', 'text_domain' ),
		'add_new'             => __( 'New Press Item', 'text_domain' ),
		'edit_item'           => __( 'Edit Press Item', 'text_domain' ),
		'update_item'         => __( 'Update Press Item', 'text_domain' ),
		'search_items'        => __( 'Search Press', 'text_domain' ),
		'not_found'           => __( 'No Press Item Found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No press found in Trash', 'text_domain' ),
	);

	$args = array(
		'label'               => __( 'press', 'text_domain' ),
		'description'         => __( 'Press items', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);

	register_post_type( 'press', $args );
}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );

// As of WP 3.1.1 addition of classes for css styling to parents of custom post types doesn't exist.
// We want the correct classes added to the correct custom post type parent in the wp-nav-menu for css styling and highlighting, so we're modifying each individually...
// The id of each link is required for each one you want to modify
// Place this in your WordPress functions.php file

function remove_parent_classes($class)
{
  // check for current page classes, return false if they exist.
	return ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor'  || $class == 'current-menu-item') ? FALSE : TRUE;
}

function add_class_to_wp_nav_menu($classes)
{
     switch (get_post_type())
     {
     	case 'press':
     		// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
     		$classes = array_filter($classes, "remove_parent_classes");

     		// add the current page class to a specific menu item (replace ###).
     		if (in_array('menu-item-592', $classes))
     		{
     		   $classes[] = 'current_page_parent';
         }
     		break;

      // add more cases if necessary and/or a default
     }
	return $classes;
}
add_filter('nav_menu_css_class', 'add_class_to_wp_nav_menu');


