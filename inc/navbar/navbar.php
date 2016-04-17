<div id="navbar" class="navbar-collapse collapse">
	<?php 
		// Header Left Navigation
		wp_nav_menu( 
			array( 						
				'theme_location' => 'header-left-navigation',
				'container' => false, 
				'menu_class' => 'nav navbar-nav navbar-left',
				'fallback_cb' => false 
			) 
		); 
	?>

	<?php 
		// Header Right Navigation
		wp_nav_menu( 
			array( 						
				'theme_location' => 'header-right-navigation',
				'container' => false, 
				'menu_class' => 'nav navbar-nav navbar-right',
				'fallback_cb' => false 
			) 
		); 
	?>
</div><!--/.nav-collapse -->