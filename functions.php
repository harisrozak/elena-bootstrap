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

require(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
require(get_template_directory() . '/inc/template-tags.php');

add_action('wp_enqueue_scripts', 'elena_theme_enqueue_scripts_and_styles');
function elena_theme_enqueue_scripts_and_styles() 
{
	// bootstrap
	wp_enqueue_style('elena-bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', array(), ELENA_VERSION);
	wp_enqueue_script('elena-bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array(), ELENA_VERSION, true);

	// main style.css
	wp_enqueue_style( 'elena-style', get_stylesheet_uri() );
}

add_action('after_setup_theme', 'elena_theme_setup');
function elena_theme_setup()
{
	// Add support for a navigation menu.
	register_nav_menus( array(
		'header-first-navigation' 	=> __( 'Header First Navigation', 'elena' ),
		'header-second-navigation' 	=> __( 'Header Second Navigation', 'elena' ),
		'footer-navigation' 	=> __( 'Footer Navigation', 'elena' )
	) );
}