<?php
/**
* Enqueue scripts and styles
*/
function my_awesome_bootstrap_theme_scripts() {
wp_enqueue_style( 'My Awesome Bootstrap Theme-style', get_stylesheet_uri() );
wp_enqueue_script( 'My Awesome Bootstrap Theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
wp_enqueue_script( 'My Awesome Bootstrap Theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array( ), false, 'all' );
wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css', array( ), false, 'all' );
wp_enqueue_script( 'bootstrap-transition', get_template_directory_uri() . '/assets/js/bootstrap-transition.js', array('jquery'), false, true );
wp_enqueue_script( 'bootstrap-alert', get_template_directory_uri() . '/assets/js/bootstrap-alert.js', array('jquery'), false, true );
wp_enqueue_script( 'bootstrap-modal', get_template_directory_uri() . '/assets/js/bootstrap-modal.js', array('jquery'), false, true );
wp_enqueue_script( 'bootstrap-dropdown', get_template_directory_uri() . '/assets/js/bootstrap-dropdown.js', array('jquery'), false, true );
wp_enqueue_script( 'bootstrap-scrollspy', get_template_directory_uri() . '/assets/js/bootstrap-scrollspy.js', array('jquery'), false, true );
wp_enqueue_script( 'bootstrap-tab', get_template_directory_uri() . '/assets/js/bootstrap-tab.js', array('jquery'), false, true );
wp_enqueue_script( 'bootstrap-tooltip', get_template_directory_uri() . '/assets/js/bootstrap-tooltip.js', array('jquery'), false, true );
wp_enqueue_script( 'bootstrap-popover', get_template_directory_uri() . '/assets/js/bootstrap-popover.js', array('jquery'), false, true );
wp_enqueue_script( 'bootstrap-button', get_template_directory_uri() . '/assets/js/bootstrap-button.js', array('jquery'), false, true );
wp_enqueue_script( 'bootstrap-collapse', get_template_directory_uri() . '/assets/js/bootstrap-collapse.js', array('jquery'), false, true );
wp_enqueue_script( 'bootstrap-carousel', get_template_directory_uri() . '/assets/js/bootstrap-carousel.js', array('jquery'), false, true );
wp_enqueue_script( 'bootstrap-typeahead', get_template_directory_uri() . '/bootstrap-3.0.0-wip/js/jquery.js', array('jquery'), false, true );
wp_enqueue_script( 'bootstrap-affix', get_template_directory_uri() . '/bootstrap-3.0.0-wip/js/bootstrap.min.js', array('jquery'), false, true );


wp_enqueue_script( 'holder', get_template_directory_uri() . '/assets/js/holder/holder.js', array('jquery'), false, true );
wp_enqueue_script( 'prettify', get_template_directory_uri() . '/assets/js/google-code-prettify/prettify.js', array('jquery'), false, true );
wp_enqueue_script( 'modernizr-2.6.2.min', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.6.2.min.js', array(), false, true );
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );}
if ( is_singular() && wp_attachment_is_image() ) {
wp_enqueue_script( 'My Awesome Bootstrap Theme-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
}
}
add_action( 'wp_enqueue_scripts', 'my_awesome_bootstrap_theme_scripts' );