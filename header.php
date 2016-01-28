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

<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		  	<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		  		<?php bloginfo( 'name' ); ?>
		  	</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<?php 
				// Header First Navigation
				wp_nav_menu( 
					array( 						
						'theme_location' => 'header-first-navigation', 
						'walker' => new wp_bootstrap_navwalker(),
						'container' => false, 
						'menu_class' => 'nav navbar-nav',
						'fallback_cb' => false 
					) 
				); 
			?>

			<?php 
				// Header Second Navigation
				wp_nav_menu( 
					array( 						
						'theme_location' => 'header-second-navigation', 
						'walker' => new wp_bootstrap_navwalker(),
						'container' => false, 
						'menu_class' => 'nav navbar-nav navbar-right',
						'fallback_cb' => false 
					) 
				); 
			?>
		</div><!--/.nav-collapse -->
	</div>
</nav>

