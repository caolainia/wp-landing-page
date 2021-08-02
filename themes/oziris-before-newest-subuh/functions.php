<?php
/**
 * Oziris functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Oziris
 */

if ( ! function_exists( 'oziris_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function oziris_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Oziris, use a find and replace
	 * to change 'oziris' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'oziris', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'oziris' ),
		'footer' => esc_html__( 'Footer', 'oziris' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
*/
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'oziris_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	add_image_size('news-thumb',350,305,true);
}
endif;
add_action( 'after_setup_theme', 'oziris_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function oziris_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'oziris_content_width', 640 );
}
add_action( 'after_setup_theme', 'oziris_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function oziris_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'oziris' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'oziris_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function oziris_scripts() {
	
	$themes_version = '1.1';
	
	// LOAD GOOGLE FONT
	
	wp_enqueue_style( 'google-font','http://fonts.googleapis.com/css?family=Open+Sans:400italic,300italic,600italic,400,300,600,700|Lato:400,700,900|Roboto:700' );
	
	
	
	//wp_enqueue_style( 'style-grid', get_template_directory_uri() . '/css/grid.css','',$themes_version );
	//wp_enqueue_style( 'style-plugins', get_template_directory_uri() . '/css/plugins.css','',$themes_version );
	wp_enqueue_style( 'oziris-style', get_stylesheet_uri() );
	//wp_enqueue_style( 'style-responsive', get_template_directory_uri() . '/css/responsive.css','',$themes_version );



	wp_enqueue_script( 'oziris-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'oziris-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'oziris-single', get_template_directory_uri() . '/js/single.js', array('jquery'), '1.3', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		//wp_enqueue_script( 'comment-reply' );
	}
	
	// pras changes
	if(is_front_page() && 'page' == get_option( 'show_on_front' )){
		//turn off style for homepage
		wp_dequeue_style('oziris-style');
		
		wp_enqueue_style( 'oziris-style-home', get_template_directory_uri() . '/style-home.css','','1.3' );
		
		wp_enqueue_script( 'oziris-skrollr', get_template_directory_uri() . '/js/skrollr.min.js', array(), '1.1', true );
		wp_enqueue_script( 'oziris-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '1.1', true );
		wp_enqueue_script( 'oziris-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.3', true );
	
	}
}
add_action( 'wp_enqueue_scripts', 'oziris_scripts' );

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


/* MOBILE DETECT */
require get_template_directory() . '/mob-detect.php';


require get_template_directory() . '/inc/function-custom.php';
require get_template_directory() . '/inc/function-post-type.php';