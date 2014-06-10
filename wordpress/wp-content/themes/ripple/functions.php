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
		'footer-links5' => __( 'Footer Links Column Five', 'ripple' ),
		'dev-ripple-menu' => __( 'Dev Ripple Menu', 'ripple' ),
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
		'name'          => __( 'Blog Post List Sidebar', 'ripple' ),
		'id'            => 'blog-post-list-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) );
	register_sidebar( array(
		'name'          => __( 'Single Blog Post Sidebar', 'ripple' ),
		'id'            => 'single-blog-post-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) );
	register_sidebar( array(
		'name'          => __( 'Dev Sidebar', 'ripple' ),
		'id'            => 'dev-sidebar',
		'before_widget' => '<ul id="%1$s" class="level-1">',
		'after_widget'  => '</ul>',
		'before_title'  => '<ul class="level-1"><li class="level-1"><a class="level-1">',
		'after_title'   => '</a><ul class="level-2"><li class="level-2">',
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
	wp_enqueue_script( 'modal', get_template_directory_uri() . '/assets/js/modal.js', array('jquery'), false, true );
// wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/assets/js/dropdown.js', array('jquery'), false, true );
	wp_enqueue_script( 'tab', get_template_directory_uri() . '/assets/js/tab.js', array('jquery'), false, true );
	wp_enqueue_script( 'tooltip', get_template_directory_uri() . '/assets/js/tooltip.js', array('jquery'), false, true );
// wp_enqueue_script( 'popover', get_template_directory_uri() . '/assets/js/popover.js', array('jquery'), false, true );
// wp_enqueue_script( 'button', get_template_directory_uri() . '/assets/js/button.js', array('jquery'), false, true );
// wp_enqueue_script( 'collapse', get_template_directory_uri() . '/assets/js/collapse.js', array('jquery'), false, true );
	wp_enqueue_script( 'carousel', get_template_directory_uri() . '/assets/js/carousel.js', array('jquery'), false, true );
// wp_enqueue_script( 'typeahead', get_template_directory_uri() . '/assets/js/typeahead.js', array('jquery'), false, true );
	wp_enqueue_script( 'affix', get_template_directory_uri() . '/assets/js/affix.js', array('jquery'), false, true );
	wp_enqueue_script( 'scrollspy', get_template_directory_uri() . '/assets/js/scrollspy.js', array('jquery'), false, true );
	wp_enqueue_script( 'application', get_template_directory_uri() . '/assets/js/application.js', array('jquery'), false, true );
// wp_enqueue_script( 'holder-js', get_template_directory_uri() . '/assets/js/holder.js', array(), false, true );
	wp_enqueue_script( 'ripple-js', get_template_directory_uri() . '/assets/js/ripple-lib.js', array(), false, false );
	wp_enqueue_script( 'transactionFeed-js', get_template_directory_uri() . '/assets/js/transactionFeed.js', array('jquery'), false, true );
	wp_enqueue_script( 'homepage-js', get_template_directory_uri() . '/assets/js/homepage.js', array('jquery'), false, true );
	wp_enqueue_script( 'thumbnail-recent-post-widget-js', get_template_directory_uri() . '/assets/js/thumbnail-recent-post-widget.js', array('jquery'), false, true );
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

    // function load_fonts() {
    //         wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic');
    //         wp_enqueue_style( 'googleFonts');
    //     }

    // add_action('wp_print_styles', 'load_fonts');
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

// Add Class to body

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

// Change Comment Styles
function comment_reform ($arg) {
	$arg['title_reply'] = __('Discussion:');
	return $arg;
}
add_filter('comment_form_defaults','comment_reform');

// Creates Dev Blog post type
// register_post_type('dev-blog', array(
// 	'label' => 'Dev Blog',
// 	'public' => true,
// 	'show_ui' => true,
// 	'capability_type' => 'post',
// 	'hierarchical' => false,
// 	'rewrite' => array('slug' => 'dev-blog'),
// 	'query_var' => true,
// 	'supports' => array(
// 	'title',
// 	'editor',
// 	'excerpt',
// 	'comments',
// 	'revisions',
// 	'thumbnail',
// 	'author',
// )
// ) 
// );
// Developer Blog Post Type
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'dev-blog',
		array(
			'labels' => array(
				'name' => __( 'Dev Blog' ),
				'singular_name' => __( 'Dev Blog' )
				),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'dev-blog'),
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'author' ),
            'taxonomies' => array( 'post_tag') // this is IMPORTANT
            )
		);
}

// Custom Excerpt Length

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	} 
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}

function content($limit) {
	$content = explode(' ', get_the_content(), $limit);
	if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
	} else {
		$content = implode(" ",$content);
	} 
	$content = preg_replace('/\[.+\]/','', $content);
	$content = apply_filters('the_content', $content); 
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}



// Custom Recent Post Widget
// Intiate
add_action( 'widgets_init', create_function( '', 'register_widget( "My_Widget_Recent_Posts" );' ) );
/**
 * Recent_Posts widget class
 *
 * @since 2.8.0
 */
class My_Widget_Recent_Posts extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'thumbnail-recent-post-widget', 'description' => __( "The most Recent Posts on your site with thumbnail images") );
		parent::__construct('recent-posts', __('Thumbnail Recent Post Widget'), $widget_ops);
		$this->alt_option_name = 'widget_recent_entries';

		add_action( 'save_post', array($this, 'flush_widget_cache') );
		add_action( 'deleted_post', array($this, 'flush_widget_cache') );
		add_action( 'switch_theme', array($this, 'flush_widget_cache') );
	}

	function widget($args, $instance) {
		$cache = wp_cache_get('widget_recent_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract($args);

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Thumbnail Recent Post Widget' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
		if ( ! $number )
			$number = 10;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if ($r->have_posts()) :
			?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
		
			<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<div class="list-item">
				<h4 class="post-title">
					<a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
				</h4>
				<?php 
				if ( has_post_thumbnail() ) { ?>
				<div class="post-thumbnail col-sm-3">
					<a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>">
						<?php the_post_thumbnail('excerpt-thumbnail', 'class=news-thumbnail'); ?>
					</a>
				</div>
				<?php } ?>

				<p>
				<?php echo excerpt(20); ?>
				</p>
				<footer class="entry-meta">
					<a class="readmore" href="<?php echo get_permalink(); ?>"> Read More</a>
				</footer>
				<?php if ( $show_date ) : ?>
				<span class="post-date"><?php echo get_the_date(); ?></span>
			<?php endif; ?>
		</div>
		<hr>
	<?php endwhile; ?>
<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
wp_reset_postdata();

endif;

$cache[$args['widget_id']] = ob_get_flush();
wp_cache_set('widget_recent_posts', $cache, 'widget');
}

function update( $new_instance, $old_instance ) {
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['number'] = (int) $new_instance['number'];
	$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
	$this->flush_widget_cache();

	$alloptions = wp_cache_get( 'alloptions', 'options' );
	if ( isset($alloptions['widget_recent_entries']) )
		delete_option('widget_recent_entries');

	return $instance;
}

function flush_widget_cache() {
	wp_cache_delete('widget_recent_posts', 'widget');
}

function form( $instance ) {
	$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
	$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
	$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
	?>
	<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

			<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>
				<?php
			}
		}
