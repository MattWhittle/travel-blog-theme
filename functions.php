<?php
/**
 * Travel Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Travel_Blog
 */

if ( ! function_exists( 'travel_blog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function travel_blog_excerpt($length) {
	return 30;
}
add_filter('excerpt_length', 'travel_blog_excerpt', 999);

function travel_blog_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Travel Blog, use a find and replace
	 * to change 'travel-blog' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'travel-blog', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'slider', 1200, 475, true );
	add_image_size( 'entry', 619, 462, true );
	add_image_size( 'single-image', 800, 300, true );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'travel-blog' ),
		'footer-menu' => esc_html__( 'Footer Menu', 'travel-blog' ),
		'social-menu' => esc_html__( 'Social Menu', 'travel-blog' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'travel_blog_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'travel_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function travel_blog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'travel_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'travel_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travel_blog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'travel-blog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'travel-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title text-center separator">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'travel_blog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function travel_blog_scripts() {
	
	wp_enqueue_style( 'foundatiom-styles', get_template_directory_uri() . '/css/app.css' );

	wp_enqueue_style( 'foundatiom-icons', get_template_directory_uri() . '/css/foundation-icons.css' );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '20151215', true  );

	wp_enqueue_script( 'travel-blog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'travel-blog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'what-input', get_template_directory_uri() . '/js/what-input.min.js', array(), '20151215', true );

	wp_enqueue_script( 'app-js', get_template_directory_uri() . '/js/app.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'travel_blog_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * widgets
 */
require get_template_directory() . '/inc/widgets.php';

class F6_TOPBAR_MENU_WALKER extends Walker_Nav_Menu
{   
    /*
     * Add vertical menu class and submenu data attribute to sub menus
     */
     
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"vertical menu\" data-submenu>\n";
    }
}
 
//Optional fallback
function f6_topbar_menu_fallback($args)
{
    /*
     * Instantiate new Page Walker class instead of applying a filter to the
     * "wp_page_menu" function in the event there are multiple active menus in theme.
     */
     
    $walker_page = new Walker_Page();
    $fallback = $walker_page->walk(get_pages(), 0);
    $fallback = str_replace("<ul class='children'>", '<ul class="children submenu menu vertical" data-submenu>', $fallback);
    
    echo '<ul class="dropdown menu" data-dropdown-menu>'.$fallback.'</ul>';
}
 
?>

