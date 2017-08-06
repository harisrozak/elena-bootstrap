<?php
/**
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
	// jQuery
	wp_enqueue_script('jquery');	

	// bootstrap
	wp_enqueue_style('elena-bootstrap', get_template_directory_uri() . '/inc/bootstrap/css/bootstrap.min.css', array(), ELENA_VERSION);
	wp_enqueue_script('elena-bootstrap', get_template_directory_uri() . '/inc/bootstrap/js/bootstrap.min.js', array(), ELENA_VERSION, true);

	// open-sans fonts
	wp_enqueue_style('elena-open-sans', get_template_directory_uri() . '/fonts/open-sans/stylesheet.css', array(), ELENA_VERSION);

	// wordpress comment-reply
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

	// main style.css
	wp_enqueue_style( 'elena-style', get_stylesheet_uri() );
}

// after setup theme
add_action('after_setup_theme', 'elena_theme_setup');
function elena_theme_setup()
{
	// translate
	load_theme_textdomain( 'elena', get_template_directory() . '/languages' );

	// theme support
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background', array(
		'default-color'          => '',
		'default-image'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	));
	
	// add support for a navigation menu.
	register_nav_menus( array(
		'header-left-navigation' => __( 'Header Left Navigation', 'elena' ),
		'header-right-navigation' => __( 'Header Right Navigation', 'elena' ),
		'footer-navigation' => __( 'Footer Navigation', 'elena' )
	) );

	// Add editor style
	add_editor_style( get_stylesheet_uri() );

	// content width
	global $content_width; 
	if(! isset($content_width)) $content_width = 780;
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