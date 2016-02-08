<nav class="navbar <?php elena_template_tags::header_navbar_class() ?>">
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
		
		<?php get_template_part('navbar') ?>
		
	</div>
</nav>