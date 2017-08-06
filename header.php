<?php
/**
 * Header Template
 * The area of the page that contains the header.
 *
 * @link https://codex.wordpress.org/Designing_Headers
 *
 * @package WordPress
 * @subpackage Elena
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 
$navbar_type = get_theme_mod('elena_header_type','navbar-static-top');

switch ($navbar_type) {
	case 'navbar-fixed-top':
		get_template_part('inc/navbar/navbar','fixed');
		break;

	case 'navbar-static-top':
		get_template_part('inc/navbar/navbar','static');
		break;
	
	default:
		get_template_part('inc/navbar/navbar','default');
		break;
}
?>