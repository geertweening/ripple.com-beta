<?php
/**
 *Ripple functions and definitions
 *
 * @packageRipple
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'ripple_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function ripple_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based onRipple, use a find and replace
	 * to change 'ripple' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ripple', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ripple' ),
		'video-splash' => __( 'Video Splash Page', 'ripple' ),
		'footer-links1' => __( 'Footer Links Column One', 'ripple' ),
		'footer-links2' => __( 'Footer Links Column Two', 'ripple' ),
		'footer-links3' => __( 'Footer Links Column Three', 'ripple' ),
		'footer-links4' => __( 'Footer Links Column Four', 'ripple' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'ripple_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // ripple_setup
add_action( 'after_setup_theme', 'ripple_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function ripple_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'ripple' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'ripple_widgets_init' );

/**
* Enqueue scripts and styles
*/
function ripple_scripts() {
wp_enqueue_style( 'ripple-style', get_stylesheet_uri() );
wp_enqueue_script( 'jqueryer', get_template_directory_uri() . '/assets/js/jquery.js', array(), false, true );
// wp_enqueue_script( 'ripple-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
wp_enqueue_script( 'ripple-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
wp_enqueue_style( 'ripple-css', get_template_directory_uri() . '/assets/css/ripple.css', array( ), false, 'all' );
wp_enqueue_script( 'transition', get_template_directory_uri() . '/assets/js/transition.js', array('jquery'), false, true );
// wp_enqueue_script( 'alert', get_template_directory_uri() . '/assets/js/alert.js', array('jquery'), false, true );
// wp_enqueue_script( 'modal', get_template_directory_uri() . '/assets/js/modal.js', array('jquery'), false, true );
// wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/assets/js/dropdown.js', array('jquery'), false, true );
wp_enqueue_script( 'tab', get_template_directory_uri() . '/assets/js/tab.js', array('jquery'), false, true );
wp_enqueue_script( 'tooltip', get_template_directory_uri() . '/assets/js/tooltip.js', array('jquery'), false, true );
// wp_enqueue_script( 'popover', get_template_directory_uri() . '/assets/js/popover.js', array('jquery'), false, true );
// wp_enqueue_script( 'button', get_template_directory_uri() . '/assets/js/button.js', array('jquery'), false, true );
// wp_enqueue_script( 'collapse', get_template_directory_uri() . '/assets/js/collapse.js', array('jquery'), false, true );
// wp_enqueue_script( 'carousel', get_template_directory_uri() . '/assets/js/carousel.js', array('jquery'), false, true );
// wp_enqueue_script( 'typeahead', get_template_directory_uri() . '/assets/js/typeahead.js', array('jquery'), false, true );
wp_enqueue_script( 'affix', get_template_directory_uri() . '/assets/js/affix.js', array('jquery'), false, true );
wp_enqueue_script( 'scrollspy', get_template_directory_uri() . '/assets/js/scrollspy.js', array('jquery'), false, true );
wp_enqueue_script( 'application', get_template_directory_uri() . '/assets/js/application.js', array('jquery'), false, true );
// wp_enqueue_script( 'holder-js', get_template_directory_uri() . '/assets/js/holder.js', array(), false, true );
wp_enqueue_script( 'ripple-js', get_template_directory_uri() . '/assets/js/ripple-lib.js', array(), false, false );
wp_enqueue_script( 'transactionFeed-js', get_template_directory_uri() . '/assets/js/transactionFeed.js', array('jquery'), false, true );
wp_enqueue_script( 'homepage-js', get_template_directory_uri() . '/assets/js/homepage.js', array('jquery'), false, true );
if (is_page('users')) {
	wp_enqueue_script( 'd3-js', get_template_directory_uri() . '/assets/js/d3.v3.min.js', array(), false, false );
	wp_enqueue_script( 'paymentVisualization-js', get_template_directory_uri() . '/assets/js/paymentVisualization.js', array('jquery'), false, true );	
}
if (is_page('partners')) {
	wp_enqueue_script( 'partnerPageStatistics-js', get_template_directory_uri() . '/assets/js/partnerPageStatistics.js', array('jquery'), false, true );	
}
if (is_page('devs')) {
	wp_enqueue_script( 'dev-script', get_template_directory_uri() . '/assets/js/dev-script.js', array('jquery'), false, true );	
}
wp_enqueue_script( 'rippleVisualizationSetup', get_template_directory_uri() . '/assets/js/rippleVisualizationSetup.js', array('jquery'), false, true );
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );}
if ( is_singular() && wp_attachment_is_image() ) {
wp_enqueue_script( 'ripple Theme-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
}

}
add_action( 'wp_enqueue_scripts', 'ripple_scripts' );

    function load_fonts() {
            wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic');
            wp_enqueue_style( 'googleFonts');
        }
 
    add_action('wp_print_styles', 'load_fonts');
/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );

function page_bodyclass() {  // add class to <body> tag
	global $wp_query;
	$page = '';
	if (is_front_page() ) {
    	   $page = 'home';
	} elseif (is_page()) {
   	   $page = $wp_query->query_vars["pagename"];
	}
	if ($page)
		echo 'class= "'. $page. '"';
}

function comment_reform ($arg) {
$arg['title_reply'] = __('Discussion:');
return $arg;
}
add_filter('comment_form_defaults','comment_reform');

