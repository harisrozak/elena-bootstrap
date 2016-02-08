<div class="container">
	<div class="header-navigation">
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
			
			<?php get_template_part('navbar') ?>
			
		</div>
	</nav>
</div>