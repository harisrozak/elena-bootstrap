<div class="container">
	<div class="header-navigation">
		<?php if ( get_theme_mod( 'elena_header_logo' ) ) : ?>

	    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">	 
	        <img src="<?php echo get_theme_mod( 'elena_header_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">	 
	    </a>
	 
	    <?php else : ?>
	    
		<h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		  		<?php bloginfo( 'name' ); ?>
		  	</a>
	  	</h1>

	  	<?php
	  		$description = get_bloginfo( 'description', 'display' );
			if($description) {
				echo "<p class='site-description'>$description</p>";
			}
		?>

		<?php endif; ?>
	</div>

	<nav class="navbar <?php elena_template_tags::header_navbar_class() ?>">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			
			<?php get_template_part('inc/navbar/navbar') ?>
			
		</div>
	</nav>
</div>