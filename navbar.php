<div id="navbar" class="navbar-collapse collapse">
	<?php 
		// Header First Navigation
		wp_nav_menu( 
			array( 						
				'theme_location' => 'header-first-navigation',
				'container' => false, 
				'menu_class' => 'nav navbar-nav navbar-left',
				'fallback_cb' => false 
			) 
		); 
	?>

	<?php 
		// Header Second Navigation
		wp_nav_menu( 
			array( 						
				'theme_location' => 'header-second-navigation',
				'container' => false, 
				'menu_class' => 'nav navbar-nav navbar-right',
				'fallback_cb' => false 
			) 
		); 
	?>
</div><!--/.nav-collapse -->