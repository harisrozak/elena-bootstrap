<?php
/*
 * Functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Elena
 */

define('ELENA_VERSION', '0.1.9');

require(get_template_directory() . '/inc/template-tags.php');
require(get_template_directory() . '/inc/customizer.php');

// load css and javascript files
add_action('wp_enqueue_scripts', 'elena_theme_enqueue_scripts_and_styles');
function elena_theme_enqueue_scripts_and_styles() 
{
	// bootstrap
	wp_enqueue_style('elena-bootstrap', get_template_directory_uri() . '/inc/bootstrap/css/bootstrap.min.css', array(), ELENA_VERSION);
	wp_enqueue_script('elena-bootstrap', get_template_directory_uri() . '/inc/bootstrap/js/bootstrap.min.js', array(), ELENA_VERSION, true);

	// open-sans fonts
	wp_enqueue_style('elena-open-sans', get_template_directory_uri() . '/fonts/open-sans/stylesheet.css', array(), ELENA_VERSION);

	// main style.css
	wp_enqueue_style( 'elena-style', get_stylesheet_uri() );
}

// after setup theme
add_action('after_setup_theme', 'elena_theme_setup');
function elena_theme_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'elena', get_template_directory() . '/languages' );

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
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// Add support for a navigation menu.
	register_nav_menus( array(
		'header-first-navigation' => __( 'Header First Navigation', 'elena' ),
		'header-second-navigation' => __( 'Header Second Navigation', 'elena' ),
		'footer-navigation' => __( 'Footer Navigation', 'elena' )
	) );
}

// Replaces the excerpt "more" text by a link
add_filter('excerpt_more', 'elena_theme_excerpt_more');
function elena_theme_excerpt_more($more)
{
    global $post;

    return sprintf('<div><a href="%1$s" class="%2$s">%3$s</a></div>',
    	get_permalink($post->ID), "excerpt-more btn btn-default", "Continue Reading"
    );
}

// Registers a widget area.
add_action( 'widgets_init', 'elena_widgets_init' );
function elena_widgets_init() 
{
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'elena' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'elena' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'elena' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'elena' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}