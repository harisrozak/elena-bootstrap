<form class="search-form-widget" role="search" action="<?php echo home_url() ; ?>/">
	<div class="inline-search-form">
		<input type="text" class="form-control" placeholder="Enter to search.." value="<?php echo esc_html($s, 1); ?>" name="s" id="s">
		<button type="submit" class="btn btn-default">Search</button>
	</div>	
	<div class="clearfix"></div>
</form>